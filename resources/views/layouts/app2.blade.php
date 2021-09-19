@include('components.header')

<body class="handheld-toolbar-enabled">
    <div id="app">
       <!-- Sign in / sign up modal-->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link fw-medium active" href="#signin-tab" data-bs-toggle="tab" role="tab" aria-selected="true"><i class="ci-unlocked me-2 mt-n1"></i>Sign in</a></li>
              <li class="nav-item"><a class="nav-link fw-medium" href="#signup-tab" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Sign up</a></li>
            </ul>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body tab-content py-4">
            {{-- <form  autocomplete="off" novalidate > --}}
              <form method="POST" id="signin-tab" class="needs-validation tab-pane fade show active" action="{{ route('login') }}">
                @csrf
              <div class="mb-3">
                <label class="form-label" for="si-email">Email address</label>
                <input class="bg-gray-200 form-control{{ $errors->has('name') || $errors->has('email') ? ' is-invalid' : '' }}"
                name="login" value="{{ old('name') ?: old('email') }}" type="email"  placeholder="johndoe@example.com" required>
                  @if ($errors->has('name') || $errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') ?: $errors->first('email') }}</strong>
                </span>
            @endif
              </div>
              <div class="mb-3">
                <label class="form-label" for="si-password">Password</label>
                <div class="password-toggle">
                  <input class="bg-gray-200 form-control @error('password') is-invalid @enderror" name="password"  type="password" id="si-password" required>
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
         
              <form method="POST" id="signup-tab" class="needs-validation tab-pane fade" action="{{ route('createAccount') }}">
                @csrf
              <div class="mb-3">
                <label class="form-label" for="su-name">Full name</label>
                <input id="full_name" type="text" class="bg-gray-200 form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}"  autocomplete="full_name" placeholder="e.g. Wiro Sableng" autofocus>

                @if ($errors->has('full_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red">{{ $errors->first('full_name') }}</strong>
                        </span>
                        <br/>
                        @endif
              </div>
              <div class="mb-3">
                <label for="su-email">Email address</label>
                 <input id="email" type="email" class="bg-gray-200 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="e.g. wirosableng@gmail.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>
              <div class="mb-3">
                <label for="phone">Phone Number</label>
                <input type="number" class="bg-gray-200 form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} input-sm" value="{{ old('phone') }}" id="phone" name="phone" placeholder="e.g. 08127846543">
            @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
                <strong style="color:red">{{ $errors->first('phone') }}</strong>
            </span>
            <br/>
            @endif
              </div>
              <div class="mb-3">
                <label class="form-label" for="su-password">Password</label>
                <div class="password-toggle">
                 
                  <input class="bg-gray-200 form-control @error('password') is-invalid @enderror" name="password"  type="password" id="si-password" required>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror  
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="password_confirmation">Confirm password</label>
                <div class="password-toggle">
                  <input class="bg-gray-200 form-control @error('password_confirmation') is-invalid @enderror" type="password" id="password_confirmation" name="password_confirmation" >
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                  </label>
                  @error('password_confirmation')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror  
                </div>
              </div>
             
             

              <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign up</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <main class="page-wrapper">
      <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('components.nav')
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        {{-- @include('components.sidebar') --}}
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
          <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        @yield('content')
      </main>
        @include('components.footer')

      
    </div>
</body>

</html>
