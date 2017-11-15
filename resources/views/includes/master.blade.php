<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.bootstrap')
    @if(isset($styles))
        @foreach($styles as $style)
            <link rel="stylesheet" href="{{ $style }}" type="text/css">
        @endforeach
    @endif

    @if(isset($scripts))
        @foreach($scripts as $script)
            <script src="{{ $script }}" type="text/javascript" ></script>
        @endforeach
    @endif

    @if(isset($head_content))
        {{ $head_content }}
    @endif

    <title>idam.lk - @yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>