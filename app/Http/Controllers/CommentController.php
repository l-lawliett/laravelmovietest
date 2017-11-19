<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class CommentController extends Controller
{

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $film_id = $request->input('film_id');



        if (!Auth::check()) {
          # code...
          $retrieve_film = Film::with('user', 'genre', 'comment')->where('id', $film_id)->first();
          \Session::flash('flash_message','You need to be a member before you can comment.');
          return view('film', compact('retrieve_film'));
        }else {
          # code...
           $user_id = Auth::user()->id;
           $comment = $request->input('comment');
           $new_comment = New Comment;
          $new_comment->comments = $comment;
          $new_comment->film_id = $film_id;
          $new_comment->user_id = $user_id;
          try {

            if ($new_comment->save()) {
              # code...

              $retrieve_film = Film::with('user', 'genre', 'comment')->where('id', $film_id)->first();
              \Session::flash('flash_message','A Comment was added.');
              return view('film', compact('retrieve_film'));
            }else{

              $retrieve_film = Film::with('user', 'genre', 'comment')->where('id', $film_id)->first();
              \Session::flash('flash_message','Something went wrong.');
             return view('film', compact('retrieve_film'));

            }

          } catch (Exception $e) {

              return response()->json($e);
          }
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
