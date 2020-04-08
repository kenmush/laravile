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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">@if(request()->route()->parameter('plan')) Update Plan @else  Add Plan @endif</h4>

                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="{{route('admin.plans.index')}}"> Plan</a> </li>
                                    @if(request()->route()->parameter('plan')) <li class="breadcrumb-item text-muted active" aria-current="page"> {{$plan->title}} </li> @endif
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
                                    <h4 class="card-title my-auto"> @if(request()->route()->parameter('plan')) Update Plan Form @else  Add Plan Form @endif</h4>


                                </div>
                                <form class="mt-4" method="POST"  @if(request()->route()->parameter('plan')) action="{{ route('admin.plans.update',$plan->id) }}" @else action="{{ route('admin.plans.store') }}"@endif>
                                    @csrf

                                    @if(request()->route()->parameter('plan'))
                                        @method('put')
                                    @endif
                                    {{Session::get('error')}}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                            <input class="form-control @error('title') is-invalid @enderror" name="title" @if(request()->route()->parameter('plan')) value="{{$plan->title}}" @else value="{{ old('title') }}" @endif required autocomplete="name" autofocus type="text" placeholder="Title">
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control  @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}"  autocomplete="type" placeholder="Type" type="text">
                                                @error('type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <input type="number" name="users"  hidden value="{{Auth::user()->id}}">
                                        <div class="col-lg-12 d-flex mb-3">
                                            <div class="custom-control custom-checkbox my-auto">
                                                <input type="checkbox" class="custom-control-input"  @if(request()->route()->parameter('plan') && $plan->books == '') checked @endif id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Unlimited Books</label>
                                            </div>
                                            <div class="form-group w-50 my-auto ml-auto book">
                                                <input class="form-control  @error('books') is-invalid @enderror" name="books" @if(request()->route()->parameter('plan')) value="{{$plan->books}}" @else value="{{ old('books') }}" @endif autocomplete="books" placeholder="Books" type="text">
                                                @error('books')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3 d-flex">
                                            <div class="custom-control custom-checkbox my-auto">
                                                <input type="checkbox" class="custom-control-input" @if( request()->route()->parameter('plan') && $plan->clients == '') checked @endif id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Unlimited Clients</label>
                                            </div>
                                            <div class="form-group w-50 my-auto ml-auto client">
                                                <input class="form-control  @error('clients') is-invalid @enderror" name="clients" @if(request()->route()->parameter('plan')) value="{{$plan->clients}}" @else value="{{ old('clients') }}" @endif  autocomplete="clients" placeholder="Clients" type="text">
                                                @error('clients')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12 d-flex mb-3">
                                            <div class="custom-control custom-checkbox my-auto">
                                                <input type="checkbox" class="custom-control-input"  @if(request()->route()->parameter('plan') && $plan->report == '') checked @endif id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">Unlimited Reports</label>
                                            </div>
                                            <div class="form-group w-50 my-auto ml-auto report">
                                                <input class="form-control @error('report') is-invalid @enderror" name="report" @if(request()->route()->parameter('plan')) value="{{$plan->report}}" @else value="{{ old('report') }}" @endif  autocomplete="" placeholder="Reports" type="number" >
                                                @error('report')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control @error('price') is-invalid @enderror" type="number" @if(request()->route()->parameter('plan')) value="{{$plan->price}}" @else value="{{ old('price') }}" @endif name="price" required placeholder="Price">
                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn btn-block btn-dark">@if(request()->route()->parameter('plan')) Update @else Add @endif Plan</button>
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
        $('.hide').hide();

        $('input:checkbox').change(function(){
        if($(this).is(':checked')){
            if($(this).attr('id') == 'customCheck1'){
                $('.book').hide();
                $('.book input').val('');
            }
            if($(this).attr('id') == 'customCheck2'){
                $('.client').hide();
                $('.client input').val('');
            }
            if($(this).attr('id') == 'customCheck3'){
                $('.report').hide();
                $('.report input').val('');
            }
        }else{

            if($(this).attr('id') == 'customCheck1'){
                $('.book').show()
            }
            if($(this).attr('id') == 'customCheck2'){
                $('.client').show()
            }
            if($(this).attr('id') == 'customCheck3'){
                $('.report').show()
            }
        }
        })
    </script>
@endpush
