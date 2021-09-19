@extends('layouts.app2')
  @section('style')
  <!-- Slick -->
  <link href="{{ asset('assets/yo/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/yo/buttons.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/datatable/style.css') }}" rel="stylesheet">
  <style>

  @media  (max-width:629px)
  {
    img#desk{
      display:none;
    }
  }

  @media  (min-width:704px)
  {
    img#mb{
      display:none;
    }
  }

.img-res{
  max-width: 100%;
   height: auto;
   display:block;
}

  </style>
   @endsection
@section('content')
  <div class="row row-deck row-cards">
    <div class="col-sm-6 col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="h1 mb-3"> {{$post->count()}}</div>
            <div class="d-flex mb-2">
              <div>Total  (Wristbands)</div>
              <div class="ms-auto">
                <span class="text-green d-inline-flex align-items-center lh-1">
                  {{$post->count()}} <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                </span>
              </div>
            </div>
            <div class="progress progress-sm">
              <div class="progress-bar bg-blue" style="width: {{$post->count()}}%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                <span class="visually-hidden">{{$post->count()}} Complete</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="h1 mb-3"> {{$us->count()}}</div>
              <div class="d-flex mb-2">
                <div>Total Out Of Stock (Wristbands)</div>
                <div class="ms-auto">
                  <span class="text-green d-inline-flex align-items-center lh-1">
                    {{$us->count()}} <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                  </span>
                </div>
              </div>
              <div class="progress progress-sm">
                <div class="progress-bar bg-blue" style="width: {{$us->count()}}%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                  <span class="visually-hidden">{{$us->count()}} Complete</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="h1 mb-3">{{$uss->count()}}</div>
            <div class="d-flex mb-2">
              <div>Total Register (Costumer)</div>
              <div class="ms-auto">
                <span class="text-green d-inline-flex align-items-center lh-1">
                  {{$uss->count()}}% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                </span>
              </div>
            </div>
            <div class="progress progress-sm">
              <div class="progress-bar bg-blue" style="width: {{$uss->count()}}%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                <span class="visually-hidden">{{$uss->count()}} Complete</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="h1 mb-3">{{$ues->count()}}</div>
            <div class="d-flex mb-2">
              <div>Total Mail (Contact)</div>
              <div class="ms-auto">
                <span class="text-green d-inline-flex align-items-center lh-1">
                  {{$ues->count()}}% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                </span>
              </div>
            </div>
            <div class="progress progress-sm">
              <div class="progress-bar bg-blue" style="width: {{$ues->count()}}%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                <span class="visually-hidden">{{$ues->count()}} Complete</span>
              </div>
            </div>
          </div>
        </div>
      </div>



    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Wristbands</h3>
        </div>
        <div class="card-body border-bottom py-3">
          <div class="d-flex">

            <div class="ms-auto text-muted">
              Search:
              <div class="ms-2 d-inline-block">
                <input type="text" id="myInput" class="form-control form-control-sm" aria-label="Search invoice">
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive" id="table">
          <table id="ejemplo"  class="table card-table table-vcenter text-nowrap datatable">
            <thead>
              <tr>
    <th class="text-center">S/N</th>
                {{-- <th class="w-1">No. <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 15 12 9 18 15" /></svg>
                </th> --}}
                <th>Wristband Name</th>
                <th>Category</th>
                <th>Quantity </th>
                <th>Price</th>
                <th>Delete</th>
                <th>Edit Info</th>
                <th>View info</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="myTable">
              <?php
              $count = 1;
            //  dd($posts);
              foreach($posts as $user)
              {
?>
              <tr>
                {{-- <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td> --}}
                <td><span class="text-muted">{{  $count++}}</span></td>
                <td><a href="" class="text-reset" tabindex="-1">{{$user->name}}</a></td>
                <td>
                  {{-- <span class="flag flag-country-us"></span> --}}
                {{$user->category}}
                </td>
                <td>
                  <?php if($user->Quantity!=0){
               $sta='badge bg-success me-1';
                  }
                  else{
                    $sta='badge bg-warning  me-1';
                  }
                   ?>
                <span class="{{$sta}}"></span> {{$user->Quantity}}
                </td>
                <td>
                &#8358;{{$user->price}}
                </td>
                <td>
                    <button type="submit" id="{{$user->id}}" class="btn btn-danger remove"> Delete</button>
                </td>
                <td><a href="#"  data-bs-toggle="modal" data-bs-target="#update-{{$user->id}}" data-id="{{$user->id}}" data-url="" class="btn btn-info update-item" />   <span>Update Details<i class="fa fa-plus"></i></span></a></td>
               <td><a href="#" data-bs-toggle="modal" data-bs-target="#create-item-{{$user->id}}" data-id="{{$user->id}}" data-url="" class="btn btn-info create-item" />   <span>Ticket Info <i class="fa fa-plus"></i></span></a></td>
          <td>
                 <div class="modal modal-blur fade" id="create-item-{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                 <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title">{{ config('app.name', 'Wristbands.NG') }}  <?php
                        $date = Carbon\Carbon::now();
                      echo $date->toRfc850String();
                      ?></h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                       <div class="col-sm-6 invoice-col">
                         <div class="product product-single">
                           <div class="product-thumb">

                         <img class="img-res" src="assets/{{$user->url}}" alt="{{$user->name}}">
                           </div>
                            </div>
                       </div><!-- /.col -->

                       <div class="col-sm-6 invoice-col">
                         {{$user->name}} Wristbands  information<hr>
                         <address>
                           Price:    ₦{{$user->price}}<br>
                         Quantity      :  {{$user->Quantity}}<br>
                           <div class="product-rating">
                         @if ($user->Quantity == '0')
                         <i class="fa fa-star"></i>
                           <i class="fa fa-star"></i>
                      <i class="fa fa-star-o empty"></i>	<span style="color:#d00a0a;">Out of Stock	</span>
                   @elseif ($user->Quantity <= '20')
                     <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                  <i class="fa fa-star-o empty"></i>	<span style="color:#ffc107;">Limited  Stock Less Than 20	</span>
                         @endif<br>
                           </div>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                       {{-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button> --}}
                     </div>
                   </div>
                 </div>
               </div>
             </td>
<td>
  <div class="modal modal-blur fade" id="update-{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">{{ config('app.name', 'Wristbands.NG') }}</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
                  <img class="img-res" src="assets/{{$user->url}}" alt="{{$user->name}}">
             <form   method="POST" action="{{route('update_vendor_product') }}" enctype="multipart/form-data">
                   {{ csrf_field() }}
                   <div class="mb-3">
                              <label class="form-label">Product Name</label>
                              <input id="subname" type="text" placeholder="Enter Product Name...." class="form-control{{ $errors->has('subname') ? ' is-invalid' : '' }}" name="subname" value="{{ $user->name }}" required  autofocus>
                                <input id="id" type="hidden"  class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ $user->id }}" required  autofocus>

                              @if ($errors->has('subname'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('subname') }}</strong>
                                  </span>
                              @endif
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div>
                                  <label class="form-label">Price</label>
                                  <input id="price" type="text" placeholder="Enter Product  Price...." class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $user->price }}" required  autofocus>

                                  @if ($errors->has('price'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('price') }}</strong>
                                      </span>
                                  @endif
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div>
                                  <label class="form-label">Quantity</label>
                                  <input id="Quantity" type="number" placeholder="Enter Product  Quantity...." class="form-control{{ $errors->has('Quantity') ? ' is-invalid' : '' }}" name="Quantity" value="{{ $user->Quantity }}" required  autofocus>

                                  @if ($errors->has('Quantity'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('Quantity') }}</strong>
                                      </span>
                                  @endif
                                </div>
                              </div>

                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div>
                                  <label class="form-label">Category</label>
                                  <input id="category" type="text" placeholder="Enter Product Category...." class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" value="{{ $user->category }}" required  autofocus>

                                  @if ($errors->has('category'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('category') }}</strong>
                                      </span>
                                  @endif
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div>
                                  <label class="form-label">Product Image</label>

                              <input name="file_upload"  type="file"  class="form-control{{ $errors->has('file_upload') ? ' is-invalid' : '' }}">

                                  @if ($errors->has('file_upload'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('file_upload') }}</strong>
                                      </span>
                                  @endif
                                </div>
                              </div>

                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                </form>
           </div>

         </div>
       </div>
     </div>

