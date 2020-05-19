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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-2">Ticket List</h4>

                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="/" class="text-muted">Home</a>
                            </li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Ticket</li>
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
                            <h4 class="card-title my-auto"> Edit Ticket Form</h4>
                            <a href="{{route('admin.ticket.index')}}" class="ml-auto">
                                <button class="btn btn-primary btn-sm"><i class="icon-plus"></i> Back</button>
                            </a>
                        </div>
                        <form class="mt-4" method="POST" action="{{ route('admin.ticket.update',$ticket->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <x-alerts />
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input class="form-control @error('title') is-invalid @enderror" name="title"
                                            value="{{ $ticket->title  ?? old('title')}}" autocomplete="title" id="title"
                                            type="text" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input class="form-control @error('title') is-invalid @enderror" name="name"
                                            value="{{ $ticket->user->name  ?? old('title')}}" id="name" type="text"
                                            disabled>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Content</label>
                                        <textarea name="content" placeholder="Please write to us"
                                            class="form-control @error('content') is-invalid @enderror" id="" cols="20"
                                            rows="5" disabled>{{ $ticket->content ?? old('content') }}
                                        </textarea>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="">Images</label>
                                    <br>
                                    @foreach ($ticket->ImagesArray as $image)
                                    <img src="{{ \Storage::url($image) }}" width="150">
                                    @endforeach
                                    <br>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" id="status">
                                            <option value="1" {{ $ticket->status ? "selected" : '' }}>Open</option>
                                            <option value="0" {{ $ticket->status ? "" : "selected" }}>Close</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="priority">Priority</label>
                                        <select name="priority" class="form-control" id="priority">
                                            <option value="low" {{ $ticket->priority=="low" ? "selected" : '' }}>Low
                                            </option>
                                            <option value="medium" {{ $ticket->priority=="medium" ? "selected" : '' }}>
                                                Medium
                                            </option>
                                            <option value="high" {{ $ticket->priority=="high" ? "selected" : '' }}>
                                                High
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="priority">Assigned To Supporter</label>
                                        <select name="supporter_id" class="form-control" id="priority">
                                            <option value="" selected disabled>Select Supporter </option>
                                            @foreach ($supporters as $supporter)
                                            <option value="{{ $supporter->id }}"
                                                {{ $ticket->supporter_id == $supporter->id ? 'selected' : '' }}>
                                                {{ $supporter->name }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Update</button>
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

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
@endpush

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script>
    $('.hide').hide()


    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: "{{ route('ticket.upload') }}",
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachments[]" value="' + response + '">')
      uploadedAttachmentsMap[file.name] = response;
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentsMap[file.name]
      }
      $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {

    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endpush