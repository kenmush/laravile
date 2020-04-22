@extends('promotor.layouts.app')

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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">Product List</h4>

                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Plan</li>
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
                                    <h4 class="card-title my-auto">Product Table</h4>
                                </div>

                                <h6 class="card-subtitle">
                                </h6>
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>ID</th>
                                                <th>Success Invited</th>
                                                <th>Invite</th>
                                                <th>Share</th>
                                                <th>Affiliate Code</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>1</td>
                                                <td>{{ str_replace('?ref=','',$promotor->affiliate_url)}}</td>
                                                <td><span class="badge badge-success"> [ {{count($promotor->promotorUser)}} ]</span></td>
                                                <td></td>
                                                <td><span class="badge badge-primary"> [ {{$promotor->share}} ] </span></td>
                                                <td><textarea class="form-control">
                                                    <a href="{{url('/affiliate') . $promotor->affiliate_url}}">Goto Url</a>
                                                </textarea></td>
                                            </tr>


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SN</th>
                                                <th>Affiliate URL</th>
                                                <th>Success Invited</th>
                                                <th>Invite</th>
                                                <th>Share</th>
                                                <th>Affiliate Code</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="d-flex">

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
