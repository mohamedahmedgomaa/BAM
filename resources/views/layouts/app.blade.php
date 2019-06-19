<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('styles')

    <link rel="stylesheet" href="{{ url('design/style') }}/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        .comment {
            border: 2px solid #ccc;
            padding: 10px;
        }
    </style>

         <link rel="stylesheet" href="{{ asset('css/stylebutton.css') }}"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ setting()->sitename_en }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li class="float-left">
                            <a href="{{ route('product.shoppingCart') }}" class="icons">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                            </a>
                        </li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <li class="float-left"><a href="{{ url('statistics') }}">Statistics</a></li>
                        <li><a href="{{ url('/') }}">Home</a></li>
                    @else
                        <li class="float-left">
                            <a href="{{ route('product.likedProduct') }}" class="icons">
                                Like
                            </a>
                        </li>
                        <li class="float-left">
                            <a href="{{ route('product.shoppingCart') }}" class="icons">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                            </a>
                        </li>
                        <li class="float-left"><a href="{{ url('/') }}">Home</a></li>
                        <li class="float-left"><a href="{{ url('statistics') }}">Statistics</a></li>
                        {{-- // Category // --}}
                        @if (auth()->user()->hasRole('admin_shop'))
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false" aria-haspopup="true" v-pre
                                   style="position: relative;padding-left: 5px;">
                                    Category <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('category/create') }}"><i class="fa fa-btn fa-home"></i> Create
                                            Category</a>
                                        <a href="{{ url('categories') }}"><i class="fa fa-btn fa-home"></i> Show
                                            Category</a>

                                    </li>
                                </ul>
                            </li>
                        @endif
                        {{-- // End Category // --}}

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true" v-pre
                               style="position: relative;padding-left: 50px;">
                                <img src="/uploads/avatars/{{ Auth::user()->avatar }}"
                                     style="width: 32px;height: 32px; position: absolute; top: 10px;;left: 10px;border-radius: 50%;">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('/') }}"><i class="fa fa-btn fa-home"></i> Home</a>
                                    <a href="{{ url('profile/'.auth()->id()) }}"><i class="fa fa-btn fa-user"></i>
                                        Profile</a>
                                    <a href="{{ url('statistics') }}"><i class="fa fa-btn fa-user"></i> Statistics</a>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-btn fa-sign"></i> Logout
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>



                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/likes.js') }}"></script>
<script type="text/javascript">
    var url = "{{ route('like') }}";
    var url_dis = "{{ route('dislike') }}";
    var token = "{{ Session::token() }}";

</script>
@yield('scripts')
</body>
</html>
