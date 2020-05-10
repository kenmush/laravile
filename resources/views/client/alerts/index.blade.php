@extends('userclient.layouts.app')
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">Alert List</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="/" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Alerts</li>
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
                            <h4 class="card-title my-auto">Add Alert List</h4>
                            <a href="{{route('alert.create',request('client_id'))}}" class="ml-auto">
                                <button class="btn btn-primary btn-sm"><i class="icon-plus"></i> Add Alert</button>
                            </a>
                        </div>

                        <h6 class="card-subtitle">
                        </h6>
                        <x-Alerts />
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>keywords</th>
                                        <th>Urls</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($alerts as $alert)
                                    <tr>
                                        <td>{{$alert->name}}
                                        </td>
                                        <td>{{$alert->keywords}}</td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-primary getUrls"
                                                data-id="{{ $alert->id }}">Get</a>
                                        </td>
                                        <td>
                                            <div data-toggle="modal" class="toggle-modal delete_btn"
                                                data-url="{{ route('alert.destroy',['client_id'=> request('client_id'),'alert'=>$alert->id]) }}">
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



{{-- Modal  --}}
<div class="modal fade" id="suggetion-urls" tabindex="-1" role="dialog" aria-labelledby="suggetion-urls-label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="suggestionUrlsAction">
                <div class="modal-header">
                    <h5 class="modal-title" id="suggetion-urls-label">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12" id="urls_placeholder" >
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>

            </form>
        </div>
    </div>
</div>
{{-- Modal end --}}

<x-model />
@endsection



@push('script')
<script src="{{asset('admins/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admins/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
<script src="{{ asset('js/jquery.blockUI.js') }}"></script>
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


    $('.getUrls').click(function(){
        showLoader();
        let id = $(this).data('id');
        $.ajax({
            url:"{{ url('/').'/'.request('client_id').'/alert/' }}"+id,
            method:"GET",
            success:function(data){
                hideLoader();
                $('#urls_placeholder').html(data);
                $('#suggetion-urls').modal('show');
            },
            error:function(error){
                hideLoader();
                console.log(error);
            }
        })
        
    })
</script>


<script>

$("#suggestionUrlsAction").submit(function(e){
    e.preventDefault();
    let urls = $('input[name="urls"]:checked').map(function () {  
        return this.value;
        }).get().join(",");

    if(urls == ""){
        alert('Please select url');
        return false;
    }

    location.href = "{{ route('coverage.new',request('client_id')) }}"+'?urls='+urls;
})
</script>
@endpush