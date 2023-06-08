@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p class="mb-0">{{ $error }}</p>
        @endforeach
    </div>
@endif

@if($error = session()->get('error'))
    <div class="alert alert-danger">
        <p class="mb-0">{{ $error }}</p>
    </div>
@endif


@if($msg = session()->get('success'))
    <div class="alert alert-success">
        <p class="mb-0">{{ $msg }}</p>
    </div>
@endif

@if (session('success'))

    <script>
        new Noty({
            layout: 'topRight',
            text: "{{ session('success') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif

@if(session('error'))

    <script>
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: "{{ session('error') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif

