<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css')}}" rel="stylesheet" >
  <link href="{{asset('https://fonts.googleapis.com/css?family=Montserrat')}}" rel="stylesheet">
  <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css')}}" rel="stylesheet" >
  <link href="{{asset('/frontend/css/styles.css')}}" rel="stylesheet">
<title>Pricing - Covered Press</title>
</head>

<body>
  <hr class="header-gradient-bar">
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">
      <img src="{{asset('/frontend/assets/images/logo.svg')}}" width="220px" class="d-inline-block align-top my-auto img-fluid"
        viewBox="0 0 300 160" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ml-3" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto topnav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">FAQs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tutorials</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto topnav cta-ul">
        <li class="nav-item">
          <a class="btn-signin btn-cta" type="button" href="#" data-toggle="modal" data-target="#myModal">Sign In</a>
        </li>
        <li class="nav-item">
          <a class="btn-cta btn-get-started" type="button" href="#" data-toggle="modal" data-target="#myModal">Start
            Free Trial</a>
        </li>
      </ul>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Customer Sign In</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form>
              <label class="sr-only" for="usrname">Username</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                  aria-describedby="basic-addon1">
              </div>


              <label class="sr-only" for="Password">Name</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                </div>
                <input id="Password" type="password" class="form-control" placeholder="Password" aria-label="Password"
                  aria-describedby="basic-addon2">
              </div>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Sign In</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->


  <!-- Start Hero -->
  <div class="row hero">
    <img class="eclipse hero-gray-eclipse animated fadeInLeft delay-0.9s" src="{{asset('/frontend/assets/images/gray-eclipse.svg')}}" alt="">
    <img class="eclipse hero-orange-eclipse animated fadeInRight delay-1.3s" src="{{asset('/frontend/assets/images/orange-eclipse.svg')}}"
      alt="">
    <img class="eclipse hero-purple-eclipse animated fadeInRight delay-1.7s" src="{{asset('/frontend/assets/images/purple-eclipse.svg')}}"
      alt="">
    <img class="eclipse hero-orange-hero-bottom-eclipse animated fadeInUp delay-1.4s"
      src="{{asset('/frontend/assets/images/orange-eclipse.svg')}}" alt="">
    <div class="col-md-6 my-auto hero-content">
      <h1 class="text-white hero-heading animated fadeIn delay-0.5s">PRICING</h1>
      <hr class="hero-divider">
      <p class="hero-lead">
        Designed to grow with you. Switch plans as your needs change. No storage limits, no contract. Cancel at any
        time.
      </p>
    </div>
  </div>
  <!-- End Hero Section -->

  <!-- Start Pricing Table -->
  <section class="pt-5 pb-5">
    <div class="container">
      <div class="row d-flex justify-content-center p-5">
        <div class="col-md-12">
          <div class="mt-2">

            <ul class="nav nav-pills nav-pills-primary justify-content-center mb-5" role="tablist">
              <li class="nav-item mr-md-2">
                <a class="nav-pill-switch active show" id="monthly-tab" data-toggle="tab" href="#monthly" role="tab"
                  aria-controls="home" aria-selected="true">
                  Monthly Plans
                </a>
              </li>
              <li class="nav-item mr-md-2">
                <a class="nav-pill-switch" id="yearly-tab" data-toggle="tab" href="#yearly" role="tab"
                  aria-controls="yearly" aria-selected="false">
                  Yearly Plans
                </a>
                <span class="lead-pill">One month free</span>
              </li>
            </ul>
            <img class="eclipse hero-purple-eclipse-one" src="{{asset('/frontend/assets/images/purple-eclipse.svg')}}" alt="">
            <img class="eclipse hero-purple-eclipse-two" src="{{asset('/frontend/assets/images/purple-eclipse.svg')}}" alt="">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade active show" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                <div class="row mt-5 d-flex align-items-top">
                  <div class="col-12 col-sm-10 col-md-8 col-lg-4 m-auto ">
                    <div class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card text-center gold-package align-top card">
                      <h4 class="text-white package-title">Bronze</h4>
                      <div class="price">
                        <span class="dollar">$99</span>
                        <span class="slash">/month</span>
                      </div>
                      <img class="package-divider" src="{{asset('/frontend/assets/images/pack-divider.svg')}}" alt="">
                      <div class="features pt-4">
                        <ul class="package-features">
                          <li>Everything in Silver plus…</li>
                          <li>Personal, dedicated, 1 hour training session for your team</li>
                        </ul>
                      </div>
                      <p class=" pt-4">
                        <a href="#" class="btn pricing-buy-btn ">Start Free Trial</a></p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-10 col-md-8 col-lg-4 m-auto ">
                    <div class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card text-center silver-package align-top card">
                      <h4 class="text-white package-title">SILVER</h4>
                      <div class="price">
                        <span class="dollar">$199</span>
                        <span class="slash">/month</span>
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
                        <a href="#" class="btn pricing-buy-btn ">Start Free Trial</a></p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-10 col-md-8 col-lg-4 m-auto ">
                    <div class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card text-center gold-package align-top card">
                      <h4 class="text-white package-title">GOLD</h4>
                      <div class="price">
                        <span class="dollar">$499</span>
                        <span class="slash">/month</span>
                      </div>
                      <img class="package-divider" src="{{asset('/frontend/assets/images/pack-divider.svg')}}" alt="">
                      <div class="features pt-4">
                        <ul class="package-features">
                          <li>Everything in Silver plus…</li>
                          <li>Personal, dedicated, 1 hour training session for your team</li>
                        </ul>
                      </div>
                      <p class=" pt-4">
                        <a href="#" class="btn pricing-buy-btn ">Start Free Trial</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                <div class="row mt-5 d-flex align-items-top">
                  <div class="col-12 col-sm-10 col-md-8 col-lg-4 m-auto ">
                    <div class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card text-center gold-package align-top card">
                      <h4 class="text-white package-title">Bronze</h4>
                      <div class="price">
                        <span class="dollar">$99</span>
                        <span class="slash">/month</span>
                      </div>
                      <img class="package-divider" src="{{asset('/frontend/assets/images/pack-divider.svg')}}" alt="">
                      <div class="features pt-4">
                        <ul class="package-features">
                          <li>Everything in Silver plus…</li>
                          <li>Personal, dedicated, 1 hour training session for your team</li>
                        </ul>
                      </div>
                      <p class=" pt-4">
                        <a href="#" class="btn pricing-buy-btn ">Start Free Trial</a></p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-10 col-md-8 col-lg-4 m-auto ">
                    <div class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card text-center silver-package align-top card">
                      <h4 class="text-white package-title">SILVER</h4>
                      <div class="price">
                        <span class="dollar">$199</span>
                        <span class="slash">/month</span>
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
                        <a href="#" class="btn pricing-buy-btn ">Start Free Trial</a></p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-10 col-md-8 col-lg-4 m-auto ">
                    <div class=" pb-5 pt-5 pl-4 pr-4 align-top  pricing-card text-center gold-package align-top card">
                      <h4 class="text-white package-title">GOLD</h4>
                      <div class="price">
                        <span class="dollar">$499</span>
                        <span class="slash">/month</span>
                      </div>
                      <img class="package-divider" src="{{asset('/frontend/assets/images/pack-divider.svg')}}" alt="">
                      <div class="features pt-4">
                        <ul class="package-features">
                          <li>Everything in Silver plus…</li>
                          <li>Personal, dedicated, 1 hour training session for your team</li>
                        </ul>
                      </div>
                      <p class=" pt-4">
                        <a href="#" class="btn pricing-buy-btn ">Start Free Trial</a></p>
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
  </section>

  <!-- End Pricing -->

  <!-- FAQ Section -->
  <section class="faq-section pt-5">
    <img class="pricing-bg-img" src="{{asset('/frontend/assets/images/pricing-fig.svg')}}" alt="">
    <h2 class="faq-head pb-5">Frequently Asked Questions</h2>
    <div class="container">
      <div class="row">
        <div class="col col-xs-12">
          <div class="cp-faq-section">
            <div class="row">
              <div class="col-lg-6 faq-col col-md-6 col-12">
                <div class="panel-group faq-accordion theme-accordion-s1" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true">What if
                        I have planning months or time without coverage coming in?</a>
                    </div>
                    <div id="collapse-1" class="panel-collapse collapse in">
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
<<<<<<< HEAD
                <!-- Pro Tier -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">Plan 3</h5>
                            <h6 class="card-price text-center">$395<span class="period">/month</span></h6>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Everything from Plan 2</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Personal 1 hour session for
                                    your
                                    team</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>More than 1000 reports per
                                    month
                                </li>
                            </ul>
                            {{Cookie::get('track')}}
                            <button class="btn btn-block btn-primary text-uppercase" onclick="plan(3)">Choose
                                Plan</button>
                        </div>
