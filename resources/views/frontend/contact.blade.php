@extends('frontend.layouts.landing')

@section('content')
<div class="main-body">
    <!-- Start Header banner -->
    <section class="banner-header-section">			
        <div class="row">
            <div class="col-12">
                <div class="page-thumbnails">
                    <img src="{{ asset('assets/frontend/images/banner/contact-us.jpg') }}" class="" alt="About Banner">
                    <div class="black-overlay"></div>
                    <div class="banner-header-content">
                        <h1 class="page-title">
                            Contact Us
                        </h1>
                        <ul class="breadcrumb fadeInUp animated">
                            <li class="crumb cl"><a class="color-white" href="home.html">Home</a></li>
                            <li class="crumb"><a class="color-white" href="javascript:void(0)">Pages</a></li>
                            <li class="crumb current color-yellow"> Contact Us</li>							
                        </ul>
                    </div>
                </div>
            </div>
        </div>			
    </section>
    <!-- End Header banner -->
    <!-- Single content start -->
    <section class="blog-sidebar-page section-p-100">
        <div class="container">
            <div class="row left-sidebar-res">					
                <div class="col-12 col-md-6">
                    <h2 class="color-blue">Wakil Law Office</h2>
                    <img class="mt-10 mb-20 img-100 shape-image" src="{{ asset('assets/frontend/images/home/Shape.png') }}" alt="Shape">
                    <p class="color-dark-blue mb-40">Lawyers are involved in many of the largest and most complex transactions in the region. Renowned for the quality of work of the lawyers, our team provide best legal advice.</p>
                    <div class="contact-information">
                        <div class="d-flex mb-40">
                            <div class="img-calls">
                                <img class="" src="{{ asset('assets/frontend/images/contact/Icon-1.png') }}" alt="Icon">
                            </div>
                            <div class="calls">
                                <p><a href="tel:+01234568899">+01 234 567 8899</a></p>
                                <p><a href="tel:+015678912233">+01 567 891 2233</a></p>
                            </div>
                        </div>
                        <div class="d-flex mb-40">
                            <div class="img-calls">
                                <img class="" src="{{ asset('assets/frontend/images/contact/Icon-2.png') }}" alt="Icon">
                            </div>
                            <div class="calls">
                                <p><a href="mailto::contact@wakil.com">contact@wakil.com</a></p>
                                <p><a href="mailto:hello@wakil.com">hello@wakil.com</a></p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="img-calls">
                                <img class="" src="{{ asset('assets/frontend/images/contact/Icon-3.png') }}" alt="Icon">
                            </div>
                            <div class="calls">
                                <p class="color-dark-blue">27 Division St. California, <br>USA 10002</p>
                            </div>
                        </div>
                    </div>
                </div>	
                <div class="col-12 col-md-6 mt-60-rs">
                    <h2 class="color-blue">Have Any Questions?</h2>
                    <img class="mt-10 mb-20 img-100 shape-image" src="{{ asset('assets/frontend/images/home/Shape.png') }}" alt="Shape">
                    <p class="color-dark-blue mb-40">With extensive experience we advise top national and international companies.</p>
                    <div class="comment-form-wrapper">
                        <div class="form-contact">
                            <form class="text-left comment-form">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="input-block">
                                            <input type="text" class="form-control floating-placeholder" placeholder="Your Name*" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-block">
                                            <input type="email" class="form-control floating-placeholder" placeholder="Your Email*" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-block">
                                            <input type="text" class="form-control floating-placeholder" placeholder="Subject*" required>
                                        </div>
                                    </div>										
                                    <div class="col-12">
                                        <div class="input-block">
                                            <textarea class="form-control floating-placeholder" rows="3" placeholder="Your Comment*" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 form-button mobile-align case-mt ">
                                        <div class="send-btn button-wrap-case1">
                                            <a href="javascript:void(0);" class="button-wrap button-wrap-case">
                                                <span>
                                                    Send <i class="ri-arrow-right-line"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>							    
                        </div>
                    </div>
                </div>				
            </div>
        </div>	
    </section>
    <!-- Single content end -->
    <!-- Map Section Start -->
    <section class="map section-pb-100">
        <h2 class="d-none">none</h2>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <iframe class="contact-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2430.772361294354!2d144.9613505992228!3d-37.8059320643455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1692267421167!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- Map Section End -->		
    <!-- Footer top Start  -->
    <section class="footer-top footer-top-v2 section-p-100 text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="newsletter-footer highlight container-970 m-auto">
                        <h2 class="mb-40 color-white">Ready to Assist You in <span class="underline">Resolving Any Legal Issues</span> You May Have.</h2>
                        <p class="mb-40">We feel compelled to break the typical lawyer-client relationship. We endeavor to be friendly and reachable, and to keep in touch with our clients.</p>
                        <div class="in-top button-whole-wrap">
                            <a href="contact.html" class="button-wrap">
                                <span>
                                    Book Appointment <i class="ri-arrow-right-line"></i>
                                </span>
                            </a>
                        </div>				
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer top End  -->	
</div>
@endsection