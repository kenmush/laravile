@extends('layouts.web')

@section('content')
<!-- Start Hero -->

<div class="home-hero m-0">
    {{-- <div class="hero-cover"></div> --}}

    <div class="svg position-relative">

        <img src="http://127.0.0.1:8000/frontend/assets/images/home-hero-bg.svg" alt="" class="bg-home">

        <div class="inner-home position-absolute d-flex w-100 h-100">
            <div class="m-auto container p-0 pt-5">
                <div class="row pt-3">
                    <div class="col-md-6 py-5 pl-4 pr-5">
                        <div class="py-3 d-flex flex-wrap h-100 pr-md-4 pt-4">
                            <h1 class="text-white mb-0 text-hero hero-heading animated fadeIn delay-0.5s">Make coverage
                                reports, faster.</h1>
                            <hr class="hero-divider my-3">
                            <p class="hero-lead mb-auto mt-3">
                                The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk
                            </p>
                            <div class="mt-5 w-100">
                                <form class="subscribe_form mb-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control newsletter-hero-input" name="email"
                                            placeholder="Enter your email">
                                        <span class="input-group-btn">
                                            <button class="btn btn-get-started newsletter-hero-btn" type="button">Start
                                                free trial</button>
                                        </span>
                                    </div>
                                </form>
                                <p class="w-100 mb-0 text-sm-i ml-4 mt-1 ">Free trial, no commitment, no credit card
                                    required.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 px-4 pt-3 pb-5">
                        <div class="py-4 pl-md-3">
                            <img src="{{asset('/frontend/assets/images/home-hero-img.png')}}" alt=""
                                class="img-fluid img-hero-home">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <img src="{{asset('frontend/assets/images/home-hero-bg.svg')}}" alt="" class="hero-cover"> --}}

</div>
<!-- End Hero Section -->
<!-- About Us Section -->
<section id="about" class="position-relative d-flex p-100">
    <div class="container position-relative m-auto">
        <div class="row">
            <div class="col-md-6 my-auto pr-5">
                <p class="entry-heading mb-0">Know more</p>
                <h2 class="purple-gradient-heading mb-0">About Us</h2>
                <p class="mb-0 pt-52">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et
                    dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                    rebum. Stet
                    clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit
                    amet.</p>
                <div class="pt-59">
                    <a class="home-cta-button my-0" type="button" href="#">Learn More</a>
                </div>

            </div>
            <div class="col-md-6 px-0">
                <img src="{{asset('/frontend/assets/images/home-about-img.png')}}" alt=""
                    class="img-fluid position-absolute about-img">
            </div>
        </div>
    </div>
    <img src="{{asset('/frontend/assets/images/home-about-overlay.svg')}}" alt="" class="home-about-fig">
</section>

<!-- About Us End -->

<!-- Features Start -->
<section id="feature" class=" home-features p-80 pb-0 position-relative">
    <img src="{{asset('/frontend/assets/images/wavy-lines-home.svg')}}" alt="" class="wavy-line-home">
    <div class="container">
        <div class="row">
            <div class="col-md-6 my-auto pr-md-5">
                <img src="{{asset('/frontend/assets/images/home-feature-1.png')}}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 my-auto pl-md-5">
                <h2 class="features-heading mb-0">Lorem ipsum dolor sit amet.</h2>
                <p class="py-4 mb-0 pt-52">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                    tempor invidunt ut labore et
                    dolore magna aliquyam erat, sed diam voluptua. At vero </p>
                <div class="row mb-0">
                    <div class="col-6 my-auto">
                        <ul class="feature-ul mb-0">
                            <li>The quick, brown</li>
                            <li>fox jumps over a</li>
                            <li>lazy dog. DJs flock</li>
                        </ul>
                    </div>
                    <div class="col-6 my-auto">
                        <ul class="feature-ul">
                            <li>The quick, brown</li>
                            <li>fox jumps over a</li>
                            <li>lazy dog. DJs flock</li>
                        </ul>
                    </div>
                </div>
                <div class="pt-59">
                    <a class="home-cta-button my-0" type="button" href="#">Start Free Trial</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-features position-relative">
    <img src="{{asset('/frontend/assets/images/wavy-lines-home.svg')}}" alt="" class="wavy-line-left">
    <div class="container pb-0">
        <div class="row feature-2-sec">
            <div class="col-md-6 my-auto pr-md-5">
                <h2 class="features-heading mb-0">Lorem ipsum dolor sit amet.</h2>
                <p class="pt-52">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                    invidunt ut labore et
                    dolore magna aliquyam erat, sed diam voluptua. At vero </p>
                <div class="row">
                    <div class="col-6 my-auto">
                        <ul class="feature-ul mb-0">
                            <li>The quick, brown</li>
                            <li>fox jumps over a</li>
                            <li>lazy dog. DJs flock</li>
                        </ul>
                    </div>
                    <div class="col-6 my-auto">
                        <ul class="feature-ul mb-0">
                            <li>The quick, brown</li>
                            <li>fox jumps over a</li>
                            <li>lazy dog. DJs flock</li>
                        </ul>
                    </div>
                </div>
                <div class="pt-59">
                    <a class="home-cta-button" type="button" href="#">Start Free Trial</a>
                </div>

            </div>
            <div class="col-md-6 my-auto">
                <img src="{{asset('/frontend/assets/images/home-feature-1.png')}}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    <img src="{{asset('/frontend/assets/images/features-end-fig.svg')}}" alt="" class="features-end-fig">
