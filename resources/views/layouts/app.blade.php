<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('layouts.partials.head')

</head>
<body>
    <div id="app">


        @include('layouts.partials.nav')

        @include('layouts.partials.header')

        <main role="main">
        @yield('content')
        </main>

        @include('layouts.partials.footer')

        @include('layouts.partials.footer-scripts')
    </div>
</body>
</html>
