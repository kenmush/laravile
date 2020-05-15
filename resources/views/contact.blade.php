@extends('layouts.web')

@section('content')
<!-- Start Hero -->
<section id="hero" class="contact">
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
                <div class="my-auto col-md-6 p-0 pt-1">
                    <h1 class="text-white hero-heading animated fadeIn delay-0.5s pt-4">CONTACT US</h1>
                    <hr class="hero-divider my-4">
                    <div>
                        <form action="">
                            <div class="contact-buttons bg-white row m-0 my-3 my-md-0" onclick="location.href('#')">
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
                            <div class="contact-buttons bg-white row mb-1 m-0 mt-md-3" onclick="location.href('#')">
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
                        </form>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>

</section>

{{-- message --}}


<section class="position-relative" id="message">
    <img class="eclipse hero-purple-eclipse-message animated fadeInRight delay-1.7s"
    src="{{asset('/frontend/assets/images/purple-eclipse.svg')}}" alt="">
    <img class="eclipse hero-purple-eclipse-message-right animated fadeInRight delay-1.7s"
    src="{{asset('/frontend/assets/images/purple-eclipse.svg')}}" alt="">
    <div class="container">
            <h1 class="main-heading cptxt-c text-center pt-59 pb-59 mb-0">SEND US A MESSAGE</h1>

            <div id="form">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-container  mt-0">
                                <input type="text" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-container  mt-0">
                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-container">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-container">
                                <input type="text" class="form-control" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-container">
                                <textarea name="" rows="6" id="" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <span class="input-group-btn text-center">
                               <button class="home-cta-button pt-3 px-5 rm-border" type="button" href="#" type="submit"> Submit</button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</section>
<!-- Start Book a Demo -->
<section id="demo" class="book-a-demo position-relative">
    <div class="container py-3 px-3 pb-200">
        <div class="row my-4 mt-5">
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
    <img src="{{asset('/frontend/assets/images/faq-figure-end.svg')}}" alt="" class="imgfluid faq-fig">
</section>




@endsection
