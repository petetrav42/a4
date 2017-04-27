<?php
/**
 * Created by IntelliJ IDEA.
 * User: travis
 * Date: 4/15/17
 * Time: 8:37 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Aquarium;
use App\Fish;
use App\Coral;
use Auth;

class AquariumController extends Controller
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
     * Show all aquariums for logged in user.
     *
     * @return home
     */
    public function index()
    {
        $aquariums = Aquarium::where('user_id', '=', Auth::user()->id)->get();
        return view('home')->with(['aquariums' =>$aquariums]);
    }

    /**
     * Show the details of selected aquarium
     *
     * @param $id
     * @return aquarium/view
     */
    public function aquariumDetails($id){

        //Get the aquarium details
        $aquarium = Aquarium::find($id);
        $fishes = Fish::where('tank_id', '=', $id)->get();
        $corals = Coral::where('tank_id', '=', $id)->get();

        //redirect to main page if aquarium doesnt exist
        if(is_null($aquarium)){
            Session::flash('message', 'Aquarium with id '. $id . ' does not exist');
            return redirect('/');
        }

        return view('aquarium/view')->with([
            'aquarium' => $aquarium,
            'fishes' => $fishes,
            'corals' => $corals,
        ]);
    }

    /**
     * Show the add aquarium page
     *
     * @return aquarium.add
     */
    public function addAquarium(){

        return view('aquarium/add');
    }

    /**
     * Save the new aquarium to the database
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveAquarium(Request $request){

        //Return to tank page if user selects cancel
        if($request->cancel){
            //Set the message to notify user they cancelled adding an aquarium
            Session::flash('message', 'Cancel: No aquarium was added');
            return redirect('/');
        }

        //Validate the form values
        $validator = $this->validateForm($request);

        //If validation fails then return to original form to display the errors
        //no need to continue with the code
        if ($validator->fails()) {
            return redirect('/aquarium/add/'.$request->user_id)
                ->withErrors($validator)
                ->withInput();
        }

        //Create a new Aquarium and set all the values
        $aquarium = new Aquarium();
        $aquarium->user_id = $request->user_id;
        $aquarium->name = $request->name;
        $aquarium->size = $request->tankSize;
        $aquarium->type = $request->type;
        $aquarium->image = $request->image;
        $aquarium->notes = $request->notes;

        //Save the new aquarium to the database
        $aquarium->save();

        //Set the message to notify user aquarium was added
        Session::flash('message', $request->name . ' was successfully added');

        //redirect to user the new aquarium details page after save.
        return redirect('/aquarium/view/' . $aquarium->id)->withInput(['aquarium' => $aquarium]);
    }

    public function editAquarium($id){

        $aquarium = Aquarium::find($id);

        //redirect home if edit aquarium id doesnt exist.
        if(is_null($aquarium)){
            Session::flash('message', 'Aquarium with id '. $id . ' does not exist');
            return redirect('/');
        }

        return view('/aquarium/edit')->with([
            'id' => $id,
            'aquarium' => $aquarium]);
    }

    public function updateAquarium(Request $request){

        //Return to tank page if user selects cancel
        if($request->cancel){
            //Set the message to notify user they cancelled adding an aquarium
            Session::flash('message', 'Cancel: ' . $request->name . ' not updated');
            return redirect('/aquarium/view/'. $request->id);
        }

        //Validate the form values
        $validator = $this->validateForm($request);

        //If validation fails then return to original form to display the errors
        //no need to continue with the code
        if ($validator->fails()) {
            return redirect('aquarium/edit/'.$request->id)
                ->withErrors($validator)
                ->withInput();
        }

        $aquarium = Aquarium::find($request->id);

        //Set all the values from the form to update database
        $aquarium->user_id = $request->user_id;
        $aquarium->name = $request->name;
        $aquarium->size = $request->tankSize;
        $aquarium->type = $request->type;
        $aquarium->image = $request->image;
        $aquarium->notes = $request->notes;

        $aquarium->save();

        Session::flash('message', $aquarium->name . ' successfully updated');

        return redirect('/aquarium/view/'. $request->id);
    }


    public function deleteAquarium($id){

        //Get the aquarium details
        $aquarium = Aquarium::find($id);
        $fishes = Fish::where('tank_id', '=', $id)->get();
        $corals = Coral::where('tank_id', '=', $id)->get();

        //Delete associated corals
        if($corals) {
            Coral::where('tank_id', '=', $id)->delete();
        }

        //Delete associated fish
        if($fishes) {
            Fish::where('tank_id', '=', $id)->delete();
        }

        //Delete aquarium
        if($aquarium){
            $aquarium->Delete();
        }

        Session::flash('message', 'Your '. $aquarium->name . ' and associated fish/coral have been deleted');
        return redirect('/');
    }

    /**
     * Validator method to validate fields and set custom messages as needed
     *
     * @param Request $request
     * @return mixed
     */
    public function validateForm(Request $request)
    {
        //Validation rules for adding an aquarium
        $rules = array(
            'name' => 'required',
            'tankSize' => 'required|numeric|min:0',
            'type' => 'required',
        );

        //Custom error messages
        $messages = [
            'name.required' => 'Name is required',
            'tankSize.required' => 'Size is required',
            'tankSize.numeric' => 'Size must be numeric',
            'tankSize.min' => 'Size must be a positive number',
            'type.required' => 'Type is required',
        ];

        //Run validation on the request according to the defined rules
        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }
}