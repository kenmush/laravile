<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css')}}">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Montserrat')}}" rel='stylesheet'>
    <link rel="stylesheet"
        href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('https://unpkg.com/swiper/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/styles.css')}}">
    @stack('css')
    <title>@yield('title',"Home") - Covered Press</title>
</head>

<body>
    <hr class="header-gradient-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('/frontend/assets/images/logo.svg')}}" width="220px"
                class="d-inline-block align-top my-auto img-fluid" viewBox="0 0 300 160" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ml-3" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('plan') }}">Pricing</a>
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
                    @guest
                    <a class="btn-signin btn-cta" type="button" href="{{ url('login') }}">Sign
                        In</a>
                    @endguest
                    @auth
                    <a class="btn-signin btn-cta" type="button" href="{{ route('user.dashboard') }}">Dashboard</a>
                    @endauth
                </li>
                @guest
                <li class="nav-item">
                    <a class="btn-cta btn-get-started" type="button" onclick="plan(4)">Start
                        Free Trial</a>
                </li>
                @endguest
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
                                <input id="Password" type="password" class="form-control" placeholder="Password"
                                    aria-label="Password" aria-describedby="basic-addon2">
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

    @yield('content')

    <footer class="cp-site-footer pt-5 mt-3">
        <div class="cp-upper-footer">
            <div class="container">
                <div class="row footer-row">
                    <div class="col-lg-3">
                        <div class="widget about-widget">
                            <div class="logo footer-widget-title">
                                <img src="{{asset('/frontend/assets/images/logo.svg')}}" alt="CoveredPress">
                            </div>
                            <div class="footer-widget-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                diam nonumy
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
                            <a href="#" class="btn footer-started-btn"  onclick="plan(4)">Start Free Trial</a>
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
                            <img src="{{asset('/frontend/assets/images/fb-logo-footer.svg')}}" alt=""
                                class="fuild-img mr-2">
                            <img src="{{asset('/frontend/assets/images/insta-logo-footer.svg')}}" alt=""
                                class="fuild-img ml-2">
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
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.3.7/js/swiper.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container.swiper-testimonial', {
      slidesPerView: 3,
      spaceBetween: 50,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    </script>

    <script>
        function plan(id){
        $.ajax({
            type:"POST",
            url:"{{ route('plan.payment') }}",
            data:{
                _token:"{{ csrf_token() }}",
                'plan':id,
            },
            success:function(data){
                if(data.redirect_url){
                    window.location.href = data.redirect_url;
                }
            },error:function(error){
                console.log(error);
            }
        })
    }
    </script>
    @stack('js')

</body>

</html>