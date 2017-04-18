<?php

namespace App\Http\Controllers;

use App\Aquarium;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        dump($request->user());

        $aquariums = Aquarium::where('user_id', '=', 1)->get();

        dump($aquariums);
//        if(!$book) {
//            dump('Did not delete- Book not found.');
//        }
//        else {
//            $book->delete();
//            dump('Deletion complete; check the database to see if it worked...');
//        }

        return view('home')->with(['aquariums' =>$aquariums]);
    }
}
