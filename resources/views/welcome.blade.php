@extends('layouts.web')

@section('content')
<!-- Start Hero -->

<div class="home-hero m-0 d-flex ">
  {{-- <div class="hero-cover"></div> --}}
  <div class="svg">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1920.224" height="1081"
    viewBox="0 0 1920.224 1081">
    <defs>
        <style>
            .a,
            .f {
                fill: #fff;
            }

            .a {
                stroke: #707070;
            }

            .b {
                fill: #2a3d68;
            }

            .c {
                clip-path: url(#a);
            }

            .d {
                fill: url(#b);
            }

            .e {
                fill: url(#c);
            }

            .g {
                fill: #00588f;
                opacity: 0.1;
            }

            .h {
                fill: url(#f);
            }

            .i {
                fill: url(#h);
            }

        </style>
        <clipPath id="a">
            <rect class="a" width="1920" height="1080" />
        </clipPath>
        <linearGradient id="b" x1="0.403" y1="0.685" x2="0.724" y2="0.297" gradientUnits="objectBoundingBox">
            <stop offset="0" stop-color="#5922f2" />
            <stop offset="1" stop-color="#b125f2" />
        </linearGradient>
        <linearGradient id="c" x1="0.169" y1="0.808" x2="0.75" y2="0.369" gradientUnits="objectBoundingBox">
            <stop offset="0" stop-color="#f7ae00" />
            <stop offset="1" stop-color="#ea4c6c" />
        </linearGradient>
        <linearGradient id="f" x1="1.183" y1="-0.2" x2="0" y2="1.069" xlink:href="#c" />
        <linearGradient id="h" x1="-0.873" y1="1.914" x2="0.406" y2="-0.889" xlink:href="#b" />
    </defs>
    <g transform="translate(0.224)">
        <rect class="b" width="1920" height="1080" />
        <g class="c" transform="translate(0 1)">
            <g transform="translate(208 169.94)">
                <path class="d"
                    d="M0,836.749c425.618-11.786,292.877-328.059,609.52-241.331S678.588,244.27,976.459,301.961,955.7-26.291,1340.853,1.427,1561.225,638.37,1561.225,638.37L1398.2,836.749Z"
                    transform="matrix(0.995, -0.105, 0.105, 0.995, 348, 184.38)" />
                <path class="e"
                    d="M0,836.749C425.618,824.963,292.877,508.69,609.52,595.418S678.588,244.27,976.459,301.961,955.7-26.291,1340.853,1.427,1561.225,638.37,1561.225,638.37L1398.2,836.749Z"
                    transform="matrix(0.996, -0.087, 0.087, 0.996, 410.202, 139.123)" />
                <path class="f"
                    d="M-19779.205-4322.847c425.619-11.786,292.879-328.06,609.521-241.332s69.068-351.148,366.938-293.456-20.754-328.253,364.395-300.535,220.371,636.943,220.371,636.943l-163.02,198.38Z"
                    transform="translate(20237.449 5234.874)" />
            </g>
            <g transform="translate(-519 -328.06)">
                <path class="d"
                    d="M0,836.749C425.618,824.964,292.877,508.69,609.52,595.418S678.589,244.27,976.459,301.962,955.7-26.291,1340.853,1.428s220.372,636.943,220.372,636.943L1398.2,836.75Z"
                    transform="translate(1725.315 832.166) rotate(174)" />
                <path class="e"
                    d="M0,836.75c425.618-11.786,292.877-328.06,609.52-241.332S678.588,244.27,976.459,301.961,955.7-26.291,1340.853,1.427,1561.225,638.37,1561.225,638.37L1398.2,836.749Z"
                    transform="translate(1663.113 877.423) rotate(175)" />
                <path class="f"
                    d="M-18182.945-5159.6c-425.619,11.786-292.879,328.06-609.521,241.332s-69.068,351.148-366.937,293.456,20.754,328.253-364.395,300.535-220.371-636.943-220.371-636.943l163.02-198.38Z"
                    transform="translate(19798.016 5264.116)" />
            </g>
        </g>
        <path class="g"
            d="M2600.782,263.364a10.649,10.649,0,0,1,0,21.3h-39.925a10.649,10.649,0,0,1,0-21.3h39.925m0-14h-39.925a24.649,24.649,0,0,0-24.649,24.649h0a24.649,24.649,0,0,0,24.649,24.65h39.925a24.649,24.649,0,0,0,24.649-24.65h0a24.649,24.649,0,0,0-24.649-24.649Z"
            transform="translate(-2447.432 -49.364)" />
        <path class="h"
            d="M2600.782,263.364a10.649,10.649,0,0,1,0,21.3h-39.925a10.649,10.649,0,0,1,0-21.3h39.925m0-14h-39.925a24.649,24.649,0,0,0-24.649,24.649h0a24.649,24.649,0,0,0,24.649,24.65h39.925a24.649,24.649,0,0,0,24.649-24.65h0a24.649,24.649,0,0,0-24.649-24.649Z"
            transform="translate(-2536.432 466.636)" />
        <path class="h"
            d="M2600.782,263.364a10.649,10.649,0,0,1,0,21.3h-39.925a10.649,10.649,0,0,1,0-21.3h39.925m0-14h-39.925a24.649,24.649,0,0,0-24.649,24.649h0a24.649,24.649,0,0,0,24.649,24.65h39.925a24.649,24.649,0,0,0,24.649-24.65h0a24.649,24.649,0,0,0-24.649-24.649Z"
            transform="translate(-1620.432 -49.364)" />
        <path class="i"
            d="M2600.782,263.364a10.649,10.649,0,0,1,0,21.3h-39.925a10.649,10.649,0,0,1,0-21.3h39.925m0-14h-39.925a24.649,24.649,0,0,0-24.649,24.649h0a24.649,24.649,0,0,0,24.649,24.65h39.925a24.649,24.649,0,0,0,24.649-24.65h0a24.649,24.649,0,0,0-24.649-24.649Z"
            transform="translate(-2312.432 643.636)" />
        <path class="h"
            d="M2600.782,263.364a10.649,10.649,0,0,1,0,21.3h-39.925a10.649,10.649,0,0,1,0-21.3h39.925m0-14h-39.925a24.649,24.649,0,0,0-24.649,24.649h0a24.649,24.649,0,0,0,24.649,24.65h39.925a24.649,24.649,0,0,0,24.649-24.65h0a24.649,24.649,0,0,0-24.649-24.649Z"
            transform="translate(-816.432 491.636)" />
    </g>
    </svg>
  </div>
{{-- <img src="{{asset('frontend/assets/images/home-hero-bg.svg')}}" alt="" class="hero-cover"> --}}
  <div class="my-auto container p-0 pt-5r">
    <div class="row">
      <div class="col-md-6 py-5 pl-4 pr-5">
        <div class="py-4 d-flex flex-wrap h-100 pr-md-4">
        <h1 class="text-white mb-0 text-hero hero-heading animated fadeIn delay-0.5s">Make coverage reports, faster.</h1>
        <hr class="hero-divider my-3">
        <p class="hero-lead mb-auto">
          The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk
        </p>
        <div class="mt-5 w-100">
            <form class="subscribe_form mb-0">
            <div class="input-group">
                <input type="text" class="form-control newsletter-hero-input" name="email" placeholder="Enter your email">
                <span class="input-group-btn">
                <button class="btn btn-get-started newsletter-hero-btn" type="button">Start free trial</button>
                </span>
            </div>
            </form>
            <p class="w-100 mb-0 text-sm-i ml-4 mt-1 ">Free trial, no commitment, no credit card required.</p>
        </div>
    </div>
    </div>
      <div class="col-md-6 px-4 pt-2 pb-5">
        <div class="py-4 pl-md-3">
            <img src="{{asset('/frontend/assets/images/home-hero-img.png')}}" alt="" class="img-fluid img-hero-home">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Hero Section -->
<!-- About Us Section -->
<section id="about" class="position-relative d-flex py-5">
<div class="container position-relative m-auto">
    <div class="row my-5">
        <div class="col-md-6 my-auto">
          <p class="entry-heading mb-0">Know more</p>
          <h2 class="purple-gradient-heading mb-4">About Us</h2>
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
            clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
          <a class="home-cta-button" type="button" href="#">Learn More</a>
        </div>
        <div class="col-md-6 px-0">
          <img src="{{asset('/frontend/assets/images/home-about-img.png')}}" alt="" class="img-fluid position-absolute about-img">
        </div>
    </div>
</div>
<img src="{{asset('/frontend/assets/images/home-about-overlay.svg')}}" alt="" class="home-about-fig">
</section>

<!-- About Us End -->

<!-- Features Start -->
<section id="feature" class=" home-features pt-5 pb-0 position-relative">
    <img src="{{asset('/frontend/assets/images/wavy-lines-home.svg')}}" alt="" class="wavy-line-home">
    <div class="container pt-2 pb-3">
        <div class="row">
            <div class="col-md-6 my-auto pr-md-5">
              <img src="{{asset('/frontend/assets/images/home-feature-1.png')}}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 my-auto pl-md-5">
              <h2 class="features-heading">Lorem ipsum dolor sit amet.</h2>
              <p class="py-4 mb-0">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                dolore magna aliquyam erat, sed diam voluptua. At vero </p>
              <div class="row">
                <div class="col-6 my-auto">
                  <ul class="footer-ul">
                    <li>The quick, brown</li>
                    <li>fox jumps over a</li>
                    <li>lazy dog. DJs flock</li>
                  </ul>
                </div>
                <div class="col-6 my-auto">
                  <ul class="footer-ul">
                    <li>The quick, brown</li>
                    <li>fox jumps over a</li>
                    <li>lazy dog. DJs flock</li>
                  </ul>
                </div>
              </div>
              <a class="home-cta-button" type="button" href="#">Start Free Trial</a>
            </div>
          </div>
    </div>
</section>

<section class="home-features pt-0 position-relative">
    <img src="{{asset('/frontend/assets/images/wavy-lines-home.svg')}}" alt="" class="wavy-line-left">
    <div class="container pb-0">
        <div class="row pt-2 feature-2-sec">
            <div class="col-md-6 my-auto pr-md-5">
              <h2 class="features-heading mb-0">Lorem ipsum dolor sit amet.</h2>
              <p class="py-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                dolore magna aliquyam erat, sed diam voluptua. At vero </p>
              <div class="row">
                <div class="col-6 my-auto">
                  <ul class="footer-ul">
                    <li>The quick, brown</li>
                    <li>fox jumps over a</li>
                    <li>lazy dog. DJs flock</li>
                  </ul>
                </div>
                <div class="col-6 my-auto">
                  <ul class="footer-ul">
                    <li>The quick, brown</li>
                    <li>fox jumps over a</li>
                    <li>lazy dog. DJs flock</li>
                  </ul>
                </div>
              </div>
              <a class="home-cta-button" type="button" href="#">Start Free Trial</a>
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
    <div class="container">
        <div class="row pricing-home py-5">
            <div class="col-12">
              <h2 class="features-heading text-center mt-5">Plans and Prices</h2>
              <p class=" text-center mt-4">he quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog.
                Junk MTV quiz graced by fox whelps. Bawds jog, he quick, brown fox jumps over a lazy dog. DJs flock by when MTV
                ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, </p>
            </div>
            <div class="container">
              <div class="row pt-5">
                <div class="col-md-3 my-auto">
                  <img src="{{asset('/frontend/assets/images/gurantee-seal.svg')}}" alt="" class="img-fluid w-100">
                </div>
                <div class="col-md-3 my-auto">
                  <div
                    class=" pb-5 pt-5 pl-4 pr-4 align-top shadow  pricing-card home-pricing-card text-center gold-package align-top card">
                    <h4 class="text-white package-title">Bronze</h4>
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
                    <h4 class="text-white package-title">Silver</h4>
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
                    <h4 class="text-white package-title">Gold</h4>
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
    <div class="container py-3 px-4 pb-5">
        <div class="row mt-4">
            <div class="col-md-6 my-auto pr-md-5">
              <h2 class="book-a-demo-heading pt-5 pb-3">Book a demo</h2>
              <p class="book-a-demo-tail pt-3 pb-3">Do you have questions about pricing or want a custom demo? We’d love to
                help.</p>
              <a class="home-cta-button pt-3" type="button" href="#">Book a demo</a>
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
<section class="faq pb-5 position-relative">
<div class="container">
    <div class="row pb-4 pt-4 testimonials-section text-center">
        <div class="col-12 my-auto">
          <h2 class="testimonials-heading pt-5 pb-3">Testimonials</h2>
        </div>
      </div>
      <div class="row  pb-4 testimonials-section pb-3">
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
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the race.
                  </p>
                  <img class="quote img-fluid pb-2" src="{{asset('/frontend/assets/images/quote.svg')}}" alt="">

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
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the race.
                  </p>
                  <img class="quote img-fluid pb-2" src="{{asset('/frontend/assets/images/quote.svg')}}" alt="">

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
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the race.
                  </p>
                  <img class="quote img-fluid pb-2" src="{{asset('/frontend/assets/images/quote.svg')}}" alt="">

                </div>
              </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
        </div>
      </div>
</div>


  <img src="{{asset('/frontend/assets/images/faq-figure-end.svg')}}" alt="" class="imgfluid faq-fig">

</section>

<!-- End  -->
@endsection