=======
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
>>>>>>> 475b28604a5a25ed6b58285fc15d13d42411216d
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

  <!-- Start Footer -->

  <footer class="cp-site-footer pt-5 mt-3">
    <div class="cp-upper-footer">
      <div class="container">
        <div class="row footer-row">
          <div class="col-lg-3">
            <div class="widget about-widget">
              <div class="logo footer-widget-title">
                <img src="{{asset('/frontend/assets/images/logo.svg')}}" alt="CoveredPress">
              </div>
              <div class="footer-widget-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                eirmod tempor invidunt ut
                labore et dolore <br>
                <a href="#" class="footer-link pt-3 mt-5">Learn More</a></div>
              <div>
              </div>
            </div>
          </div>
          <div class="col col-sm-6 col-lg-3">
            <div class="widget link-widget resource-widget">
              <div class="footer-widget-title">
                <h3>Support</h3>
              </div>
              <ul class="footer-ul">
                <li>Help & FAQs</li>
                <li>Guides & Tutorials</li>
                <li>Status</li>
                <li>Privacy</li>
                <li>Terms & Conditions</li>
              </ul>
            </div>
          </div>
          <div class="col col-sm-6 col-lg-3">
            <div class="widget link-widget">
              <div class="footer-widget-title">
                <h3>Resources</h3>
              </div>
              <ul class="footer-ul">
                <li>Blog</li>
                <li>Podcast</li>
                <li>Newsletter</li>
              </ul>

            </div>
          </div>
          <div class="col-lg-3">
            <div class="widget link-widget">
              <div class="footer-widget-title">
                <h3>Contact</h3>
              </div>
              <div class="contact-buttons row" onclick="location.href('#')">
                <div class="col-2 align-self-center">
                  <img src="{{asset('/frontend/assets/images/call-icon.svg')}}" alt="" height=32px;>
                </div>
                <div class="col-10 align-self-center">
                  <p class="title-button">
                    Phone
                  </p>
                  <a class="footer-btn-link">
                    000-000-000
                  </a>
                </div>
              </div>
              <div class="contact-buttons row" onclick="location.href('#')">
                <div class="col-2 align-self-center">
                  <img src="{{asset('/frontend/assets/images/email-icon.svg')}}" alt="" height=32px;>
                </div>
                <div class="col-10 align-self-center">
                  <p class="title-button">
                    Email
                  </p>
                  <a class="footer-btn-link">
                    info@coveredpress.com
                  </a>
                </div>
              </div>
              <a href="#" class="btn footer-started-btn ">Start Free Trial</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cp-lower-footer">
      <div class="container">
        <div class="row">
          <div class="col-12 align-self-center text-center">
            <img src="{{asset('/frontend/assets/images/gurantee-seal.svg')}}" alt="" class="fuild-img">
            <div class="pt-4 pb-4">
              <img src="{{asset('/frontend/assets/images/fb-logo-footer.svg')}}" alt="" class="fuild-img mr-2">
              <img src="{{asset('/frontend/assets/images/insta-logo-footer.svg')}}" alt="" class="fuild-img ml-2">
            </div>
            <p class="copyright-text">
              © 2020 CoveredPress
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{asset('https://code.jquery.com/jquery-3.4.1.slim.min.js')}}"></script>
  <script src="{{asset('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js')}}"></script>
</body>

</html>
