<!doctype html>
<html lang="en">

<head>
    <title>Covered Press</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap"
        rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- custom style -->
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
</head>

<body>

    <!-- header section  -->
    <div class="header pb-0 mb-0 ">
        <div class="container pt-3 pb-4 mb-0">
            <div class="header-content mt-5 mb-0 pb-0">
                <div class="logo text-center">
                    @if ($report->logo)
                    <img src="{{ $report->logo }}" alt="" width="280">

                    @endif
                </div>
                <div class="title py-4">
                    {{ $report->name }}
                </div>
                <div class="social-count d-flex flex-wrap">
                    <div class="count-inner d-flex ml-auto">
                        <img src="{{  asset('template/assets/logo/facebook-f') }}.svg" alt="" class="my-auto">
                        <span>540</span>
                    </div>
                    <div class="count-inner d-flex">
                        <img src="{{  asset('template/assets/logo/twitter.svg') }}" alt="" class="my-auto">
                        <span>240</span>
                    </div>
                    <div class="count-inner d-flex">
                        <img src="{{  asset('template/assets/logo/instagram.svg') }}" alt="" class="my-auto">
                        <span>390</span>
                    </div>
                    <div class="count-inner d-flex">
                        <img src="{{  asset('template/assets/logo/linkedin-in') }}.svg" alt="" class="my-auto">
                        <span>290</span>
                    </div>
                    <div class="count-inner d-flex">
                        <img src="{{  asset('template/assets/logo/pinterest-p') }}.svg" alt="" class="my-auto">
                        <span>203</span>
                    </div>
                    <div class="count-inner d-flex">
                        <img src="{{  asset('template/assets/logo/whatsapp.svg') }}" alt="" class="my-auto">
                        <span>293</span>
                    </div>
                    <div class="count-inner d-flex mr-auto">
                        <span>393+</span>
                    </div>
                </div>

                {{-- <div class="highlight-section d-flex flex-wrap">
                    <div class="my-auto d-inline-flex mr-auto "><i class="fa fa-star text-warning mr-2 mb-auto"></i>
                        <div class="my-auto">Highlights</div>
                    </div>

                    <div class="line m-auto px-2"> </div>

                    <div class="paging d-flex ml-auto">
                        <div class="text-center d-flex mr-2">
                            <i class="fas fa-angle-left m-auto"></i>
                        </div>
                        <div class="text-center d-flex">
                            <i class="fas fa-angle-right m-auto"></i>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="images my-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-nav d-flex">
                                    <div class="btn-red my-auto ml-2"></div>
                                    <div class="btn-yellow my-auto mx-1"></div>
                                    <div class="btn-green my-auto mx-0"></div>
                                    <div class="nav-inner my-auto mx-2"></div>
                                </div>
                                <div class="cover-image p-4">
                                    <div class="top d-flex">
                                        <p class="primary my-auto">WDRB</p>
                                        <p class="date my-auto">MAY 5 2019</p>
                                        <button class="ml-auto btn preview">Preview</button>
                                    </div>
                                    <div class="cover-body mt-3">
                                        <div class="stat d-flex">
                                            <div>
                                                <img src="{{  asset('template/assets/logo/chart-bar') }}.svg" alt="">
            </div>
            <div>
                (est.) monthly visits
            </div>
            <div></div>
            <div>324M</div>
        </div>
        <div class="stat d-flex mt-2">
            <div>
                <img src="{{  asset('template/assets/logo/chart-bar') }}.svg" alt="">
            </div>
            <div>
                (est.) monthly visits
            </div>
            <div></div>
            <div>322K</div>
        </div>
        <div class="stat d-flex mt-2">
            <div>
                <img src="{{  asset('template/assets/logo/chart-bar') }}.svg" alt="">
            </div>
            <div>
                (est.) monthly visits
            </div>
            <div></div>
            <div>32</div>
        </div>
    </div>

    </div>
    </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-nav d-flex">
                <div class="btn-red my-auto ml-2"></div>
                <div class="btn-yellow my-auto mx-1"></div>
                <div class="btn-green my-auto mx-0"></div>
                <div class="nav-inner my-auto mx-2"></div>
            </div>
            <div class="cover-image p-4">
                <div class="top d-flex">
                    <p class="primary my-auto">WDRB</p>
                    <p class="date my-auto">MAY 5 2019</p>
                    <button class="ml-auto btn preview">Preview</button>
                </div>
                <div class="cover-body mt-3">
                    <div class="stat d-flex">
                        <div>
                            <img src="{{  asset('template/assets/logo/chart-bar') }}.svg" alt="">
                        </div>
                        <div>
                            (est.) monthly visits
                        </div>
                        <div></div>
                        <div>324M</div>
                    </div>
                    <div class="stat d-flex mt-2">
                        <div>
                            <img src="{{  asset('template/assets/logo/chart-bar') }}.svg" alt="">
                        </div>
                        <div>
                            (est.) monthly visits
                        </div>
                        <div></div>
                        <div>324M</div>
                    </div>
                    <div class="stat d-flex mt-2">
                        <div>
                            <img src="{{  asset('template/assets/logo/chart-bar') }}.svg" alt="">
                        </div>
                        <div>
                            (est.) monthly visits
                        </div>
                        <div></div>
                        <div>324M</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-nav d-flex">
                <div class="btn-red my-auto ml-2"></div>
                <div class="btn-yellow my-auto mx-1"></div>
                <div class="btn-green my-auto mx-0"></div>
                <div class="nav-inner my-auto mx-2"></div>
            </div>
            <div class="cover-image p-4">
                <div class="top d-flex">
                    <p class="primary my-auto">WDRB</p>
                    <p class="date my-auto">MAY 5 2019</p>
                    <button class="ml-auto btn preview">Preview</button>
                </div>
                <div class="cover-body mt-3">
                    <div class="stat d-flex">
                        <div>
                            <img src="{{  asset('template/assets/logo/chart-bar') }}.svg" alt="">
                        </div>
                        <div>
                            (est.) monthly visits
                        </div>
                        <div></div>
                        <div>324M</div>
                    </div>
                    <div class="stat d-flex mt-2">
                        <div>
                            <img src="{{  asset('template/assets/logo/chart-bar') }}.svg" alt="">
                        </div>
                        <div>
                            (est.) monthly visits
                        </div>
                        <div></div>
                        <div>324M</div>
                    </div>
                    <div class="stat d-flex mt-2">
                        <div>
                            <img src="{{  asset('template/assets/logo/chart-bar') }}.svg" alt="">
                        </div>
                        <div>
                            (est.) monthly visits
                        </div>
                        <div></div>
                        <div>324M</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
    </div> --}}

    </div>
    </div>


    <section id="links">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-4"><i class="fa fa-share-square text-warning"></i> Links from Covered Press</p>

                    @foreach ($report->coverages as $coverage)
                    <div class="form-input form-control">
                        <input type="text" disabled value="{{ $coverage->url }}">
                        <div class="icon d-flex">
                            <i class="fa fa-share-square text-white m-auto"></i>
                        </div>
                    </div>
                    @endforeach

                    {{-- <button class="btn btn-primary"> Load more <span
                                    class="badge bg-white text-dark">+4</span></button> --}}

                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="graph-card py-4">
                                <div class="row m-0">
                                    <div class="col-md-3 p-0 d-flex">
                                        <div class="icon d-flex my-auto">
                                            <i class="fa fa-users text-white m-auto"></i>
                                        </div>
                                    </div>
                                    @if (isset($report->metrics->no_of_coverage))
                                    <div class="col-md-9 d-flex">
                                        <div class="my-auto">
                                            <p class="tiny-text mb-0">Total Coverage</p>
                                            <p class="number mb-0">{{ $report->metrics->no_of_coverage}}
                                            </p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="graph-card py-4">
                                <div class="row m-0">
                                    <div class="col-md-3 p-0 d-flex">
                                        <div class="icon d-flex my-auto">
                                            <i class="fa fa-users text-white m-auto"></i>
                                        </div>
                                    </div>
                                    @if (isset($report->metrics->average_domain_authority))
                                    <div class="col-md-9 d-flex">
                                        <div class="my-auto">
                                            <p class="tiny-text mb-0">Domain Authority</p>
                                            <p class="number mb-0">{{$report->metrics->average_domain_authority}}</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="graph-card py-4">
                                <div class="row m-0">
                                    <div class="col-md-3 p-0 d-flex">
                                        <div class="icon d-flex my-auto">
                                            <i class="fa fa-users text-white m-auto"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9 d-flex">
                                        <div class="my-auto">
                                            <p class="tiny-text mb-0">M</p>
                                            <p class="number mb-0">48.9M</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="graph-card py-4">
                                <div class="row m-0">
                                    <div class="col-md-3 p-0 d-flex">
                                        <div class="icon d-flex my-auto">
                                            <i class="fa fa-users text-white m-auto"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9 d-flex">
                                        <div class="my-auto">
                                            <p class="tiny-text mb-0">Readership</p>
                                            <p class="number mb-0">48.9M</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>


    <section id="coverage">
        <div class="container py-5">
            <h4>COVERAGES</h4>

            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-nav d-flex">
                            <div class="btn-red my-auto ml-2"></div>
                            <div class="btn-yellow my-auto mx-1"></div>
                            <div class="btn-green my-auto mx-0"></div>
                            <div class="nav-inner my-auto mx-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-new">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="tab-a bg-white d-flex p-2">
                                    <div class="text-justic m-auto">
                                        <p class="tiny-text-1 mb-0 text-justic">May 27 2019</p>
                                        <h5 class="mb-0">DAILY MAIL</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tab-b">
                                    Full screen attachment
                                </div>
                            </div>
                        </div>
                        <div class="body bg-white shadow p-4">
                            <p>Social Share</p>
                            <div class="social-count d-flex flex-wrap">
                                <div class="count-inner d-flex m-0">
                                    <img src="{{  asset('template/assets/logo/facebook-f') }}.svg" alt=""
                                        class="my-auto">
                                    <span>540</span>
                                </div>
                                <div class="count-inner d-flex mr-0">
                                    <img src="{{  asset('template/assets/logo/twitter.svg') }}" alt="" class="my-auto">
                                    <span>240</span>
                                </div>
                                <div class="count-inner d-flex">
                                    <img src="{{  asset('template/assets/logo/instagram.svg') }}" alt=""
                                        class="my-auto">
                                    <span>390</span>
                                </div>
                                <div class="count-inner d-flex m-0">
                                    <span>more <i class="fas fa-angle-down"></i></span>
                                </div>
                            </div>
                            <div class="row mt-4 px-2">
                                <div class="col-md-4 p-2">
                                    <div class="card-new border-10 d-flex flex-wrap bg-primary p-2 py-4">
                                        <div class="icons d-flex m-auto text-center mt-3">
                                            <i class="far fa-chart-bar m-auto text-primary"></i>
                                        </div>

                                        <div class="w-100 text-center mt-2">
                                            <p class="number text-white mb-0">342M</p>
                                            <p class="tiny-text mb-0">Monthly Visits</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="card-new border-10 d-flex  flex-wrap bg-primary p-2 py-4">
                                        <div class="icons d-flex m-auto text-center">
                                            <i class="far fa-chart-bar m-auto text-primary"></i>
                                        </div>


                                        <div class="w-100 text-center mt-2">
                                            <p class="number text-white mb-0">342M</p>
                                            <p class="tiny-text mb-0">Monthly Visits</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="card-new border-10 d-flex flex-wrap bg-primary p-2 py-4">
                                        <div class="icons d-flex m-auto text-center">
                                            <i class="far fa-chart-bar m-auto text-primary"></i>
                                        </div>


                                        <div class="w-100 text-center mt-2">
                                            <p class="number text-white mb-0">342M</p>
                                            <p class="tiny-text mb-0">Monthly Visits</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>