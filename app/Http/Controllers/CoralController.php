<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
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
     * @param $id
     * @return coral.view
     */
    public function coralDetails($id){
        $coral = Coral::find($id);
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
        return view('coral/add')->with(['aquarium_id'=>$aquarium_id, 'aquarium' => $aquarium]);
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
            //Set the message to notify user they cancelled adding a coral
            Session::flash('message', 'Cancel: No coral was added');
            return redirect('/aquarium/view/'. $request->aquarium_id);
        }

        //Validate the form values
        $validator = $this->validateForm($request);

        //If validation fails then return to original form to display the errors
        //no need to continue with the code
        if ($validator->fails()) {
            return redirect('coral/add/'.$request->aquarium_id)->withErrors($validator)->withInput();
        }

        //Create a new coral and set all the values
        $coral = new Coral();
        $coral->aquarium()->associate($request->aquarium_id);
        $coral->name = $request->name;
        $coral->type = $request->type;
        $coral->care_level = $request->care_level;
        $coral->temperament = $request->temperament;
        $coral->lighting = $request->lighting;
        $coral->waterflow = $request->waterflow;
        $coral->image = $request->image;
        $coral->notes = $request->notes;

        //Save the new coral to the database
        $coral->save();

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

        //redirect home if edit fish id doesnt exist.
        if(is_null($coral)){
            Session::flash('message', 'Coral with id '. $id . ' does not exist');
            return redirect('/');
        }
        return view('/coral/edit')->with(['id' => $id, 'coral' => $coral]);
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
            //Set the message to notify user they cancelled adding an aquarium
            Session::flash('message', 'Cancel: ' . $request->name . ' was not updated');
            return redirect('/coral/view/'. $request->id);
        }

        //Validate the form values
        $validator = $this->validateForm($request);

        //If validation fails then return to original form to display the errors
        //no need to continue with the code
        if ($validator->fails()) {
            return redirect('coral/edit/'.$request->id)->withErrors($validator)->withInput();
        }

        $coral = Coral::find($request->id);

        //Set all the values from the form to update database
        $coral->aquarium()->associate($request->aquarium_id);
        $coral->name = $request->name;
        $coral->type = $request->type;
        $coral->care_level = $request->care_level;
        $coral->temperament = $request->temperament;
        $coral->lighting = $request->lighting;
        $coral->waterflow = $request->waterflow;
        $coral->image = $request->image;
        $coral->notes = $request->notes;

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

        //Get the coral details
        $coral = Coral::find($id);

        if($coral){
            $coral->Delete();
        }

        Session::flash('message', 'Your '. $coral->name . ' coral has been deleted');
        return redirect('/aquarium/view/' . $coral->aquarium_id);
    }

    /**
     * Validator method to validate fields and set custom messages as needed
     *
     * @param Request $request
     * @return mixed
     */
    public function validateForm(Request $request)
    {
        //Validation rules for adding a coral
        $rules = array(
            'name' => 'required',
            'type' => 'required',
        );

        //Custom error messages
        $messages = [
            'name.required' => 'Coral name is required',
            'type.required' => 'Coral type is required',
        ];

        //Run validation on the request according to the defined rules
        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }
}