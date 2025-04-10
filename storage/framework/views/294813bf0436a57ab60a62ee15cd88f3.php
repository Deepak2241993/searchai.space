<?php $__env->startSection('main-body'); ?>
    
    <!-- Start Banner Area 
    ============================================= -->
    <div class="banner-area bg-gray navigation-circle banner-style-four-area zoom-effect overflow-hidden text-light">
      <!-- Slider main container -->
      <div class="banner-style-one-carousel">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">

              <!-- Single Item -->
              <?php $__currentLoopData = $bannerData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="swiper-slide banner-style-four">
                  <div class="banner-thumb bg-cover shadow dark" style="background: url(<?php echo e(url('/front-assets')); ?>/assets/img/img67.jpg);"></div>
                  <div class="container">
                      <div class="row align-center">
                          <div class="col-xl-6 col-lg-7 col-md-10">
                              <div class="content">
                                  <!-- <h4>Meet Consulting</h4> -->
                                  <h2><?php echo $banner->title; ?></h2>
                                  <p>
                                    <?php echo $banner->description; ?>

                                  </p>
                                  <div class="button">
                                      <a class="btn btn-theme btn-md animation" href="#">Apply Now</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="banner-four-shape">
                      <!-- <img src="assets/img/shape/banner-shape.png" alt="Image Not Found"> -->
                  </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <!-- End Single Item -->

              <!-- Single Item -->
              
              <!-- End Single Item -->

          </div>

          <!-- Navigation -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

      </div>        
  </div>
  <!-- End Main -->

  <!-- Start Service Range
  ============================================= -->
  <div class="service-range-area default-padding bg-gray">
      <div class="container">
          <div class="row">
              <div class="col-xl-6 col-lg-5">
                  <h4 class="sub-title">What we offer</h4>
                  <h2 class="title mb-30">Getting started <br>is quick and easy</h2>
                  <p>
                      Whether you are an employer wanting to hire trustworthy workers, a homeowner needing dependable help at home, or a business that needs to check vendors, SearchAPI has the right solution for you. We make it easier to conduct thorough background checks without the usual hassles of time, complexity, or cost.
                  </p>
                  <ul class="list-double mt-40">
                      <li>
                          <h5>Register Yourself</h5>
                          <p>
                              Begin the verification process
                          </p>
                      </li>
                      <li>
                          <h5>Verify Yourself</h5>
                          <p>
                              Complete background checks
                          </p>
                      </li>
                      <li>
                          <h5>Fetch your Documents</h5>
                          <p>
                              Retrieve stored records
                          </p>
                      </li>
                  </ul>
              </div>
              <div class="col-lg-6 offset-lg-1 col-xl-5 offset-xl-1">
                  <div class="seo-progress text-center">

                      <div class="circle-progress">
                          <div class="seo-progressbar">
                              <div class="circle" data-percent="100">
                                  <strong>100%</strong>
                              </div>
                          </div>
                          <h4>Convenient, Easy & Organized</h4>
                      </div>
                      
                      <div class="seo-progess-items">
                          <div class="process-item">
                              <h5>Hassle-free</h5>
                              <p>Quick Turnaround Time</p>
                          </div>
                          <div class="process-item">
                              <h5>Cost-effective</h5>
                              <p>Safe & Secure Payment</p>
                          </div>
                      </div>
                      
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End Service Range -->

  <!-- Start About 
  ============================================= -->
  <!-- <div class="about-style-three-area default-padding overflow-hidden">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 about-style-three">
                  <div class="about-three-thumb">
                      <img src="assets/img/800x800.png" alt="Image Not Found">
                      <img src="assets/img/800x800.png" alt="Image Not Found">
                      <div class="experience">
                          <h2><strong>18</strong> Years Experience</h2>
                      </div>
                      <div class="animated-shape">
                          <img src="assets/img/shape/38.png" alt="Shape">
                      </div>
                  </div>
              </div>
              <div class="col-lg-5 offset-lg-1 about-style-three">
                  <div class="about-three-info">
                      <h4 class="sub-title">About our compnay</h4>
                      <h2 class="title">Working together <br> to deliver value </h2>
                      <p>
                          Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her.
                      </p>
                      <ul class="list-grid-four">
                          <li>Business Growth</li>
                          <li>Business Innovation</li>
                          <li>Market Research</li>
                          <li>New Project Idea</li>
                          <li>Great Skilled Consultant</li>
                          <li>Expert Team Members</li>
                      </ul>
                      <div class="about-author">
                          <div class="thumb">
                              <img src="assets/img/800x800.png" alt="Image Not Found">
                          </div>
                          <div class="info">
                              <h4>James Baker</h4>
                              <span>CEO & Founder</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div> -->
  <!-- End About -->

  
  <!-- Start Services -->
  

  <div class="services-style-three-area bg-dark bg-cover default-padding bottom-less" style="background-image: url(<?php echo e(url('/front-assets')); ?>/assets/img/shape/banner-6.jpg);">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-lg-2">
                  <div class="site-heading text-center">
                      <h5 class="sub-title">Documents You May Need</h5>
                      <h2 class="title">We’re Here to Help</h2>
                  </div>
              </div>
          </div>
      </div>
  
      <div class="container">
          <div class="row">
              <!-- Single Item -->
              <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
                  <div class="services-style-three" style="background-image: url(<?php echo e(url('/front-assets')); ?>/assets/img/shape/banner-3.jpg); min-height: 445px;">
                      <!-- <i class="flaticon-planning"></i> -->
                      <!-- <img src="/assets/img/pic 4.jpg" alt="Aadhar" style="padding-bottom: 15px;"> -->
                      <h4><a href="#">Aadhaar Card</a></h4>
                      <p>
                          A unique identification number issued by the Indian government, linking biometric and demographic data for every resident of India.
                      </p>
                      <a href="#" class="btn-service">Learn More <i class="fas fa-arrow-right"></i></a>
                  </div>
              </div>
              <!-- End Single Item -->
  
              <!-- Single Item -->
              <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
                  <div class="services-style-three" style="background-image: url(<?php echo e(url('/front-assets')); ?>/assets/img/shape/banner-3.jpg);min-height: 445px;">
                      <!-- <i class="flaticon-startup-6"></i> -->
                      <!-- <img src="/assets/img/pic 2.jpg" alt="Aadhar" style="padding-bottom: 15px;"> -->
                      <h4><a href="#">PAN Card</a></h4>
                      <p>
                          A Permanent Account Number used for income tax purposes, essential for financial transactions and opening bank accounts in India.
                      </p>
                      <a href="#" class="btn-service">Learn More <i class="fas fa-arrow-right"></i></a>
                  </div>
              </div>
              <!-- End Single Item -->
  
              <!-- Single Item -->
              <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
                  <div class="services-style-three" style="background-image: url(<?php echo e(url('/front-assets')); ?>/assets/img/shape/banner-3.jpg); min-height: 445px;">
                      <!-- <i class="flaticon-marketing-agent"></i> -->
                      <!-- <img src="/assets/img/pic 3.jpg" alt="dl" style="padding-bottom: 15px;"> -->
                      <h4><a href="#">Driving License</a></h4>
                      <p>
                          An official document permitting an individual to drive a motor vehicle, issued by the regional transport office after a driving test.
                      </p>
                      <a href="#" class="btn-service">Learn More <i class="fas fa-arrow-right"></i></a>
                  </div>
              </div>
              <!-- End Single Item -->
  
              <!-- Single Item -->
              <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
                  <div class="services-style-three" style="background-image: url(<?php echo e(url('/front-assets')); ?>/assets/img/shape/banner-3.jpg);  min-height: 445px;">
                      <!-- <i class="flaticon-secure-1"></i> -->
                      <!-- <img src="/assets/img/pic 1.jpg" alt="rc" style="padding-bottom: 15px;"> -->
                      <h4><a href="#">Registration of Vehicles</a></h4>
                      <p>
                          A legal certificate issued by the RTO proving ownership and authorization to operate a vehicle on Indian roads.
                      </p>
                      <a href="#" class="btn-service">Learn More <i class="fas fa-arrow-right"></i></a>
                  </div>
              </div>
              <!-- End Single Item -->              
          </div>
      </div>
  </div>
  <!-- End Services -->


  

  <!-- <div class="pricing-area pricing-gird default-padding bottom-less">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-lg-2">
                  <div class="site-heading text-center">
                     
                      <h2 class="title">Why SearchAI for Professional Background Verification?</h2>
                      
                  </div>
              </div>
          </div>
      </div>
  </div> -->


  



  <div class="services-details-area default-padding">
      <div class="container">
          <div class="services-details-items">
              <div class="row">
                  <div class="col-12 services-single-content">
                      <div class="faq-style-one service-faq mt-40">
                          
                          <h5 class="mb-30 text-center" style="color: var(--color-primary); text-transform:uppercase;">Smart, Secure & Seamless Verification</h5>
                          <h2 class="mb-30 text-center">Why SearchAI for <br>Professional Background Verification?</h2>
                          <div class="row">
                              <!-- Column 1 -->
                              <?php
                              $chunkedFaqs = $faqData->chunk(ceil(count($faqData) / 2));
                          ?>
                          
                          <?php $__currentLoopData = $chunkedFaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colIndex => $columnFaqs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="col-md-6">
                                  <div class="accordion" id="faqAccordion<?php echo e($colIndex + 1); ?>">
                                      <?php $__currentLoopData = $columnFaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqIndex => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php
                                              $accordionNumber = $faqIndex + 1;
                                              $headingId = 'heading' . $accordionNumber . ($colIndex + 1);
                                              $collapseId = 'collapse' . $accordionNumber . ($colIndex + 1);
                                              $isFirst = $faqIndex == 0;
                                          ?>
                          
                                          <div class="accordion-item">
                                              <h2 class="accordion-header" id="<?php echo e($headingId); ?>">
                                                  <button class="accordion-button <?php if(!$isFirst): ?> collapsed <?php endif; ?>"
                                                          type="button"
                                                          data-bs-toggle="collapse"
                                                          data-bs-target="#<?php echo e($collapseId); ?>"
                                                          aria-expanded="<?php echo e($isFirst ? 'true' : 'false'); ?>"
                                                          aria-controls="<?php echo e($collapseId); ?>">
                                                      <?php echo $faq->question; ?>

                                                  </button>
                                              </h2>
                                              <div id="<?php echo e($collapseId); ?>"
                                                   class="accordion-collapse collapse <?php if($isFirst): ?> show <?php endif; ?>"
                                                   aria-labelledby="<?php echo e($headingId); ?>"
                                                   data-bs-parent="#faqAccordion<?php echo e($colIndex + 1); ?>">
                                                  <div class="accordion-body">
                                                      <p><?php echo $faq->answer; ?></p>
                                                  </div>
                                              </div>
                                          </div>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </div>
                              </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          

                              <!-- End Column 2 -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  


  <!-- Start Pricing 
  ============================================= -->
  <div class="pricing-area pricing-gird default-padding bottom-less">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-lg-2">
                  <div class="site-heading text-center">
                      <!-- <h5 class="sub-title">Service we're offering</h5> -->
                      <h2 class="title">Yearly Plans & Pricing</h2>
                      <p>Choose the perfect plan with secure storage, unlimited support, email integration, and seamless downloads.</p>
                  </div>
              </div>
          </div>
      </div>

      <div class="container">
          <div class="pricing-style-two-items">
              <div class="row">
                  <!-- Single Itme -->
                  <div class="col-xl-4 col-md-6 mb-30">
                      <div class="pricing-style-two">
                          <div class="pricing-header">
                              <h4>HATCHLING PLAN</h4>
                              <!-- <p>
                                  
                              </p> -->
                          </div>
                          <div class="pricing-content">
                              <div class="price">
                                  <h2><sup>$</sup>29 <sub>/ Monthly</sub></h2>
                              </div>
                              <ul>
                                  <li><i class="fas fa-check-circle"></i> Unlimited Support</li>
                                  <li><i class="fas fa-check-circle"></i> 5GB Server Space</li>
                                  <li><i class="fas fa-times-circle"></i> 2 Users per Project</li>
                                  <li><i class="fas fa-times-circle"></i> Email Integration</li>
                                  <li><i class="fas fa-times-circle"></i> Unlimited Download</li>
                              </ul>
                              <a class="btn mt-30 btn-sm btn-dark effect" href="#">Select Plan</a>
                          </div>
                      </div>
                  </div>
                  <!-- End Single Itme -->

                  <!-- Single Itme -->
                  <div class="col-xl-4 col-md-6 mb-30">
                      <div class="pricing-style-two active">
                          <div class="pricing-header">
                              <h4>BABY PLAN</h4>
                              <!-- <p>
                                  Increased processing power with multiple sites, storage.
                              </p> -->
                          </div>
                          <div class="pricing-content">
                              <div class="price">
                                  <h2><sup>$</sup>69 <sub>/ Monthly</sub></h2>
                              </div>
                              <ul>
                                  <li><i class="fas fa-check-circle"></i> Unlimited Support</li>
                                  <li><i class="fas fa-check-circle"></i> 10GB Server Space</li>
                                  <li><i class="fas fa-check-circle"></i> 5 Users per Project</li>
                                  <li><i class="fas fa-check-circle"></i> Email Integration</li>
                                  <li><i class="fas fa-check-circle"></i> Unlimited Download</li>
                              </ul>
                              <a class="btn mt-30 btn-sm btn-light effect" href="#">Select Plan</a>
                          </div>
                      </div>
                  </div>
                  <!-- End Single Itme -->

                  <!-- Single Itme -->
                  <div class="col-xl-4 col-md-6 mb-30">
                      <div class="pricing-style-two">
                          <div class="pricing-header">
                              <h4>PREMIUM PLAN</h4>
                              <!-- <p>
                                  Target is processing power with multiple sites, storage.
                              </p> -->
                          </div>
                          <div class="pricing-content">
                              <div class="price">
                                  <h2><sup>$</sup>99 <sub>/ Monthly</sub></h2>
                              </div>
                              <ul>
                                  <li><i class="fas fa-check-circle"></i> Unlimited Support</li>
                                  <li><i class="fas fa-check-circle"></i> 25GB Server Space</li>
                                  <li><i class="fas fa-check-circle"></i> 10 Users per Project</li>
                                  <li><i class="fas fa-check-circle"></i> Email Integration</li>
                                  <li><i class="fas fa-times-circle"></i> Unlimited Download</li>
                              </ul>
                              <a class="btn mt-30 btn-sm btn-dark animation" href="#">Select Plan</a>
                          </div>
                      </div>
                  </div>
                  <!-- End Single Itme -->

              </div>
          </div>
      </div>
  </div>
  <!-- End Pricing -->



  <div class="project-deal-area text-center default-padding bg-gray">
      <div class="deal-illustration">
          <img src="<?php echo e(url('/front-assets')); ?>/assets/img/illustration/8.png" alt="Image Not Found">
      </div>
      <div class="arrow-illustration">
          <img src="<?php echo e(url('/front-assets')); ?>/assets/img/illustration/9.png" alt="Image Not Found">
      </div>
      <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-lg-2">
                  <div class="project-deal">
                      <h2 class="title">Stay updated with our latest news!</h2>
                      <p>Subscribe to our newsletter for exclusive updates, insights, and offers. Enter your email below and never miss an update from us!</p>
                      <form class="newsletter-form mt-30" action="#" method="post">
                          <div class="input-group">
                              <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                              <button type="submit" class="btn btn-md btn-gradient animation">Subscribe</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>



  <!-- Start Case Studies 
