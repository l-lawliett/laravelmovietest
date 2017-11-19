<div id="updateFilm-{{$film->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add a film</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('/api/films/'.$film->id.'') }}" enctype="multipart/form-data">
          <input name="_method" type="hidden" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="{{$film->name}}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Select a Genre</label>
            <select class="form-control" id="sel1" name="genre_name">
              <option value="1">Love/Drama</option>
              <option value="2">Fantasy/Science</option>
              <option value="3">Drama/Action</option>
              <option value="4">Fantasy/Science</option>
              <option value="5">Fantasy/Action</option>
              <option value="6">Drama/Crime</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea rows="8" cols="80" class="form-control" name="description" placeholder="{{$film->description}}"></textarea>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Release Date</label>
            <input type="date" class="form-control" name="release_date" placeholder="{{$film->release_date}}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Film Rating</label>
            <br>
            <label class="radio-inline"><input type="radio" name="rating">1</label>
            <label class="radio-inline"><input type="radio" name="rating">2</label>
            <label class="radio-inline"><input type="radio" name="rating">3</label>
            <label class="radio-inline"><input type="radio" name="rating">4</label>
            <label class="radio-inline"><input type="radio" name="rating">5</label>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Ticket Price</label>
            <input type="number" class="form-control" name="ticket_price" aria-describedby="emailHelp" placeholder="{{$film->ticket_price}}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Country's Name</label>
            <input type="text" class="form-control" name="country" aria-describedby="emailHelp" placeholder="{{$film->country}}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Photo</label>
            <input type="file" class="form-control" name="photo" aria-describedby="emailHelp" placeholder="Enter Price Here">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>


          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
