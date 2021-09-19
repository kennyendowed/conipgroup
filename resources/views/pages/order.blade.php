@extends('layouts.app')
@section('title') Order  @endsection
@section('style')
<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}" />
      <link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet">
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


<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{url('/') }}">Home</a></li>
      <li><a href="{{URL::route('details',[$id]) }}">{{$id}}</a></li>
    </ol>
    <h2>{{$id}}</h2>
		@if(session('success'))

		<div class="alert alert-success">
				{{ session('success') }}
		</div>

	@endif
  </div>
</section><!-- End Breadcrumbs -->


<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- section title -->
      <!-- <div class="col-md-12">
        <div class="section-title">
          <h2 class="title">
          </h2>
        </div>
      </div> -->
      <!-- section title -->
    @foreach ($result as $key => $row)
      <!-- Product Single -->
    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <!-- <div class="col-md-3 col-sm-6 col-xs-6"> -->
        <div class="product product-single">
          <div class="product-thumb">
            <!-- <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button> -->
        <img src="../assets/{{$row->url}}" alt="{{$row->name}}">
          </div>
          <div class="product-body">

            <?php
$color= explode(",", $row->color);
             ?>
            <div class="product-rating">
							  {{-- <h3 class="product-price">₦{{$row->price}}</h3> --}}
								{{-- <h3>Quantity : {{$row->Quantity}}</h3>
								@if ($row->Quantity == '0')
								<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
             <i class="fa fa-star-o empty"></i>	<span style="color:#d00a0a;">Out of Stock	</span>
          @elseif ($row->Quantity == '20')
						<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
				 <i class="fa fa-star-o empty"></i>	<span style="color:#ffc107;">Limited  Stock	</span>
								@endif --}}
                <?php //foreach ($color as $key => $value): ?>
                  {{-- <a href=""><i class="icofont-twitter"></i>
                   <label>{{$value}}</label><br /></a> --}}
              <!-- <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o empty"></i> -->
                   <?php// endforeach; ?>
            </div>
            <h2 class="product-name"><a href="#">{{$row->name}}</a></h2>
            <div class="product-btns">
								{{-- @if ($row->Quantity == '0')

                 @else --}}
  <a href="{{ url('add-to-cart/'.$row->id) }}" class="primary-btn add-to-cart" role="button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
									{{-- @endif --}}
              <!-- <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
              <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button> -->

					  @if(checkPermission(['administrator']))
								<a href="{{ url('delete/'.$row->id) }}" class="primary-btn float-right" role="button"><i class="fa fa-trash "></i>Remove Item</a>
						    @endif
								  <!-- <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button> -->
            </div>
          </div>
        </div>
      </div>
      <!-- /Product Single -->
@endforeach


    </div>
    <!-- /row -->


  </div>
  <!-- /container -->
</div>
<!-- /section -->







@section('javascript')
  <?php
      $id=Auth::user()->email_verified_at;
			if(Auth::user()->id)
			{
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
						showCloseButton: true,
						showCancelButton: false,
						showConfirmButton: false,

				});

			</script>



				<?php
			}

			}else {
				?>
			<script>
			swal({
							title: 'Notification',
						html:
						'Your yet to login please<br> ' +
						'signin or create an account if you dont have one to enable you ORDER . <br> Thank you for joining us!'+
						'',
					type: 'warning',
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