============================================= -->
<!-- <div class="case-studies-area default-padding" style="background-image: url(assets/img/shape/30.png);">
  <div class="container">
      <div class="heading-left">
          <div class="row">
              <div class="col-xl-5 col-lg-6">
                  <div class="content-left">
                      <h5 class="sub-title">SearchAI </h5>
                      <h2 class="heading">India’s Most Trusted Background Verification Partner</h2>
                  </div>
              </div>
          </div>
      </div>

      <div class="case-style-two mt-4">
          <div class="row">
              <div class="col-xl-6">
                  <div class="case-thumb">
                      <img src="assets/img/1500x1000.png" alt="Image Not Found">
                  </div>
              </div>
              <div class="col-xl-6">
                  <div class="info text-light" style="background-image: url(assets/img/shape/banner-3.webp);">
                      <p>
                          About Us section description - At SearchAI, we make background verification simple, fast, and reliable. Whether you're a large enterprise, small business, start-up, or individual, our AI-driven screening solutions ensure trust and safety in every interaction. With advanced Artificial Intelligence (AI) and Machine Learning (ML), we deliver accurate, efficient, and fully compliant verification services. Choose SearchAI for seamless, secure, and hassle-free background checks - because building trust should be effortless.
                      </p>
                      <a class="btn btn-md btn-dark animation" href="#">Read More</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div> -->
