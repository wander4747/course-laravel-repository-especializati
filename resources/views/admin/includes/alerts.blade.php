@if ($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success mt-4 alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
