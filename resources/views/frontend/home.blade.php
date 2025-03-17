@extends('layouts.master')
@section('body')
<style>
    .button-container {
        background: #ffffff;
        padding: 30px;
        border: 2px solid #74ebd5;
        border-radius: 15px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .button-container h3 {
        margin-bottom: 20px;
        font-size: 22px;
        color: #333;
        font-family: "Poppins", Sans-serif;
    }

    .button-container button {
        background-color: #ED760D;
        color: #000000;
        border-color: #ffffff;
        -webkit-transition-duration: 0.1s;
        transition-duration: 0.1s;
        font-family: "Poppins", Sans-serif;
        font-weight: 600;
        padding: 12px 25px;
        margin: 0 10px;
        border-style: solid;
        border-width: 1px;
        border-radius: 4px;
        cursor: pointer;
    }

    .button-container button:hover {
        background-color: #000000;
        color: #FFFFFF;
        border-color: #000000;
    }

    .cart-button {
        border-radius: 30px;
        font-weight: bold;
        color: #fff;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }

    .cart-button:hover {
        transform: scale(1.1);
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    .cart-button .badge {
        font-size: 0.8rem;
        padding: 5px 8px;
        font-weight: bold;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .cart-button i {
        margin-right: 8px;
        font-size: 1.2rem;
    }
    .service_box{
        width:150px;margin:5px
    }
    
.ServiceButton {
    padding: 30px;
    text-align: center;
}

.ServiceButton .btn-submit {
    background-color: #ED760D;
    color: #ffffff;
    border-color: #ED760D;
    -webkit-transition-duration: 0.1s;
    transition-duration: 0.1s;
    font-family: "Poppins", Sans-serif;
    font-weight: 600;
    padding: 12px 25px;
    margin: 0 10px;
    border-style: solid;
    border-width: 1px;
    border-radius: 4px;
    cursor: pointer;
}
}
/*For Slider */
/* Default (Desktop) */
.banner-title {
    font-family: Impact, sans-serif;
    font-size: 64px;
    font-weight: 300;
    color: #fff;
    line-height: 1.2;
    margin-bottom: 20px;
}

/* Mobile */
@media (max-width: 768px) {
    .banner-title {
        font-size: 24px;
        text-align: center;
    }
}

/* Small Mobile */
@media (max-width: 576px) {
    .banner-title {
        font-size: 20px;
    }
}

</style>

<main id="content">

    <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        @foreach ($bannerData as $key => $banner)
            <button type="button" data-bs-target="#carouselExampleCaptions" 
                data-bs-slide-to="{{ $key }}" 
                class="{{ $key == 0 ? 'active' : '' }}" 
                aria-current="{{ $key == 0 ? 'true' : 'false' }}" 
                aria-label="Slide {{ $key + 1 }}">
            </button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @foreach ($bannerData as $key => $banner)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <img src="{{ url('/').$banner->image }}" class="d-block w-100" alt="{{ $banner->title }}">
            <div class="carousel-caption" style="
                top: 50%; 
                transform: translateY(-80%); 
                right: 5%; 
                left: auto; 
                text-align: left; 
                max-width: 50%;">
                
                <h4 style="
                    font-family: Impact, sans-serif; 
                    font-size: 64px; 
                    font-weight: 300; 
                    color: #fff; 
                    line-height: 1.2; 
                    margin-bottom: 20px;">
                    {!! $banner->title !!}
                </h4>
                
                <span style="
                    font-size: 24px; 
                    color: #fff; 
                    margin-bottom: 30px;">
                    {!! $banner->description !!}
                </span>
                <!-- For Service Button-->
                    <div class="ServiceButton">
                         @foreach ($serviceData as $item)
                            <a href="{{ route('services.show', $item->service_slug) }}">
                                <button class="btn-submit">
    {{'Buy'}} {{ $item->name == 'KYC+CCRV' ? 'Aadhar KYC + Criminal Background Verification' : $item->name }}
</button>

                            </a>
                        @endforeach
                    </div>
                <!-- For Service Button-->
            </div>
        </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    
    
    
    

    {{-- <section id="slider">
        <div class="owl-carousel owl-theme">
            @foreach ($bannerData as $banner)
            <div class="slider-item"
                style="background-image: url('{{ url('/') . '/' . ('storage/' . $banner->image) }}')">
                <div class="slider-content m-auto text-center">
                    <h1 class="text-shadow light">{{ $banner->title }}</h1>
                    <h4 class="text-shadow light" style="max-width:780px">{{ $banner->description }}</h4>
                </div>
            </div>
            @endforeach
        </div>
    </section> --}}
   


   
    <div class="divider"></div>
    <section id="why-us">
        <div class="container">
            <h2 class="text-center mb3">Why SearchAI for Professional Background Verification?</h2>
            <div class="pb3 ml-auto mr-auto m-auto" style="max-width:580px">
                <amp-accordion id="why-helpers-near-me" expand-single-section animate disable-session-states>
                    <section class="card p0 mb1">
                        <header class="card-header md-list">
                            <div class="md-list-item">
                                <amp-img layout="fixed" src="{{ url('/front-assets') }}/images/icons/responsive.svg"
                                    width="40" height="40" alt=""></amp-img>
                                <p class="px2">Convenient, Easy &amp; Organized</p>
                                <span>
                                    <amp-img layout="fixed"
                                        src="{{ url('/front-assets') }}/images/icons/ic_keyboard_arrow_down.svg"
                                        width="24" height="24" alt=""></amp-img>
                                </span>
                            </div>
                        </header>
                        <div class="card-body">It is an Easier, Simpler & Better way of verifying Workers. 5 minutes and just a click of a few buttons, that’s all it takes to verify Workers at SearchAI.</div>
                    </section>
                    <section class="card p0 mb1">
                        <header class="card-header md-list">
                            <div class="md-list-item">
                                <amp-img layout="fixed" src="{{ url('/front-assets') }}/images/icons/shield2.svg"
                                    width="40" height="40" alt=""></amp-img>
                                <p class="px2">Professionally Verified Workers only</p>
                                <span>
                                    <amp-img layout="fixed"
                                        src="{{ url('/front-assets') }}/images/icons/ic_keyboard_arrow_down.svg"
                                        width="24" height="24" alt=""></amp-img>
                                </span>
                            </div>
                        </header>
                        <div class="card-body">SearchAI follows a 2/3 Step Verification Process for every Worker registered with the platform. Everyone’s IDs & Court/Criminal Records are checked in detail.

                        </div>
                    </section>
                    <section class="card p0 mb1">
                        <header class="card-header md-list">
                            <div class="md-list-item">
                                <amp-img layout="fixed" src="{{ url('/front-assets') }}/images/icons/fast_1.svg"
                                    width="40" height="40" alt=""></amp-img>
                                <p class="px2">Quick Turnaround Time</p>
                                <span>
                                    <amp-img layout="fixed"
                                        src="{{ url('/front-assets') }}/images/icons/ic_keyboard_arrow_down.svg"
                                        width="24" height="24" alt=""></amp-img>
                                </span>
                            </div>
                        </header>
                        <div class="card-body">
                            Get the Background Verification report in about 10-15 minutes.</div>
                    </section>
                    <section class="card p0 mb1">
                        <header class="card-header md-list">
                            <div class="md-list-item">
                                <amp-img layout="fixed" src="{{ url('/front-assets') }}/images/icons/empty-inbox_2.svg"
                                    width="40" height="40" alt=""></amp-img>
                                <p class="px2">Hassle-free</p>
                                <span>
                                    <amp-img layout="fixed"
                                        src="{{ url('/front-assets') }}/images/icons/ic_keyboard_arrow_down.svg"
                                        width="24" height="24" alt=""></amp-img>
                                </span>
                            </div>
                        </header>
                        <div class="card-body">Get the detailed Background Verification report directly in your email inbox. You are not required to go anywhere for the checks or submit a document anywhere. The whole process is hasslefree and online - end to end.</div>
                    </section>
                    <section class="card p0 mb1">
                        <header class="card-header md-list">
                            <div class="md-list-item">
                                <amp-img layout="fixed" src="{{ url('/front-assets') }}/images/icons/salary.svg"
                                    width="40" height="40" alt=""></amp-img>
                                <p class="px2">Cost effective</p>
                                <span>
                                    <amp-img layout="fixed"
                                        src="{{ url('/front-assets') }}/images/icons/ic_keyboard_arrow_down.svg"
                                        width="24" height="24" alt=""></amp-img>
                                </span>
                            </div>
                        </header>
                        <div class="card-body">Get the professional background verification of your workers done in as low as ₹300 only.</div>
                    </section>

                    <section class="card p0 mb1">
                        <header class="card-header md-list">
                            <div class="md-list-item">
                                <amp-img layout="fixed" src="{{ url('/front-assets') }}/images/icons/credit-card.svg"
                                    width="40" height="40" alt=""></amp-img>
                                <p class="px2">Safe &amp; Secure Payment</p>
                                <span>
                                    <amp-img layout="fixed"
                                        src="{{ url('/front-assets') }}/images/icons/ic_keyboard_arrow_down.svg"
                                        width="24" height="24" alt=""></amp-img>
                                </span>
                            </div>
                        </header>
                        <div class="card-body">Every transaction processed at SearchAI goes through the recognised payment gateways like Paytm, PayU & others. Your details are entirely secured & protected against any unauthorised transactions.</div>
                    </section>

                </amp-accordion>
            </div>
        </div>
    </section>


    <div class="divider"></div>


    <section id="about-us">
        <h2 class="text-center m3">SearchAI - India’s Most Trusted Background Verification Partner</h2>
        <div class="container">
            <p class="text-center">
                About Us section description - At SearchAI, we make background verification simple, fast, and reliable. Whether you're a large enterprise, small business, start-up, or individual, our AI-driven screening solutions ensure trust and safety in every interaction. With advanced Artificial Intelligence (AI) and Machine Learning (ML), we deliver accurate, efficient, and fully compliant verification services. Choose SearchAI for seamless, secure, and hassle-free background checks - because building trust should be effortless.
            </p>
            <div class="text-center block m3">
                <a style="border-radius:4px" class="ampstart-btn btn btn-sm btn-outline-primary" href="{{route('aboutus')}}">
                    Read more&nbsp;<i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </section>

    <div class="divider"></div>
    <section style="background:#fff;color:#000;padding:30px 0">
        <div class="container">
            <div class="m-auto" style="max-width:860px">
                <h2 class="text-center mb-3">Frequently Asked Questions</h2>
                <div itemscope itemtype="https://schema.org/FAQPage">
                    <amp-accordion expand-single-section animate disable-session-states>
                        @forelse($faqData as $faq)
                        <section class="faq" itemscope itemprop="mainEntity"
                            itemtype="https://schema.org/Question">
                            <h3 class="faq-qus" itemprop="name">
                                {{ $faq->question }}
                            </h3>
                            <div class="faq-ans" itemscope itemprop="acceptedAnswer"
                                itemtype="https://schema.org/Answer">
                                <p itemprop="text">{!! $faq->answer !!}</p>
                            </div>
                        </section>
                        @empty
                        <section>
                            <h3>No FAQs available at the moment.</h3>
                        </section>
                        @endforelse
                    </amp-accordion>
                </div>
                <br />
            </div>
        </div>
    </section>
    <div class="divider"></div>
    



</main>
@endsection