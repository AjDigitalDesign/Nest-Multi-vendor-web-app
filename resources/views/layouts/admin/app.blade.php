@include('layouts.admin.header')
@include('layouts.admin.aside')

<main class="main-wrap">
    @include('layouts.admin.navbar')
    @yield('content')
    @include('layouts.admin.footer')
</main>

@include('layouts.admin.footer_script')
