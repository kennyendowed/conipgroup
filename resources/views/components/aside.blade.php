

    <aside class="col-lg-3">
        <!-- Sidebar-->
        <div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar" style="max-width: 22rem;">
          <div class="offcanvas-header align-items-center shadow-sm">
            <h2 class="h5 mb-0">Filters</h2>
            <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">
            <!-- Categories-->
            <div class="widget widget-categories mb-4 pb-4 border-bottom">
              <h3 class="widget-title">Menu</h3>
              <div class="accordion mt-n1" id="shop-categories">
                <!-- Shoes-->
                <div class="accordion-item">
                  <h3 class="accordion-header"><a class="accordion-button collapsed" href="#shoes" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shoes">Categories</a></h3>
                  <div class="accordion-collapse collapse {{Request::is('/category') ? 'show' : ''}} " id="shoes" data-bs-parent="#shop-categories">
                    <div class="accordion-body">
                      <div class="widget widget-links widget-filter">
                        <ul class="widget-list widget-filter-list pt-1" style="height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                          <li class="widget-list-item widget-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="{{url('/category')}}"><span class="widget-filter-item-text">View all</span><span class="fs-xs text-muted ms-3">1,953</span></a></li>
                          {{-- <li class="widget-list-item widget-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="#"><span class="widget-filter-item-text">Create Category</span><span class="fs-xs text-muted ms-3">247</span></a></li> --}}
                          
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Clothing-->
                <div class="accordion-item">
                  <h3 class="accordion-header"><a class="accordion-button" href="#clothing" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="clothing">Product</a></h3>
                  <div class="accordion-collapse collapse  {{Request::is('/product') ? 'show' : ''}} " id="clothing" data-bs-parent="#shop-categories">
                    <div class="accordion-body">
                      <div class="widget widget-links widget-filter">
                    
                        <ul class="widget-list widget-filter-list pt-1" style="height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                          <li class="widget-list-item widget-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="{{url('/product')}}"><span class="widget-filter-item-text">View all</span><span class="fs-xs text-muted ms-3">2,548</span></a></li>
                          {{-- <li class="widget-list-item widget-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="#"><span class="widget-filter-item-text">Create Product</span><span class="fs-xs text-muted ms-3">235</span></a></li> --}}
                         
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Bags-->
                <div class="accordion-item">
                  <h3 class="accordion-header"><a class="accordion-button collapsed" href="#bags" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="bags">System</a></h3>
                  <div class="accordion-collapse collapse" id="bags" data-bs-parent="#shop-categories">
                    <div class="accordion-body">
                      <div class="widget widget-links widget-filter">
                        <ul class="widget-list widget-filter-list pt-1" style="height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                          {{-- <li class="widget-list-item widget-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="#"><span class="widget-filter-item-text">View all</span><span class="fs-xs text-muted ms-3">801</span></a></li>
                          <li class="widget-list-item widget-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="#"><span class="widget-filter-item-text">Handbags</span><span class="fs-xs text-muted ms-3">238</span></a></li>
                          <li class="widget-list-item widget-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="#"><span class="widget-filter-item-text">Backpacks</span><span class="fs-xs text-muted ms-3">116</span></a></li>
                          <li class="widget-list-item widget-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="#"><span class="widget-filter-item-text">Wallets</span><span class="fs-xs text-muted ms-3">104</span></a></li> --}}
                        
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Sunglasses-->
                <div class="accordion-item">
                  <h3 class="accordion-header"><a class="accordion-button collapsed" href="#sunglasses" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sunglasses">User Management</a></h3>
                  <div class="collapse" id="sunglasses" data-bs-parent="#shop-categories">
                    <div class="accordion-body">
                      <div class="widget widget-links">
                        <ul class="widget-list">
                          {{-- <li class="widget-list-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="#"><span>View all</span><span class="fs-xs text-muted ms-3">1,842</span></a></li>
                          <li class="widget-list-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="#"><span>Fashion Sunglasses</span><span class="fs-xs text-muted ms-3">953</span></a></li>
                          <li class="widget-list-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="#"><span>Sport Sunglasses</span><span class="fs-xs text-muted ms-3">589</span></a></li>
                          <li class="widget-list-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="#"><span>Classic Sunglasses</span><span class="fs-xs text-muted ms-3">300</span></a></li> --}}
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
          
         
          </div>
        </div>
      </aside>