<?php

namespace App\Http\Controllers\Films;

use Session;
use Auth;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Validator;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $films = Film::with('user', 'genre', 'comment')->get();

        return view('welcome', compact('films'));
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
        $name = $request->input('name');
        $slug = str_slug($name, '-');
        $date = $request->input('release_date');

        $day = new DateTime($date, new DateTimeZone("America/New_York"));
        $r_date = $day->format('d-M-Y');

        $new_film = New Film;

        $new_film->name = $name;
        $new_film->slug = $slug;
        $new_film->description = $request->input('description');
        $new_film->release_date = $r_date;
        $new_film->rating = $request->input('rating');
        $new_film->ticket_price = $request->input('ticket_price');
        $new_film->country = $request->input('country');
        $new_film->user_id = $request->input('user_id');
        $new_film->genre_id = $request->input('genre_id');


        $photo = $request->file('photo');
        $extension  = $photo->getClientOriginalExtension();
        $filename = strtolower($slug).'.'.$extension;
        $path = public_path('assets'.'/films'.'/photo/');
        $success = $photo->move($path, $filename);
        $new_film->photo = $filename;


        try {

          if ($new_film->save()) {
            # code...

            $user_id = Auth::user()->id;
            $films = Film::all();
            \Session::flash('flash_message','A Film was added.');
            return view('admin', compact('films','user_id'));
          }else{
            $user_id = Auth::user()->id;
            $films = Film::all();
            \Session::flash('flash_message','Something went wrong.');
            return view('admin', compact('films','user_id'));

          }

        } catch (Exception $e) {

            return response()->json($e);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug_url)
    {
        //
        // $user_id = Auth::user()->id;
        $retrieve_film = Film::with('user', 'genre', 'comment.user')->where('slug', $slug_url)->first();



        try {

          if ($retrieve_film) {
            # code...

            return view('film', compact('retrieve_film'));
          }else{

              return response()->json('False');

          }

        } catch (Exception $e) {

            return response()->json($e);
        }



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
        $name = $request->input('name');
        $slug = str_slug($name, '-');
        $date = $request->input('release_date');

        $day = new DateTime($date, new DateTimeZone("America/New_York"));
        $r_date = $day->format('d-M-Y');


        $update_film = Film::find($id);

        $update_film->name = $name;
        $update_film->slug = $slug;
        $update_film->description = $request->input('description');
        $update_film->release_date = $r_date;
        $update_film->rating = $request->input('rating');
        $update_film->ticket_price = $request->input('ticket_price');
        $update_film->country = $request->input('country');
        $update_film->user_id = $request->input('user_id');
        $update_film->genre_id = $request->input('genre_id');


        $photo = $request->file('photo');
        $extension  = $photo->getClientOriginalExtension();
        $filename = strtolower($slug).'.'.$extension;
        $path = public_path('assets'.'/films'.'/photo/');
        $success = $photo->move($path, $filename);
        $new_film->photo = $filename;


        try {

          if ($update_film->save()) {
            # code...
            return response()->json('True');
          }else{

              return response()->json('False');

          }

        } catch (Exception $e) {

            return response()->json($e);
        }



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
        $del_film = Film::where('id', $id)->delete();

        try {

          if ($del_film) {
            # code...
              return response()->json('True');
          }else{

              return response()->json('False');

          }

        } catch (Exception $e) {

            return response()->json($e);
        }

    }
}
