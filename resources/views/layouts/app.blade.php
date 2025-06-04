@php
    $appLayoutView = 'components.layouts.app';
@endphp

@if (view()->exists($appLayoutView))
    @extends($appLayoutView)
@else
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', 'My Package')</title>
        @livewireStyles
    </head>
    <body>
        @yield('content')
        @livewireScripts
    </body>
    </html>
@endif