</td>

               </tr>
<?php } ?>

            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex align-items-center">
          {{-- <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p> --}}
          <div class="pagination m-0 ms-auto">
              {!! $posts->render() !!}
            {{-- <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>
                prev
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                next <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>
              </a>
            </li> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@section('javascript')
    <!-- Tabler Core -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('assets/yo/js/popper.min.js') }}" ></script>
   <script src="{{ asset('assets/yo/js/bootstrap.min.js') }}" ></script>
   <script src="{{ asset('assets/yo/js/jquery.dataTables.min.js') }}" ></script>
   <script src="{{ asset('assets/yo/js/dataTables.bootstrap4.min.js') }}" ></script>
   <script src="{{ asset('assets/yo/js/dataTables.buttons.min.js') }}" ></script>
   <script src="{{ asset('assets/yo/js/buttons.bootstrap4.min.js') }}" ></script>
   <script src="{{ asset('assets/yo/js/jszip.min.js') }}" ></script>
   <script src="{{ asset('assets/yo/js/pdfmake.min.js') }}" ></script>
   <script src="{{ asset('assets/yo/js/vfs_fonts.js') }}" ></script>
   <script src="{{ asset('assets/yo/js/buttons.html5.min.js') }}" ></script>
   <script src="{{ asset('assets/yo/js/buttons.print.min.js') }}" ></script>
   <script src="{{ asset('assets/yo/js/buttons.colVis.min.js') }}" ></script>
 <script src="{{ asset('assets/datatable/script4.js') }}" ></script>
    {{-- <script src="{{ asset('asset/dist/js/tabler.min.js') }}"></script> --}}
    <script>
