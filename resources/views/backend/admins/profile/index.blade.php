{{-- Extinding the master layout --}}
@extends('layouts.backend.master')

{{-- Main content section starts here --}}
@section('content')
<div class="card card-info card-outline">
    {{-- <div class="card-header">
    </div> --}}
    <div class="card-body">
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('admin.update.profile',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('backend.admins.profile._form')
                <div class="row">
                    <div class="col-md-4 offset-md-4 text-center">
                        <input type="submit" value="Update" class="btn btn-success pull-right">
                        {{-- <a href="{!! route('admin.dashboard') !!}" class="btn btn-danger"
                        onclick="return confirm('Do you want to go back?')">Cancel</a> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.box -->
@endsection
{{-- Main content section ends here --}}

{{-- Page specific css section starts here --}}
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend/dropify/dropify.css') }}">
@endpush

@push('customCss')

@endpush
{{-- Page specific css section ends here --}}

{{-- Page specific javascript section starts here --}}
@push('js')
<script src="{{ asset('assets/js/backend/dropify/dropify.js') }}"></script>
@endpush

@push('customJs')
<script>
  $('#image').dropify();  
</script>
@endpush
{{-- Page specific javascript section ends here --}}