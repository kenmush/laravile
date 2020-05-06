@extends('layouts.client')

@push('css')
<link href="{{asset('admins/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css/')}}" rel="stylesheet">
<style>
#coverage .feather-book-open{
    transform: scale(3.5)
}

#coverage button{
    border-radius: 1.2em;
}
#coverage .title{
    font-size: 12px;
    font-weight: 500
}

#coverage .overlay{
    position: absolute;
    background: rgba(0, 0, 0, 0.6);
    top: 0;bottom: 0;left: 0;right: 0;
}
.overlay {
    visibility: hidden;
    transition: .3s ease-in-out
}

.card-coverage:hover .overlay{
    visibility:visible;

}
</style>
@endpush

@section('content')

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper" id="coverage">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">Coverage Report</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="/" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Coverage</li>
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
            <div class="col-md-4 mb-3">
                <div class="shadow-sm bg-info text-center py-5">
                    <div class="d-flex flex-wrap new-cr pt-5 mb-5">
                        <i data-feather="book-open" class="m-auto text-white"></i>
                    </div>
                    <a href="{{route('coverage.new')}}">
                        <button class="btn shadow-sm btn-outline-light mt-auto mb-4 text-white">
                            <i class="fa fa-plus"></i> New Report
                        </button>
                    </a>
                </div>
            </div>
            @foreach($reportCustom as $r)
            <div class="col-md-4 mb-3">
                <div class="shadow-sm bg-white card-coverage text-center">
                    <div class="position-relative">
                        <div class="overlay d-flex">
                            <div class="d-flex m-auto">
                                <button class="btn btn-light px-3 py-2 rounded btn-sm ml-auto">View</button>
                                <a href="{{url('coverage_report/'.$r->slug.'/'.$r->id.'/edit')}}"><button class="btn btn-primary px-3 py-2 btn-sm rounded ml-2 mr-auto">Edit</button></a>
                            </div>
                        </div>
                        @if($r->cover)
                            <div class="cover" style="background: url({{Storage::url($r->cover)}}) top/cover; height:226px ; width:100%"></div>
                        @else
                            <div class="cover" style="background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQQxxOHodeBBvPKkfZJX8z6E_3xZGtKx2eW9Qn1xgFmc5cQ6zzR&usqp=CAU) top/cover; height:226px ; width:100%"></div>
                        @endif
                    </div>
                    <div class="rep_title bg-dark py-2 px-2">
                        <p class="mb-0 text-white title text-left">{{$r->title}}</p>
                        <p class="date text-white title text-left mb-0"><i class="fa fa-calendar mr-1"></i> <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($r->created_at))->diffForHumans() ?>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
</div>
</div>
<x-model />
@endsection

@push('script')
<script src="{{asset('admins/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admins/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
<script>
    $('.hide').hide();
        $('.dataTables_paginate').remove();
</script>
@endpush
