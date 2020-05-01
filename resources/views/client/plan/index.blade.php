@extends('layouts.web')
@section('title', 'Plans')
@section('content')

  <!-- Start Hero -->
  <section id="hero">
    <img src="{{asset('frontend/assets/images/home-bg.svg')}}" alt="" class="hero">
    <img class="eclipse hero-gray-eclipse animated fadeInLeft delay-0.9s"
    src="{{asset('/frontend/assets/images/gray-eclipse.svg')}}" alt="">
    <img class="eclipse hero-orange-eclipse animated fadeInRight delay-1.3s"
    src="{{asset('/frontend/assets/images/orange-eclipse.svg')}}" alt="">
    <img class="eclipse hero-purple-eclipse animated fadeInRight delay-1.7s"
    src="{{asset('/frontend/assets/images/purple-eclipse.svg')}}" alt="">
    <img class="eclipse hero-orange-hero-bottom-eclipse animated fadeInUp delay-1.4s"
    src="{{asset('/frontend/assets/images/orange-eclipse.svg')}}" alt="">
    <div class="h-100v d-flex">
        <div class="container my-auto px-2 pt-5">
            <div class="row px-4">
                <div class="my-auto col-md-6 p-0">
                <h1 class="text-white hero-heading animated fadeIn delay-0.5s">PRICING</h1>
                <hr class="hero-divider my-3">
                <p class="hero-lead">
                    Designed to grow with you. Switch plans as your needs change. No storage limits, no contract. Cancel at any
                    time.
                </p>
                </div>
                <div class="col-md-6"></div>
            </div>
          </div>
    </div>

  </section>

  <!-- End Hero Section -->

  <!-- Start Pricing Table -->
  <section class="pt-5 pb-5 position-relative" id="pricing">
    <div class="container p-0">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12 p-4">
          <div class="mt-2 p-1">
            <div class="nav nav-pills d-flex nav-pills-primary justify-content-center mb-5" role="tablist">
              <div class="nav-item mr-md-2 text-right">
                <a class="nav-pill-switch active show px-4" id="monthly-tab" data-toggle="tab" href="#monthly" role="tab"
                  aria-controls="home" aria-selected="true">
                  Monthly Plans
                </a>
              </div>
              <div class="nav-item mr-md-2">
                <a class="nav-pill-switch-right" id="yearly-tab" data-toggle="tab" href="#yearly" role="tab"
                  aria-controls="yearly" aria-selected="false">
                  Yearly Plans
                </a>
                <span class="lead-pill">One month free</span>
              </div>
            </div>
            <img class="eclipse hero-purple-eclipse-one" src="{{asset('/frontend/assets/images/purple-eclipse.svg')}}"
              alt="">
            <img class="eclipse hero-purple-eclipse-two" src="{{asset('/frontend/assets/images/purple-eclipse.svg')}}"
              alt="">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade active show" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                <div class="row mt-5 d-flex align-items-top">
                  <div class="col-12 col-sm-10 col-md-8 col-lg-4 m-auto ">
                    <div class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card shadow text-center gold-package align-top card">
                      <h4 class="text-white package-title">BRONZE</h4>
                      <div class="price">
                        <span class="dollar">$99</span>
                        <span class="slash">/ month</span>
                      </div>
                      <img class="package-divider" src="{{asset('/frontend/assets/images/pack-divider.svg')}}" alt="">
                      <div class="features pt-4">
                        <ul class="package-features">
                          <li>Everything in Silver plus…</li>
                          <li>Personal, dedicated, 1 hour training session for your team</li>
                        </ul>
                      </div>
                      <p class=" pt-4 mb-0">
                        <a href="#" class="btn pricing-buy-btn " onclick="plan(1)">Start Free Trial</a></p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-10 col-md-8 col-lg-4 m-auto ">
                    <div class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card shadow text-center silver-package align-top card">
                      <h4 class="text-white package-title">SILVER</h4>
                      <div class="price">
                        <span class="dollar">$199</span>
                        <span class="slash">/ month</span>
                      </div>
                      <img class="package-divider" src="{{asset('/frontend/assets/images/pack-divider.svg')}}" alt="">
                      <div class="features pt-4">
                        <ul class="package-features">
                          <li>Unlimited Books</li>
                          <li>Unlimited Clients/Brands</li>
                          <li>Unlimited Users</li>
                          <li>Priority Support</li>
                        </ul>
                      </div>
                      <p class=" pt-4 mb-0">
                        <a href="#" class="btn pricing-buy-btn " onclick="plan(2)">Start Free Trial</a></p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-10 col-md-8 col-lg-4 m-auto ">
                    <div class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card shadow text-center gold-package align-top card">
                      <h4 class="text-white package-title">GOLD</h4>
                      <div class="price">
                        <span class="dollar">$499</span>
                        <span class="slash">/ month</span>
                      </div>
                      <img class="package-divider" src="{{asset('/frontend/assets/images/pack-divider.svg')}}" alt="">
                      <div class="features pt-4">
                        <ul class="package-features">
                          <li>Everything in Silver plus…</li>
                          <li>Personal, dedicated, 1 hour training session for your team</li>
                        </ul>
                      </div>
                      <p class=" pt-4 mb-0">
                        <a href="#" class="btn pricing-buy-btn " onclick="plan(3)">Start Free Trial</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                <div class="row mt-5 d-flex align-items-top">
                  <div class="col-12 col-sm-10 col-md-8 col-lg-4 m-auto ">
                    <div class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card shadow text-center gold-package align-top card">
                      <h4 class="text-white package-title">Bronze</h4>
                      <div class="price">
                        <span class="dollar">$99</span>
                        <span class="slash">/ month</span>
                      </div>
                      <img class="package-divider" src="{{asset('/frontend/assets/images/pack-divider.svg')}}" alt="">
                      <div class="features pt-4">
                        <ul class="package-features">
                          <li>Everything in Silver plus…</li>
                          <li>Personal, dedicated, 1 hour training session for your team</li>
                        </ul>
                      </div>
                      <p class=" pt-4">
                        <a href="#" class="btn pricing-buy-btn " onclick="plan(1)">Start Free Trial</a></p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-10 col-md-8 col-lg-4 m-auto ">
                    <div class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card shadow text-center silver-package align-top card">
                      <h4 class="text-white package-title">SILVER</h4>
                      <div class="price">
                        <span class="dollar">$199</span>
                        <span class="slash">/ month</span>
                      </div>
                      <img class="package-divider" src="{{asset('/frontend/assets/images/pack-divider.svg')}}" alt="">
                      <div class="features pt-4">
                        <ul class="package-features">
                          <li>Unlimited Books</li>
                          <li>Unlimited Clients/Brands</li>
                          <li>Unlimited Users</li>
                          <li>Priority Support</li>
                        </ul>
                      </div>
                      <p class=" pt-4">
                        <a href="#" class="btn pricing-buy-btn " onclick="plan(2)">Start Free Trial</a></p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-10 col-md-8 col-lg-4 m-auto ">
                    <div class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card shadow text-center gold-package align-top card">
                      <h4 class="text-white package-title">GOLD</h4>
                      <div class="price">
                        <span class="dollar">$499</span>
                        <span class="slash">/ month</span>
                      </div>
                      <img class="package-divider" src="{{asset('/frontend/assets/images/pack-divider.svg')}}" alt="">
                      <div class="features pt-4">
                        <ul class="package-features">
                          <li>Everything in Silver plus…</li>
                          <li>Personal, dedicated, 1 hour training session for your team</li>
                        </ul>
                      </div>
                      <p class=" pt-4">
                        <a href="#" class="btn pricing-buy-btn " onclick="plan(3)">Start Free Trial</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- /.row -->
    </div>
    <img class="pricing-bg-img" src="{{asset('/frontend/assets/images/pricing-fig.svg')}}" alt="">
  </section>

  <!-- End Pricing -->

  <!-- FAQ Section -->
  <section class="faq-section py-5 position-relative">

    <h2 class="faq-head pb-5 mb-0">Frequently Asked Questions</h2>
    <div class="container pb-5">
      <div class="row pb-5">
        <div class="col col-xs-12 px-3 p-0">
          <div class="cp-faq-section">
            <div class="row">
              <div class="col-lg-6 faq-col col-md-6 col-12">
                <div class="panel-group faq-accordion theme-accordion-s1" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <a data-toggle="collapse" class="pr-3" data-parent="#accordion" href="#collapse-1" aria-expanded="true">What if
                        I have planning months or time without coverage coming in?</a>
                    </div>
                    <div id="collapse-1" class="panel-collapse show collapse in">
                      <div class="panel-body">
                        <p>No problem. For those months when activation is paused or you simply don’t need to add
                          coverage or generate new reports we have an archive plan. It’s $15/month and safely saves all
                          of your files and reports. You can switch back to an active plan when your activity starts
                          again and you need to add coverage.</p>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-2">I’d like
                        to sign up to a paid plan. How do I do it?</a>
                    </div>
                    <div id="collapse-2" class="panel-collapse collapse">
                      <div class="panel-body">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, deserunt?</p>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-3">What if I
                        don't know what plan to choose?</a>
                    </div>
                    <div id="collapse-3" class="panel-collapse collapse">
                      <div class="panel-body">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur, velit.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 faq-col col-md-6 col-12 faq-pb">
                <div class="panel-group faq-accordion theme-accordion-s1" id="accordion2">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse-5"
                        aria-expanded="true">What if my needs change from month to month?</a>
                    </div>
                    <div id="collapse-5" class="panel-collapse collapse">
                      <div class="panel-body">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, at?</p>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse-6">IHow do
                        you charge for your product?</a>
                    </div>
                    <div id="collapse-6" class="panel-collapse collapse">
                      <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, exercitationem!</p>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse-7">How do I
                        make payment?</a>
                    </div>
                    <div id="collapse-7" class="panel-collapse collapse">
                      <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, maxime.</p>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse-8">Is there
                        a minimum contract?</a>
                    </div>
                    <div id="collapse-8" class="panel-collapse collapse">
                      <div class="panel-body">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro, iusto.</p>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse-9">Are my
                        coverage files safe?</a>
                    </div>
                    <div id="collapse-9" class="panel-collapse collapse">
                      <div class="panel-body">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim, excepturi.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img class="faq-end-img" src="{{asset('/frontend/assets/images/faq-figure-end.svg')}}" alt="">
  </section>

  <!-- End FAQ -->
@endsection
