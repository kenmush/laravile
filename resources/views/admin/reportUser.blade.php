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

.toggle-state:checked ~ .active-bg {
   transform: translate3d(-50%, 0, 0);
}

.toggle-state:checked ~ .toggle-inner .indicator {
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
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                                <option selected>Aug 19</option>
                                <option value="1">July 19</option>
                                <option value="2">Jun 19</option>
                            </select>
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
                                    <a href="{{route('admin.report.create')}}" class="ml-auto"><button class="btn btn-outline-success btn-sm"> <i class="fas fa-file-excel"></i> Export CSV</button></a>
                                </div>

                                <h6 class="card-subtitle">
                                </h6>
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>User Email</th>
                                                <th>Name</th>
                                                <th>Report Link</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($report as $u)
                                            <tr>
                                                <td><button class="btn btn-outline-info btn-sm"><i class="fa fa-envelope"></i> {{$u->user_value}}</button> </td>
                                                <td>{{$u->name}}</td>
                                                <td> <a href="{!!$u->report_link !!}" target="_blank">{{$u->report_link }}</a> </td>
                                                <td>{{$u->created_at}}</td>
                                                <td><label class="label">
                                                    <div class="toggle">
                                                      <input class="toggle-state" type="checkbox" data-id="{{$u->id}}" name="is_sharing_check" value="1" @if($u->is_sharing_active == 1) checked @endif value="check" />
                                                      <div class="toggle-inner">
                                                         <div class="indicator"></div>
                                                      </div>
                                                      <div class="active-bg bg-primary"  data-toggle="tooltip" title="On"></div>
                                                    </div>
                                                    <div class="label-text"> Link Sharing</div>
                                                  </label>
                                                </td>

                                            </tr>
                                            @include('admin.modals.deleteModal')
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>User Email</th>
                                                <th>Name</th>
                                                <th>Report Link</th>
                                                <th>Created At</th>
                                                <th>Action</th>
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
                All Rights Reserved by Adminmart. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
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
        $('.toggle-modal').on('click',function(){
            let base_url = window.location.origin;
            $('#danger-alert-modal').modal();
            let id = $(this).data('id');
            $('#danger-alert-modal form').attr("action",base_url+"/admin/plans/"+id)
        })
    </script>
@endpush
