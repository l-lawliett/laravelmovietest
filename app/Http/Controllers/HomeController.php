<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Comment;
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
    public function index()
    {

        $user_role = Auth::user()->role;


        if ($user_role == 1) {
          # code...
          $user_id = Auth::user()->id;
          $films = Film::all();
          return view('admin', compact('films','user_id'));
        }else{
          $films = \App\Models\Film::with('user', 'genre', 'comment')->get();
          return view('welcome', compact('films'));
        }


    }
}
