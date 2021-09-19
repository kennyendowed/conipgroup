@extends('layouts.app')
@section('style')

  @endsection
@section('content')

 
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
            <div class="card-header">{{ __('Email Verification') }}</div>

            <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('email-verify-submit') }}">
                            {{ csrf_field() }}
                            <div class="mb-3">
                              <div class="form-group row">
                                  <label for="verification_code" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Verification Code') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="verification_code" type="text" class="bg-gray-200 form-control @error('verification_code') is-invalid @enderror" name="verification_code" value="{{ old('verification_code') }}"  placeholder="Verification Code">
      
                                      @error('verification_code')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                            </div>

                        
                            <br>
                            <button class="btn btn-success btn-lg btn-block" type="submit" id="btn-login">Verify Now</button>

                        </form>
                        <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                        <form style="margin-top: 10px;" class="form-horizontal" method="POST" action="{{ route('resend-verify-submit') }}">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <div class="col-md-12 margin-top-10">
                                    <button type="submit" class="btn btn-block btn-danger">
                                        Resend Email for Verification
                                    </button>
                                </div>
                            </div>
                        </form>
                      </div>
                      </div>
                    </div>
                  </div>
                    </div>
                </div>
            </div>
            <br /><br />
            @section('javascript')
@endsection
@endsection