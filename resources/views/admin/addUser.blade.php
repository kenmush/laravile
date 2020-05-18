@extends('admin.layouts.app')

@push('css')
<link href="{{asset('admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css/')}}" rel="stylesheet">
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">@if(request()->route()->parameter('user')) Update @else Add @endif User</h4>

                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">User</li>
                                    @if(request()->route()->parameter('user'))
                                    <li class="breadcrumb-item text-muted active" aria-current="page">{{$users->name}}</li>
                                    @endif
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
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex mb-4">
                                    <h4 class="card-title my-auto">@if(request()->route()->parameter('user')) Update @else Add @endif User Form</h4>
                                </div>
                                <form class="mt-4" method="POST" @if(request()->route()->parameter('user')) action="{{ route('admin.users.update',$users->id) }}"  @else action="{{ route('admin.users.store') }}" @endif>
                                    @csrf
                                    @if(request()->route()->parameter('user'))
                                        @method('patch')
                                    @endif
                                    {{Session::get('error')}}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <select class="form-control custom-select" autocomplete="name" name="plan_id" placeholder="Plan">
                                                    <option value="">Select Plan</option>
                                                    @foreach($plans as $p)
                                                        <option value={{$p->id}}  @if(request()->route()->parameter('user') && $users->plan_id == $p->id) selected  @endif >{{$p->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control @error('name') is-invalid @enderror" name="name" @if(request()->route()->parameter('user'))  value="{{$users->name}}" @endif required autocomplete="name" autofocus type="text" placeholder="Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control  @error('email') is-invalid @enderror" name="email" @if(request()->route()->parameter('user'))  value="{{$users->email}}" @endif   autocomplete="email" placeholder="Email address" type="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <select name="role_id" id="" class="custom-select">
                                                    <option disabled selected style="color:#999">Select Role</option>
                                                    @if(request()->route()->parameter('user'))
                                                        <option value="{{$users->role_id}}" selected disabled>{{$users->role_value}}</option>
                                                    @endif
                                                    <option value="1">Admin</option>
                                                    <option value="2">User</option>
                                                    <option value="3">Supporter</option>
                                                </select>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control @error('password') is-invalid @enderror" name="password"  @if(!request()->route()->parameter('user')) required @endif autocomplete="new-password" placeholder="Password" type="password" >
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" @if(!request()->route()->parameter('user'))  required @endif autocomplete="new-password" placeholder="Confirm Password">
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn btn-block btn-dark">Add New User</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('script')
    <script src="{{asset('admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script>
        $('.hide').hide()
    </script>
@endpush
