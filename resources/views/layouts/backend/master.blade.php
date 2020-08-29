<!DOCTYPE html>
<html lang="en">

{{-- Head section layout file --}}
@include('layouts.backend._head')
{{-- Head section layout file --}}

<body class="app sidebar-mini">
  {{-- Header section layout file --}}
  @include('layouts.backend._header')
  {{-- Header section layout file --}}

  {{-- Navigation bar layout file --}}
  @include('layouts.backend._left-nav')
  {{-- Navigation bar layout file --}}

  <main class="app-content">
    @if(Auth::user()->email_verified_at != null && Auth::user()->status == "active" && Auth::user()->verification_token == null)
    {{-- Breadcrumb layout file --}}
    @include('layouts.backend._breadcrumb')
    {{-- Breadcrumb layout file --}}
    @endif
    {{-- Page content section --}}
    @yield('content')
    {{-- Page content section --}}

  </main>
  {{-- Scripts layout file --}}
  @include('layouts.backend._scripts')
  {{-- Scripts layout file --}}
</body>
</html>