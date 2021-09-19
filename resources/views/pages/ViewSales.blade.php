@extends('layouts.app')
@section('title') Transcation History @endsection
@section('style')
<!-- Slick -->
<link href="{{ asset('public/yo/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/yo/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/datatable/style.css') }}" rel="stylesheet">
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


    </style>
@endsection
@section('content')


<!-- partial:index.partial.html -->
<div class="container">


  <div class="row">

    <div class="col-12" >
      <h3 class="titulo-tabla">All Transcation Information  </h3>

<div id="buttons">
  <!-- <a href="{{ url('/vendor') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a> -->
</div>


      <table id="ejemplo" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th>S/N</th>
                <!-- <th>Name</th> -->
                  <th>Transcation Id</th>
                <th>Items</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Time</th>
                  <th>Cummulative Total</th>
            </tr>
        </thead>
        <tbody>
  <?php $count ='1';?>
          @foreach($posts as $p)
<?php
 //$name=$p->usersinfo->name;
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
              <!-- <td>{{$name}}</td> -->
              <td>{{$p->payment_id}}</td>
              <td>{{$p->items}}</td>
              <td>{{$p->quqntity}}</td>
                <td>{{$p->item_price}}</td>
                <td>{{date('d/m/Y h:i:a',strtotime($p->created_at))}}</td>
                {{-- <td colspan="6"></td> --}}
                <td style="color:red;">N {{$sum}}</td>
            </tr>


@endforeach

{{-- <tr>
  <td colspan="6"></td>
  <td style="color:red;">N {{$sum}}</td>

</tr> --}}
        </tbody>
        <tr>
          <td colspan="6"></td>
          <td style="color:red;">Sum Total: N {{$sum}}</td>

        </tr>
        <tfoot>
            <tr>
              <th>S/N</th>
                <!-- <th>Name</th> -->
                  <th>Transcation Id</th>
                <th>Items</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Time</th>
                  <th>Cummulative Total</th>
            </tr>
        </tfoot>

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

<!-- <script src="{{ asset('public/yo/js/jquery.min.js') }}" ></script> -->
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
{{-- <script src="{{ asset('datatable/script.js') }}" ></script> --}}
<script>
var table = $('#ejemplo').DataTable();

var buttons = new $.fn.dataTable.Buttons(table, {
  buttons: [


            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-clipboard"></i>Copiar',
                title:'Wristbands.ng Transcation Information ',
                titleAttr: 'Copiar',
                className: 'btn btn-app export barras',
                exportOptions: {
                    columns: [ 0, 1 , 2, 3, 4,5,6]
                }
            },

            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                title:'Wristbands.ng Transcation Information pdf',
                titleAttr: 'PDF',
                className: 'btn btn-app export pdf',
                exportOptions: {
                        columns: [ 0, 1 ,2,3,4,5,6]
                },
                customize:function(doc) {

                    doc.styles.title = {
                        color: '#4c8aa0',
                        fontSize: '30',
                        alignment: 'center'
                    }
                    doc.styles['td:nth-child(2)'] = {
                        width: '100px',
                        'max-width': '100px'
                    },
                    doc.styles.tableHeader = {
                        fillColor:'#4c8aa0',
                        color:'white',
                        alignment:'center'
                    },
                    doc.content[1].margin = [ 100, 0, 100, 0 ]

                }

            },

            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>Excel',
title:'Wristbands.ng Transcation Information excel',
                titleAttr: 'Excel',
                className: 'btn btn-app export excel',
                exportOptions: {
                    columns: [ 0, 1 ,2,3,4,5,6]
                },
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>CSV',
                title:'Wristbands.ng Transcation Information CSV',
                titleAttr: 'CSV',
                className: 'btn btn-app export csv',
                exportOptions: {
                      columns: [ 0, 1 ,2,3,4,5,6]
                }
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>Imprimir',
                title:'Wristbands.ng Transcation Information print',
                titleAttr: 'Imprimir',
                className: 'btn btn-app export imprimir',
                exportOptions: {
                      columns: [ 0, 1 ,2,3,4,5,6]
                }
            },
            {
                extend:    'pageLength',
                titleAttr: 'Registros a mostrar',
                className: 'selectTable'
            }
        ]
   //  buttons: [
   //    'copyHtml5',
   //    'excelHtml5',
   //    'csvHtml5',
   //    'pdfHtml5'
   // ]
}).container().appendTo($('#buttons'));
</script>
@endsection

@endsection
