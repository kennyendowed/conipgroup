@extends('layouts.app')
@section('title') Contact  @endsection
@section('content')
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

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{url('/') }}">Home</a></li>
        <li><a href="#">{{$id}}</a></li>
      </ol>
      <h2>{{$id}}</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">
      <?php
      if($id=="Sparkle-Holographic")
      {
      ?>
      <script type="application/ld+json">
   {
     "@context": "https://schema.org/",
     "@type": "Product",
    "sku": "0446310786",
     "mpn": "925872",
     "brand": {
       "@type": "Brand",
       "name": "Wristbands"
     },
     "review": {
       "@type": "Review",
       "reviewRating": {
         "@type": "Rating",
         "ratingValue": "4",
         "bestRating": "5"
       },
     "aggregateRating": {
       "@type": "AggregateRating",
       "ratingValue": "4.4",
       "reviewCount": "89"
     }
     }
   }
   </script>
<div class="row">
    <div class="col-lg-6">
      <img id="desk" src="{{ asset('assets/img/08/Sparkle-or-Holographic-Wristbands-2-500x500.jpg')}}" alt="Sparkle Holographic Wristbands">
      <img id="mb" src="{{ asset('assets/img/08/Sparkle-or-Holographic-Wristbands-2-300x300.jpg')}}" alt="Sparkle Holographic Wristbands">
      <br><br>
      <div class="owl-carousel clients-carousel">
        <img src="{{ asset('assets/img/08/Sparkle-or-Holographic-Wristbands-3-300x300.jpg')}}" alt="Sparkle Holographic Wristbands">
        <img src="{{ asset('assets/img/08/Sparkle-or-Holographic-Wristbands-2-300x300.jpg')}}" alt="Sparkle Holographic Wristbands">
      </div>
        <a href="{{ route('Order',['id' =>$id] ) }}" class="btn  btn-lg animated fadeInUp" style="color:#fff; background-color: #ac2376;"><h4>view More <?=$id?> Product</h4></a>
  </div>
  <div class="col-lg-6 pt-4 pt-lg-0 content">
    <h3>Sparkle Holographic Wristbands</h3>
    <h4>₦130.00</h4>
    <p class="font-italic">
    Descriptions

a. Straight-faced Sparkle Wristbands can make any party or event stand out with their
striking metallic and glitter patterns. Similar to plastic wristbands, holographic wristbands are
water and tear resistant. They feature locking plastic snaps that prevent wearers from sharing
wristbands, so you don’t have to worry about unauthorized guests. This particular holographic
wristband is straight face shaped.
<ul>
  Description
  <li><i class="icofont-check-circled"></i> Straight-face shaped</li>
  <li><i class="icofont-check-circled"></i> Shinny physical feature</li>
  <li><i class="icofont-check-circled"></i> Recommended use: 1 week</li>
  <li><i class="icofont-check-circled"></i> Comfortable and light weight</li>
  <li><i class="icofont-check-circled"></i> Stretch-resistant and durable</li>
  <li><i class="icofont-check-circled"></i>One time use, secure locking plastic snaps</li>
  <li><i class="icofont-check-circled"></i>Waterproof and hold up for extended use in water</li>
</ul>
<p>
  Wide-faced Sparkle Wristbands can make any party or event stand out with their striking metallic and glitter patterns. Similar to plastic wristbands, holographic wristbands are water and tear resistant. They feature locking plastic snaps that prevent wearers from sharing wristbands, so you don’t have to worry about unauthorized guests. This particular holographic wristband is wide face shaped.
</p>
<ul>
  Description
<li><i class="icofont-check-circled"></i> Straight-face shaped</li>
<li><i class="icofont-check-circled"></i> Shinny physical feature</li>
<li><i class="icofont-check-circled"></i> Recommended use: 1 week</li>
<li><i class="icofont-check-circled"></i>Comfortable and light weight</li>
<li><i class="icofont-check-circled"></i> Stretch-resistant and durable</li>
<li><i class="icofont-check-circled"></i> One time use, secure locking plastic snaps</li>
<li><i class="icofont-check-circled"></i> Waterproof and hold up for extended use in water</li>
</ul>
    </p>

  </div>
</div>
<?php
}
elseif ($id=="Paper-Tyvek-wristbands") {
  ?>
<div class="row">
<div class="col-lg-6">
  <img id="desk" src="{{ asset('assets/img/08/tyvekk-500x500.jpg')}}" alt="Paper  Tyvek wristbands">
<img id="mb" src="{{ asset('assets/img/08/tyvekk-300x240.jpg')}}" alt="Paper  Tyvek wristbands">
<br><br>
<div class="owl-carousel clients-carousel">
  <img src="{{ asset('assets/img/08/tyvekk-300x300.jpg')}}" alt="Paper  Tyvek Wristbands">
  <img src="{{ asset('assets/img/08/tyvekk-300x300.jpg')}}" alt="Paper  Tyvek Wristbands">
</div>
<br>
  <a href="{{ route('Order',['id' =>$id] ) }}" class="btn  btn-lg animated fadeInUp" style="color:#fff; background-color: #ac2376;"><h4>view More <?=$id?> Product</h4></a>
</div>
<div class="col-lg-6 pt-4 pt-lg-0 content">
<h3>Paper / Tyvek wristbands</h3>
<h4>₦80.00</h4>
<p class="font-italic">
Descriptions

¾” Paper Wristbands Our paper Tyvek wristbands for events are a cost- effective solution to identify paid guests and secure admissions. They are made of authentic DuPont™ Tyvek®, which is a lightweight, high- density polyethylene fiber material. All our Tyvek® wristbands feature tamper-evident die-cut adhesive closure that tear when removed to prevent multiple usage or sharing and It comes in a sleek and slim structure which makes it comfortable for use
<ul>
  Description
<li><i class="icofont-check-circled"></i>  Recommended use: a day</li>
<li><i class="icofont-check-circled"></i>  Comfortable and light weight</li>
<li><i class="icofont-check-circled"></i>  Stretch-resistant and durable</li>
<li><i class="icofont-check-circled"></i>  One time use, secure adhesive.</li>
<li><i class="icofont-check-circled"></i>  It is not waterproof and would be
destroyed if it comes in contact
with water or any liquid.</li>
<li><i class="icofont-check-circled"></i> 1” Paper Voucher Wristbands
</li>
</ul>
<p>
Our paper Tyvek wristbands for events are a cost-effective solution to identify paid guests and secure admissions. They are made of authentic DuPont™ Tyvek®, which is a lightweight, high-density polyethylene fiber material. All our Tyvek® wristbands feature tamper-evident die-cut adhesive closure that tear when removed to prevent multiple usage or sharing and as compared to the 3/4” tyvek wristband, it is wider and as such provides more space for prints.</p>
<ul>
Description
<li><i class="icofont-check-circled"></i> Recommended use: 1 week</li>
<li><i class="icofont-check-circled"></i> Comfortable and light weight</li>
<li><i class="icofont-check-circled"></i> Stretch-resistant and durable</li>
<li><i class="icofont-check-circled"></i> One time use, secure adhesive.</li>
<li><i class="icofont-check-circled"></i> It is not waterproof and would be
destroyed if it comes in contact
with water or any liquid.</li>
</ul>
</p>

</div>
</div>
<?php
}
elseif ($id=="Plastic-Vinyl-wristbands") {
  ?>
<div class="row">
<div class="col-lg-6">
  <img id="desk" src="{{ asset('assets/img/08/DSC_02253.jpg')}}" alt="Plastic Vinyl wristbands">
<img id="mb" src="{{ asset('assets/img/08/DSC_02252.jpg')}}" alt="Plastic Vinyl wristbands">
<br><br>
<div class="owl-carousel clients-carousel">
  <img src="{{ asset('assets/img/08/Plastic-or-Vinyl-Wristbands-5-300x300.jpg')}}" alt="Plastic Vinyl Wristbands">
  <img src="{{ asset('assets/img/08/Plastic-or-Vinyl-Wristbands.jpg')}}" alt="Plastic Vinyl Wristbands">
</div>

<br>
  <a href="{{ route('Order',['id' =>$id] ) }}" class="btn  btn-lg animated fadeInUp" style="color:#fff; background-color: #ac2376;"><h4>view More <?=$id?> Product</h4></a>
</div>
<div class="col-lg-6 pt-4 pt-lg-0 content">
<h3>Plastic /Vinyl wristbands</h3>
<h4>₦100.00</h4>
<p class="font-italic">
Descriptions

a. Straight-faced Plastic Wristbands are made from a flexible and stretch-
resistant plastic. They are constructed with a onetime use, plastic snap
requiring the wristbands to be cut off after use and are straight-face shaped.
The plastic bands are waterproof and hold up in water for extended periods of
time. The backside of the plastic wristband is white, not the color or design on
the front. Actual colors may vary from website.
<ul>
  Description
<li><i class="icofont-check-circled"></i>  Straight-face shaped</li>
<li><i class="icofont-check-circled"></i>  Recommended use: 1 week</li>
<li><i class="icofont-check-circled"></i>  Comfortable and light weight</li>
<li><i class="icofont-check-circled"></i>  Stretch-resistant and durable</li>
<li><i class="icofont-check-circled"></i>  One time use, secure locking plastic snaps</li>
<li><i class="icofont-check-circled"></i> Waterproof and hold up for
extended use in water</li>
</ul>
<p>
  Wide-faced Plastic Wristbands are made from a flexible and stretch-resistant
  plastic. They are constructed with a onetime use, plastic snap requiring the
  wristbands to be cut off after use and are wide-face shaped.
  The plastic bands are waterproof and hold up in water for extended periods of
  time. The backside of the plastic wristband is white, not the color or design on
  the front. Actual colors may vary from website.<ul>
Description
<li><i class="icofont-check-circled"></i> Wide-face Shaped</li>
<li><i class="icofont-check-circled"></i> Recommended use: 1 week</li>
<li><i class="icofont-check-circled"></i> Comfortable and light weight</li>
<li><i class="icofont-check-circled"></i> Stretch-resistant and durable</li>
<li><i class="icofont-check-circled"></i> One time use, secure locking
plastic snaps</li><li><i class="icofont-check-circled"></i> Waterproof and hold up for
extended use in water</li>
</ul>
</p>
<p>
  Spiral Plastic Wristbands are made from a flexible and stretch-resistant
  plastic. They are constructed with a onetime use, plastic snap requiring the
  wristbands to be cut off after use and are spiral shaped.
  The plastic bands are waterproof and hold up in water for extended periods of
  time. The backside of the plastic wristband is white, not the color or design on
  the front. Actual colors may vary from website.<ul>
Description

<li><i class="icofont-check-circled"></i> Recommended use: 1 week</li>
<li><i class="icofont-check-circled"></i> Comfortable and light weight</li>
<li><i class="icofont-check-circled"></i> Stretch-resistant and durable</li>
<li><i class="icofont-check-circled"></i> One time use, secure locking
plastic snaps</li><li><i class="icofont-check-circled"></i> Waterproof and hold up for
extended use in water</li>
</ul>
</p>
</div>
</div>
<?php
}

