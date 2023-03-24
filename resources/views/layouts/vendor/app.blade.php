@include('layouts.vendor.header')
@include('layouts.vendor.aside')

<main class="main-wrap">
    @include('layouts.vendor.navbar')
    @yield('content')
    @include('layouts.vendor.footer')
</main>

@include('layouts.vendor.footer_script')
