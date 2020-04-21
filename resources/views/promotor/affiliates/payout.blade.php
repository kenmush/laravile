@extends('promotor.layouts.app')

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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">Payment Request List</h4>

                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Payment</li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex mb-4">
                                    <h4 class="card-title my-auto">Create Payment Request</h4>
                                </div>

                                <h6 class="card-subtitle">
                                </h6>

                                <div class="col-md-9 pt-3 p-0">
                                    <form action="{{route('promotor.affiliate.payout.store')}}" method="POST">
                                        <div class="col-lg-12 d-flex flex-wrap mb-3">
                                            @csrf
                                            <div class="custom-control col-md-4 col-12 my-auto">
                                                <label>
                                                    Payment Method
                                                </label>
                                            </div>
                                            <div class="form-group col-md-8 my-auto col-12 ml-auto report">
                                                <select name="payment_method" id="" class="form-control custom-select @error("payment_method") is-invalid @enderror">
                                                    <option value="" selected disabled>Select a Payment Method</option>
                                                    <option value="PAYPAL">Paypal</option>
                                                    <option value="STRIPE">Stripe</option>
                                                </select>
                                                <div>
                                                    @error('payment_method') <small class="text-danger w-100">{{ $message }}</small> @enderror
                                                </div>
                                                {{-- <input class="form-control @error('report') is-invalid @enderror" name="report" @if(request()->route()->parameter('plan')) value="{{$plan->report}}" @else value="{{ old('report') }}" @endif  autocomplete="" placeholder="Reports" type="number" > --}}
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-flex flex-wrap mb-3">
                                            <div class="custom-control col-md-4 col-12 mt-2">
                                                <label>
                                                    Email
                                                </label>
                                            </div>
                                            <div class="form-group col-md-8 col-12 my-auto ml-auto">
                                                <input class="form-control @error('email') is-invalid @enderror" value="{{Auth::user()->email}}" name="email" @if(request()->route()->parameter('email')) value="{{$plan->report}}" @else value="{{ old('email') }}" @endif  autocomplete="" placeholder="Email" type="email" >
                                                <small>We are not responsible for lost payments due to filling this out incorrectly!</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-flex flex-wrap mb-3">
                                            <div class="custom-control col-md-4 col-12 mt-2">
                                                <label>
                                                    Verify Email
                                                </label>
                                            </div>
                                            <div class="form-group col-md-8 col-12 my-auto ml-auto report">
                                                <input class="form-control @error('email_confirmation') is-invalid @enderror" @if(request()->route()->parameter('confirm_email')) value="{{$plan->report}}" @else value="{{ old('email_confirmation') }}" @endif  name="email_confirmation" placeholder="Verify Email" type="email" >
                                                <small>Verify Payment Email</small>
                                                <div>
                                                @error('email_confirmation') <small class="text-danger w-100">{{ $message }}</small> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-flex mb-3 flex-wrap">
                                            <div class="custom-control col-12 col-md-4 mt-2">
                                                <label>
                                                    Request Amount
                                                </label>
                                            </div>
                                            <div class="form-group col-md-8 col-12 my-auto ml-auto report">
                                                <input class="form-control @error('amount') is-invalid @enderror" name="amount" min="1" max="{{$totalEarning}}" step="any" value="" required  autocomplete="" placeholder="Amount" type="number" value="{{ old('amount') }}">
                                                <small>* Must meet minimum payout ($1.00) | <span class="text-primary" style="font-weight:500"> Your Balance: ${{$totalEarning}}</span></small>
                                                <div>
                                                    @error('amount') <small class="text-danger w-100">{{ $message }}</small> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-flex mb-3 flex-wrap">
                                            <div class="custom-control col-12 col-md-4 mt-2">
                                                <label>

                                                </label>
                                            </div>
                                            <div class="form-group col-md-8 col-12 my-auto ml-auto report">
                                                <button class="btn btn-success">Submit Request</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                                <th>Payment Method</th>
                                                <th>Email</th>
                                                <th>Request Amount</th>
                                                <th>Status</th>
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
                                                        @if($s['status'] == 0)
                                                            <button class="btn btn-warning btn-sm rounded"><i class="far fa-clock"></i> Pending</button>
                                                        @endif
                                                        @if($s['status'] == 1)
                                                            <button class="btn btn-success btn-sm"><i class="fa fa-check"></i> Success</button>
                                                        @endif
                                                        @if($s['status'] == 2)
                                                            <button class="btn btn-success btn-sm"><i class="fa fa-times"></i> Rejected</button>
                                                        @endif
                                                    </td>
                                                    <td>{{$s->created_at}} </td>
                                                    <td>  <div data-toggle="modal" class="toggle-modal" data-id="{{$s->id}}"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="icon-trash" ></i></button> </div></td>
                                            </tr>
                                            @include('promotor.affiliates.modals.deleteModal')
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                   
                                                <th>Payment Method</th>
                                                <th>Email</th>
                                                <th>Request Amount</th>
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
      
        function printSomething(){
        
            window.scrollTo(0,document.body.scrollHeight);
        }
        $('.hide').hide();
        $('.dataTables_paginate').remove();
        let base_url = window.location.origin;
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
            location.href =  base_url+'/promotor/payout/'+sort;
        })

        if(id)
            setTimeout(printSomething, 500);
        
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
