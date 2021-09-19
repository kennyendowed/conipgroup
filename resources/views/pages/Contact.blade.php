@extends('layouts.app')
@section('title') Contact  @endsection
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
      <li><a href="{{url('/') }}">Home</a></li>
        <li>Contact</li>
      </ol>


    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="row">
        <div class="col-lg-6">
          <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>Our Address</h3>
            383, Borno Way,
             Alagomeji, Yaba,
            Lagos States,
            Nigeria
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-envelope"></i>
            <h3>Email Us</h3>
            <p>sales@wristbands.ng</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-phone-call"></i>
            <h3>Call Us</h3>
            <p>+234 8060 3972 38</p>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-lg-6 ">

          <iframe class="mb-4 mb-lg-0"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.152992706606!2d3.37342951409404!3d6.502308325214947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8c609451096d%3A0x573e10f0c6381e50!2s383%20Borno%20Way%2C%20Alagomeji-Yaba%20100001%2C%20Lagos!5e0!3m2!1sen!2sng!4v1588786728545!5m2!1sen!2sng" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

        <div class="col-lg-6">
          <div class="col-lg-10 col-lg-offset-2">
                                 @if (session('status'))

                                               <div class="alert alert-danger">
                                                   {{ session('status') }}
                                               </div>
                                           @endif


                                 </div>
          <form action="{{route('sendContact') }}" method="post" role="form" class="php-email-form">
             @csrf
               <div class="form-row">
              <div class="col form-group">
              <input type="text" class="bg-gray-200 form-control{{ $errors->has('Name') ? ' is-invalid' : '' }} input-sm" value="{{ old('Name') }}" id="Name" name="Name" placeholder="e.g. Wiro Sableng">
                @if ($errors->has('Name'))
                <span class="invalid-feedback" role="alert">
                    <strong style="color:red">{{ $errors->first('Name') }}</strong>
                </span>
                <br/>
                @endif
              </div>
              <div class="col form-group">
                <input type="email" class="bg-gray-200 form-control{{ $errors->has('Email1') ? ' is-invalid' : '' }} input-sm" value="{{ old('Email1') }}" id="Email1" name="Email1" placeholder="e.g. wirosableng@gmail.com">
                @if (session('serrortatus'))

                              <div class="alert alert-success">
                                  {{ session('serrortatus') }}
                              </div>
                          @endif
                   @if ($errors->has('Email1'))
                <span class="invalid-feedback" role="alert">
                    <strong style="color:red">{{ session('Email1') }}{{ $errors->first('Email1') }}</strong>
                </span>
                <br/>
                @endif
              </div>
            </div>
            <div class="form-group">

              <input type="text" class="bg-gray-200 form-control{{ $errors->has('subject') ? ' is-invalid' : '' }} input-sm" value="{{ old('subject') }}" id="subject" name="subject" placeholder="e.g. Please enter at least 8 chars of subject">
                @if ($errors->has('subject'))
                <span class="invalid-feedback" role="alert">
                    <strong style="color:red">{{ $errors->first('subject') }}</strong>
                </span>
                <br/>
                @endif
            </div>
            <div class="form-group">
              <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              @if ($errors->has('message'))
              <span class="invalid-feedback" role="alert">
                  <strong style="color:red">{{ $errors->first('message') }}</strong>
              </span>
              <br/>
              @endif
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->




  @section('javascript')
  <?php
      $id=Auth::user()->email_verified_at;
    //  echo $id;
      if($id=='')
      {
      ?>
  <script>
  // swal({
  //           title: 'Activate Account',
  //         html:
  //         'Your account is yet to be activated please<br> ' +
  //         'go to ur mail box to activate your account to enable you carry out orders . <br> Thank you for joining us!'+
  //         '',
  //       type: 'warning',
  //         showCloseButton: false,
  //         showCancelButton: false,
  //         showConfirmButton: false,
  //
  //     });

  </script>



      <?php
    }
      ?>
  @endsection

  @endsection
