@extends('layouts.client')
@section('content')

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper h-100">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="container my-2 p-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border">
                    <div class="card-header border-bottom">
                        <i class="icon-equalizer"></i> Manage Subscription
                    </div>
                    <div class="col-md-12 py-2">
                        <h3 class="mt-2 text-dark px-1"> Active Plan</h3>

                        @if ($activePlan)
                        <div class="card-body">
                            <h2 class="card-title text-muted text-uppercase text-center">{{ $activePlan->title }}</h2>
                            <h6 class="card-price text-center">${{ $activePlan->price }}
                                <span class="period">/month</span></h6>
                            <hr>
                            <ul class="fa-ul">
                                <li>
                                    <span class="fa-li">
                                        <i class="fas fa-check"></i>
                                    </span>{{ $activePlan->books? 'Up to '.$activePlan->books : 'Unlimited' }} Books
                                </li>
                                <li>
                                    <span class="fa-li">
                                        <i class="fas fa-check"></i>
                                    </span>{{ $activePlan->clients? 'Up to '.$activePlan->clients : 'Unlimited' }}
                                    Clients
                                </li>
                                <li>
                                    <span class="fa-li">
                                        <i class="fas fa-check"></i>
                                    </span> {{ $activePlan->users? 'Up to '.$activePlan->users : 'Unlimited' }} users
                                </li>
                                <li>
                                    <span class="fa-li">
                                        <i class="fas fa-check"></i>
                                    </span>{{ $activePlan->report? 'Up to '.$activePlan->report : 'Unlimited' }} Reports
                                </li>
                            </ul>
                        </div>
                        @else

                        <div class="card-title text-muted text-uppercase text-center">
                            <h2>No Plan</h2>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection