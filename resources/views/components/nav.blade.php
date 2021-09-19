   <!-- Navbar 3 Level (Light)-->
   <header class="shadow-sm">
    <!-- Topbar-->
    <div class="topbar topbar-dark bg-dark">
      <div class="container">
        <div class="topbar-text dropdown d-md-none"><a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Contact Us</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="tel:00331697720"><i class="ci-support text-muted me-2"></i>(00) 33 169 7720</a></li>
            <li><a class="dropdown-item" href="mailto:Shopping@mail.com"><i class="ci-location text-muted me-2"></i>Shopping@mail.com</a></li>
          </ul>
        </div>
        <div class="topbar-text text-nowrap d-none d-md-inline-block">
          <i class="ci-support"></i><span class="text-muted me-1">Support</span><a class="topbar-link" href="tel:00331697720">(00) 33 169 7720</a><br/>
              <i class="ci-support"></i><span class="text-muted me-1">Support mail</span><a class="topbar-link" href="mailto:Shopping@mail.com">Shopping@mail.com</a></div>
        <div class="tns-carousel tns-controls-static d-none d-md-block">
          <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false}">
            <div class="topbar-text">Free shipping for order over $200</div>
            <div class="topbar-text">We return money within 30 days</div>
            <div class="topbar-text">Friendly 24/7 customer support</div>
          </div>
        </div>
        {{-- <div class="ms-3 text-nowrap"><a class="topbar-link me-4 d-none d-md-inline-block" href="order-tracking.html"><i class="ci-location"></i>Order tracking</a>
          <div class="topbar-text dropdown disable-autohide"><a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><img class="me-2" src="img/flags/en.png" width="20" alt="English">Eng / $</a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li class="dropdown-item">
                <select class="form-select form-select-sm">
                  <option value="usd">$ USD</option>
                  <option value="eur">€ EUR</option>
                  <option value="ukp">£ UKP</option>
                  <option value="jpy">¥ JPY</option>
                </select>
              </li>
              <li><a class="dropdown-item pb-1" href="#"><img class="me-2" src="img/flags/fr.png" width="20" alt="Français">Français</a></li>
              <li><a class="dropdown-item pb-1" href="#"><img class="me-2" src="img/flags/de.png" width="20" alt="Deutsch">Deutsch</a></li>
              <li><a class="dropdown-item" href="#"><img class="me-2" src="img/flags/it.png" width="20" alt="Italiano">Italiano</a></li>
            </ul>
          </div>
        </div> --}}
      </div>
    </div>
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <div class="navbar-sticky bg-light">
      <div class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="{{url("/")}}"><img src="{{asset('assets/img/logo-dark.png')}}" width="142" alt="Conipgroup"></a><a class="navbar-brand d-sm-none flex-shrink-0 me-2" href="{{url("/")}}"><img src="{{asset('assets/img/logo-icon.png')}}" width="74" alt="Conipgroup"></a>
          <div class="input-group d-none d-lg-flex mx-4">
            <input class="form-control rounded-end pe-5" type="text" placeholder="Search for products"><i class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i>
          </div>
          <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Expand menu</span>
              <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div></a><a class="navbar-tool d-none d-lg-flex" href=""><span class="navbar-tool-tooltip">Wishlist</span>
              <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-heart"></i></div></a>
                 <!-- Authentication Links -->
             @guest
              <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="#signin-modal" data-bs-toggle="modal">
              <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
              <div class="navbar-tool-text ms-n3"><small>Hello, Sign in</small>My Account</div></a>
              @else
              <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               {{ __('Logout') }}</a>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                <div class="navbar-tool-text ms-n3"><small>Hello, Welcome {{Auth::user()->name }}</small></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              @endguest
              @auth
            <div class="navbar-tool dropdown ms-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="{{route('shop-cart') }}"><span class="navbar-tool-label">{{ count(session('cart')) }}</span><i class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text" href="{{url('shop-cart') }}"><small>My Cart</small>  <?php $total = 0 ?>
              @foreach(session('cart') as $id => $details)
                  <?php $total += $details['price'] * $details['quantity'] ?>
              @endforeach 
              $ {{ $total }}
            </a>
              <!-- Cart dropdown-->
              <div class="dropdown-menu dropdown-menu-end">
                <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                  <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                    <div class="widget-cart-item pb-2 border-bottom">
                      <button class="btn-close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                      <div class="d-flex align-items-center"><a class="flex-shrink-0" href="#"><img src="../{{ $details['photo'] }}" width="64" alt="{{ $details['name'] }}"></a>
                        <div class="ps-2">
                          <h6 class="widget-product-title"><a href="#">{{ $details['name'] }}</a></h6>
                          <div class="widget-product-meta"><span class="text-accent me-2">${{ $details['price'] }}</span><span class="text-muted">x {{ $details['quantity'] }}</span></div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @endif
                  </div>
                  <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                  
             
                    <div class="fs-sm me-2 py-2"><span class="text-muted">Subtotal:</span><span class="text-accent fs-base ms-1"> $ {{ $total }}</span></div><a class="btn btn-outline-secondary btn-sm" href="{{url('shop-cart') }}">Expand cart<i class="ci-arrow-right ms-1 me-n1"></i></a>
                  </div><a class="btn btn-primary btn-sm d-block w-100" href="checkout-details.html"><i class="ci-card me-2 fs-base align-middle"></i>Checkout</a>
                </div>
              </div>
            </div>
            @endauth
          </div>
        </div>
      </div>
      <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
        <div class="container">
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Search-->
            <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
              <input class="form-control rounded-start" type="text" placeholder="Search for products">
            </div>
          
            <!-- Primary menu-->
          <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
              <li class="nav-item dropdown {{Request::is('/') ? 'active' : ''}}"><a class="nav-link" href="{{url('/') }}" >Home</a>          
              </li>
              <li class="nav-item dropdown {{Request::is('/about') ? 'active' : ''}}"><a class="nav-link" href="{{url('/about') }}" >About</a>          
              </li>
             
              @auth
              @if(checkPermission(['superAdmin']))

              @elseif(checkPermission(['admin']))


              @elseif(checkPermission(['staff']))


              @else
              <li class="nav-item dropdown"><a class="nav-link" href="{{ url('account') }}" >Account</a> </li>
              @endif 
              @endauth
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header> 

