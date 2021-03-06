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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">
                    @if(request()->route()->parameter('client')) Update Client @else Add Client @endif</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page"><a
                                    href="{{route('clients.index')}}"> Client</a> </li>
                            @if(request()->route()->parameter('client')) <li class="breadcrumb-item text-muted active"
                                aria-current="page"> {{$client->email}} </li> @endif
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
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex mb-4">
                            <h4 class="card-title my-auto"> @if(request()->route()->parameter('client')) Update Client
                                Form @else Add Client Form @endif</h4>


                        </div>
                        <form class="mt-4" method="POST" enctype="multipart/form-data" @if(request()->
                            route()->parameter('client'))
                            action="{{ route('clients.update',$client->id) }}" @else
                            action="{{ route('clients.store') }}"@endif >
                            @csrf

                            @if(request()->route()->parameter('client'))
                            @method('put')
                            @endif
                            {{Session::get('error')}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control @error('name') is-invalid @enderror" name="name"
                                            @if(request()->route()->parameter('client')) value="{{$client->name}}"
                                        @else
                                        value="{{ old('name') }}" @endif required autocomplete="name" autofocus
                                        type="name"
                                        placeholder="Name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name col-md-6 mb-0" style="padding:5px"> Logo </label>
                                        <div class="col-md-9 ml-auto">
                                            <div class="img-thumbnail">
                                                @if(isset($client->logo))
                                                <img id="blah" src="{{Storage::url($client->logo)}}" class=""
                                                    alt="your image" height="90" />
                                                @else
                                                <img id="blah"
                                                    src="https://1.bp.blogspot.com/--ucL-rXn-Ec/VLwta4arOvI/AAAAAAAABHU/LzjxpJ_cA-g/s1600/wallpaper-for-facebook-profile-photo-738967.jpg"
                                                    class="" alt="your image" height="90" />
                                                @endif


                                                <div class="input-group mt-2">
                                                    <div class="custom-file">
                                                        <input type="file" name="profile_picture"
                                                            class="custom-file-input" id="inputGroupFile04"
                                                            accept="image/gif, image/jpeg, image/png"
                                                            onchange="console.log(document.getElementById('inputGroupFile04').files[0].fileName)">
                                                        <label class="custom-file-label" for="inputGroupFile04">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control @error('domain') is-invalid @enderror" name="domain"
                                            @if(request()->route()->parameter('client')) value="{{$client->domain}}"
                                        @else
                                        value="{{ old('domain') }}" @endif required autocomplete="domain" autofocus
                                        type="domain"
                                        placeholder="Domain">
                                        @error('domain')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control @error('email') is-invalid @enderror" name="email"
                                            @if(request()->route()->parameter('client')) value="{{$client->email}}"
                                        @else value="{{ old('email') }}" @endif required autocomplete="email" autofocus
                                        type="email" placeholder="Email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control  @error('password') is-invalid @enderror"
                                            name="password" value="{{ old('password') }}" autocomplete="password"
                                            placeholder="Password" type="password"
                                            @if(!request()->route()->parameter('client')) required @endif>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" name="password_confirmation"
                                            placeholder="Confirm Password" type="password"
                                            @if(!request()->route()->parameter('client')) required @endif>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <button type="submit"
                                        class="btn btn-block btn-dark">@if(request()->route()->parameter('client'))
                                        Update @else Add @endif client</button>
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
<script src="{{asset('admins/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admins/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
<script>
    $('.hide').hide();

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
</script>
@endpush