elseif ($id=="Rubber-Silicone-Wristbands") {
  ?>
<div class="row">
<div class="col-lg-6">
  <img id="desk" src="{{ asset('assets/img/08/Rubber-Wristbands-4-500x500.jpg')}}" alt="Rubber or Silicone Wristbands">
<img id="mb" src="{{ asset('assets/img/08/Rubber-Wristbands-4-300x300.jpg')}}" alt="Rubber or Silicone Wristbands">
<br><br>
<div class="owl-carousel clients-carousel">
  <img src="{{ asset('assets/img/08/Rubber-Wristbands-3-300x300.jpg')}}" alt="Rubber or Silicone Wristbands">
  <img src="{{ asset('assets/img/08/Rubber-Wristbands-300x300.jpg')}}" alt="Rubber or Silicone Wristbands">
</div>

<br>
  <a href="{{ route('Order',['id' =>$id] ) }}" class="btn  btn-lg animated fadeInUp" style="color:#fff; background-color: #ac2376;"><h4>view More <?=$id?> Product</h4></a>
</div>
<div class="col-lg-6 pt-4 pt-lg-0 content">
<h3>Rubber or Silicone Wristbands</h3>
<h4>₦350.00</h4>
<p class="font-italic">
SILICONE/RUBBER WRISTBANDS

All Round Silicone Wristbands Comfortable, durable, and waterproof, silicone wristbands fit without requiring them to fiddle with snap closures or adhesives. Silicone wristbands are stylish fashion accessories that serve as highly-visible promotional opportunities. Silicone awareness wristbands can last for years with and are completely water-resistant. This Particular one is all round shaped and is not detachable but it easily slides up the wrists.<ul>
  Description
<li><i class="icofont-check-circled"></i>  Reusable</li>
<li><i class="icofont-check-circled"></i> Comfortable and Durable</li>
<li><i class="icofont-check-circled"></i> Stretchy and durable</li>
<li><i class="icofont-check-circled"></i> Waterproof and hold up for
extended use in water.</li>
<li><i class="icofont-check-circled"></i> Non-detachable.</li>
</ul>
<p>
Detachable Silicone Wristbands Comfortable, durable, and waterproof, silicone wristbands fit without requiring them to fiddle with snap closures or adhesives. Silicone wristbands are stylish fashion accessories that serve as highly-visible promotional opportunities. Silicone awareness wristbands can last for years with and are completely water-resistant. This Particular one is detachable.<ul>
Description
<li><i class="icofont-check-circled"></i>  Reusable</li>
<li><i class="icofont-check-circled"></i> Comfortable and Durable</li>
<li><i class="icofont-check-circled"></i> Stretchy and durable</li>
<li><i class="icofont-check-circled"></i> Waterproof and hold up for
extended use in water.</li>
<li><i class="icofont-check-circled"></i> Detachable.</li>
</ul>
</p>

</div>
</div>
<?php
}

