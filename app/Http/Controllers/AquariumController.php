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
            'fish_count' => count($fishes),
            'corals' => $corals,
            'coral_count' => count($corals)
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
            Session::flash('message', 'No aquarium was added');
            return redirect('/');
        }

        //Validate the form values
        $validator = $this->validateForm($request, "aquarium");

        //If validation fails then return to original form to display the errors
        //no need to continue with the code
        if ($validator->fails()) {
            return redirect('aquarium/add/'.$request->user_id)
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
        if($request->input('cancel')){
            //Set the message to notify user they cancelled adding an aquarium
            Session::flash('message', 'Aquarium not updated');
            return redirect('/aquarium/view/'. $request->id);
        }

        //Validate the form values
        $validator = $this->validateForm($request, "aquarium");

        //If validation fails then return to original form to display the errors
        //no need to continue with the code
        if ($validator->fails()) {
            return redirect('aquarium/edit/'.$request->id)
                ->withErrors($validator)
                ->withInput();
        }

        $aquarium = Aquarium::find($request->id);

        //Create a new Aquarium and set all the values
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

        Session::flash('message', 'Your '. $aquarium->name . ' aquarium has been deleted');
        return redirect('/');
    }



    public function fishDetails(Request $request){
        //Get the fish details
        $fish = Fish::where('id', '=', $request->input('fishId', null))->get();

        return view('fish')->with([
            'fish' => $fish
        ]);
    }


    /**
     * Show the add fish page
     *
     * @return fish.add
     */
    public function addFish(){

        return view('fish/add');
    }

    /**
     * Save the new fish to the database
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveFish(Request $request){


        //Return to tank page if user selects cancel
        if($request->cancel){
            //Set the message to notify user they cancelled adding a fish
            Session::flash('message', 'No fish was added');
            dump($request->input());
            return redirect('/aquarium/view/'. $request->id);
        }

        //Validate the form values
        $validator = $this->validateForm($request, "fish");

        //If validation fails then return to original form to display the errors
        //no need to continue with the code
        if ($validator->fails()) {
            return redirect('fish/add/'.$request->id)
                ->withErrors($validator)
                ->withInput();
        }

        //Create a new fish and set all the values
        $fish = new Fish();
        $fish->tank_id = $request->tank_id;
        $fish->name = $request->name;
        $fish->type = $request->type;
        $fish->care_level = $request->care_level;
        $fish->temperament = $request->temperament;
        $fish->reef_compatible = $request->reef_compatible;
        $fish->image = $request->image;
        $fish->notes = $request->notes;

        //Save the new fish to the database
        $fish->save();

        //Set the message to notify user the fish was added
        Session::flash('message', $request->name . ' was successfully added');

        //redirect to user the new fish details page after save.
        return redirect('/fish/view/' . $fish->id)->withInput(['fish' => $fish]);
    }

//    public function backToAquarium(Request $request){
//        return redirect('/aquarium?id=' . $request->input('tank_id', null));
//    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function validateForm(Request $request, $type)
    {
        //Validation rules for adding an aquarium
        if($type='aquarium'){
            $rules = array(
                'name' => 'required',
                'tankSize' => 'required|numeric|min:0',
                'type' => 'required',
            );

            //Custom error messages
            $messages = [
                'name.required' => 'Tank name is required',
                'tankSize.required' => 'Tank size is required',
                'tankSize.numeric' => 'Tank size must be numeric',
                'tankSize.min' => 'Tank size must be a positive number',
                'type.required' => 'Tank type is required',
            ];
        }


        //Run validation on the request according to the defined rules
        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }
}