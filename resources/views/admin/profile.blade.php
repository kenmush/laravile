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
                                <i class="icon-user"></i>
                                About me
                            </div>
                            <div class="col-md-12 p-0 text-center pb-2 pt-3">
                                <div class="profile-user-img rounded-circle">
                                    @if(isset($profile->profile_picture))
                                        <div style="background:url({{Storage::url($profile->profile_picture)}})no-repeat center/cover; width:87px;height:86px" alt="user" class="rounded-circle p-2 m-auto"
                                            >
                                        </div>
                                    @else
                                    <div style="background:url(https://1.bp.blogspot.com/--ucL-rXn-Ec/VLwta4arOvI/AAAAAAAABHU/LzjxpJ_cA-g/s1600/wallpaper-for-facebook-profile-photo-738967.jpg)no-repeat center/cover; width:87px;height:86px" alt="user" class="rounded-circle p-2 m-auto"
                                        >
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="text-center">
                                <h3 class="text-dark mb-1" style="font-weight:500">{{$profile->name}}</h3>
                                <p>{{strtolower($profile->role_value)}}</p>
                            </div>
                            <div class="text-center mb-3 px-1">
                                <button class="btn btn-outline-primary"><i class="fa fa-envelope"></i> {{$profile->email}}</button>
                            </div>
                        </div>
                   </div>
                   <div class="col-md-9">
                    <form action="{{route('admin.profile.update',$profile->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card border">
                            <div class="card-header border-bottom">
                                <i class="icon-equalizer"></i> Setting
                            </div>
                            <div class="col-md-12 py-2">
                                <h3 class="mt-2 text-dark px-1"> Main Fields</h3>
                                <div class="row m-0 mt-3">
                                    <div class="col-md-6">
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group my-auto row report">
                                                <label for="name col-md-6 mb-0" style="padding:5px"> Name </label>
                                                <div class="col-md-9 ml-auto">
                                                <input class="form-control @error('report') is-invalid @enderror" autocomplete="" name="name" value="{{$profile->name}}" placeholder="Name" type="text" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group my-auto row report">
                                                <label for="name col-md-6 mb-0" style="padding:5px"> Email </label>
                                                <div class="col-md-9 ml-auto">
                                                    <input name="email" class="form-control" value="{{$profile->email}}" placeholder="Email" type="email" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group my-auto row report">
                                                <label for="name col-md-6 mb-0" style="padding:5px"> Password </label>
                                                <div class="col-md-9 ml-auto">
                                                    <input name="password" class="form-control" autocomplete="false" placeholder="Insert new password" type="password" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group my-auto row report">
                                                <label for="name col-md-6 mb-0" style="padding:5px"> Avatar </label>
                                                <div class="col-md-9 ml-auto">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="profile_picture" class="custom-file-input" id="inputGroupFile04">
                                                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group my-auto row report">
                                                <label for="name col-md-6 mb-0" style="padding:5px"> Role </label>
                                                <div class="col-md-9 ml-auto">
                                                    <div class="input-group">
                                                        <select class="custom-select" id="inlineFormCustomSelect" name="role_id">
                                                            <option selected="{{$profile->id}}" disabled>{{$profile->role_value}}</option>
                                                            <option value="1">Admin</option>
                                                            <option value="2">User</option>
                                                        </select>
                                                    </div>
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

        $("#profile").dropzone({ url: "/file/post" });
    </script>
@endpush
