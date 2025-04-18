<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="{{ route('home') }}" class="brand-link"> <!--begin::Brand Image--> <img src="{{ url('/front-assets/images/logo.png') }}" alt="search ai logo" class="brand-image opacity-75 shadow"> <span class="brand-text fw-light"></span> </a> </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                @if(auth()->user() && auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user-list') }}" class="nav-link {{ Request::segment(2) === 'user-list' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-user"></i>
                        <p>User Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.coupon.list') }}" class="nav-link {{ Request::segment(2) === 'coupon-list' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-gift" aria-hidden="true"></i>
                        <p>Coupon Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.faq.index') }}" class="nav-link {{ Request::segment(2) === 'faq' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-question" aria-hidden="true"></i>
                        <p>FAQs Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.banner.index') }}" class="nav-link {{ Request::segment(2) === 'banner' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-picture-o" aria-hidden="true"></i>
                        <p>Banner Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.service.index') }}" class="nav-link {{ Request::segment(2) === 'service' ? 'active' : '' }}">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <p>Service Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blog.index') }}" class="nav-link {{ Request::segment(2) === 'blog' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-rss" aria-hidden="true"></i>
                        <p>Blogs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.ordersDetails') }}" class="nav-link {{ Request::segment(2) === 'tokens' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-money" aria-hidden="true"></i>
                        <p>Orders Details</p>
                    </a>
                </li>
                               
                @else



        {{--  For User Side bar --}}
       
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-tachometer" aria-hidden="true"></i>
                        <p>User Dashboard</p>
                    </a>
                    
                </li>
                @php
                $user_id = auth()->id(); // Get the logged-in user ID

                $service_type = [];
                if ($user_id) {
                    $service_type = App\Models\Token::where('user_id', $user_id)
                        ->distinct()
                        ->pluck('service_id'); // No need to call `get()`
                }
            @endphp

                @foreach ($service_type as $service)
                    @php
                        $service_name = App\Models\Service::where('id', $service)->first();
                    @endphp
                    @if ($service_name)
                        <li class="nav-item">
                            <a href="{{ route('my-service', ['slug' => $service_name->service_slug]) }}" class="nav-link  {{ request()->segment(2) === $service_name->service_slug ? 'active' : '' }}">
                                <i class="nav-icon fa fa-check-square-o" aria-hidden="true"></i>
                                <p>{{ $service_name->name }}</p>
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Request::segment(2) === 'token-views' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-check-square-o" aria-hidden="true"></i>
                                <p>Service Not Found</p>
                            </a>
                    @endif
                    
                @endforeach

                <li class="nav-item">
                    <a href="{{ route('orders') }}" class="nav-link {{ Request::segment(1) === 'my-orders' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-shopping-cart" aria-hidden="true"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link {{ Request::segment(1) === 'profile' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-user"></i>
                        <p>My Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('settings') }}" class="nav-link {{ Request::segment(1) === 'settings' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>
                @endif

               
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar-->