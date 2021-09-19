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
      <h3 class="card-title">{{ __('Register') }}</h3>
    </div>
    <div class="card-body">
			<form method="POST" action="{{ route('creg22') }}">
 					@csrf
        <div class="form-group mb-3 row">
          <label class="form-label col-3 col-form-label">{{ __('Name') }}</label>
          <div class="col">
						<input id="name" type="text" class="bg-gray-200 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="e.g. Wiro Sableng" autofocus>

						@error('name')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
						@enderror
            {{-- <small class="form-hint">We'll never share your email with anyone else.</small> --}}
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label class="form-label col-3 col-form-label">{{ __('E-Mail Address') }}</label>
          <div class="col">
						<input id="email" type="email" class="bg-gray-200 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="e.g. wirosableng@gmail.com">

						@error('email')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
						@enderror

          </div>
        </div>
				<div class="form-group mb-3 row">
					<label class="form-label col-3 col-form-label">{{ __('Phone Number') }}</label>
					<div class="col">
						<input type="number" class="bg-gray-200 form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} input-sm" value="{{ old('phone') }}" id="phone" name="phone" placeholder="e.g. 08127846543">
				@if ($errors->has('phone'))
				<span class="invalid-feedback" role="alert">
						<strong style="color:red">{{ $errors->first('phone') }}</strong>
				</span>
				<br/>
				@endif
						{{-- <small class="form-hint">We'll never share your email with anyone else.</small> --}}
					</div>
				</div>
				<div class="form-group mb-3 row">
					<label class="form-label col-3 col-form-label">{{ __('Password') }}</label>
					<div class="col">
						<?php $loginpass = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz01234567890') , 0 , 14 );?>
<input required type="text" value="<?php echo $loginpass?>" name="password" id="password"  class="form-control" >
							@error('password')
									<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
									</span>
							@enderror

					</div>
				</div>

        <div class="form-group mb-3 row">
          <label class="form-label col-3 col-form-label">{{ __('Role') }}</label>
          <div class="col">
						<select id="role" name="role" class="form-select{{ $errors->has('role') ? ' has-error' : '' }}">
									@if(checkPermission(['administrator']))
										<option value="">Select Role </option>
							<option value="1">Administrator </option>
							<option value="2">Staff </option>
								<option value="3">Costumer </option>
										@else
												<option value="3">Costumer </option>
											@endif

						</select>

							@if ($errors->has('role'))
									<span class="help-block">
											<strong>{{ $errors->first('role') }}</strong>
									</span>
							@endif

          </div>
        </div>

				<div class="form-group row mb-0">
						<div class="col-md-8 offset-md-4">
							<button type="submit" class="btn btn-primary" name="btn_save2" id="btn_save2">
							<span class="glyphicon glyphicon-log-in"></span> &nbsp;   {{ __('Register') }}
							</button>



						</div>
				</div>
      </form>
    </div>
  </div>
</div>
</div>

<br />
{{-- {{dd(Session('alert-success'))}} --}}







@section('javascript')
	<?php

if(Session('alert-success'))
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

}elseif (Session('registeralert-danger')) {
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
elseif (Session('contact-danger') ) {
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

}elseif (Session('contact-success')) {
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
}elseif (Session('alert-info')) {
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


  //       $(document).ready(function(){
  //     //Save product
  // $('#btn_save').on('click',function(){
  // $.ajaxSetup({
  // headers: {
  //  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  // }
  // });
  //   var name = $('#name').val();
  // var role = $('#role').val();
  // var phone = $('#phone').val();
  // var email        = $('#email').val();
  // var password        = $('#password').val();
  // $.ajax({
  // type : "POST",
  // url  : "{{route('creg22')}}",
  // dataType : "JSON",
  // data : {name:name,password:password,phone:phone,email:email,role:role},
  // beforeSend:function(){
  // $('#btn_save').html('Sending...');
  // $('#btn_save').addClass('btn-danger');
  // },
  // success: function(data){
  // console.log(data);
  // if(data.error =="1"){
	//
	//
  // var errors=data;
  // console.log(errors);
  // $('[name="name"]').val(" ");
  // $('[name="phone"]').val(" ");
  // $('[name="email"]').val(" ");
  // $('[name="password"]').val(" ");
	//
  // $("#add-error-bag").fadeIn(20, function()
  //           {
  //                  //  var errors=data.responseJSON;
  // errorsHtml ='<div class="alert alert-danger" id="add-error-bag">'
  // //   $.each(errors.status, function(key, value) {
  //  errorsHtml+='<p>' + data.status + '</p>';
  //    // $('#add-task-errors').append('<li>' + value + '</li>');
  // // });
  // errorsHtml+='</div>';
  // $("#add-error-bag").html(errorsHtml);
	//
  //  });
	//
  //  $("#add-error-bag").fadeOut(10000);
  //  $('#btn_save').text('Register');
  // $('#btn_save').removeClass('btn-danger');
  // $('#btn_save').removeClass('btn-secondary');
  // $('#btn_save').addClass('btn-secondary');
  //  }
  //  else
  //  {
  //    var errors=data;
  // console.log(errors);
  // $('[name="name"]').val(" ");
  // $('[name="phone"]').val(" ");
  // $('[name="email"]').val(" ");
  // $('[name="password"]').val(" ");
  // //swal('Succesful!', ' ' + data.status + '', 'success')
  // swal({
  // title: 'Registration  Successful',
  // html:
  // 'Your account has been created and a mail containing your account login details has been sent to you via  <strong>' + data.email + '</strong>.<br> ' +
  // 'Click The Button Below To Login Thank you for joining us!'+
  // '<form method="post" action="{{ route("login") }}">    @csrf<br><input hidden name="mone" value="' + data.email + '"><input class="btn btn-success" name="deposit" type="submit" value="Complete Process">'+
  // '</form><br> ' +
  // '',
  // type: 'success',
  // showCloseButton: false,
  // showCancelButton: false,
  // showConfirmButton: false,
	//
  // });
	//
  //    //   $("#add-error-bag").fadeIn(20, function()
  //    //                                         {
  //    //
  //    // //  var errors=data.responseJSON;
  //    //   errorsHtml ='<div class="alert alert-success" id="add-success-bag">'
  //    //   //   $.each(errors.status, function(key, value) {
  //    //        errorsHtml+='<p>' + data.status + '</p>';
  //    //          // $('#add-task-errors').append('<li>' + value + '</li>');
  //    //     // });
  //    //      errorsHtml+='</div>';
  //    //      $("#add-error-bag").html(errorsHtml);
  //    //
  //    //    });
  //      $("#add-error-bag").fadeOut(10000);
  //      $('#btn_save').text('Account Created');
  // $('#btn_save').removeClass('btn-danger');
  // $('#btn_save').removeClass('btn-secondary');
  // $('#btn_save').addClass('btn-success');
	//
  //  }
	//
	//
  // },
	//
  // error: function(data) {
  // var errors=data.responseJSON;
  // console.log(errors);
  // var errors=data.responseJSON;
	//
  // $("#add-error-bag").fadeIn(20, function()
  //             {
  // //  var errors=data.responseJSON;
  // errorsHtml ='<div class="alert alert-danger" id="add-error-bag"><ul id="add-task-errors">'
  //   $.each(errors.errors, function(key, value) {
  //     errorsHtml+='<li>' + value + '</li>';
  //       // $('#add-task-errors').append('<li>' + value + '</li>');
  //   });
  //   errorsHtml+='</ul></div>';
  //  $("#add-error-bag").html(errorsHtml);
	//
  //    });
	//
  //    $("#add-error-bag").fadeOut(10000);
  // $('#btn_save').text('Register');
  // $('#btn_save').removeClass('btn-danger');
  // $('#btn_save').removeClass('btn-secondary');
  // $('#btn_save').addClass('btn-secondary');
  // }
  // });
  // return false;
  // });
  // });


    </script>

@endsection

@endsection
