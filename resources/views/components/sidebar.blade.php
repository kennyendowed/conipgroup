 <style>
 .fas {
     margin-right: 7px;
 }
 </style>
 

 <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
             
                <ul class="nav" id="side-menu">
                    @auth
                    @if(checkPermission(['staff']))
                       <li style="padding: 70px 0 0;">
                        <a href="{{url('/staff-dashboard')}}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('food') }}" class="waves-effect"><i class="fas fa-hamburger"></i>Food Orders</a>
                    </li>
                    <li>
                        <a href="{{ url('transactions') }}" class="waves-effect"><i class="fas fa-table"></i>Transactions</a>
                    </li>
                   
                    @elseif(checkPermission(['admin']))
                  
                    <li style="padding: 70px 0 0;">
                        <a href="{{url('/dashboard')}}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li> 
                     <li>
                        <a href="{{ url('admin/Staff') }}" class="waves-effect"><i class="fas fa-table"></i>New Staff  </a>
                    </li>

                    <li>
                        <a href="{{ url('admin/View-Organization-Sales') }}" class="waves-effect"><i class="fas fa-table"></i>Sales Report</a>
                    </li>
                    {{-- <li>
                        <a href="{{ url('admin/change-pos-ip') }}" class="waves-effect"><i class="fas fa-table"></i>change-pos-ip</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/change-printerid') }}" class="waves-effect"><i class="fas fa-table"></i>change-printerid</a>
                    </li> --}}
                    <li>
                        <a href="{{ url('admin/change-slider-image') }}" class="waves-effect"><i class="fas fa-table"></i>change-slider-image</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/inventory-page') }}" class="waves-effect"><i class="fas fa-table"></i>inventory-page</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/show-food') }}" class="waves-effect"><i class="fas fa-table"></i>insert-food</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/Packs') }}" class="waves-effect"><i class="fas fa-table"></i>food packs</a>
                    </li>
                    @elseif(checkPermission(['superAdmin']))

                    <li style="padding: 70px 0 0;">
                        <a href="{{url('/Organization')}}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Organizations</a>
                    </li>
                    <li>
                        <a href="{{ url('Organization-Sales') }}" class="waves-effect"><i class="fas fa-table"></i>Sales Report</a>
                    </li>
                    {{-- <li>
                        <a href="{{ url('') }}" class="waves-effect"><i class="fas fa-table"></i></a>
                    </li> --}}
                    @else
                    I don't have any records!                
                    @endif
                    @endauth
                  
                   
                </ul>
               
            </div>
            
        </div>