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
                                @if (isset($report->metrics->no_of_coverage))
                                <div class="graph-card py-4">
                                    <div class="row m-0">
                                        <div class="col-md-3 p-0 d-flex">
                                            <div class="icon d-flex my-auto">
                                                <i class="fa fa-users text-white m-auto"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-9 d-flex">
                                            <div class="my-auto">
                                                <p class="tiny-text mb-0">Total Coverage</p>
                                                <p class="number mb-0">{{ $report->metrics->no_of_coverage}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6 mb-2">
                                @if (isset($report->metrics->average_domain_authority))
                                <div class="graph-card py-4">
                                    <div class="row m-0">
                                        <div class="col-md-3 p-0 d-flex">
                                            <div class="icon d-flex my-auto">
                                                <i class="fa fa-users text-white m-auto"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-9 d-flex">
                                            <div class="my-auto">
                                                <p class="tiny-text mb-0">Domain Authority</p>
                                                <p class="number mb-0">{{$report->metrics->average_domain_authority}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if (isset($report->metrics->monthly_visit))
                                <div class="graph-card py-4">
                                    <div class="row m-0">
                                        <div class="col-md-3 p-0 d-flex">
                                            <div class="icon d-flex my-auto">
                                                <i class="fa fa-users text-white m-auto"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-9 d-flex">
                                            <div class="my-auto">
                                                <p class="tiny-text mb-0">Monthly Visit</p>
                                                <p class="number mb-0">{{ $report->metrics->monthly_visit }}M</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if (isset($report->metrics->social_share))
                                <div class="graph-card py-4">
                                    <div class="row m-0">
                                        <div class="col-md-3 p-0 d-flex">
                                            <div class="icon d-flex my-auto">
                                                <i class="fa fa-users text-white m-auto"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-9 d-flex">
                                            <div class="my-auto">
                                                <p class="tiny-text mb-0">Social Share</p>
                                                <p class="number mb-0">{{ $report->metrics->social_share }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @foreach ($report->coverages as $coverage)

    <section>
        <div class="container py-5">
            @php
            $hostName = parse_url($coverage->url);
            $hostName = $hostName['host']?? '';
            @endphp
            <h4>{{ $hostName }}</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow">
                        <a href="{{ $coverage->url }}" target="_blank">
                            <img src="{{ asset($coverage->screen_shot_featured) }}" alt="Screen Shot" width="500">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-new">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="tab-a bg-white d-flex p-2">
                                    <div class="text-justic m-auto">
                                        @if ($coverage->report_date)
                                        <p class="tiny-text-1 mb-0 text-justic">
                                            {{ date('M d Y',strtotime($coverage->report_date)) }}</p>
                                        @endif
                                        <h5 class="mb-0">{{ $hostName }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tab-b">
                                    <a href="{{ asset($coverage->screen_shot_full_screen) }}" target="_blank">Full
                                        screen attachment</a>
                                </div>
                            </div>
                        </div>
                        <div class="body bg-white shadow p-4">
                            <p>Social Share</p>
                            <div class="social-count d-flex flex-wrap">
                                <div class="count-inner d-flex m-0">
                                    <img src="{{  asset('template/assets/logo/facebook-f.svg') }}" alt=""
                                        class="my-auto">
                                    <span>{{ $coverage->facebook_share }}</span>
                                </div>
                                <div class="count-inner d-flex mr-0">
                                    <img src="{{  asset('template/assets/logo/twitter.svg') }}" alt="" class="my-auto">
                                    <span>{{ $coverage->twitter_share }}</span>
                                </div>
                                <div class="count-inner d-flex">
                                    <img src="{{  asset('template/assets/logo/pinterest-p.svg') }}" alt=""
                                        class="my-auto">
                                    <span>{{ $coverage->pinterest_share }}</span>
                                </div>
                            </div>
                            <div class="row mt-4 px-2">
                                <div class="col-md-4 p-2">
                                    <div class="card-new border-10 d-flex flex-wrap bg-primary p-2 py-4">
                                        <div class="icons d-flex m-auto text-center mt-3">
                                            <i class="far fa-chart-bar m-auto text-primary"></i>
                                        </div>

                                        <div class="w-100 text-center mt-2">
                                            <p class="number text-white mb-0">{{  $coverage->monthly_visit}}M</p>
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
                                            <p class="number text-white mb-0">{{ $coverage->domain_authority }}</p>
                                            <p class="tiny-text mb-0">Domain Authority</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-4 p-2">
                                    <div class="card-new border-10 d-flex flex-wrap bg-primary p-2 py-4">
                                        <div class="icons d-flex m-auto text-center">
                                            <i class="far fa-chart-bar m-auto text-primary"></i>
                                        </div>


                                        <div class="w-100 text-center mt-2">
                                            <p class="number text-white mb-0">342M</p>
                                            <p class="tiny-text mb-0">Monthly Visits</p>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach

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