@if ($message = Session::get('success'))
<div class="modal fade messageModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="justify-content: center">
        <h5 class="modal-title" id="exampleModalLongTitle"><a href="#" class="btn btn-success btn-circle">
            <i class="fas fa-check"></i>
          </a></h5>
      </div>
      <div class="modal-body text-center">
        <p>{{$message}}</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-icon-split" data-dismiss="modal">
          <span class="text">Close</span>
        </button>
      </div>
    </div>
  </div>
</div>
@endif

 @if ($message = Session::get('error'))
<div class="modal fade messageModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="justify-content: center">
        <h5 class="modal-title" id="exampleModalLongTitle"><a href="#" class="btn btn-danger btn-circle">
            <i class="fas fa-exclamation-triangle"></i>
          </a></h5>
      </div>
      <div class="modal-body text-center">
        <p>{{$message}}</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-icon-split" data-dismiss="modal">
          <span class="text">Close</span>
        </button>
      </div>
    </div>
  </div>
</div>
@endif

 @if ($errors->any())
 <div class="modal fade messageModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="justify-content: center">
        <h5 class="modal-title" id="exampleModalLongTitle"><a href="#" class="btn btn-danger btn-circle">
            <i class="fas fa-exclamation-triangle"></i>
          </a></h5>
      </div>
      <div class="modal-body text-center">
       @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
          @endforeach
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger btn-icon-split" data-dismiss="modal">
          <span class="text">Close</span>
        </button>
      </div>
    </div>
  </div>
</div>
@endif