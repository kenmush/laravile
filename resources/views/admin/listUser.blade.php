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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">Users List</h4>

                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">User</li>
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
                {{$users}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex mb-4">
                                    <h4 class="card-title my-auto">User List Table</h4>
                                    <a href="{{route('admin.export')}}" class="ml-auto"><button class="btn btn-outline-success btn-sm"> <i class="fas fa-file-excel"></i> Export CSV</button></a>
                                    <a href="{{route('admin.users.create')}}" class=" ml-2 my-auto"> <button class="btn btn-primary btn-sm"><i class="icon-plus"></i> Add User</button></a>
                                </div>
     
                                <h6 class="card-subtitle">
                                </h6>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Plan</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                     
                                            @foreach($users  as $u)
                                            <tr>
                                                <td>
                                                    @if($u->activePlan)
                                                        {{$u->activePlan['title']}}
                                                    @else
                                                        No Plan
                                                    @endif  
                                                </td>
                                                <td>{{$u->name}} @if(Auth::user()->id == $u->id)<span class="rounded shadow-sm d-inline-block bg-success p-2 show"></span>@endif </td>
                                                <td>{{$u->email}}</td>
                                                <td> @if($u->role_id == 1) <div class="badge badge-info"> @else <div class="badge badge-danger">  @endif {{$u->role_value}}</div> </td>
                                                <td>{{$u->created_at}}</td>
                                                <td class="d-flex"> 

                                                    <a href="{{route('admin.users.edit',$u->id)}}"> <button class="btn btn-primary btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="Edit" ><i class="icon-pencil" ></i></button></a>
                                                    <div data-toggle="modal" class="toggle-modal ml-1" data-id="{{$u->id}}"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="icon-trash" ></i></button> </div>
                                                     
                                                </td>
                                            </tr>
                                            @include('admin.modals.deleteModal')
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Plan</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="d-flex">
                                        <span class="ml-auto"> {{$users->links()}}</span>
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
            $('#danger-alert-modal form').attr("action",base_url+"/admin/users/"+id)
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
