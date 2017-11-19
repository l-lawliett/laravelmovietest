<div id="deleteFilm-{{$film->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$film->name}}</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('/api/films/'.$film->id.'') }}">
          <input name="_method" type="hidden" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          {{$film->description}}


          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>