</section>


<!-- End Features -->

<!-- Start Pricing -->
<section id="pricing">
    <div class="container p-100">
        <div class="row pricing-home">
            <div class="col-12">
                <h2 class="features-heading text-center">Plans and Prices</h2>
                <p class=" text-center mt-4">he quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz
                    prog.
                    Junk MTV quiz graced by fox whelps. Bawds jog, he quick, brown fox jumps over a lazy dog. DJs flock
                    by when MTV
                    ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, </p>
            </div>
            <div class="container mb-5">
                <div class="row pt-5">
                    <div class="col-md-3 my-auto">
                        <img src="{{asset('/frontend/assets/images/gurantee-seal.svg')}}" alt=""
                            class="img-fluid w-100">
                    </div>
                    <div class="col-md-3 my-auto">
                        <div
                            class=" pb-5 pt-5 pl-4 pr-4 align-top shadow  pricing-card home-pricing-card text-center gold-package align-top card">
                            <h4 class="text-white package-title">BRONZE</h4>
                            <div class="price">
                                <span class="dollar">$99</span>
                                <span class="slash">/ month</span>
                            </div>
                            <p class=" pt-4">
                                <a href="#" class="btn pricing-buy-btn ">get this plan</a></p>
                            <a href="#" class="pt-3 home-pack-learn-more">Learn more about this plan</a>
                        </div>
                    </div>
                    <div class="col-md-3 my-auto">
                        <div
                            class=" pb-5 pt-5 pl-4 pr-4 align-top shadow pricing-card home-pricing-card text-center silver-package align-top card">
                            <h4 class="text-white package-title">SILVER</h4>
                            <div class="price">
                                <span class="dollar">$199</span>
                                <span class="slash">/ month</span>
                            </div>
                            <p class=" pt-4">
                                <a href="#" class="btn pricing-buy-btn ">get this plan</a></p>
                            <a href="#" class="pt-3 home-pack-learn-more">Learn more about this plan</a>
                        </div>
                    </div>
                    <div class="col-md-3 my-auto">
                        <div
                            class=" pb-5 pt-5 pl-4 pr-4 align-top shadow pricing-card home-pricing-card text-center gold-package align-top card">
                            <h4 class="text-white package-title">GOLD</h4>
                            <div class="price">
                                <span class="dollar">$499</span>
                                <span class="slash">/ month</span>
                            </div>
                            <p class=" pt-4">
                                <a href="#" class="btn pricing-buy-btn ">get this plan</a></p>
                            <a href="#" class="pt-3 home-pack-learn-more">Learn more about this plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- End Pricing -->

<!-- Start Book a Demo -->
<section id="demo" class="book-a-demo">
    <div class="container py-3 px-3 pb-5">
        <div class="row my-4">
            <div class="col-md-6 my-auto pr-md-5">
                <h2 class="book-a-demo-heading pt-5 mb-0">Book a demo</h2>
                <p class="book-a-demo-tail m-0 pt-49 pr-md-5">Do you have questions about pricing or want a custom demo? We’d
                    love to
                    help.
                </p>
                <div class="pt-49 ">
                    <a class="home-cta-button pt-3" type="button" href="#">Book a demo</a>
                </div>
            </div>
            <div class="col-md-6 my-auto">
                <img src="{{asset('/frontend/assets/images/book-a-demo-img.png')}}" alt=""
                    class="img-fluid my-auto book-a-demo-img">
            </div>
        </div>
    </div>
</section>


<!-- End Book a Demo -->

<!-- Start Testimonials -->
<!-- TESTIMONIALS -->
<section class="faq position-relative">
    <div class="container p-100">
        <div class="row pb-4 testimonials-section text-center">
            <div class="col-12 my-auto">
                <h2 class="testimonials-heading pb-3 mb-0">Testimonials</h2>
            </div>
        </div>
        <div class="row  pb-4 testimonials-section">
            <div class="col-md-12">
                <div class="swiper-container swiper-testimonial">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="review-box">
                                <div class="text-center">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                </div>
                                <p class="read">
                                    It has survived not only five centuries, but also the leap into electronic
                                    typesetting,
                                    remaining essentially unchanged. It was popularised in the 1960s with the race.
                                </p>
                                <img class="quote img-fluid pb-2" src="{{asset('/frontend/assets/images/quote.svg')}}"
                                    alt="">

                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-box">
                                <div class="text-center">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                </div>
                                <p class="read">
                                    It has survived not only five centuries, but also the leap into electronic
                                    typesetting,
                                    remaining essentially unchanged. It was popularised in the 1960s with the race.
                                </p>
                                <img class="quote img-fluid pb-2" src="{{asset('/frontend/assets/images/quote.svg')}}"
                                    alt="">

                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-box">
                                <div class="text-center">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                </div>
                                <p class="read">
                                    It has survived not only five centuries, but also the leap into electronic
                                    typesetting,
                                    remaining essentially unchanged. It was popularised in the 1960s with the race.
                                </p>
                                <img class="quote img-fluid pb-2" src="{{asset('/frontend/assets/images/quote.svg')}}"
                                    alt="">

                            </div>
                        </div>
                    </div>
                    <!-- Add Arrows -->

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>


    <img src="{{asset('/frontend/assets/images/faq-figure-end.svg')}}" alt="" class="imgfluid faq-fig">

</section>

<!-- End  -->
@endsection
