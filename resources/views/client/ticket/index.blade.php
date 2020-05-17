@extends('layouts.client')
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">Ticket List</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="/" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Ticket</li>
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
                            <h4 class="card-title my-auto">Add Ticket</h4>
                            <a href="{{route('ticket.create')}}" class="ml-auto">
                                <button class="btn btn-primary btn-sm"><i class="icon-plus"></i> Add Ticket</button>
                            </a>
                        </div>

                        <h6 class="card-subtitle">
                        </h6>
                        <x-Alerts />
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($tickets as $ticket)
                                    <tr>
                                        <td>{{$ticket->title}}
                                        </td>
                                        <td>{{$ticket->content}}</td>
                                        <td>
                                            {{ $ticket->status ? "Open" : "Closed" }}
                                        </td>
                                        <td>
                                            <a href="{{ route('ticket.show',$ticket->id) }}"
                                                class="btn btn-primary btn-sm">View
                                            </a>
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


@endsection



@push('script')
<script src="{{asset('admins/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admins/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
<script src="{{ asset('js/jquery.blockUI.js') }}"></script>
<script>
    $('.dataTables_paginate').remove();
    $('.toggle-modal').on('click',function(){
        let base_url = window.location.origin;
        $('#danger-alert-modal').modal();
        let id = $(this).data('id');
        // $('#danger-alert-modal form').attr("action",base_url+"/admins/users/"+id)
});
</script>
@endpush