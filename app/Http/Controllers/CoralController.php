<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Coral;
use App\Aquarium;

class CoralController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get selected coral details page
     *
     * Find the coral in the db and add the additional
     * attributes associated to the coral that get pulled
     * back in the pivot table
     *
     * @param $id
     * @return coral.view
     */
    public function coralDetails($id){

        $coral = Coral::find($id);
        foreach ($coral->attributes as $attribute){
            $name = $attribute->attribute;
            $coral->$name = $attribute->description;
        }
        return view('coral/view')->with(['coral' => $coral]);
    }

    /**
     * Show the add coral page
     *
     * @param $aquarium_id
     * @return Coral .add
     */
    public function addCoral($aquarium_id){

        //Get an aquarium record for the new coral to use in the view
        $aquarium = Aquarium::find($aquarium_id);

        //Get all the coral attributes from the database
        //This will build a nested array and we loop through to build
        //out the different attributes to be used in the view. This allows
        //us to use one db query instead of individual.
        $attributes=Coral::getCoralAttributes();

        $coral_type=[];
        $care=[];
        $temperament=[];
        $lighting=[];
        $waterflow=[];

        foreach($attributes as $attribute=>$keys){
            foreach ($keys as $key=>$value){
                if($key=='coral_type'){
                    $coral_type[]=$value;
                }elseif ($key=='care'){
                    $care[]=$value;
                }elseif ($key=='temperament'){
                    $temperament[]=$value;
                }elseif ($key=='lighting'){
                    $lighting[]=$value;
                }elseif ($key=='waterflow'){
                    $waterflow[]=$value;
                }
            }
        }
        return view('coral/add')->with([
            'aquarium_id'=>$aquarium_id,
            'aquarium' => $aquarium,
            'coral_type' => $coral_type,
            'care' => $care,
            'temperament' => $temperament,
            'lighting' => $lighting,
            'waterflow' => $waterflow]);
    }

    /**
     * Save the new coral to the database
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveCoral(Request $request){

        //Return to aquarium page if user selects cancel
        if($request->cancel){
            Session::flash('message', 'Cancel: No coral was added');
            return redirect('/aquarium/view/'. $request->aquarium_id);
        }

        //Validate the form values
        //Failures will return to original form to display the errors
        $validator = Coral::validateCoral($request);
        if ($validator->fails()) {
            return redirect('coral/add/'.$request->aquarium_id)->withErrors($validator)->withInput();
        }

        //Create a new coral and set all the values
        $coral = new Coral();
        $coral->aquarium()->associate($request->aquarium_id);
        $coral->name = $request->name;
        $coral->image = $request->image;
        $coral->notes = $request->notes;

        $attributes = Coral::getSelectedCoralAttributes($request);

        //Save the new coral w/attributes to the database
        $coral->save();
        $coral->attributes()->sync($attributes);

        //Set the message to notify user the fish was added
        Session::flash('message', $request->name . ' was successfully added');

        //redirect to user the new fish details page after save.
        return redirect('/coral/view/' . $coral->id)->withInput(['coral' => $coral]);
    }

    /**
     * Show the edit coral page
     *
     * @param $id
     * @return Coral .edit
     */
    public function editCoral($id){
        $coral = Coral::find($id);

        //redirect home if edit coral id doesnt exist.
        if(is_null($coral)){
            Session::flash('message', 'Coral with id '. $id . ' does not exist');
            return redirect('/');
        }

        //Add the additional attributes associated to
        //the coral that get pulled back in the pivot table
        foreach ($coral->attributes as $attribute){
            $name = $attribute->attribute;
            $coral->$name=$attribute->description;
        }

        //Get all the coral attributes from the database
        //This will build a nested array and we loop through to build
        //out the different attributes to be used in the view. This allows
        //us to use one db query instead of individual.
        $attributes=Coral::getCoralAttributes();

        $coral_type=[];
        $care=[];
        $temperament=[];
        $lighting=[];
        $waterflow=[];

        foreach($attributes as $attribute=>$keys){
            foreach ($keys as $key=>$value){
                if($key=='coral_type'){
                    $coral_type[]=$value;
                }elseif ($key=='care'){
                    $care[]=$value;
                }elseif ($key=='temperament'){
                    $temperament[]=$value;
                }elseif ($key=='lighting'){
                    $lighting[]=$value;
                }elseif ($key=='waterflow'){
                    $waterflow[]=$value;
                }
            }
        }

        return view('/coral/edit')->with([
            'id' => $id,
            'coral' => $coral,
            'coral_type' => $coral_type,
            'care' => $care,
            'temperament' => $temperament,
            'lighting' => $lighting,
            'waterflow' => $waterflow]);
    }

    /**
     * Update the selected coral
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateCoral(Request $request){

        //Return to coral detail page if user selects cancel
        if($request->cancel){
            Session::flash('message', 'Cancel: ' . $request->name . ' was not updated');
            return redirect('/coral/view/'. $request->id);
        }

        //Validate the form values
        //Failures will return to original form to display the errors
        $validator = Coral::validateCoral($request);
        if ($validator->fails()) {
            return redirect('coral/edit/'.$request->id)->withErrors($validator)->withInput();
        }

        //Get the coral from db and set all the values from the form to update entry
        $coral = Coral::find($request->id);
        $coral->aquarium()->associate($request->aquarium_id);
        $coral->name = $request->name;
        $coral->image = $request->image;
        $coral->notes = $request->notes;

        $attributes = Coral::getSelectedCoralAttributes($request);

        $coral->attributes()->sync($attributes);
        $coral->save();

        Session::flash('message', $coral->name . ' was successfully updated');
        return redirect('/coral/view/'. $request->id);
    }

    /**
     * Delete the selected coral
     *
     * @param $id
     * @return Aquarium .view
     */
    public function deleteCoral($id){

        $coral = Coral::find($id);
        if($coral){
            $coral->attributes()->detach();
            $coral->Delete();
        }

        Session::flash('message', 'Your '. $coral->name . ' coral has been deleted');
        return redirect('/aquarium/view/' . $coral->aquarium_id);
    }
}