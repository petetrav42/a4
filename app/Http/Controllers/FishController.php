<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Fish;
use App\Aquarium;

class FishController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the fish details page
     *
     * Find the fish in the db and add the additional
     * attributes associated to the fish that get pulled
     * back in the pivot table
     *
     * @param $id
     * @return Fish .view
     */
    public function fishDetails($id){

        $fish = Fish::find($id);
        foreach ($fish->attributes as $attribute){
            $name = $attribute->attribute;
            $fish->$name = $attribute->description;
        }
        return view('fish/view')->with(['fish' => $fish]);
    }

    /**
     * Show the add fish page
     *
     * @param $aquarium_id
     * @return Fish .add
     */
    public function addFish($aquarium_id){

        //Get an aquarium record for the new fish to use in the view
        $aquarium = Aquarium::find($aquarium_id);

        //Get all the fish attributes from the database
        //This will build a nested array and we loop through to build
        //out the different attributes to be used in the view. This allows
        //us to use one db query instead of individual.
        $attributes=Fish::getFishAttributes();

        $fish_type=[];
        $care=[];
        $temperament=[];
        $reef_compatible=[];

        foreach($attributes as $attribute=>$keys){
            foreach ($keys as $key=>$value){
                if($key=='fish_type'){
                    $fish_type[]=$value;
                }elseif ($key=='care'){
                    $care[]=$value;
                }elseif ($key=='temperament'){
                    $temperament[]=$value;
                }elseif ($key=='reef_compatible'){
                    $reef_compatible[]=$value;
                }
            }
        }

        return view('fish/add')->with([
            'aquarium_id'=>$aquarium_id,
            'aquarium' => $aquarium,
            'fish_type' => $fish_type,
            'care' => $care,
            'temperament' => $temperament,
            'reef_compatible' => $reef_compatible]);
    }

    /**
     * Save the new fish to the database
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveFish(Request $request){

        //Return to aquarium page if user selects cancel
        if($request->cancel){
            Session::flash('message', 'Cancel: No fish was added');
            return redirect('/aquarium/view/'. $request->aquarium_id);
        }

        //Validate the form values
        //Failures will return to original form to display the errors
        $validator = Fish::validateFish($request);
        if ($validator->fails()) {
            return redirect('fish/add/'.$request->aquarium_id)->withErrors($validator)->withInput();
        }

        //Create a new fish and set all the values
        $fish = new Fish();
        $fish->aquarium()->associate($request->aquarium_id);
        $fish->name = $request->name;
        $fish->image = $request->image;
        $fish->notes = $request->notes;

        $attributes = Fish::getSelectedFishAttributes($request);

        //Save the new fish w/attributes to the database
        $fish->save();
        $fish->attributes()->sync($attributes);

        //Set the message to notify user the fish was added
        Session::flash('message', $request->name . ' was successfully added');

        //redirect to user the new fish details page after save.
        return redirect('/fish/view/' . $fish->id)->withInput(['fish' => $fish]);
    }

    /**
     * Get info to show edit fish page
     *
     * @param $id
     * @return fish.edit
     */
    public function editFish($id){

        $fish = Fish::find($id);

        //redirect home if edit fish id doesnt exist.
        if(is_null($fish)) {
            Session::flash('message', 'Fish with id ' . $id . ' does not exist');
            return redirect('/');
        }

        //Add the additional attributes associated to
        //the fish that get pulled back in the pivot table
        foreach ($fish->attributes as $attribute){
            $name = $attribute->attribute;
            $fish->$name=$attribute->description;
        }

        //Get all the fish attributes from the database
        //This will build a nested array and we loop through to build
        //out the different attributes. This allows us to use one
        //db query instead of individual.
        $attributes=Fish::getFishAttributes();

        $fish_type=[];
        $care=[];
        $temperament=[];
        $reef_compatible=[];

        foreach($attributes as $attribute=>$keys){
            foreach ($keys as $key=>$value){
                if($key=='fish_type'){
                    $fish_type[]=$value;
                }elseif ($key=='care'){
                    $care[]=$value;
                }elseif ($key=='temperament'){
                    $temperament[]=$value;
                }elseif ($key=='reef_compatible'){
                    $reef_compatible[]=$value;
                }
            }
        }

        return view('/fish/edit')->with([
            'id' => $id,
            'fish' => $fish,
            'fish_type' => $fish_type,
            'care' => $care,
            'temperament' => $temperament,
            'reef_compatible' => $reef_compatible]);
    }

    /**
     * Update the selected fish
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateFish(Request $request){

        //Return to fish detail page if user selects cancel
        if($request->cancel){
            Session::flash('message', 'Cancel: ' . $request->name . ' not updated');
            return redirect('/fish/view/'. $request->id);
        }

        //Validate the form values
        //Failures will return to original form to display the errors
        $validator = Fish::validateFish($request);
        if ($validator->fails()) {
            return redirect('fish/edit/'.$request->id)->withErrors($validator)->withInput();
        }

        //Get the fish from db and set all the values from the form to update entry
        $fish = Fish::find($request->id);
        $fish->aquarium()->associate($request->aquarium_id);
        $fish->name = $request->name;
        $fish->image = $request->image;
        $fish->notes = $request->notes;

        $attributes = Fish::getSelectedFishAttributes($request);

        $fish->attributes()->sync($attributes);
        $fish->save();

        Session::flash('message', $fish->name . ' was successfully updated');
        return redirect('/fish/view/'. $request->id);
    }

    /**
     * Delete the selected fish
     *
     * @param $id
     * @return aquarium.view
     */
    public function deleteFish($id){

        $fish = Fish::find($id);
        if($fish){
            $fish->attributes()->detach();
            $fish->Delete();
        }

        Session::flash('message', 'Your '. $fish->name . ' fish has been deleted');
        return redirect('/aquarium/view/' . $fish->aquarium_id);
    }
}