@extends('layouts.client')

@push('css')
<link href="{{asset('admins/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css/')}}" rel="stylesheet">
<style>
#coverage h2 {
    font-weight: 500
}
#coverage .icon i{
    font-size: 58px
}
#coverage h3 {
    font-weight: 500
}

#coverage button{
    border-radius: 1.2em;
}
</style>
@endpush

@section('content')

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper" id="coverage">
    <div class="container px-5 text-center p-3">
        <h2 class="mt-4 text-dark">Start by adding some coverage to this Report</h2>
        (You can keep adding more later if you need to)

        <div class="px-5">
            <div class="row p-5">
                <div class="col-md-6 px-5">
                   <div class="shadow-sm bg-white py-4 px-3">
                        <div class="icon mt-4">
                            <i class="fa fa-globe"></i>
                        </div>
                        <h3 class="mt-3 text-dark"> Online Coverage</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus commodi hic non in, </p>
                        <a href=""><button class="btn btn-outline-info mb-4"><i class="fa fa-plus"></i>  Add online</button></a>
                   </div>
                </div>
                <div class="col-md-6 px-5">
                   <div class="shadow-sm bg-white py-4 px-3">
                        <div class="icon mt-4">
                            <i class="fa fa-book"></i>
                        </div>
                        <h3 class="mt-3 text-dark"> Custom Coverage</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus commodi hic non in, </p>
                       <button class="btn btn-outline-info mb-4" data-toggle="modal" data-target="#custom-data"><i class="fa fa-plus"></i>  Add Custom</button></a>
                   </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    <div id="custom-data" class="modal fade hide" tabindex="-1" role="dialog" aria-modal="true" style="padding-right: 17px; display: block;">
        <div class="modal-dialog modal-lg">

            <div class="modal-content modal-filled bg-white">
                <div class="modal-body p-4 px-5">
                    <p for="" class="text-dark"><i class="fa fa-book"></i> Custom Coverage Report</p>
                    <hr>
                    <h3 class="text-dark">Create Report Title and Select Cover Image</h3>
                    <form action="{{route('coverage_report.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <label for="" class="text-dark">Report Title</label>
                            <input type="text" class="form-control" name="title">

                            <label for="" class="text-dark  mt-2">Cover Image</label>
                            <div class="custom-file">
                                <input type="file" name="cover" class="custom-file-input" id="inputGroupFile04" accept="image/gif, image/jpeg, image/png">
                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                            </div>
                            <button type="submit" class="btn btn-success mt-3 mb-4 px-4 rounded">Create</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

</div>
</div>

@endsection

@push('script')
<script src="{{asset('admins/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admins/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
<script>
    $('.hide').hide();
        $('.dataTables_paginate').remove();
</script>
@endpush
