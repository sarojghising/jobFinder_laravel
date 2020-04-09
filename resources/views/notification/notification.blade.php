@if (Session::has('success'))
    <div class="alert alert-success">
        <div class="text-center"> {{ Session::get('success') }}</div>
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger">
        <div class="text-center"> {{ Session::get('error') }}</div>
    </div>
@endif
