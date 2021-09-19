@extends('layouts.app2')
@section('content')
<style>
@media (min-width: 481px) and (max-width: 767px) {

  .MhideDiv
  {
    display:none;
      visibility: hidden;
  }

}

/*
  ##Device = Most of the Smartphones Mobiles (Portrait)
  ##Screen = B/w 320px to 479px
*/

@media (min-width: 320px) and (max-width: 480px) {

  .MhideDiv
  {
    display:none;
      visibility: hidden;
  }


}
</style>
<div class="row">
  <div class="col-md-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                  <p class="pull-right">  </p>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>


                      <th>Name</th>
                       <th>Phone Number</th>
                        <th class="MhideDiv">Email</th>
                        <th>Ticket Type</th>
                        <th class="MhideDiv">    </th>

                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($comments as $user)

                     <tr>
                        <td>{{$user->author->name}}</td>
                        <td>{{$user->author->phone}}</td>
                        <td class="MhideDiv">{{$user->author->email}}</td>
                       <td><a href="#" data-toggle="modal" data-target="#create-item-{{$user->author->ticket_id}}" data-id="{{$user->author->ticket_id}}" data-url="" class="btn btn-danger create-item" />   <span>Ticket Info <i class="fa fa-plus"></i></span></a</td>
<td>
  <!-- Edit Item Modal -->
<div class="modal fade" id="create-item-{{$user->author->ticket_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Item</h4>

</div>


<div class="modal-body">

<!-- Main content -->
 <section class="invoice">
   <!-- title row -->
   <div class="row">
     <div class="col-xs-12">
       <h2 class="page-header">
         <i class="fa fa-globe"></i> Afrochella, Inc.
         <small class="pull-right">
           <?php
          $date = Carbon\Carbon::now();
        echo $date->toRfc850String();
        ?>
       </small>
       </h2>
     </div><!-- /.col -->
   </div>
   <!-- info row -->
   <div class="row invoice-info">
     <div class="col-sm-4 invoice-col">
       User information
       <address>
         <strong>{{$user->author->name}}</strong><br>
         Phone:  {{$user->author->phone}}<br>
       Email:  {{$user->author->email}}<br>
       </address>
     </div><!-- /.col -->
     <div class="col-sm-4 invoice-col">

     </div><!-- /.col -->
     <div class="col-sm-4 invoice-col">

     </div><!-- /.col -->
   </div><!-- /.row -->

   <!-- Table row -->
   <div class="row">
     <div class="col-xs-12 table-responsive">
       <table class="table table-striped">
         <thead>
           <tr>
             <th>Qty</th>
             <th>Ticket</th>
             <th>payment status</th>
             <th>Subtotal</th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <td>{{$user->quantity}}</td>
             <td>{{$user->ticket_name}}</td>
             <td>{{$user->payment_status}}</td>
             <td>${{$user->amount}}</td>
           </tr>
         </tbody>
       </table>
     </div><!-- /.col -->
   </div><!-- /.row -->


   <!-- this row will not appear when printing -->
   <div class="row no-print">
     <!-- <div class="col-xs-12">
       <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>

   </div> -->
 </section><!-- /.content -->


</div>
</div>
</div>
</div>
</td>
                     </tr>

                     @endforeach

                    </tbody>
                    <tfoot>
                      <tr>

                        <th>Name</th>
                         <th>Phone Number</th>
                          <th class="MhideDiv">Email</th>
                          <th>Ticket Type</th>
                            <th>    </th>
                      </tr>
                    </tfoot>
                  </table>
                 <!--  <ul id="pagination" class="pagination-sm"></ul> -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->


            </div>
</div>


<script>

$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>

@endsection
