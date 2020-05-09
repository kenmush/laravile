@extends('userclient.layouts.app')

@section('content')


<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome, {{ $client->name }}!
                </h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $client->reports()->count() }}</h2>
                                {{-- <span
                                    class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span> --}}
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Reports</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-text"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"></sup>{{ $urlsCount }}
                            </h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Urls
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">1538</h2>
                                <span
                                    class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Reports</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">864</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Clients</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- *************************************************************** -->
        <!-- End First Cards -->
        <!-- *************************************************************** -->
        <!-- *************************************************************** -->
        <div class="row">
            @foreach($client->reports as $r)
            @php
            if(!isset($r->coverage)){
            continue;
            }
            @endphp
            <div class="col-md-4 mb-3">
                <div class="shadow-sm bg-white card-coverage text-center">
                    <div class="position-relative">
                        <div class="overlay d-flex">
                            <div class="d-flex m-auto">
                                <a href="{{ route('report.show',$r->coverage->report_id) }}"
                                    class="btn btn-light px-3 py-2 rounded btn-sm ml-auto">View
                                </a>

                                <a class="btn btn-primary px-3 py-2 btn-sm rounded ml-2 mr-auto"
                                    href="{{ route('coverage.custom',['client_id'=> request('client_id'),'id'=>$r->coverage->id,'report_id'=>$r->coverage->report_id]) }}">
                                    Edit
                                </a>
                            </div>
                        </div>
                        @if($r->coverage->cover)
                        <div class="cover"
                            style="background: url({{Storage::url($r->coverage->cover)}}) top/cover; height:226px ; width:100%">
                        </div>
                        @else
                        <div class="cover"
                            style="background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQQxxOHodeBBvPKkfZJX8z6E_3xZGtKx2eW9Qn1xgFmc5cQ6zzR&usqp=CAU) top/cover; height:226px ; width:100%">
                        </div>
                        @endif
                    </div>
                    <div class="rep_title bg-dark py-2 px-2">
                        <p class="mb-0 text-white title text-left">{{$r->coverage->title}}</p>
                        <p class="date text-white title text-left mb-0"><i class="fa fa-calendar mr-1"></i>
                            <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($r->coverage->created_at))->diffForHumans() ?>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
</div>

@endsection