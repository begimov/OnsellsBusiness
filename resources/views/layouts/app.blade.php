<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<!-- HEAD -->
@include('layouts.partials._head')
<body>
    <div id="app">
        <!-- NAVIGATION -->
        @include('layouts.partials._navigation')
        <!-- CONTENT -->
        @yield('content')
        <!-- FOOTER -->
        @include('layouts.partials._footer')
    </div>
    <!-- Scripts -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            @yield('postJquery');
        });
    </script>
    @yield('scripts')
</body>
</html>
