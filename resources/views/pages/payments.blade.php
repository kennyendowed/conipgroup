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
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Wristbands</h3>
      </div>
      {{-- <div class="card-body border-bottom py-3">
        <div class="d-flex">

          <div class="ms-auto text-muted">
            Search:
            <div class="ms-2 d-inline-block">
              <input type="text" id="myInput" class="form-control form-control-sm" aria-label="Search invoice">
            </div>
          </div>
        </div>
      </div> --}}
      <div class="table-responsive" id="table">
        <table id="ejemplo"  class="table card-table table-vcenter text-nowrap datatable">
          <thead>
            <tr>
              <th>S/N</th>
                <!-- <th>Name</th> -->
                  <th>Transcation Id</th>
                <th>Name</th>
                <th>Amount</th>
                {{-- <th>Trans Refs</th> --}}
                <th>Time</th>
                  <th>Payment Status</th>
                <th>confirm By</th>
                  <th>View info</th>
            </tr>
        </thead>
        <tbody id="myTable">

  <?php $count ='1';?>
          @foreach($posts as $p)
              {{-- {{dd($p->userstransinfo)}} --}}
<?php
 $name=$p->usersinfo->name;
// $name2=App\Model\mtncotumer::usersinfo323($p->reg);
//  $name=App\Models\transcation:usersinfo();
// $phone2=App\Model\mtncotumer::phoneinfo2($p->reg);
// $phone=App\Model\mtncotumer::phoneinfo($p->reg);
// $group=App\Model\mtncotumer::usersinfogroup($p->reg);
?>

<?php
 $sum += $p->item_price * $p->quqntity;
   ?>
            <tr>
              <td>{{$count++}}</td>
              <td>{{$p->trans_id}}</td>
              <td>{{$name}}</td>
              <td>₦{{$p->amount}}</td>
                {{-- <td>{{$p->trans_refs}}</td> --}}
                <td>{{date('d/m/Y h:i:a',strtotime($p->created_at))}}</td>
                @if ($p->payment_status =='successful')
    <td style="color:green;">{{$p->payment_status}}</td>
                @else
                <td style="color:red;">{{$p->payment_status}}</td>
                @endif

                <td style="color:green;">{{$p->confirm_by}}</td>
                @if ($p->payment_status =='successful')
  <td><a href="#" class="btn btn-success btn-xs">Order Confirmed</a>   </td>
                @else
  <td><a href="{{ route('view',['id' => $p->trans_id] ) }}" class="btn btn-danger btn-xs">View Order</a>   </td>
                @endif

        </tr>


@endforeach

{{-- <tr>
  <td colspan="6"></td>
  <td style="color:red;">N {{$sum}}</td>

</tr> --}}
        </tbody>

      

    </table>




  </div>


  </div>
  </div>



@section('javascript')

  <?php
      $id=Auth::user()->email_verified_at;
    //  echo $id;
      if($id=='')
      {
      ?>
  <script>
  swal({
            title: 'Activate Account',
          html:
          'Your account is yet to be activated please<br> ' +
          'go to ur mail box to activate your account to enable you carry out orders . <br> Thank you for joining us!'+
          '',
        type: 'warning',
          showCloseButton: false,
          showCancelButton: false,
          showConfirmButton: false,

      });

  </script>



      <?php
    }
      ?>

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
      <script src="{{ asset('assets/datatable/script3.js') }}" ></script>

@endsection

@endsection
