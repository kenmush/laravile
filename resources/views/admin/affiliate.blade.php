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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">Affiliates List</h4>

                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Affiliates</li>
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
                                    <h4 class="card-title my-auto">Affiliate List Table</h4>
                                    <a href="{{route('admin.affiliates.create')}}" class=" ml-auto my-auto"> <button class="btn btn-primary btn-sm"><i class="icon-plus"></i> Add Plan</button></a>
                                </div>

                                <h6 class="card-subtitle">
                                </h6>
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>No of referrals</th>
                                                <th>Total Earnings</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            @foreach($affiliates as $u)
                                            <tr>
                                                <td>{{$u->name}}</td>
                                                <td>{{$u->referrals}}</td>
                                                <td>{{$u->earnings}}</td>
                                                <td class="d-flex"> 
                                                    <a href="{{route('admin.affiliates.edit',$u->id)}}"> <button class="btn btn-primary btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="Edit" ><i class="icon-pencil" ></i></button></a>
                                                    <div data-toggle="modal" class="toggle-modal" data-id="{{$u->id}}"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="icon-trash" ></i></button> </div> 
                                                </td>
                                            </tr>
                                            @include('admin.modals.deleteModal')
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>User Name</th>
                                                <th>No of referrals</th>
                                                <th>Total Earnings</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="d-flex">
                                        <span class="ml-auto"> {{$Affiliates->links()}}</span>
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
        $('.hide').hide();
        $('.dataTables_paginate').remove();
        $('.toggle-modal').on('click',function(){
            let base_url = window.location.origin;
            $('#danger-alert-modal').modal();
            let id = $(this).data('id');
            $('#danger-alert-modal form').attr("action",base_url+"/admin/Affiliates/"+id)
        })
    </script>
@endpush
