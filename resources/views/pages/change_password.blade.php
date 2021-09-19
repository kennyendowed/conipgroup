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
      <h3 class="card-title">{{ __('Reset Password') }}</h3>
    </div>
    <div class="card-body">
                    <form method="POST" action="{{ route('change_password') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control @error('current-password') is-invalid @enderror" name="current-password" required autocomplete="new-password">

                                @error('current-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('javascript')


@endsection
@endsection
