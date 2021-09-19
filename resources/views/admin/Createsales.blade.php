@extends('layouts.app2')
@section('style')
<!-- Slick -->

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
	  <div class="row justify-content-center">
	<div class="col-md-6">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ __('New Sales') }}</h3>
    </div>
    <div class="card-body">
<form   method="POST" action="{{route('create_sales_product') }}" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group mb-3 row">
<label for="name" class="col-md-4 col-form-label text-md-right">Customers Name</label>

<input id="customer" type="text" placeholder="Enter Customers Name...." class="form-control{{ $errors->has('customer') ? ' is-invalid' : '' }}" name="customer" value="{{ old('customer') }}" required  autofocus>

@if ($errors->has('customer'))
<span class="invalid-feedback" role="alert">
<strong>{{ $errors->first('customer') }}</strong>
</span>
@endif

</div>

    <div class="form-group mb-3 row">
<label for="name" class="col-md-4 col-form-label text-md-right">Print Content</label>

  <input id="printcontent" type="text" placeholder="Enter Print Content...." class="form-control{{ $errors->has('printcontent') ? ' is-invalid' : '' }}" name="printcontent" value="{{ old('printcontent') }}" required  autofocus>

  @if ($errors->has('printcontent'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('printcontent') }}</strong>
      </span>
  @endif
</div>


  <div class="form-group mb-3 row">
<label for="name" class="col-md-4 col-form-label text-md-right">Quantity</label>

  <input id="Quantity" type="number" placeholder="Enter Quantity...." class="form-control{{ $errors->has('Quantity') ? ' is-invalid' : '' }}" name="Quantity" value="{{ old('Quantity') }}" required  autofocus>

  @if ($errors->has('Quantity'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('Quantity') }}</strong>
      </span>
  @endif

