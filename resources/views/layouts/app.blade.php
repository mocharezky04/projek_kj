<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Perpustakaan Digital') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('layouts.navigation')

        <div class="container py-4">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @isset($header)
                <div class="mb-4">
                    {{ $header }}
                </div>
            @endisset

            @hasSection('header')
                <div class="mb-4">
                    @yield('header')
                </div>
            @endif

            @yield('content')
            {{ $slot ?? '' }}
        </div>
    </body>
</html>
