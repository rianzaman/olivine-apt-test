<div class="app-title">
	<div>
		<h1><i class="{{ isset($breadcrumb_icon)?$breadcrumb_icon:'fas fa-tachometer-alt' }}"></i></i> {{ isset($breadcrumb)?$breadcrumb:'Breadcrumb' }}</h1>
		<p>{{ isset($breadcrumb_brief)?$breadcrumb_brief:'Here goes breadcrumb brief' }}</p>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fas fa-home fa-lg"></i></li>
		@if(isset($breadcrumb_parent) && isset($breadcrumb_parent_route))
		<li class="breadcrumb-item"><a href="{{ route($breadcrumb_parent_route) }}">{{ $breadcrumb_parent }}</a></li>
		@endif
		<li class="breadcrumb-item"><a href="javascript:void(0)">{{ isset($breadcrumb)?$breadcrumb:'Breadcrumb' }}</a></li>
	</ul>
</div>