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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">Payout Request List</h4>

                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Request</li>
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
                                    <h4 class="card-title my-auto">Payment Request Table</h4>
                                </div>

                                <h6 class="card-subtitle">
                                </h6>
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Method</th>
                                                <th>Email</th>
                                                <th>Amount</th>
                                                <th class="w-50">Status</th>
                                                <th>Date/Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($payouts as $key => $s)
                                            <tr>
                                                    <td>{{$s['payment_method']}} </td>
                                                    <td>
                                                        {{$s['email']}}
                                                    </td>
                                                    <td><span class="badge badge-success"> $ {{$s['amount']}} </span></td>
                                                    <td>

                                                        <select name="status" data-id="{{$s->id}}" class="form-control custom-select bg-white" id="">
                                                            <option value="{{$s->status}}" disabled selected>
                                                                @if($s->status == 0)
                                                                    Pending
                                                                @elseif($s->status == 1)
                                                                    Accepted
                                                                @else
                                                                    Rejected
                                                                @endif
                                                            </option>
                                                            <option value="0">Pending</option>
                                                            <option value="1">Accept</option>
                                                            <option value="2">Reject</option>
                                                        </select>

                                                    </td>
                                                    <td>{{$s->created_at}} </td>
                                                    <td>  <div data-toggle="modal" class="toggle-modal" data-id="{{$s->id}}"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="icon-trash" ></i></button> </div></td>
                                            </tr>
                                            @include('promotor.affiliates.modals.deleteModal')
                                            @include('admin.modals.payout')
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>

                                                <th>Method</th>
                                                <th>Email</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date/Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="d-flex">
                                        <span class="ml-auto"> {{$payouts->links()}}</span>
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
        $(document).on('change','select[name="status"]', function(){
            let id = $(this).data('id');
            let status = $(this).val();
            console.log(status)
            $('#payout-modal').modal('show');
            setTimeout(function(){
                $('#payout-modal form').attr('action',base_url+'/admin/affiliate/payout/status/'+id);
                $('#payout-modal form').append('<input name="status" value="'+status+'" hidden>');
            },300)
        });

        function scroll(){

            window.scrollTo(0,document.body.scrollHeight);
        }
        $('.hide').hide();
        $('.dataTables_paginate').remove();

        $('.toggle-modal').on('click',function(){
            $('#danger-alert-modal').modal();
            let id = $(this).data('id');
            $('#danger-alert-modal form').attr("action",base_url+"/promotor/payout/delete/"+id)
        })
        let id = "{{request()->route()->parameter('id')}}";

        if(id)
            $('.dataTables_length option[value='+id+']').attr('selected','selected');

        $('select[name="default_order_length"]').change(function(){
            let sort = $(this).val();
            location.href =  base_url+'/admin/affiliate/payout/get/'+sort;
        })

        if(id)
            setTimeout(scroll, 500);

        function check(){
            let val = document.querySelector('#pay').value;
            let selector = document.querySelector('#pay');
            let max = $('#pay').attr('maxlength');
            let min = $('#pay').attr('minlength');

            if(val > min && val < max){
                selector.setCustomValidity('')
            }else{
                selector.setCustomValidity('please input valid')
            }
        }

    </script>
@endpush
