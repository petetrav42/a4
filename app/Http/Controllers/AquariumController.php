<?php
/**
 * Created by IntelliJ IDEA.
 * User: travis
 * Date: 4/15/17
 * Time: 8:37 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function aquarium(Request $request){

        dump($request->user());

//        if (Auth::check()) {
//            // The user is logged in...
//        }

        return view('aquarium');
    }
}