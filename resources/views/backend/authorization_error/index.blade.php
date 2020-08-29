{{-- Extinding the master layout --}}
@extends('layouts.backend.master')

{{-- Main content section starts here --}}
@section('content')
<div class="page-error tile">
	<h1><i class="fa fa-exclamation-circle"></i> Error 403: Access denied to the application.</h1>
	<p>The page you have requested for is not accessible.</p>
	<p class="bigger"> <i class="fa fa-exclamation-circle"></i> Please verify your email.</p>
</div>
@endsection
{{-- Main content section ends here --}}

{{-- Page specific css section starts here --}}
@push('css')

@endpush

@push('customCss')

@endpush
{{-- Page specific css section ends here --}}

{{-- Page specific javascript section starts here --}}
@push('js')

@endpush

@push('customJs')

@endpush
{{-- Page specific javascript section ends here --}}