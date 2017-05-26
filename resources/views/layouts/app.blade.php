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
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            @yield('postJquery');
        });
    </script>
    @yield('scripts')
</body>
</html>