</div>
  <div class="form-group mb-3 row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Date</label>


                      <input id="date" type="date" placeholder="Enter Date...." class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date"   required  autofocus>

                      @if ($errors->has('date'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('date') }}</strong>
                          </span>
                      @endif

                    </div>
{{-- min="{{date('Y-m-d')}}"  --}}
      <div class="form-group mb-3 row">
            <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

            <input id="price" type="text" placeholder="Enter Product  Price...." class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required  autofocus>

            @if ($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif

  </div>
  {{-- <div class="form-group mb-3 row">
      <label for="price" class="col-md-4 col-form-label text-md-right">Colour</label>

      <input id="Colour" type="text" placeholder="Enter Product  Colour...." class="form-control{{ $errors->has('Colour') ? ' is-invalid' : '' }}" name="Colour" value="{{ old('Colour') }}" required  autofocus>

      @if ($errors->has('Colour'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('Colour') }}</strong>
          </span>
      @endif

</div> --}}

<div class="form-group mb-3 row">
  <label class="form-label col-3 col-form-label">{{ __('Category') }}</label>
  <div class="col">
    <select id="category" name="category" class="form-select{{ $errors->has('category') ? ' has-error' : '' }}">
      <option value="">Select Ticket Category </option>
      <option value="Sparkle-Holographic">Sparkle-Holographic </option>
        <option value="Paper-Tyvek-wristbands">Paper-Tyvek-wristbands </option>
          <option value="Plastic-Vinyl-wristbands">Plastic-Vinyl-wristbands </option>
        <option value="Rubber-Silicone-Wristbands">Rubber-Silicone-Wristbands </option>
      <option value="Fabric-Wristbands">Fabric-Wristbands </option>
    </select>

      @if ($errors->has('category'))
          <span class="help-block">
              <strong>{{ $errors->first('category') }}</strong>
          </span>
      @endif

  </div>
</div>


  <div class="form-group mb-3 row">
    <label  class="form-label col-3 col-form-label">Select Wristband</label>
  <select name=Wristband id="Wristband" class="form-select{{ $errors->has('Wristband') ? ' has-error' : '' }}" required>
  </select>
  <div id="response">     </div>

   </div>

   <div class="form-group row mb-0">
       <div class="col-md-8 offset-md-4">
         <button type="submit" class="btn btn-primary" >
         <span class="glyphicon glyphicon-log-in"></span> &nbsp;   {{ __('Save') }}
         </button>



       </div>
   </div>


            </form>
            </div>
            </div>
          </div>
          </div>


                  @section('javascript')
                         <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
                      <?php

                    if(session('alert-success'))
                    {

                    ?>
                    <script>
                    swal({
                          title: 'Wristband.NG',
                        html:
                        'Sales added  successful and report sent via mail  <br> ' +
                        ' Thank you !'+
                        '',
                      type: 'success',
                        showCloseButton: true,
                        showCancelButton: false,
                        showConfirmButton: false,

                    });

                    </script>



                    <?php

                    }elseif (session('registeralert-danger')) {
                    ?>

                    <script>
                    swal({
                            title: 'Wristband.NG',
                          html:
                          'Sales unsuccessful  added please try again <br> ' +
                          ' Thank you !'+
                          '',
                        type: 'error',
                          showCloseButton: true,
                          showCancelButton: false,
                          showConfirmButton: false,

                      });

                    </script>
                    <?php

                    }
                    elseif (session('contact-danger')) {
                    ?>

                    <script>
                    swal({
                            title: '2020 Autofest drive-in-Autoshow',
                          html:
                          'Error something went wrong please try again<br> ' +
                          ' Thank you!'+
                          '',
                        type: 'error',
                          showCloseButton: true,
                          showCancelButton: false,
                          showConfirmButton: false,

                      });

                    </script>

                    <?php

                    }elseif (session('contact-success')) {
                    ?>

                    <script>
                    swal({
                            title: '2020 Autofest drive-in-Autoshow',
                          html:
                          'Support Ticket Created successfully <br> ' +
                          'we get in touch with you soon. Thank you!'+
                          '',
                        type: 'success',
                          showCloseButton: true,
                          showCancelButton: false,
                          showConfirmButton: false,

                      });

                    </script>

                    <?php
                    }elseif (session('alert-info')) {
                    ?>

                    <script>
                    swal({
                            title: '2020 Autofest drive-in-Autoshow',
                          html:
                          'Transaction already process  please check your email for confirmation or contact us <br> ' +
                          ' Thank you for joining us!'+
                          '',
                        type: 'info',
                          showCloseButton: true,
                          showCancelButton: false,
                          showConfirmButton: false,

                      });

                    </script>

                    <?php
                    }
                    //  echo $id;
                    ?>
                    <script type=text/javascript>

                    $('#category').change(function(){
                    var categoryDATA = $(this).val();
                    if(categoryDATA){
                    $.ajax({
                      type:"GET",
                      url:"{{url('get-category')}}?category="+categoryDATA,
                      success:function(res){
                        console.log(res);
                      if(res){
                        $("#Wristband").empty();
                        $("#Wristband").append('<option value="">Select Wristbands </option>');
                        $.each(res,function(key,value){
                          $("#Wristband").append('<option value="'+value+'">'+key+'</option>');
                        });

                      }else{
                        $("#Wristband").empty();
                      }
                      }
                    });
                    }else{
                    $("#Wristband").empty();
                    // $("#city").empty();
                    }
                    });

                    // $('#state').on('change',function(){
                    // var stateID = $(this).val();
                    // if(stateID){
                    //   $.ajax({
                    //     type:"GET",
                    //     url:"{{url('get-city-list')}}?state_id="+stateID,
                    //     success:function(res){
                    //     if(res){
                    //       $("#city").empty();
                    //       $.each(res,function(key,value){
                    //         $("#city").append('<option value="'+key+'">'+value+'</option>');
                    //       });
                    //
                    //     }else{
                    //       $("#city").empty();
                    //     }
                    //     }
                    //   });
                    // }else{
                    //   $("#city").empty();
                    // }
                    //
                    // });
                    </script>


                      @endsection

                    @endsection
