<?php

use App\User;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Comment;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //

    public function index()
    {


          $films = \App\Models\Film::with('user', 'genre', 'comment')->get();

          return view('welcome', compact('films'));



    }
}
