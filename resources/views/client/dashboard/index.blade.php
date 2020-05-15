@extends('layouts.client')

@push('css')
<script src="{{ 'admins/assets/libs/morris.js/morris.css' }}"></script>
<style>
    .switch input[type=checkbox] {
        height: 0;
        width: 0;
        visibility: hidden;
    }

    .switch label {
        cursor: pointer;
        width: 56px;
        height: 28px;
        background: lightgray;
        display: block;
        border-radius: 7px;
        position: relative;
    }

    .switch label:before {
        content: attr(data-off);
        position: absolute;
        top: 1.4px;
        right: 0;
        font-size: 8.4px;
        padding: 7px 7px;
        color: white;
    }

    .switch input:checked+label:before {
        content: attr(data-on);
        position: absolute;
        left: 0;
        font-size: 8.4px;
        padding-left: 7px;
        color: white;
    }

    .switch label:after {
        content: '';
        position: absolute;
        top: 1.4px;
        left: 1.4px;
        width: 25.2px;
        height: 25.2px;
        background: #fff;
        border-radius: 5.6px;
    }

    .switch input:checked+label {
        background: #007bff;
    }

    .switch input:checked+label:after {
        -webkit-transform: translateX(28px);
        transform: translateX(28px);
    }
</style>

@endpush


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
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome, {{auth::user()->name}}!
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
                                <h2 class="text-dark mb-1 font-weight-medium">{{ numberFormatShort($clientCount) }}</h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Clients</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">
                                {{ numberFormatShort($urlsCount) }}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Press Secured </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">{{ numberFormatShort($socialShareCount) }}
                                </h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Social Share</h6>
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
                            <h2 class="text-dark mb-1 font-weight-medium">{{ numberFormatShort($pressViews) }}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Estimated Press Views
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End First Cards -->
        <!-- *************************************************************** -->
        <!-- *************************************************************** -->
        <!-- Start Sales Charts Section -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Press Pieces</h4>
                        <div id="morris-line-chart" class="mt-2" style="height:283px; width:100%;"></div>
                        {{-- <ul class="list-style-none mb-0">
                            <li>
                                <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                <span class="text-muted">Direct Sales</span>
                                <span class="text-dark float-right font-weight-medium">$2346</span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                <span class="text-muted">Referral Sales</span>
                                <span class="text-dark float-right font-weight-medium">$2108</span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-cyan font-10 mr-2"></i>
                                <span class="text-muted">Affiliate Sales</span>
                                <span class="text-dark float-right font-weight-medium">$1204</span>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Net Income</h4>
                        <div class="net-income mt-4 position-relative" style="height:294px;"></div>
                        <ul class="list-inline text-center mt-5 mb-2">
                            <li class="list-inline-item text-muted font-italic">Sales for this month</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Sales Charts Section -->
        <!-- *************************************************************** -->
        <!-- Start Top Leader Table -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <h4 class="card-title">Clients</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap v-middle mb-0">
                                <thead>
                                    <tr class="border-0">
                                        <th>Name
                                        </th>

                                        <th class=" text-center">
                                            Email
                                        </th>
                                        <th class=" text-center">
                                            Domain
                                        </th>
                                        <th>No of Reports</th>
                                        <th>Deactivate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $key => $client)

                                    <tr>
                                        <td>
                                            <a href="{{ route('client.dash',$client->id) }}" target="_blank">
                                                {{ $client->name }}</a>
                                        </td>
                                        <td>
                                            {{ $client->email }}
                                        </td>
                                        <td>
                                            {{ $client->domain }}
                                        </td>
                                        <td>
                                            {{ $client->reports()->count() }}
                                        </td>
                                        <td>
                                            <div class="switch">
                                                <input class="switch switch_btn" id="{{ $key }}" name="switch"
                                                    type="checkbox" value="{{ $client->id }}"
                                                    {{ $client->status==1? "checked" : ''}} />
                                                <label data-off="NO" data-on="YES" for="{{ $key }}"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $clients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
</div>
@endsection


@push('script')
<script src="{{ 'admins/assets/libs/morris.js/morris.min.js' }}"></script>
<script src="{{ 'admins/assets/libs/raphael/raphael.min.js' }}"></script>
<script>
    $(function(){
        var line = new Morris.Line({
          element: 'morris-line-chart',
          data: {!! $coverages !!},
            xkey: 'report_date',
            ykeys: ['count'],
            labels: ['Press Pieces']
        });
    })

    $(".switch_btn").click(function(){
        let id = $(this).val();
        let formData = {
            _token:"{{ csrf_token() }}",
            id
        }
        $.ajax({
            url:"{{ route('clients.status') }}",
            method:"POST",
            data:formData,
            success:function(data){
                location.reload();
            },
            error:function(error){
                console.log(error);
            }

        })
    })
</script>
@endpush