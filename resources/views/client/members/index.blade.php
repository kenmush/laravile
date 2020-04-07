@extends('layouts.client')

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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">Team Members List</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="/" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Team Members</li>
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
                            <h4 class="card-title my-auto">Team Members</h4>
                            <a href="{{route('team-members.create')}}" class="ml-auto">
                                <button class="btn btn-primary btn-sm"><i class="icon-plus"></i> Add Member</button>
                            </a>
                        </div>

                        <h6 class="card-subtitle">
                        </h6>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Profile Pic</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}
                                            @if(auth()->user()->id == $user->id)
                                            <span class="rounded shadow-sm d-inline-block bg-success p-2 show"></span>
                                            @endif
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if (!empty($user->profile_picture))
                                            <img src="{{ Storage::url($user->profile_picture) }}" alt="logo" width="50">
                                            @endif
                                        </td>
                                        <td>
                                            <div data-toggle="modal" class="toggle-modal delete_btn"
                                                data-url="{{ route('team-members.destroy',$user->id) }}">
                                                <button class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                    data-placement="top" title="Delete">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
</div>
</div>


<div id="danger-alert-modal" class="modal fade hide" tabindex="-1" role="dialog" aria-modal="true"
    style="padding-right: 17px; display: block;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled bg-white">
            <div class="modal-body p-4">
                <form action="#" method="POST" id="formDelete">
                    @csrf
                    @method('delete')
                    <div class="text-center">
                        <i class="dripicons-wrong h1"></i>
                        <h4 class="mt-2 text-dark"><i class="fa fa-info-circle text-info" style="font-size: 46px;"></i>
                        </h4>
                        <p class="mt-3 text-dark">Are You Sure?</p>
                        <div class="d-flex">
                            <button type="button" class="btn btn-primary my-2 btn-sm mr-2 ml-auto"
                                data-dismiss="modal">Cancel</button>

                            <button type="submit" class="btn btn-danger btn-sm my-2 mr-auto">Continue</button>

                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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
            // $('#danger-alert-modal form').attr("action",base_url+"/admins/users/"+id)
        })


    $('.delete_btn').click(function(){
        let url = $(this).data('url');
       $('#formDelete').attr('action',url);
    });    
</script>
@endpush