@extends('admin.layouts.app')

@push('css')
<link href="{{asset('admins/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css/')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/basic.css" rel="stylesheet">
<style>
    .profile-user-img {
        margin: 0 auto;
        width: 100px;
        padding: 3px;
        border: 3px solid #adb5bd;
    }
    .setting-sidebar #sidebarnav .sidebar-item.selected>.sidebar-link {
        background: none!important;
        color:#000!important;
        box-shadow:none!important;
        font-weight:500!important;
    }

</style>

@endpush

@section('content')
 <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper h-100">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
           <div class="container my-2 p-4">
               <div class="row">
                   <div class="col-md-3">
                        <div class="card border">
                            <div class="card-header border-bottom">
                                Global Setting
                            </div>
                            <nav class="sidebar-nav setting-sidebar pt-0">
                                <ul id="sidebarnav">
                                    <li class="sidebar-item"> <a class="sidebar-link text-info px-4" href="{{route('admin.payment.index')}}"
                                    aria-expanded="false"><i class="icon-credit-card text-info"></i><span
                                        class="hide-menu">Payment
                                    </span></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                   </div>
                   <div class="col-md-9">
                   <form action="{{route('admin.payment.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
          
                        <div class="card border">
                            <div class="card-header border-bottom">
                                <i class="icon-settings"></i> Payment
                            </div>
                            <div class="col-md-12 py-2">
                                <h3 class="mt-2 text-dark px-1"><i class="fab fa-cc-stripe"></i> Stripe</h3>
                                <div class="row m-0 mt-3">
                                    <div class="col-md-10">
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group my-auto row report">
                                                <label for="name col-md-6 mb-0" style="padding:5px"> Enable Stripe </label>
                                                <div class="col-md-6 ml-auto">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="status" value="1" id="customCheck2">
                                                        <label class="custom-control-label" for="customCheck2">Check it to enable Stripe payment method</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group my-auto row report">
                                                <label for="name col-md-6 mb-0" style="padding:5px"> Stripe Key </label>
                                                <div class="col-md-6 ml-auto">
                                                <input name="value['STRIPE_KEY']" class="form-control" autocomplete="" value="{{@$STRIPE_KEY}}" placeholder="Insert Stripe Key" type="text" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group my-auto row report">
                                                <label for="name col-md-6 mb-0" style="padding:5px"> Stripe Secret </label>
                                                <div class="col-md-6 ml-auto">
                                                    <input name="value['STRIPE_SECRET']" class="form-control" autocomplete="" value="{{@$STRIPE_SECRET}}" placeholder="Insert Stripe Secret">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            <div class="px-3 py-2 text-right border-top">
                                <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Save Changes</button>
                            </div>
                        </div>
                       </form>
                   </div>
               </div>
           </div>
        </div>


@endsection

@push('script')
    <script src="{{asset('admins/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone-amd-module.js"></script>
    <script>
        $('.hide').hide();

        $('.toggle-modal').on('click',function(){
            let base_url = window.location.origin;
            $('#danger-alert-modal').modal();
            let id = $(this).data('id');
            $('#danger-alert-modal form').attr("action",base_url+"/admins/users/"+id)
        })

    </script>
@endpush
