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
    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-md-12 text-center logo">
                <div class="btn-group pb-4">
                    <a href="#" class="btn btn-round btn-round btn-outline-secondary text-dark">සිංහල</a>
                    <a href="#" class="btn btn-round btn-outline-primary text-dark">English</a>
                </div>
                <br>
                <a href="/">
                    <img class="img-fluid" src="{{ URL::asset('images/logo.png') }}">
                </a>
            </div>
        </div>
    </div>

    @yield('content')

    @include('includes.footer')
</body>

</html>