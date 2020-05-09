<div>
    @if (session('success'))
    <div class="alert alert-success success-message" role="alert">
        <i class="fa fa-check" aria-hidden="true"></i>
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif

    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
    @endforeach
</div>