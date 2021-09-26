@extends('layouts.app2')

@section('content')

<br>

<section id="contact" class="border-top">
<div class="container">
<div class="row justify-content-between">
    <div class="col-md-10 col-lg-8 mx-auto text-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                  <form method="POST" id="signin-tab" class="needs-validation tab-pane fade show active" action="{{ route('login') }}">
                    @csrf
                  <div class="mb-3">
                    <label class="form-label" for="si-email">Email address</label>
                    <input class="bg-gray-200 form-control{{ $errors->has('name') || $errors->has('email') ? ' is-invalid' : '' }}"
                    name="login" value="{{ old('name') ?: old('email') }}" type="email"  placeholder="johndoe@example.com" >
                      @if ($errors->has('name') || $errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') ?: $errors->first('email') }}</strong>
                    </span>
                @endif
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="si-password">Password</label>
                    <div class="password-toggle">
                      <input class="bg-gray-200 form-control @error('password') is-invalid @enderror" name="password"  type="password" id="si-password" >
                      <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                      </label>
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                  </div>
                  <div class="mb-3 d-flex flex-wrap justify-content-between">
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="si-remember">  {{ __('Remember Me') }}</label>
                    </div><a class="fs-sm" href="{{ route('password.request') }}">Forgot password?</a>
                  </div>
                  <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign in</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- //.container -->
</section>
<br>

@section('javascript')
      <?php

  if(session('loginalert-success'))
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

  }elseif (session('alert-danger')) {
    ?>

    <script>
    swal({
            title: 'Wristband.NG',
          html:
          'Account already created please login or visit email for account information <br> ' +
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

                  @endsection
@endsection
