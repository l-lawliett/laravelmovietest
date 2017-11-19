<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>

        .top-right {
            position: absolute;
            right: 120px;
            top: 18px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

            .glyphicon { margin-right:5px; }
            .thumbnail
            {
                margin-bottom: 20px;
                padding: 0px;
                -webkit-border-radius: 0px;
                -moz-border-radius: 0px;
                border-radius: 0px;
            }

            .item.list-group-item
            {
                float: none;
                width: 100%;
                background-color: #fff;
                margin-bottom: 10px;
            }
            .item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
            {
                background: #428bca;
            }

            .item.list-group-item .list-group-image
            {
                margin-right: 10px;
            }
            .item.list-group-item .thumbnail
            {
                margin-bottom: 0px;
            }
            .item.list-group-item .caption
            {
                padding: 9px 9px 0px 9px;
            }
            .item.list-group-item:nth-of-type(odd)
            {
                background: #eeeeee;
            }

            .item.list-group-item:before, .item.list-group-item:after
            {
                display: table;
                content: " ";
            }

            .item.list-group-item img
            {
                float: left;
            }
            .item.list-group-item:after
            {
                clear: both;
            }
            .list-group-item-text
            {
                margin: 0 0 11px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/films') }}">Back</a>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
            <!-- Navigation -->

                <!-- Page Content -->
                <div class="container">

                  <div class="row">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
                    @endif
                    <!-- Post Content Column -->
                    <div class="col-lg-8">

                      <!-- Title -->
                      <h1 class="mt-4">{{$retrieve_film->name}}</h1>

                      <!-- Author -->
                      <p class="lead">
                        Posted by
                        <a href="#">{{$retrieve_film->user->name}}</a>
                      </p>

                      <hr>

                      <!-- Date/Time -->
                      <p>Release Date {{$retrieve_film->release_date}}
                        <br>
                        <span><b>Genre:</b> {{$retrieve_film->genre->name}}</span>

                      </p>

                      <hr>

                      <!-- Preview Image -->
                      <img class="img-fluid rounded" src="{{asset('/assets/films/photo/'.$retrieve_film->photo.'')}}" alt="">

                      <hr>

                      <!-- Post Content -->
                      <p class="lead">
                        <h4>About</h4>
                        {{$retrieve_film->description}}</p>

                    <p>
                      <h4>Ticket Price</h4>
                      {{$retrieve_film->ticket_price}}
                    </p>

                    <p>
                      <h4>Rating</h4>
                        {{$retrieve_film->rating}} <img src="{{url('assets/films/img/star.png')}}" alt="">
                    </p>


                      <hr>

                      <!-- Comments Form -->
                      <div class="card my-4">
                        <h5 class="card-header">Leave a Comment:</h5>
                        <div class="card-body">
                          <form method="POST" action="{{url('/api/comments/')}}" >
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="film_id" value="{{ $retrieve_film->id }}">

                            <div class="form-group">
                              <textarea class="form-control" rows="3" name="comment" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                        </div>
                      </div>

                      <!-- Single Comment -->
                    @foreach ($retrieve_film->comment as $comment)
                      <div class="media mb-4">
                        <div class="media-body">
                          <h5 class="mt-0">{{$comment->user->name}}</h5>
                          {{$comment->comments}}
                        </div>
                      </div>
                    @endforeach


                    </div>


                  <!-- /.row -->

                </div>
                <!-- /.container -->

                <!-- Footer -->
                <footer class="py-5 bg-dark">
                  <div class="container">
                    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
                  </div>
                  <!-- /.container -->
                </footer>


    </body>
</html>
