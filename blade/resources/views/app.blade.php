<!-- seria nuestra pnatilla general-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
        <!-- establecer area header-->
        @include('header')
        <!-- establecer area contenido-->
        @yield('content')
        <!-- establecer area footer-->
        @include('footer')
    </body>
</html>
