@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              @if(Session::has('flash_message'))
                  <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
              @endif
                <div class="panel-heading">Admin Dashboard <button type="button" class="btn pull-right" style="background-color: #ffffff61;" data-toggle="modal" data-target="#createFilm">Create</button></div>

          @foreach ($films as $film)
          <div class="row">
            <div class="col-sm-6" style="background-color: #ffffff61;"><div class="panel-heading">{{$film->name}}</div></div>
            <div class="col-sm-6" style="background-color: #ffffff61;">
                  <div class="btn-group">
                              <span class="pull-right">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateFilm-{{$film->id}}">Update</button>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteFilm-{{$film->id}}">Delete</button>
                              <a href="{{url('api/films/'.$film->slug.'')}}"> <button type="button" class="btn btn-primary" >View</button></a>
                             </span>
                            </div>
            </div>



              </div>

          @include('createFilm')
          @include('updateFilm')
          @include('viewFilm')
          @include('deleteFilm')

          @endforeach


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>


            </div>

        </div>
    </div>
</div>



@endsection
