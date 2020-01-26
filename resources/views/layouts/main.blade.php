<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.theme.head')
    @yield('styles')
</head>
 	<body> 
        @yield('content')        
        @include('partials.theme.scripts')
        @yield('scripts')
   
    </body>
</html>