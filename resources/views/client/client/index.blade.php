@extends('layouts.client')

@push('css')
<link href="{{asset('admins/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css/')}}" rel="stylesheet">
<style>
    .profile-user-img {
        margin: 0 auto;
        width: 100px;
        padding: 3px;
        border: 3px solid #adb5bd;
    }

    .img-thumbnail {
        box-sizing: border-box;
        min-height: 9.75rem;
        padding: .5rem;
        border: 2px dashed #ced4da;
        border-radius: 0.3rem;
        background: transparent;
    }

    .custom-file-label,
    .custom-file-label::after {
        position: absolute;
        padding: 0.375rem .75rem;
        line-height: 1.5;
        color: #4F5467;
        top: 0;
        right: 0;
        font-size: 15px;
    }

    .switch input[type=checkbox] {
        height: 0;
        width: 0;
        visibility: hidden;
        display: none
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">Client List</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Clients</li>
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
                            <h4 class="card-title my-auto">Client List Table</h4>
                            <a href="{{route('clients.export')}}" class="ml-auto"><button
                                    class="btn btn-outline-success btn-sm"> <i class="fas fa-file-excel"></i> Export
                                    CSV</button></a>
                            @can('create-client')
                            <a href="{{route('clients.create')}}" class=" ml-2 my-auto"> <button
                                    class="btn btn-primary btn-sm"><i class="icon-plus"></i> Add Client</button></a>
                            @endcan
                        </div>

                        <h6 class="card-subtitle">
                        </h6>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Email</th>
                                        <th>URL</th>
                                        <th>Deactivate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($clients as $key => $u)
                                    <tr>
                                        <td>{{++$key}} </td>
                                        <td> {{$u->email}} <span class="badge badge-warning"><a
                                                    href="{{ route('client.dash',$u->id) }}">i</a></span> </td>
                                        <td> <a href="{{$u->domain}}">{{$u->domain}}</a> </td>
                                        <td>
                                            <div class="switch">
                                                <input class="switch switch_btn" id="{{ $key }}" name="switch"
                                                    type="checkbox" value="{{ $u->id }}"
                                                    {{ $u->status==1? "checked" : ''}} />
                                                <label data-off="NO" data-on="YES" for="{{ $key }}"></label>
                                            </div>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{route('clients.edit',$u->id)}}" class="mr-1"> <button
                                                    class="btn btn-primary btn-sm mr-1" data-toggle="tooltip"
                                                    data-placement="top" title="Edit"><i
                                                        class="icon-pencil"></i></button></a>
                                            <div data-toggle="modal" class="toggle-modal" data-id="{{$u->id}}"><button
                                                    class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"><i
                                                        class="icon-trash"></i></button> </div>
                                        </td>
                                    </tr>
                                    @include('admin.modals.deleteModal')
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>URL</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="d-flex">
                                <span class="ml-auto"> {{$clients->links()}}</span>
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
            $('#danger-alert-modal form').attr("action",base_url+"/clients/"+id)
        })

        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            }
        }

        $(".custom-file-input").change(function() {
        readURL(this);
        });

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