elseif ($id=="Fabric-Wristbands") {
  ?>
<div class="row">
<div class="col-lg-6">
  <img id="desk" src="{{ asset('assets/img/08/IMG-20190918-WA0004-500x500.jpg')}}" alt="Fabric Wristbands">
<img id="mb" src="{{ asset('assets/img/08/IMG-20190918-WA0004-300x300.jpg')}}" alt="Fabric Wristbands">
<br><br>
<div class="owl-carousel clients-carousel">
  <img src="{{ asset('assets/img/08/IMG-20190918-WA0004-300x300.jpg')}}" alt="Fabric Wristbands">
  <img src="{{ asset('assets/img/08/IMG-20190918-WA0004-300x300.jpg')}}" alt="Fabric Wristbands">
</div>

<br>
  <a href="{{ route('Order',['id' =>$id] ) }}" class="btn  btn-lg animated fadeInUp" style="color:#fff; background-color: #ac2376;"><h4>view More <?=$id?> Product</h4></a>
</div>
<div class="col-lg-6 pt-4 pt-lg-0 content">
<h3>Fabric Wristbands</h3>
<h4>₦350.00</h4>
<p class="font-italic">
Woven wristbands are at the forefront when it comes to wristbands for music concerts and festivals. They can be worn for months on end as they’re made of durable cotton fabrics. When coupled with RFID technology, fabric wristbands can also be used to track guest entrances and exits at large events. Similar to holographic glitter wristbands, woven bracelets are very eye-catching and great for VIP identification. Both high security and re-wearable styles of fabric wristbands are available. High security bands utilize plastic ring clips while re-wearable styles can stretch to make them easy to put on and remove If you need a fashionable wristband for a music festival, woven cloth bands add a plenty of style. Event planners sometimes use them to make it easier for staff to identify VIP guests.
<ul>
  Description
<li><i class="icofont-check-circled"></i>  Fabric texture</li>
<li><i class="icofont-check-circled"></i> Comfortable and Durable</li>
<li><i class="icofont-check-circled"></i> Reusable</li>
<li><i class="icofont-check-circled"></i> It is not waterproof and cannot
hold up in water</li>
<li><i class="icofont-check-circled"></i>  Durable</li>
<li><i class="icofont-check-circled"></i> Non-Stretchy</li>
</ul>

</div>
</div>
<?php
}

