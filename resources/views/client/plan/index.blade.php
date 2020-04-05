<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Plan</title>

    <style>
        section.pricing {
            background: #2A3D68;
        }

        .pricing .card {
            border: none;
            border-radius: 1rem;
            transition: all 0.2s;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        }

        .pricing hr {
            margin: 1.5rem 0;
        }

        .pricing .card-title {
            margin: 0.5rem 0;
            font-size: 0.9rem;
            letter-spacing: .1rem;
            font-weight: bold;
        }

        .pricing .card-price {
            font-size: 3rem;
            margin: 0;
        }

        .pricing .card-price .period {
            font-size: 0.8rem;
        }

        .pricing ul li {
            margin-bottom: 1rem;
        }

        .pricing .text-muted {
            opacity: 0.7;
        }

        .pricing .btn {
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 1rem;
            opacity: 0.7;
            transition: all 0.2s;
        }

        /* Hover Effects on Card */

        @media (min-width: 992px) {
            .pricing .card:hover {
                margin-top: -.25rem;
                margin-bottom: .25rem;
                box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
            }

            .pricing .card:hover .btn {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <section class="pricing py-5">
        <div class="container">
            <div class="row text-white justify-content-center mb-3">
                <h1>Pricing</h1>
            </div>
            <div class="row">
                <!-- Free Tier -->
                <div class="col-lg-4">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">Plan 1</h5>
                            <h6 class="card-price text-center">$50<span class="period">/month</span></h6>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Books</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Clients</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Up to 5 users</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>less than 100 Reports per
                                    month
                                </li>
                            </ul>
                            <a href="#" class="btn btn-block btn-primary text-uppercase">Choose Plan</a>
                        </div>
                    </div>
                </div>
                <!-- Plus Tier -->
                <div class="col-lg-4">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">Plan 2</h5>
                            <h6 class="card-price text-center">$125<span class="period">/month</span></h6>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Books</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Clients</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited users</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Priority Support</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>More than 100 Reports per
                                    month
                                </li>
                            </ul>
                            <a href="#" class="btn btn-block btn-primary text-uppercase">Choose Plan</a>
                        </div>
                    </div>
                </div>
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
                            <a href="#" class="btn btn-block btn-primary text-uppercase">Choose Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>