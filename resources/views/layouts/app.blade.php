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
    <div id="app" class="container"> {{-- ✅ wrap content in a root tag --}}
        {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>

@endif
