{{-- check errors  during validation, --}}
{{-- session success --}}
{{-- session error --}}
{{-- so, these should be messages we should be able to return at any point --}}
@if (count($errors) >0)
    {{-- note that in the next line, errors-> all() is an object  --}}
    @foreach ($errors->all() as $error )
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
      {{session('error')}}
    </div>
@endif
