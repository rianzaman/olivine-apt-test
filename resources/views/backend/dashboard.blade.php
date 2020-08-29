{{-- Extinding the master layout --}}
@extends('layouts.backend.master')

{{-- Main content section starts here --}}
@section('content')
<div class="row">
	<div class="col-md-6 col-lg-3">
		<div class="widget-small primary coloured-icon"><i class="icon fas fa-users fa-3x"></i>
			<div class="info">
				<h4>Users</h4>
				<p>
					<b>5</b>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-3">
		<div class="widget-small info coloured-icon"><i class="icon fas fa-thumbs-up fa-3x"></i>
			<div class="info">
				<h4>Likes</h4>
				<p>
					<b>25</b>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-3">
		<div class="widget-small warning coloured-icon"><i class="icon fas fa-file fa-3x"></i>
			<div class="info">
				<h4>Uploades</h4>
				<p>
					<b>10</b>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-3">
		<div class="widget-small danger coloured-icon"><i class="icon fas fa-star fa-3x"></i>
			<div class="info">
				<h4>Stars</h4>
				<p>
					<b>500</b>
				</p>
			</div>
		</div>
	</div>
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