elseif ($id=="Tickets") {
  ?>
<div class="row">
<div class="col-lg-6">
  <img id="desk" src="{{ asset('assets/img/08/DSC_48473.jpg')}}" alt="Tickets for event">
<img id="mb" src="{{ asset('assets/img/08/DSC_48472.jpg')}}" alt="Tickets for event">
<br><br>
<div class="owl-carousel clients-carousel">
  <img src="{{ asset('assets/img/08/DSC_4849.jpg')}}" alt="ARIYA TICKETS">
  <img src="{{ asset('assets/img/08/DSC_4855.jpg')}}" alt="Tickets for event">
</div>

<br>
  <a href="{{ route('Order',['id' =>$id] ) }}" class="btn  btn-lg animated fadeInUp" style="color:#fff; background-color: #ac2376;"><h4>view More <?=$id?> Product</h4></a>
</div>
<div class="col-lg-6 pt-4 pt-lg-0 content">
<h3>Tickets</h3>
<p class="font-italic">
<ul>
  Description

<li><i class="icofont-check-circled"></i> Comfortable and Durable</li>
<li><i class="icofont-check-circled"></i> It is not waterproof and cannot
hold up in water</li>
<li><i class="icofont-check-circled"></i>  Durable</li>
<li><i class="icofont-check-circled"></i> Non-Stretchy</li>
</ul>

</div>
</div>
<?php
}


      ?>



    </div>
  </section><!-- End About Section -->



@section('javascript')
@endsection

@endsection
