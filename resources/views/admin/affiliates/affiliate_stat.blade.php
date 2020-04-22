@extends('admin.layouts.app')

@push('css')
<link href="{{asset('admins/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css/')}}" rel="stylesheet">
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">Affiliate Statistics</h4>

                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                <li class="breadcrumb-item text-muted active" aria-current="page"> <a href="{{route('admin.affiliate.index')}}"> Affiliate </a></li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">{{$name[0]}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex mb-4">
                                    <h4 class="card-title my-auto">Sales & Profit</h4>
                                </div>

                                <h6 class="card-subtitle">
                                </h6>
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Affiliate URL</th>
                                                <th>Sales Amount</th>
                                                <th>Comission</th>
                                                <th>Affiliate Earning</th>
                                                <th>Date/Time</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sales as $key => $s)
                                            <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$s['affiliate_url']}} </td>
                                                    <td>
                                                        @if($s['has_refund'] == 1)
                                                            <span class="badge badge-danger">$0.00 (Refunded)</span>
                                                        @else
                                                            <span class="badge badge-info">$ {{$s->paymentInfo['amount']/100}}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$s->comission}}%</td>
                                                    <td>
                                                        @if($s['has_refund'] == 1)
                                                            <span class="badge badge-danger">$0.00 (Refunded)</span>
                                                        @else
                                                            <span class="badge badge-success">$ {{$s->earn_value}}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$s->paymentInfo['created_at']}} </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SN</th>
                                                <th>Affiliate URL</th>
                                                <th>Sales Amount</th>
                                                <th>Comission</th>
                                                <th>Affiliate Earning</th>
                                                <th>Date/Time</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="d-flex">
                                        <span class="mr-auto">{{$sales->links()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex mb-4">
                                    <h4 class="card-title my-auto">Referral Traffic</h4>
                                </div>

                                <h6 class="card-subtitle">
                                </h6>
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Affiliate</th>
                                                <th>Ip Address</th>
                                                <th>Browser</th>
                                                <th>Device</th>
                                                <th>Operating System</th>
                                                <th>Has Registered (id)</th>
                                                <th>Date/Time</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($track as $key=>$t)
                                        <tr>
                                            <td id="accordion">
                                                {{$t->affiliate_url}}
                                                <button class="btn btn-info btn-sm ml-2" data-toggle="collapse" data-target="#collapseOne{{$key}}" >
                                                    <i class="fa fa-chevron-down"></i>
                                                </button>
                                                <div id="collapseOne{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">

                                                        <h5 class="badge badge-info">Visited Url</h5>

                                                        @forelse ($t->view as $v)
                                                            <li>{{$v->url}}</li>
                                                        @empty
                                                            <p> No url visited</p>
                                                        @endforelse

                                                </div>
                                            </td>
                                            <td>{{$t->ip_address}}</td>
                                            <td>{{$t->browser}}</td>
                                            <td>{{$t->device}}</td>
                                            <td>{{$t->operating_system}}</td>
                                            <td>{{$t->user->email ?? 'not registered'}}</td>
                                            <td>{{$t->created_at}}</td>

                                        </tr>



                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Affiliate</th>
                                                <th>Ip Address</th>
                                                <th>Browser</th>
                                                <th>Device</th>
                                                <th>Operating System</th>
                                                <th>Has Registered (id)</th>
                                                <th>Date/Time</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="d-flex">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                Copyright {{ now()->year }} || CoveredPress

            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
    </div>
@endsection
@push('script')
    <script src="{{asset('admins/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script>
        let base_url = window.location.origin;
        $('.hide').hide();
        $('.dataTables_paginate').remove();
        $('.toggle-modal').on('click',function(){
            $('#danger-alert-modal').modal();
            let id = $(this).data('id');
            $('#danger-alert-modal form').attr("action",base_url+"/admin/affiliate/"+id)
        })


        $('.toggle-view').on('click',function(){
            $('#stat')
        })
        let id = "{{request()->route()->parameter('user')}}";
        if(id)
        $('.dataTables_length option[value='+id+']').attr('selected','selected');

        $('select[name="zero_config_length"]').change(function(){
            let sort = $(this).val();
            location.href =  base_url+'/admin/users/'+sort;
        })
    </script>
@endpush