$(document).ready(function(){

$("#myInput").on("keyup", function() {
var value = $(this).val().toLowerCase();
$("#myTable tr").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});

$(".remove").click(function(){
 var id = $(this).attr("id");

swal({
 title: "Are you sure?",
 text: "Please ensure and then confirm!!",
 type: "warning",
 showCancelButton: true,
 confirmButtonClass: "btn-danger",
 confirmButtonText: "Yes, delete it!",
 cancelButtonText: "No, cancel plx!",
 closeOnConfirm: false,
 closeOnCancel: false
},
function(isConfirm) {
 if (isConfirm) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $.ajax({
      url: '/delete/'+id,
      type: 'GET',
     data: {_token: CSRF_TOKEN},
      error: function() {
         alert('Something is wrong');
      },
      success: function(data) {
           $("#"+id).remove();
           swal("Deleted!", "Your Account has been deleted.", "success");
      }
   });
 } else {
   swal("Cancelled", "Your Account is safe :)", "error");
 }
});

});


// Basic example

// $('#dtBasicExample').DataTable({
// "searching": false // false to disable search (or any other option)
// });
// $('.dataTables_length').addClass('bs-select');




$.ajaxSetup({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('.email_button').click(function(){
$(this).attr('disabled', 'disabled');
var id = $(this).attr("id");
var action = $(this).data("action");
var email_data = [];


var qrcode= $(this).data("ref");
var name= $(this).data("name");
var trans_id= $(this).data("uidid");
var phone= $(this).data("uid");
var email =$(this).data("email");


if(action =='single')
{
email_data.push({
phone: $(this).data("uid"),
name: $(this).data("name"),
trans_id: $(this).data("uidid"),
email :$(this).data("email"),
qrcode: $(this).data("ref")
});
}
else
{
$('.single_select').each(function(){
if($(this). prop("checked") == true)
{
email_data.push({
 phone: $(this).data("uid"),
name: $(this).data("name"),
trans_id: $(this).data("uidid"),
email :$(this).data("email"),
qrcode: $(this).data("ref")
});
}
});
}

$.ajax({
url:"confirmPayment",
method:"POST",
//  data:{name:name, id:uid},
data:{email_data:email_data},
beforeSend:function(){
$('#'+id).html('Sending...');
$('#'+id).addClass('btn-danger');
},
success:function(data){
console.log(data);
if(data = 'ok')
{
$('#'+id).text('Success');
$('#'+id).removeClass('btn-danger');
$('#'+id).removeClass('btn-info');
$('#'+id).addClass('btn-success');
}
else
{
$('#'+id).text(data);
}
$('#'+id).attr('disabled', false);
}

});
});
});


</script>

@endsection
@endsection