<!-- End Case Studies -->


<div class="case-studies-area default-padding" style="background-image: url(<?php echo e(url('/front-assets')); ?>/assets/img/shape/30.png);">
  <div class="container text-center py-5">
      <div class="row justify-content-center">
          <div class="col-lg-10 col-xl-8">
              <h5 class="sub-title text-dark">SearchAI</h5>
              <h2 class="heading text-dark">India’s Most Trusted Background Verification Partner</h2>
              <p class="text-dark mt-4">
                  At SearchAI, we make background verification simple, fast, and reliable. Whether you're a large enterprise, small business, start-up, or individual, our AI-driven screening solutions ensure trust and safety in every interaction. With advanced Artificial Intelligence (AI) and Machine Learning (ML), we deliver accurate, efficient, and fully compliant verification services. Choose SearchAI for seamless, secure, and hassle-free background checks - because building trust should be effortless.
              </p>
              <a class="btn btn-md btn-dark mt-4" href="#">Read More</a>
          </div>
      </div>
  </div>
</div>

  
  <!-- Start Why Choose Us 
  ============================================= -->
  <!-- <div class="choose-us-style-three-area default-padding bg-dark text-light">
      <div class="container">
          <div class="row">
              <div class="col-lg-5">
                  <div class="video-thumb mb-30">
                      <img src="assets/img/1500x700.png" alt="Image Not Found">
                  </div>
                  <ul class="list-info-item">
                      <li>
                          <h4><a href="services-details.html">Digital Solution <i class="fas fa-angle-right"></i></a></h4>
                      </li>
                      <li>
                          <h4><a href="services-details.html">Strategy <i class="fas fa-angle-right"></i></a></h4>
                      </li>
                      <li>
                          <h4><a href="services-details.html">Branding <i class="fas fa-angle-right"></i></a></h4>
                      </li>
                  </ul>
              </div>
              <div class="col-lg-6 offset-lg-1 mt-md-50 mt-xs-50">
                  <div class="choose-us-syle-three">
                      <h4 class="sub-title">Our Value</h4>
                      <h2 class="title">We Assist our clients in achieving their business </h2>
                      <div class="skill-items mt-40">
                          
                          <div class="progress-box">
                              <h5>Business Idea</h5>
                              <div class="progress">
                                  <div class="progress-bar" role="progressbar" data-width="88">
                                       <span>88%</span>
                                  </div>
                              </div>
                          </div>
                          <div class="progress-box">
                              <h5>Soluttion service</h5>
                              <div class="progress">
                                  <div class="progress-bar" role="progressbar" data-width="67">
                                      <span>67%</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div> -->
  <!-- End Why Choose us  -->

  <!-- Start Contact Us 
  ============================================= -->
  <div class="contact-area overflow-hidden default-padding" style="background-image: url(<?php echo e(url('/front-assets')); ?>/assets/img/shape/map.png);">
      <div class="shape-right-bottom">
          <img src="<?php echo e(url('/front-assets')); ?>/assets/img/shape/18.png" alt="Shape">
      </div>
      <div class="container">
          <div class="row align-center">
              <div class="col-tact-stye-one col-lg-5">
                  <div class="contact-style-one-info">
                      <div class="mb-40">
                          <h2>Contact Information</h2>
                          <!-- <p>
                              Plan upon yet way get cold spot its week. <br> Almost do am or limits hearts. Resolve parties.
                          </p> -->
                      </div>
                      <ul class="contact-address">
                          <li class="wow fadeInUp">
                              <div class="content">
                                  <h4 class="title">Phone</h4>
                                  <a href="tel:+919355093937">+91 9355093937</a>
                              </div>
                          </li>
                          <li class="wow fadeInUp" data-wow-delay="300ms">
                              <div class="info">
                                  <h4 class="title">Location</h4>
                                  <p>
                                      A 24/5, Mohan Cooperative Industrial Area, Badarpur, Secound Floor, New Delhi 110044
                                  </p>
                              </div>
                          </li>
                          <li class="wow fadeInUp" data-wow-delay="500ms">
                              <div class="info">
                                  <h4 class="title">Official Email</h4>
                                  <a href="mailto:info@digital.com.com">care@searchai.com</a>
                              </div>
                          </li>
                          <li class="wow fadeInUp" data-wow-delay="700ms">
                              <div class="info">
                                  <h4 class="title">Follow Us</h4>
                                  <ul class="social-link">
                                      <li>
                                          <a class="facebook" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                      </li>
                                      <li>
                                          <a class="twitter" href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                      </li>
                                      <li>
                                          <a class="pinterest" href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                      </li>
                                      <li>
                                          <a class="linkedin" href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                      </li>
                                  </ul>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col-tact-stye-one col-lg-6 offset-lg-1">
                  <div class="contact-form-style-one">
                      <h4 class="sub-title">Have Questions?</h4>
                      <h2 class="title">Send us a Massage</h2>
                      <form action="<?php echo e(url('/front-assets')); ?>/assets/mail/contact.php" method="POST" class="contact-form contact-form">
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group">
                                      <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
                                      <span class="alert-error"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="form-group comments">
                                      <textarea class="form-control" id="comments" name="comments" placeholder="Tell Us About Project *"></textarea>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <button type="submit" name="submit" id="submit">
                                      <i class="fa fa-paper-plane"></i> Get in Touch
                                  </button>
                              </div>
                          </div>
                          <!-- Alert Message -->
                          <div class="col-lg-12 alert-notification">
                              <div id="message" class="alert-msg"></div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End Contact -->

  <!-- Start Blog 
  ============================================= -->
  <!-- <div class="blog-area home-blog default-padding bg-gray bottom-less">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-lg-2">
                  <div class="site-heading text-center">
                      <h5 class="sub-title">News & Events</h5>
                      <h2 class="title">Check out our blog posts </h2>
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="row">
              <div class="col-xl-4 col-md-6 mb-30">
                  <div class="blog-style-one">
                      <div class="relative">
                          <div class="thumb">
                              <a href="blog-single-with-sidebar.html"><img src="assets/img/800x600.png" alt="Image Not Found"></a>
                          </div>
                          <div class="tags">
                              <a href="#">Marketing</a>
                          </div>
                      </div>
                      <div class="info">
                          <div class="meta">
                              <ul>
                                  <li>
                                      <a href="#">Md Sohag</a>
                                  </li>
                                  <li>
                                      25 April, 2023
                                  </li>
                              </ul>
                          </div>
                          <h3 class="post-title"><a href="blog-single-with-sidebar.html">Miscovery incommode earnestly commanded if.</a></h3>
                          <a href="blog-single-with-sidebar.html" class="button-regular">
                              Continue Reading <i class="fas fa-arrow-right"></i>
                          </a>
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 col-md-6 mb-30">
                  <div class="blog-style-one">
                      <div class="relative">
                          <div class="thumb">
                              <a href="blog-single-with-sidebar.html"><img src="assets/img/800x600.png" alt="Image Not Found"></a>
                          </div>
                          <div class="tags">
                              <a href="#">Agency</a>
                          </div>
                      </div>
                      <div class="info">
                          <div class="meta">
                              <ul>
                                  <li>
                                      <a href="#">Md Sohag</a>
                                  </li>
                                  <li>
                                      25 April, 2023
                                  </li>
                              </ul>
                          </div>
                          <h3 class="post-title"><a href="blog-single-with-sidebar.html">Expression acceptance imprudence particular</a></h3>
                          <a href="blog-single-with-sidebar.html" class="button-regular">
                              Continue Reading <i class="fas fa-arrow-right"></i>
                          </a>
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 col-md-6 mb-30">
                  <div class="blog-style-one">
                      <div class="relative">
                          <div class="thumb">
                              <a href="blog-single-with-sidebar.html"><img src="assets/img/800x600.png" alt="Image Not Found"></a>
                          </div>
                          <div class="tags">
                              <a href="#">Business</a>
                          </div>
                      </div>
                      <div class="info">
                          <div class="meta">
                              <ul>
                                  <li>
                                      <a href="#">Md Sohag</a>
                                  </li>
                                  <li>
                                      25 April, 2023
                                  </li>
                              </ul>
                          </div>
                          <h3 class="post-title"><a href="blog-single-with-sidebar.html">Considered imprudence of technical friendship.</a></h3>
                          <a href="blog-single-with-sidebar.html" class="button-regular">
                              Continue Reading <i class="fas fa-arrow-right"></i>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div> -->
  <!-- End Blog -->


  <?php $__env->stopSection(); ?>
















































<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\searchai.space\resources\views/frontend/home.blade.php ENDPATH**/ ?>