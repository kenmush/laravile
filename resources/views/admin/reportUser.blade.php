@extends('admin.layouts.app')

@push('css')
<link href="{{asset('admins/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css/')}}" rel="stylesheet">
<style>
    .label {
        display: inline-flex;
        align-items: center;
        cursor: pointer;
    }

    .label-text {
        margin-left: 8px;
    }

    .toggle {
        isolation: isolate;
        position: relative;
        height: 18px;
        width: 32px;
        border-radius: 15px;
        background: #d6d6d6;
        overflow: hidden;
    }

    .toggle-inner {
        z-index: 2;
        position: absolute;
        top: 1px;
        left: 1px;
        height: 16px;
        width: 30px;
        border-radius: 15px;
        overflow: hidden;
    }

    .active-bg {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 200%;
        background: #003dda;
        transform: translate3d(-100%, 0, 0);
        transition: transform 0.05s linear 0.17s;
    }

    .toggle-state {
        display: none;
    }

    .indicator {
        height: 100%;
        width: 200%;
        background: white;
        border-radius: 13px;
        transform: translate3d(-75%, 0, 0);
        transition: transform 0.35s cubic-bezier(0.85, 0.05, 0.18, 1.35);
    }

    .toggle-state:checked~.active-bg {
        transform: translate3d(-50%, 0, 0);
    }

    .toggle-state:checked~.toggle-inner .indicator {
        transform: translate3d(25%, 0, 0);
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">Report List</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Report</li>
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
                            <h4 class="card-title my-auto">Report List Table</h4>

                            <div class="pl-3">
                                <select name="user_id" class="form-control-sm" id="user_id">
                                    <option value="" selected disabled>Select User</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ request('user') == $user->id ? "selected" : '' }}>{{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="pl-3">
                                <select name="client_id" class="form-control-sm" id="client_id">
                                    <option value="" selected disabled>Select Client</option>
                                    @foreach ($clients as $client)
                                    <option value="{{ $client->id }}"
                                        {{ request('client') == $client->id ? "selected" : '' }}>{{ $client->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <a href="{{route('admin.report.create')}}" class="ml-auto">
                                <button class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-file-excel"></i>
                                    Export CSV
                                </button>
                            </a>
                        </div>

                        <h6 class="card-subtitle">
                        </h6>
                        <div class="table-responsive">
                            <table id="default_order" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>Generated By</th>
                                        <th>Name</th>
                                        <th>Report Link</th>
                                        <th>Created At</th>
                                        <th>Link Sharing</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($report as $key => $u)
                                    <tr>
                                        <td>
                                            {{$u->user->name}}
                                        </td>
                                        <td>{{$u->name}}</td>
                                        <td> <a href="{{ route('report.show',$u->id) }}"
                                                target="_blank">{{$u->name }}</a>
                                        </td>
                                        <td>{{$u->created_at}}</td>
                                        <td>
                                            <label class="label">
                                                {{-- <div class="toggle">
                                                    <input class="toggle-state" type="checkbox"
                                                        name="is_sharing_check" value="1" @if($u->is_sharing_active ==
                                                    1) checked
                                                    @endif value="check" />
                                                    <div class="toggle-inner">
                                                        <div class="indicator"></div>
                                                    </div>
                                                    <div class="active-bg bg-primary" data-toggle="tooltip" title="On">
                                                    </div>
                                                </div> --}}
                                                <div class="switch">
                                                    <input class="switch switch_btn" id="{{$key}}" data-id="{{$u->id}}" name="is_sharing_check"
                                                        type="checkbox" value="check"
                                                        {{ $u->is_sharing_active ==1? "checked" : ""}} />
                                                    <label data-off="NO" data-on="YES" for="{{$key}}"></label>
                                                </div>
                                            </label>
                                        </td>

                                    </tr>
                                    @include('admin.modals.deleteModal')
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Generated By</th>
                                        <th>Name</th>
                                        <th>Report Link</th>
                                        <th>Created At</th>
                                        <th>Link Sharing</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="d-flex">
                                <span class="ml-auto"> {{$report->links()}}</span>
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
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="{{asset('admins/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admins/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
<script>
    $('.hide').hide();
        $('.dataTables_paginate').remove();

        $('input[name="is_sharing_check"]').on('change',function(){

            let is_sharing_active = '';
            if($(this).is(':checked')){
                is_sharing_active = 1;
            }else{
                is_sharing_active = 0;
            }

            let id = $(this).data('id');
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.post("{{route('admin.report.store')}}",{
                "_token": "{{ csrf_token() }}",
                'id' : id,
                'check' :is_sharing_active
            },function(res){

            })
        })

        let base_url = window.location.origin;
        $('.toggle-modal').on('click',function(){
            $('#danger-alert-modal').modal();
            let id = $(this).data('id');
            $('#danger-alert-modal form').attr("action",base_url+"/admin/plans/"+id)
        })

        let id = "{{request()->route()->parameter('report')}}";
        if(id)
        $('.dataTables_length option[value='+id+']').attr('selected','selected');

        $('select[name="default_order_length"]').change(function(){
            let sort = $(this).val();
            location.href =  base_url+'/admin/report/'+sort;
        })

    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('#user_id').select2({
        allowClear: true,
        placeholder :'Select User'
    });

    $('#client_id').select2({
        allowClear: true,
        placeholder :'Select Client'
    });
});

$('#user_id').change(function(){
    let userId = $(this).val();
    let clientId = " {{ request('client') }}";
    if(!clientId){
        clientId = '';
    }
    if(!userId){
        userId = '';
    }
    window.location.href = "{{ route('admin.report.index') }}"+'?user='+userId+'&client='+clientId;

});
$('#client_id').change(function(){
    let clientId = $(this).val();
    let userId = "{{ request('user') }}";
    if(!clientId){
        clientId = '';
    }
    if(!userId){
        userId = '';
    }
    window.location.href = "{{ route('admin.report.index') }}"+'?user='+userId+'&client='+clientId;
});
</script>
@endpush
