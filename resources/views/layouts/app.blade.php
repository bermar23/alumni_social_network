<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('layouts.partials.head')

</head>
<body>
<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=794385550925261&autoLogAppEvents=1"></script>
    <div id="app">


        @include('layouts.partials.nav')

        @include('layouts.partials.header')

        <main role="main">
        @yield('content')
        </main>

        @include('layouts.partials.footer')
        
        @yield('custom-page-scripts')

        @include('layouts.partials.footer-scripts')
    </div>
</body>
</html>
