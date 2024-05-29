<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Bloscot</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('images/fevicon.png')}}" type="image/gif"/>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesoeet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
          media="screen">
</head>
<body>
<!-- header section start -->
<div class="header_section">
    <div class="container-fluid header_main">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="logo" href="{{ route('photo.index') }}"><img src="{{asset('images/logo.png')}}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('photo.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('photo.photos') }}">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('photo.user') }}">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('photo.contact') }}">Contact us</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('photo.create') }}">Add photo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('personal.main.index') }}">{{ auth()->user()->name }}</a>
                        </li>

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post" class="nav-item">
                                @csrf
                                <button class="btn btn-link nav-link" type="submit">Logout</button>
                            </form>
                        </li>

                    @endauth
                </ul>
            </div>

        </nav>
    </div>
</div>
<!-- header section end -->
@yield('content')
<div class="footer_section layout_padding">
    <div class="container">
        <div class="footer_logo"><a href="index.html"><img src="{{asset('images/footer-logo.png')}}"></a></div>
        <div class="footer_menu">
            <ul>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('photo.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('photo.photos') }}">Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('photo.user') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('photo.contact') }}">Contact us</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- footer section end -->
<!-- copyright section start -->
<div class="copyright_section">
    <div class="container">
        <p class="copyright_text">Copyright 2020 All Right Reserved By.<a href="https://html.design"> Free html
                Templates</a></p>
    </div>
</div>
<!-- copyright section end -->
<!-- Javascript files-->
<script src="https://kit.fontawesome.com/935256ee8b.js" crossorigin="anonymous"></script>
<script src="{{asset("js/jquery.min.js")}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/jquery-3.0.0.min.js')}}"></script>
<script src="{{asset('js/plugin.js')}}"></script>
<!-- sidebar -->
<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<!-- javascript -->
<script src="{{asset('js/owl.carousel.js')}}"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>
