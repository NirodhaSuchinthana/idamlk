<nav class="navbar navbar-expand-md bg-primary navbar-dark navbar-fixed-top d-flex mx-auto">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="{{ asset('images/logo_white.png') }}" width="auto" height="36" class="d-inline-block align-top" alt=""></a>
        <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/services"><img src="{{ asset('images/services_white.png') }}" width="auto" height="24">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><img src="{{ asset('images/inquiry_white.png') }}" class="" width="auto" height="24">Inquiry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">All Ads</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/login"><img src="{{ asset('images/login_white.png') }}" width="auto" height="36">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/profile">{{ Auth::user()->first_name}} {{Auth::user()->last_name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/auth/logout">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>