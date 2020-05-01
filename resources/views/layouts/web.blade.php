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
    <link rel="stylesheet" href="{{asset('/frontend/css/responsive.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,800|Poppins|Cinzel&display=swap"
    rel="stylesheet">
    @stack('css')
    <title>@yield('title',"Home") - Covered Press</title>
</head>

<body>
    {{-- <hr class="header-gradient-bar"> --}}
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ml-md-0 ml-2" href="{{ url('/') }}">
                <img src="{{asset('/frontend/assets/images/logo.svg')}}" width="220px"
                    class="d-inline-block align-top my-auto img-fluid" viewBox="0 0 300 160" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                {{-- <span class="navbar-toggler-icon"></span> --}}
                <svg viewBox="0 0 800 600">
                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                    <path d="M300,320 L540,320" id="middle"></path>
                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                </svg>
            </button>

            <div class="collapse navbar-collapse ml-md-3" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto topnav">
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
            <div class="collapse navbar-collapse right-nav" id="navbarSupportedContent">
                <div class="nav-item ml-auto d-flex">
                    {{-- <li class="nav-item w-100 text-right"> --}}
                    @guest
                    <a class="btn-signin m-0 btn-cta mr-3" type="button" href="{{ url('login') }}">Sign
                        In</a>
                    @endguest
                    @auth
                    <a class="btn-signin btn-cta" type="button" href="{{ route('user.dashboard') }}">Dashboard</a>
                    @endauth
                    {{-- </li> --}}
                    @guest
                    {{-- <li class="nav-item w-100 text-right"> --}}
                        <a class="btn-cta m-0 btn-get-started" type="button" onclick="plan(4)">START FREE TRIAL</a>
                    {{-- </li> --}}
                    @endguest
                </div>
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
        </div>
    </nav>

    <!-- End Navbar -->

    @yield('content')

    <footer class="cp-site-footer pt-5 mt-4">
        <div class="cp-upper-footer">
            <div class="container">
                <div class="row footer-row">
                    <div class="col-lg-3">
                        <div class="widget about-widget">
                            <div class="logo footer-widget-title">
                                <img src="{{asset('/frontend/assets/images/logo.svg')}}" alt="CoveredPress">
                            </div>
                            <div class="footer-widget-text mt-4">
                                <p class="mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                diam nonumy
                                eirmod tempor invidunt ut
                                labore et dolore</p>
                                <a href="#" class="footer-link">Learn More</a></div>
                            <div>
                            </div>
                        </div>
                    </div>
                    <div class="col pl-md-5 col-sm-6 col-lg-3 mt-4 mt-md-0">
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
                    <div class="col pl-md-5  col-sm-6 col-lg-3 p-0  mt-4 mt-md-0">
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
                    <div class="col-lg-3 p-md-0 ">
                        <div class="widget link-widget">
                            <div class="footer-widget-title mb-4">
                                <h3>Contact</h3>
                            </div>
                            <div class="contact-buttons row m-0 my-3 my-md-0" onclick="location.href('#')">
                                <div class="col-2 align-self-center pl-1">
                                    <img src="{{asset('/frontend/assets/images/call-icon.svg')}}" alt="" height=32px;>
                                </div>
                                <div class="col-10 align-self-center p-0">
                                    <p class="title-button">
                                        Phone
                                    </p>
                                    <a class="footer-btn-link">
                                        000-000-000
                                    </a>
                                </div>
                            </div>
                            <div class="contact-buttons row mb-1 m-0 mt-md-3" onclick="location.href('#')">
                                <div class="col-2 align-self-center pl-1">
                                    <img src="{{asset('/frontend/assets/images/email-icon.svg')}}" alt="" height=32px;>
                                </div>
                                <div class="col-10 align-self-center p-0">
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
        <div class="cp-lower-footer mt-4 mt-md-0 position-relative">
            <img src="{{asset('frontend/assets/images/Grupo de máscara 6.svg')}}" alt="" class="footer-wave">
            <div class="container">
                <div class="row">
                    <div class="col-12 align-self-center text-center">
                        <div class="position-relative">

                            <img src="{{asset('/frontend/assets/images/gurantee-seal.svg')}}" alt="" class="img-fluid footer-gurantee">
                        </div>

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
      slidesPerView: 1,
      spaceBetween: 10,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      }
    });

     $(function () {
            var i, resize;

            $(".navbar-toggler").click(function () {
                $(".navbar-toggler").toggleClass("cross");
            });

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
           //Navbar Toggler
    }
    </script>
    @stack('js')

</body>

</html>
