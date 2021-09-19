@extends('layouts.app')

@section('content')

<br />

<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-lg-offset-2">
                     @if (session('status'))

                         <div class="alert alert-success">
                             {{ session('status') }}
                         </div>
                     @endif
                     <div id="add-success-bag">
                     </div>

                     <div id="add-error-bag">
                     </div>


                     <!-- <div class="alert alert-danger" id="add-error-bag">
                                            <ul id="add-task-errors">
                                            </ul>
                                        </div> -->
         </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                  {{-- <form id="register-form" class="register-form"> --}}
 <form method="POST" action="{{ route('createAccount') }}">
      @csrf
                                            {{-- <div id="error">
                                                  <!-- error will be shown here ! -->
                                                  </div> --}}
                                                  <div class="mb-3">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="bg-gray-200 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" placeholder="e.g. Wiro Sableng" autofocus>

                                  @if ($errors->has('name'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong style="color:red">{{ $errors->first('name') }}</strong>
                                          </span>
                                          <br/>
                                          @endif
                            </div>
                        </div>
                      </div>
                        <div class="mb-3">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="bg-gray-200 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="e.g. wirosableng@gmail.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      </div>
                        <div class="mb-3">
                        <div class="form-group row">
                              <label for="Phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                          <div class="col-md-6">
                                  <input type="number" class="bg-gray-200 form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} input-sm" value="{{ old('phone') }}" id="phone" name="phone" placeholder="e.g. 08127846543">
                              @if ($errors->has('phone'))
                              <span class="invalid-feedback" role="alert">
                                  <strong style="color:red">{{ $errors->first('phone') }}</strong>
                              </span>
                              <br/>
                              @endif
                                </div>
                          </div>
                        </div>
                          <div class="mb-3">
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                              <?php $loginpass = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz01234567890') , 0 , 14 );?>
   <input required type="text" value="<?php echo $loginpass?>" name="password" id="password"  class="form-control" >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      </div>
                        {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="bg-gray-200 form-control" name="password_confirmation" required autocomplete="new-password" placeholder="htgjtfgdfgsdg">
                            </div>
                        </div> --}}



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn btn-primary" name="btn_save" id="btn_save">
                              <span class="glyphicon glyphicon-log-in"></span> &nbsp;   {{ __('Register') }}
                              </button>
||

                                @if (Route::has('register'))
                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __('Already Have Account?') }}
                                    </a>
                                @endif
                            </div>
                        </div>


                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br /><br />
@section('javascript')
      <?php

  if(session('alert-success'))
  {

    ?>
  <script>
  swal({
          title: 'Wristband.NG',
        html:
        'Registration successful please check mail for your ticket code <br> ' +
        ' Thank you for joining us!'+
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
          'Registration unsuccessful please try again <br> ' +
          ' Thank you for joining us!'+
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

  <script type="text/javascript">
                    	$(document).ready(function(){
                    //Save product
    $('#btn_save2').on('click',function(){
      $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
        var name = $('#name').val();
        var phone = $('#phone').val();
        var email        = $('#email').val();
        var password        = $('#password').val();
        $.ajax({
            type : "POST",
            url  : "{{route('createAccount')}}",
            dataType : "JSON",
            data : {name:name,password:password,phone:phone,email:email},
            beforeSend:function(){
   $('#btn_save').html('Sending...');
   $('#btn_save').addClass('btn-danger');
  },
            success: function(data){
              console.log(data);
	       	if(data.error =="1"){


            var errors=data;
            console.log(errors);
            $('[name="name"]').val(" ");
            $('[name="phone"]').val(" ");
            $('[name="email"]').val(" ");
            $('[name="password"]').val(" ");

            $("#add-error-bag").fadeIn(20, function()
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

                 $("#add-error-bag").fadeOut(10000);
                 $('#btn_save').text('Register');
                $('#btn_save').removeClass('btn-danger');
                $('#btn_save').removeClass('btn-secondary');
                $('#btn_save').addClass('btn-secondary');
                 }
                 else
                 {
                   var errors=data;
                console.log(errors);
                $('[name="name"]').val(" ");
                $('[name="phone"]').val(" ");
                $('[name="email"]').val(" ");
                $('[name="password"]').val(" ");
 //swal('Succesful!', ' ' + data.status + '', 'success')
 swal({
           title: 'Registration  Successful',
         html:
         'Your account has been created and a mail containing your account login details has been sent to you via  <strong>' + data.email + '</strong>.<br> ' +
         'Click The Button Below To Login Thank you for joining us!'+
         '<form method="post" action="{{ route("login") }}">    @csrf<br><input hidden name="mone" value="' + data.email + '"><input class="btn btn-success" name="deposit" type="submit" value="Complete Process">'+
         '</form><br> ' +
         '',
       type: 'success',
         showCloseButton: false,
         showCancelButton: false,
         showConfirmButton: false,

     });

                   //   $("#add-error-bag").fadeIn(20, function()
                   //                                         {
                   //
                   // //  var errors=data.responseJSON;
                   //   errorsHtml ='<div class="alert alert-success" id="add-success-bag">'
                   //   //   $.each(errors.status, function(key, value) {
                   //        errorsHtml+='<p>' + data.status + '</p>';
                   //          // $('#add-task-errors').append('<li>' + value + '</li>');
                   //     // });
                   //      errorsHtml+='</div>';
                   //      $("#add-error-bag").html(errorsHtml);
                   //
                   //    });
                     $("#add-error-bag").fadeOut(10000);
                     $('#btn_save').text('Account Created');
             $('#btn_save').removeClass('btn-danger');
             $('#btn_save').removeClass('btn-secondary');
             $('#btn_save').addClass('btn-success');

                 }


            },

            error: function(data) {
              var errors=data.responseJSON;
           console.log(errors);
           var errors=data.responseJSON;

              $("#add-error-bag").fadeIn(20, function()
                            {
               //  var errors=data.responseJSON;
               errorsHtml ='<div class="alert alert-danger" id="add-error-bag"><ul id="add-task-errors">'
                  $.each(errors.errors, function(key, value) {
                    errorsHtml+='<li>' + value + '</li>';
                      // $('#add-task-errors').append('<li>' + value + '</li>');
                  });
                  errorsHtml+='</ul></div>';
                 $("#add-error-bag").html(errorsHtml);

                   });

                   $("#add-error-bag").fadeOut(10000);
              $('#btn_save').text('Register');
             $('#btn_save').removeClass('btn-danger');
             $('#btn_save').removeClass('btn-secondary');
             $('#btn_save').addClass('btn-secondary');
             }
        });
        return false;
    });
    	});
                    </script>
                  @endsection
                  @endsection
