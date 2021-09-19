@extends('layouts.app')
@section('title') Cart  @endsection
@section('style')
<!-- Slick -->
	{{-- <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}" />
      <link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet"> --}}
    <style>

/* 
@media only screen and (max-width: 480px) {
  .responsive {
    width: 90%;
  max-width: 400px;
  height: auto;
}
h1,
h2,
h3,
h4,
h5,
h6 {
    color: #30323A;
    margin: 0 0 10px;
    font-weight: 500;
}
}

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
    } */


    </style>
@endsection
@section('content')
  <br>  <br>  <br>
    @if(session('status'))

        <div class="alert alert-success">
            {{ session('status') }}
        </div>

    @endif

      <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
          <!-- List of items-->
          <section class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
              <h2 class="h6 text-light mb-0">Products</h2><a class="btn btn-outline-primary btn-sm ps-2" href="{{ url('/shop-grid') }}"><i class="ci-arrow-left me-2"></i>Continue shopping</a>
            </div>
        
              <?php $total = 0 ?>
              @if(session('cart'))
              @foreach(session('cart') as $id => $details)
        
                  <?php $total += $details['price'] * $details['quantity'] ?>
                  <?php
                $color= explode(",", $details['color']);
                   ?>
            <!-- Item-->
            <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
              <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="#"><img src="assets/{{ $details['photo'] }}" width="160" alt="{{ $details['name'] }}"></a>
                <div class="pt-2">
                  <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">{{ $details['name'] }}</a></h3>
                  {{-- <div class="fs-sm"><span class="text-muted me-2">Size:</span>8.5</div>
                  <div class="fs-sm"><span class="text-muted me-2">Color:</span>White &amp; Blue</div> --}}
                  <div class="fs-lg text-accent pt-2">&#x20A6;{{ $details['price'] }}</div>
                </div>
              </div>
              <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
                <label class="form-label" for="quantity1">Quantity</label>
                <input class="form-control" type="number" id="quantity1" min="1" value="{{ $details['quantity'] }}">
                <button class="btn btn-link px-0 text-danger" type="button"><i class="ci-close-circle me-2"></i><span class="fs-sm">Remove</span></button>
              </div>
            </div>

      @endforeach
      @endif
           
            <button class="btn btn-outline-accent d-block w-100 mt-4" type="button"><i class="ci-loading fs-base me-2"></i>Update cart</button>
          </section>
          <!-- Sidebar-->
          <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
            <div class="bg-white rounded-3 shadow-lg p-4">
              <div class="py-2 px-xl-2">
                <div class="text-center mb-4 pb-3 border-bottom">
                  <h2 class="h6 mb-3 pb-1">Subtotal</h2>
                  <h3 class="fw-normal">&#x20A6;{{ $total }}</h3>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('checkout') }}">
                  {{ csrf_field() }}
                <div class="mb-3 mb-4">
                  <label class="form-label mb-3" for="order-comments"><span class="badge bg-info fs-xs me-2">Note</span><span class="fw-medium">Additional comments</span></label>
                  <textarea class="form-control" rows="6" id="order-comments"></textarea>
                </div>
                <button type="submit" id="btn_save" class="btn btn-primary btn-shadow d-block w-100 mt-4"><i class="ci-card fs-lg me-2"></i>
                  Proceed to Checkout
                 </button>
              </form>
              </div>
           
            </div>
          </aside>
        </div>
      </div>





@endsection


@section('javascript')


    <script type="text/javascript">

        $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });


        $('#btn_save').on('click',function(){
          $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
            var qrcode = $('#name').val();
            $.ajax({
                type : "POST",
                url  : "{{route('checkout')}}",
                dataType : "JSON",
                data : {qrcode:qrcode},

                success: function(data){
                  console.log(data);
              if(data.error =="1"){


                var errors=data;
                console.log(errors);
                $('[name="name"]').val(" ");

                $("#add-error-bag").fadeIn(10, function()
                              {
                                     //  var errors=data.responseJSON;
                errorsHtml ='<div class="alert alert-danger" id="add-error-bag">'
                //   $.each(errors.status, function(key, value) {
                     errorsHtml+='<p>' + data.status + '</p>';
                       // $('#add-task-errors').append('<li>' + value + '</li>');
                  // });
                   errorsHtml+='</div>';
                   $("#add-error-bag").html(errorsHtml);

                     });

                     $("#add-error-bag").fadeOut(15000);

                     }
                     else
                     {
                       var errors=data;
                    console.log(errors);
                    $('[name="name"]').val(" ");

                         $("#add-error-bag").fadeIn(10, function()
                                                               {
                       //  var errors=data.responseJSON;
                         errorsHtml ='<div class="alert alert-success" id="add-success-bag">'
                         //   $.each(errors.status, function(key, value) {
                              errorsHtml+='<p>' + data.status + '</p>';
                                // $('#add-task-errors').append('<li>' + value + '</li>');
                           // });
                            errorsHtml+='</div>';
                            $("#add-error-bag").html(errorsHtml);


                          });
                         $("#add-error-bag").fadeOut(5000);

                         var newElement = '<tr><td><input type="hidden" value="' + data.sid + '" name="id" id="id" placeholder="' + data.sid + '"/></td><td><input type="hidden" value="' + data.balance + '" id="balance" name="balance" placeholder="' + data.balance + '"/></td></tr>';
                         $( "#cart2" ).append( $(newElement) );

                     }


                },

                error: function(data) {
                  var errors=data.responseJSON;
               console.log(errors);
                  if(errors.error =="1"){
                    console.log(errors);
                    $('[name="name"]').val(" ");

                    $("#add-error-bag").fadeIn(10, function()
                                  {
                                         //  var errors=data.responseJSON;
                    errorsHtml ='<div class="alert alert-danger" id="add-error-bag">'
                    //   $.each(errors.status, function(key, value) {
                         errorsHtml+='<p>' + errors.status + '</p>';
                           // $('#add-task-errors').append('<li>' + value + '</li>');
                      // });
                       errorsHtml+='</div>';
                       $("#add-error-bag").html(errorsHtml);

                         });

                         $("#add-error-bag").fadeOut(2000);

                         }
                         else
                         {

               //
                  var errors=data.responseJSON;
               console.log(errors);
               $("#add-error-bag").fadeIn(10, function()
                                                     {

               errorsHtml ='<div class="alert alert-danger" id="add-error-bag"><ul id="add-task-errors">'
                 errorsHtml+='<p>' + errors.message + '</p>';
                 // errorsHtml+='<p>' + errors.status + '</p>';
                 $.each(errors.errors, function(key, value) {
                   errorsHtml+='<li>' + value + '</li>';
                     // $('#add-task-errors').append('<li>' + value + '</li>');
                 });
                  errorsHtml+='</ul></div>';
                  $("#add-error-bag").html(errorsHtml);

                });
               $("#add-error-bag").fadeOut(3000);

                }
                 }
            });
            return false;
        });

    </script>

@endsection
