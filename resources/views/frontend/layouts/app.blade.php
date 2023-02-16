<!DOCTYPE html>
<html lang="eng">
@include('frontend.layouts.head')
<body>
<div class="body">
    @include('frontend.layouts.header')

    @yield('main-content')

    @include('frontend.layouts.footer')
</div>
@include('frontend.layouts.footer_scripts')

</body>
</html>
