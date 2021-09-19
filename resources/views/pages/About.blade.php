@extends('layouts.app')
@section('style')
<!-- Slick -->

    <style>
  

    </style>
@endsection
@section('content')

 <!-- Row: Shop online-->
 <section class="row g-0">
  <div class="col-md-6 bg-position-center bg-size-cover bg-secondary" style="min-height: 15rem; background-image: url({{ asset('assets/img/about/01.jpg') }});"></div>
  <div class="col-md-6 px-3 px-md-5 py-5">
    <div class="mx-auto py-lg-5" style="max-width: 35rem;">
      <h2 class="h3 pb-3">Search, Select, Buy online</h2>
      <p class="fs-sm pb-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor tristique nec. Tristique nulla aliquet enim tortor at auctor urna nunc. Sit amet aliquam id diam maecenas ultricies mi eget.</p><a class="btn btn-primary btn-shadow" href="shop-grid-ls.html">View products</a>
    </div>
  </div>
</section>
<!-- Row: Delivery-->
<section class="row g-0">
  <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2" style="min-height: 15rem; background-image: url({{ asset('assets/img/about/02.jpg') }});"></div>
  <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
    <div class="mx-auto py-lg-5" style="max-width: 35rem;">
      <h2 class="h3 pb-3">Fast delivery worldwide</h2>
      <p class="fs-sm pb-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor tristique nec. Tristique nulla aliquet enim tortor at auctor urna nunc. Sit amet aliquam id diam maecenas ultricies mi eget.</p><a class="btn btn-accent btn-shadow" href="#">Shipping details</a>
    </div>
  </div>
</section>

<hr>
<!-- Section: Team-->
<section class="container py-3 py-lg-5 mt-4 mb-3">
  <h2 class="h3 my-2">Our core team</h2>
  <p class="fs-sm text-muted">People behind your great shopping experience</p>
  <div class="row pt-3">
    <div class="col-lg-4 col-sm-6 mb-grid-gutter">
      <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ asset('assets/img/team/03.jpg') }}" width="96" alt="Jonathan Doe">
        <div class="ps-3">
          <h6 class="fs-base pt-1 mb-1">Jonathan Doe</h6>
          <p class="fs-ms text-muted mb-0">CEO, Co-founder</p><a class="nav-link-style fs-ms text-nowrap" href="mailto:johndoe@example.com"><i class="ci-mail me-2"></i>johndoe@example.com</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-grid-gutter">
      <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ asset('assets/img/team/04.jpg') }}" width="96" alt="Barbara Palson">
        <div class="ps-3">
          <h6 class="fs-base pt-1 mb-1">Barbara Palson</h6>
          <p class="fs-ms text-muted mb-0">Chief of Marketing</p><a class="nav-link-style fs-ms text-nowrap" href="mailto:b.palson@example.com"><i class="ci-mail me-2"></i>b.palson@example.com</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-grid-gutter">
      <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ asset('assets/img/team/06.jpg') }}" width="96" alt="William Smith">
        <div class="ps-3">
          <h6 class="fs-base pt-1 mb-1">William Smith</h6>
          <p class="fs-ms text-muted mb-0">Financial director</p><a class="nav-link-style fs-ms text-nowrap" href="mailto:w.smith@example.com"><i class="ci-mail me-2"></i>w.smith@example.com</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-grid-gutter">
      <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ asset('assets/img/team/02.jpg') }}" width="96" alt="Amanda Gallaher">
        <div class="ps-3">
          <h6 class="fs-base pt-1 mb-1">Amanda Gallaher</h6>
          <p class="fs-ms text-muted mb-0">Lead UX designer</p><a class="nav-link-style fs-ms text-nowrap" href="mailto:a.gallaher@example.com"><i class="ci-mail me-2"></i>a.gallaher@example.com</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-grid-gutter">
      <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ asset('assets/img/team/01.jpg') }}" width="96" alt="Benjamin Miller">
        <div class="ps-3">
          <h6 class="fs-base pt-1 mb-1">Benjamin Miller</h6>
          <p class="fs-ms text-muted mb-0">Website development</p><a class="nav-link-style fs-ms text-nowrap" href="mailto:b.miller@example.com"><i class="ci-mail me-2"></i>b.miller@example.com</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-grid-gutter">
      <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ asset('assets/img/team/07.jpg') }}" width="96" alt="Miguel Rodrigez">
        <div class="ps-3">
          <h6 class="fs-base pt-1 mb-1">Miguel Rodrigez</h6>
          <p class="fs-ms text-muted mb-0">Content manager</p><a class="nav-link-style fs-ms text-nowrap" href="mailto:b.miller@example.com"><i class="ci-mail me-2"></i>m.rodrigez@example.com</a>
        </div>
      </div>
    </div>
  </div>
</section>


@section('javascript')
@endsection

@endsection
