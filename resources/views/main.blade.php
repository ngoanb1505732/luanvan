<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Basic page needs -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        @yield('library')
        <!-- fevicon -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('components.header')

    </head>
	 @yield('content')
</html>
