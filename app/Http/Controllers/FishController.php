<?php
/**
 * Created by IntelliJ IDEA.
 * User: travis
 * Date: 4/23/17
 * Time: 3:40 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the fish details page
     *
     * @param $id
     * @return Fish .view
     */
    public function fishDetails($id){
        //Get the fish details
        $fish = Fish::find($id);

        return view('fish/view')->with([
            'fish' => $fish
        ]);
    }

    /**
     * Show the add fish page
     *
     * @param $tank_id
     * @return Fish .add
     */
    public function addFish($tank_id){

        //Get an aquarium record for the new fish to use in the view
        $aquarium = Aquarium::find($tank_id);

        return view('fish/add')->with(['tank_id'=>$tank_id, 'aquarium' => $aquarium]);
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
            return redirect('/aquarium/view/'. $request->tank_id);
        }

        //Validate the form values
        $validator = $this->validateForm($request);

        //If validation fails then return to original form to display the errors
        //no need to continue with the code
        if ($validator->fails()) {
            return redirect('fish/add/'.$request->tank_id)
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

    public function editFish($id){
        $fish = Fish::find($id);

        //redirect home if edit fish id doesnt exist.
        if(is_null($fish)){
            Session::flash('message', 'Fish with id '. $id . ' does not exist');
            return redirect('/');
        }

        return view('/fish/edit')->with([
            'id' => $id,
            'fish' => $fish]);
    }

    public function updateFish(Request $request){

        //Return to fish detail page if user selects cancel
        if($request->cancel){
            //Set the message to notify user they cancelled adding an aquarium
            Session::flash('message', $request->name . ' not updated');
            return redirect('/fish/view/'. $request->id);
        }

        //Validate the form values
        $validator = $this->validateForm($request);

        //If validation fails then return to original form to display the errors
        //no need to continue with the code
        if ($validator->fails()) {
            return redirect('fish/edit/'.$request->id)
                ->withErrors($validator)
                ->withInput();
        }

        $fish = Fish::find($request->id);

        //Set all the values from the form to update database
        $fish->tank_id = $request->tank_id;
        $fish->name = $request->name;
        $fish->type = $request->type;
        $fish->care_level = $request->care_level;
        $fish->temperament = $request->temperament;
        $fish->reef_compatible = $request->reef_compatible;
        $fish->image = $request->image;
        $fish->notes = $request->notes;

        $fish->save();

        Session::flash('message', $fish->name . ' was successfully updated');

        return redirect('/fish/view/'. $request->id);
    }

    public function deleteFish($id){
        //Get the fish details
        $fish = Fish::find($id);

        //Delete the fish
        if($fish){
            $fish->Delete();
        }

        Session::flash('message', 'Your '. $fish->name . ' fish has been deleted');
        return redirect('/aquarium/view/' . $fish->tank_id);
    }

    /**
     * Validator method to validate fields and set custom messages as needed
     *
     * @param Request $request
     * @return mixed
     */
    public function validateForm(Request $request)
    {

        //Validation rules for adding a fish
        $rules = array(
            'name' => 'required',
            'type' => 'required',
        );

        //Custom error messages
        $messages = [
            'name.required' => 'Fish name is required',
            'type.required' => 'Fish type is required',
        ];

        //Run validation on the request according to the defined rules
        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }
}