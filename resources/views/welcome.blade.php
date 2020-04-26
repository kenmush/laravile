@extends('layouts.web')

@section('content')
<!-- Start Hero -->
<div class="row home-hero">
  <div class="my-auto hero-content">
    <div class="row">
      <div class="col-md-6 my-auto">
        <h1 class="text-white hero-heading animated fadeIn delay-0.5s">Make coverage reports, faster.</h1>
        <hr class="hero-divider">
        <p class="hero-lead">
          The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk
        </p>
        <form class="subscribe_form">
          <div class="input-group">
            <input type="text" class="form-control newsletter-hero-input" name="email" placeholder="Enter your email">
            <span class="input-group-btn">
              <button class="btn btn-get-started newsletter-hero-btn" type="button">Start free trial</button>
            </span>
          </div>
        </form>
      </div>
      <div class="col-6 my-auto">
        <img src="{{asset('/frontend/assets/images/home-hero-img.png')}}" alt="" class="img-fluid img-hero-home">
      </div>
    </div>
  </div>
</div>
<!-- End Hero Section -->
<!-- About Us Section -->
<div class="row pt-5 pl-5 pr-5 ml-5 mr-5 mb-3">
  <div class="col-6 col-md-12 my-auto pl-10">
    <p class="entry-heading">Know more</p>
    <h2 class="purple-gradient-heading">About Us</h2>
    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
      dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
      clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
    <a class="home-cta-button" type="button" href="#">Learn More</a>
  </div>
  <div class="col-6 col-md-12 my-auto">
    <img src="{{asset('/frontend/assets/images/home-about-img.png')}}" alt="" class="img-fluid">
    <img src="{{asset('/frontend/assets/images/home-about-overlay.svg')}}" alt="" class="home-about-fig">
  </div>
</div>
<!-- About Us End -->

<!-- Features Start -->
<div class="row pt-5 pl-5 pr-5 home-features">
  <div class="col-6 my-auto pl-5">
    <img src="{{asset('/frontend/assets/images/home-feature-1.png')}}" alt="" class="img-fluid">
  </div>
  <div class="col-6 my-auto pr-10">
    <h2 class="features-heading">Lorem ipsum dolor sit amet.</h2>
    <img src="{{asset('/frontend/assets/images/wavy-lines-home.svg')}}" alt="" class="wavy-line-home">
    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
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
<div class="row pt-5 pl-5 pr-5 home-features feature-2-sec">
  <div class="col-6 my-auto pl-10">
    <h2 class="features-heading">Lorem ipsum dolor sit amet.</h2>
    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
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
  <div class="col-6 my-auto pr-10">
    <img src="{{asset('/frontend/assets/images/home-feature-1.png')}}" alt="" class="img-fluid">
  </div>
  <img src="{{asset('/frontend/assets/images/features-end-fig.svg')}}" alt="" class="features-end-fig">
</div>

<!-- End Features -->

<!-- Start Pricing -->
<div class="row pricing-home pt-5 pl-5 pr-5">
  <div class="col-12">
    <h2 class="features-heading text-center">Plans and Price</h2>
    <p class="pl-5 pr-5 text-center">he quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog.
      Junk MTV quiz graced by fox whelps. Bawds jog, he quick, brown fox jumps over a lazy dog. DJs flock by when MTV
      ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, </p>
  </div>
  <div class="container">
    <div class="row pl-5 pr-5 pt-5">
      <div class="col-3 my-auto">
        <img src="{{asset('/frontend/assets/images/gurantee-seal.svg')}}" alt="" class="imgfluid">
      </div>
      <div class="col-3 my-auto">
        <div
          class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card home-pricing-card text-center gold-package align-top card">
          <h4 class="text-white package-title">Bronze</h4>
          <div class="price">
            <span class="dollar">$99</span>
            <span class="slash">/month</span>
          </div>
          <p class=" pt-4">
            <a href="#" class="btn pricing-buy-btn ">get this plan</a></p>
          <a href="#" class="pt-3 home-pack-learn-more">Learn more about this plan</a>
        </div>
      </div>
      <div class="col-3 my-auto">
        <div
          class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card home-pricing-card text-center silver-package align-top card">
          <h4 class="text-white package-title">Silver</h4>
          <div class="price">
            <span class="dollar">$199</span>
            <span class="slash">/month</span>
          </div>
          <p class=" pt-4">
            <a href="#" class="btn pricing-buy-btn ">get this plan</a></p>
          <a href="#" class="pt-3 home-pack-learn-more">Learn more about this plan</a>
        </div>
      </div>
      <div class="col-3 my-auto">
        <div
          class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card home-pricing-card text-center gold-package align-top card">
          <h4 class="text-white package-title">Gold</h4>
          <div class="price">
            <span class="dollar">$499</span>
            <span class="slash">/month</span>
          </div>
          <p class=" pt-4">
            <a href="#" class="btn pricing-buy-btn ">get this plan</a></p>
          <a href="#" class="pt-3 home-pack-learn-more">Learn more about this plan</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End Pricing -->

<!-- Start Book a Demo -->

<div class="row mt-8 pl-5 pr-5 pb-4 book-a-demo">
  <div class="col-6 my-auto pl-10">
    <h2 class="book-a-demo-heading pt-3 pb-3">Book a demo</h2>
    <p class="book-a-demo-tail pt-3 pb-3">Do you have questions about pricing or want a custom demo? We’d love to
      help.</p>
    <a class="home-cta-button pt-3" type="button" href="#">Book a demo</a>
  </div>
  <div class="col-6 my-auto pr-10">
    <img src="{{asset('/frontend/assets/images/book-a-demo-img.png')}}" alt=""
      class="img-fluid my-auto book-a-demo-img">
  </div>
</div>

<!-- End Book a Demo -->

<!-- Start Testimonials -->
<!-- TESTIMONIALS -->
<section class="faq pb-5">

  <div class="row pl-5 pr-5 pb-4 testimonials-section text-center">
    <div class="col-12 my-auto">
      <h2 class="testimonials-heading pt-5 pb-3">Testimonials</h2>
    </div>
  </div>
  <div class="row pl-5 pr-5 pb-4 testimonials-section pb-3">
    <div class="col-12">
      <div class="swiper-container swiper-testimonial pl-5 pr-5 mr-5 ml-5">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="review-box">
              <p class="read">
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the race.
              </p>
              <img class="quote img-fluid pb-2" src="{{asset('/frontend/assets/images/quote.svg')}}" alt="">

            </div>
          </div>
          <div class="swiper-slide">
            <div class="review-box">
              <p class="read">
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the race.
              </p>
              <img class="quote img-fluid pb-2" src="{{asset('/frontend/assets/images/quote.svg')}}" alt="">

            </div>
          </div>
          <div class="swiper-slide">
            <div class="review-box">
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

  <img src="{{asset('/frontend/assets/images/faq-figure-end.svg')}}" alt="" class="imgfluid faq-fig">

</section>

<!-- End  -->
@endsection