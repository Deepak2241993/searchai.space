<div class="top-bar-area top-bar-style-two bg-dark text-light">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-8">
                <ul class="item-flex">
                    <li>
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div> 
                        <div class="info">
                            <strong>Address</strong>
                            A 24/5, Mohan Cooperative Industrial Area, Badarpur,<br> Secound Floor, New Delhi 110044
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fas fa-user-headset"></i>
                        </div>
                        <div class="info">
                            <strong>Phone</strong>
                            <a href="tel:+919355093937">+91 9355093937</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 text-end">
                <div class="call-entry">
                    <div class="icon">
                        <i class="fas fa-comments-alt-dollar"></i>
                    </div>
                    <div class="info">
                        <p>Have any Questions?</p>
                        <h5><a href="mailto:care@searchai.com">care@searchai.com</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top -->

<!-- Header 
============================================= -->
<header>
    <!-- Start Navigation -->
    <nav class="navbar mobile-sidenav navbar-default validnavs dark">

        <!-- Start Top Search -->
        {{-- <div class="top-search">
            <div class="container">
                <form action="#">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                    </div>
                </form>
            </div>
        </div> --}}
        <!-- End Top Search -->

        <div class="container d-flex justify-content-between align-items-center">            
            

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{url('/front-assets')}}/assets/img/finallogo.png" class="logo" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">

                <img src="{{url('/front-assets')}}/assets/img/finallogo.png" alt="Logo">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-times"></i>
                </button>
                
                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                    
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{route('aboutus')}}">About Us</a></li>
                    @auth
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}">{{ ucfirst(Auth::user()->name) }}</a>
                    </li>
                
                    
                    @else
                    <li><a href="{{route('login')}}">Login</a></li>
                    <li><a href="{{route('register')}}">Register</a></li>
                    @endauth
                    @if(Session::has('cart') && is_array(Session::get('cart')) && count(Session::get('cart')) > 0)
                    <li>
                        <a href="{{ route('cart.index') }}">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="badge bg-primary" style="
                                border-radius: 50%;
                                position: absolute;
                                background-color: rgb(237 118 13) !important;
                            ">{{ count(Session::get('cart')) }}</span>
                        </a>
                    </li>
                @endif
                
                </ul>
            </div><!-- /.navbar-collapse -->

            <div class="attr-right">
                <!-- Start Atribute Navigation -->
                {{-- <div class="attr-nav flex">
                    <ul>
                        <li class="search"><a href="#"><i class="fas fa-search"></i></a></li>
                        <li class="side-menu">
                            <a href="#">
                                <span class="bar-1"></span>
                                <span class="bar-2"></span>
                                <span class="bar-3"></span>
                            </a>
                        </li>
                    </ul>
                </div> --}}
                <!-- End Atribute Navigation -->


                <!-- Start Side Menu -->
                <div class="side">
                    <a href="#" class="close-side"><i class="icon_close"></i></a>
                    <div class="widget">
                        <div class="logo">
                            <img src="{{url('/front-assets')}}/assets/img/finallogo.png" alt="Logo">
                        </div>
                    </div>
                    <div class="widget">
                        <p>
                            At SearchAPI, we offer fast, safe, and affordable background checks for these workers, using secure government systems like
                            ecourts, Aadhaar, etc. This allows us to provide accurate information quickly, helping our 
                            clients make better hiring choices.
                        </p>
                    </div>
                    <div class="widget address">
                        <div>
                            <ul>
                                <li>
                                    <div class="content">
                                        <p>Address</p> 
                                        <strong>A 24/5, Mohan Cooperative Industrial Area, Badarpur,Secound Floor, New Delhi 110044</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Email</p> 
                                        <strong>care@searchai.com</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <p>Contact</p> 
                                        <strong>+91 9355093937</strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget newsletter">
                        <h4 class="title">Get Subscribed!</h4>
                        <form action="#">
                            <div class="input-group stylish-input-group">
                                <input type="email" placeholder="Enter your e-mail" class="form-control" name="email">
                                <span class="input-group-addon">
                                    <button type="submit">
                                        <i class="arrow_right"></i>
                                    </button>  
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="widget social">
                        <ul class="link">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>

                </div>
                <!-- End Side Menu -->

            </div>
            <!-- Main Nav -->

        </div>  
        <!-- Overlay screen for menu -->
        <div class="overlay-screen"></div>
        <!-- End Overlay screen for menu --> 
    </nav>
    <!-- End Navigation -->
</header>