@extends('layouts.app2')
@section('style')
<!-- Slick -->
<link href="{{ asset('public/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/yo/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('public/yo/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/yo/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/datatable/style.css') }}" rel="stylesheet">
<script src="{{ asset('public/sweetalert2/dist2/sweetalert.js') }}"></script>
<link href="{{ asset('public/sweetalert2/dist2/sweetalert.css') }}" rel="stylesheet">
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

  <section id="about" class="about">
    <div class="container">
<!-- Content Row -->
<div class="row">

<div class="card">
<div class="card-body">

        <div id="table" class="table-editable">
                {{-- <table id="dtBasicExample" class="table table-responsive-md table-striped table-bordered table-sm" cellspacing="0" width="100%"> --}}
          <table id="ejemplo" class="table table-bordered table-responsive table-striped text-center" style="">
                 {{-- <table id="ejemplo" class="table table-striped table-bordered" style="width:100%"> --}}
                  <thead>
    <tr>
      <th class="text-center">S/N</th>
      <th>Wristband Name</th>
      <th>customer</th>
      <th>Quantity </th>
      <th>Price</th>
          <th>Created At</th>
        {{-- <th class="text-center">Description</th> --}}
        {{-- <th class="text-center">Delete</th>
        <th>Edit Info</th>
        <th>View info</th> --}}
    </tr>
  </thead>
  <tbody id="myTable">

    <?php
    $count = 1;
   //dd($posts);
    foreach($posts as $user)
    {
       $sum += $user->item_price * $user->quqntity;
     $author=App\Models\sales::author($user->user_id);
       $wristband=App\Models\sales::wristband_name($user->wristband_id);

    echo '

    <tr>
    <td>'.$count++.'</td>
    <td>'.$user->items.'</td>
    <td>'. $author.'</td>
     <td>'.$user->quqntity.'</td>
    <td>&#8358;'.$user->item_price.'</td>';?>

        <td>{{$user->created_at}}</td>

<?php   echo '
   </tr>
    ';
    }
    ?>



  </tbody>
  <tr>
    <td colspan="4"></td>
    <td style="color:red;">Sum Total: &#8358; {{$sum}}</td>
  
<td><a href="{{ route('approve',['id' => $user->payment_id] ) }}" class="btn btn-info btn-xs">Payment Successful</a>  </td>
  </tr>
</table>

</div>


</div>
</div>

</div>

</div>
<!-- Editable table -->

</div>


</div>
</section><!-- End About Section -->




@section('javascript')
  <script src="{{ asset('public/yo/js/popper.min.js') }}" ></script>
    <script src="{{ asset('public/yo/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('public/yo/js/jquery.dataTables.min.js') }}" ></script>
    <script src="{{ asset('public/yo/js/dataTables.bootstrap4.min.js') }}" ></script>
    <script src="{{ asset('public/yo/js/dataTables.buttons.min.js') }}" ></script>
    <script src="{{ asset('public/yo/js/buttons.bootstrap4.min.js') }}" ></script>
    <script src="{{ asset('public/yo/js/jszip.min.js') }}" ></script>
    <script src="{{ asset('public/yo/js/pdfmake.min.js') }}" ></script>
    <script src="{{ asset('public/yo/js/vfs_fonts.js') }}" ></script>
    <script src="{{ asset('public/yo/js/buttons.html5.min.js') }}" ></script>
    <script src="{{ asset('public/yo/js/buttons.print.min.js') }}" ></script>
    <script src="{{ asset('public/yo/js/buttons.colVis.min.js') }}" ></script>
  <script src="{{ asset('public/datatable/script2.js') }}" ></script>
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
