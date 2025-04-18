<!-- Start Navbar -->

<style>
    .btn.btn-success.btn-sm.position-relative.ms-2:hover {
        background-color: #ED760D;
    }

    .btn.btn-success.btn-sm.position-relative.ms-2 {
        background-color: #ED760D;
    }

    .btn.btn-outline-light.btn-sm {
        background-color: #ED760D;
    }

    .btn.btn-outline-light.btn-sm:hover {
        background-color: #ED760D;
    }

    i.bi.bi-house-door {
        color: #ffffff;
    }

    i.bi.bi-gear {
        color: #ffffff;
    }

    i.bi.bi-cart4 {
        color: #ffffff;
    }
    i.bi.bi-box-arrow-in-right {

        color: #ffffff;
    }
    i.bi.bi-person-plus {
        color: #ffffff;
    }
    a.btn.btn-outline-success.btn-sm.ms-2 {
        background-color: #ED760D;
    }


    span.navbar-text.me-3.text-white {
        display: contents;
    }
    .nav-link {
    color: #000000 !important;
}
#navbarNav ul li a {
    font-size: 22px;
    font-weight: 700;
}
.deepak{
    margin-left: 30px;
    margin-right: 30px;
}




/* @media (min-width: 992px) {
        .deepak {
            display: block;
        }
        .shashwatmobile {
            display: none;
        }
    }

    @media (max-width: 991px) {
        .deepak {
            display: none;
        }
        .shashwatmobile {
            display: block;
        }
    } */

/* For Desktop (min-width: 992px) */
@media (min-width: 992px) {
    .deepak {
        display: block;
    }
    .shashwatmobile {
        display: none;
    }
}

/* For Tablet and Mobile (max-width: 991px) */
@media (max-width: 991px) {
    .deepak1 {
        display: none;
    }
    .shashwatmobile {
        display: block;
    }

    /* Apply margin-left and margin-right for Tablet and Mobile */
    .deepak1, .shashwatmobile {
        margin-left: 0px;
        margin-right: 0px;
    }

    /* Set font size for .form-control for Tablet and Mobile */
    .form-control {
        font-size: 1.8rem;
    }
}

/* For Small Mobile (max-width: 576px) */
@media (max-width: 576px) {
    .deepak1, .shashwatmobile {
        margin-left: 0px;
        margin-right: 0px;
    }

    /* Set font size for .form-control for Small Mobile */
    .form-control {
        font-size: 1.8rem;
    }
    .ampstart-footer.flex.flex-column.items-center.px3 {
        padding-bottom: 0;
    }
}

</style>


<header class="navbar deepak navbar-expand-lg navbar-light" style="background-color:#ffff">
    <div class="container-fluid" style="padding-left:6%; padding-right:6%;">
        <a class="navbar-brand text-white" href="{{ route('home')}}">
            <amp-img src="{{url('/front-assets')}}/images/footer_logo.png" width="200" height="40" layout="fixed" alt="Helpers near me"></amp-img>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navcolor" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('aboutus')}}">About Us</a>
                </li>
                
                @auth
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard') }}">{{ ucfirst(Auth::user()->name) }}</a>
                </li>
            
                <li class="nav-item">
                    <a class="btn btn-success btn-sm position-relative ms-2" href="{{ route('cart.index') }}">
                        <i class="bi bi-cart4"></i>
                        <span class="badge position-absolute top-0 start-100 translate-middle bg-danger">
                            {{ getTotalCartItems() }}
                        </span>
                    </a>
                </li>
            
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-link ms-2 text-white">
                            <i class="bi bi-box-arrow-right"></i>
                        </button>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">
                        Login
                    </a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('register') }}">
                        Register
                    </a>
                </li>
                @endauth
            </ul>
            
        </div>
    </div>
</header>
<!-- End Navbar -->