<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" href="img/favicon.png" type="image/png"/>
    <title>BAM</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css"/>
    <link rel="stylesheet" href="/vendors/linericon/style.css"/>
    <link rel="stylesheet" href="/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/css/themify-icons.css"/>
    <link rel="stylesheet" href="/css/flaticon.css"/>
    <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css"/>
    <link rel="stylesheet" href="/vendors/lightbox/simpleLightbox.css"/>
    <link rel="stylesheet" href="/vendors/nice-select/css/nice-select.css"/>
    <link rel="stylesheet" href="/vendors/animate-css/animate.css"/>
    <link rel="stylesheet" href="/vendors/jquery-ui/jquery-ui.css"/>
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/buttonstyle.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/button3D.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/stylebutton.css') }}"/>

    @yield('styles')
</head>

<body>
<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="top_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="float-left">
                        <p>Name: {{setting()->sitename_en}}</p>
                        <p>email: {{setting()->email}}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="float-right">
                        <ul class="right_side">
                            @guest
                                <li><a href="{{ route('login') }}">log in</a></li>
                                <li><a href="{{ route('register') }}">sign up</a></li>

                                <li><a href="{{ url('/') }}">Home</a></li>
                            @else
                                <li><a href="{{ url('homepage') }}">Top Products</a></li>

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
                                                <a href="{{ url('category/create') }}"><i class="fa fa-btn fa-home"></i>
                                                    Create Category</a>
                                                <a href="{{ url('categories') }}"><i class="fa fa-btn fa-home"></i> Show
                                                    Category</a>

                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                {{-- // End Category // --}}
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false" aria-haspopup="true" v-pre
                                       style="position: relative;padding-left: 50px;">
                                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}"
                                             style="width: 16px;height: 16px; position: absolute;left: 10px;border-radius: 50%;">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ url('/homepage') }}"><i class="fa fa-btn fa-home"></i> Top Product</a>
                                            <a href="{{ url('profile/'.auth()->id()) }}"><i
                                                        class="fa fa-btn fa-user"></i> Profile</a>
                                            <a href="{{ url('statistics') }}"><i class="fa fa-btn fa-user"></i>
                                                Statistics</a>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="fa fa-btn fa-sign-out"></i> Logout
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
            </div>
        </div>
    </div>
    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{url('homepage')}}">
                    @if(!empty(setting()->logo))
                        <img src="{{ Storage::url(setting()->logo) }}" alt="BAM" width="150" height="125">
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                    <div class="row w-100 mr-0">
                        <div class="col-lg-6 pr-0">
                            <ul class="nav navbar-nav center_nav pull-right">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false">Categories</a>
                                    <ul class="dropdown-menu">
                                        @foreach($categories as $category)
                                            <li class="nav-item">
                                                <a href="{{ route('category.show', ['id' => $category->id]) }}"
                                                   class="nav-link">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false">Pages</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{ url('statistics') }}" class="nav-link">Statistics</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('homepage') }}" class="nav-link">Top Products</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('allusers') }}" class="nav-link">All Users</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('shopshow') }}" class="nav-link">All Shops</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('allProduct') }}" class="nav-link">All Products</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('allOffer') }}" class="nav-link">All Offer</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('profile.connection.get', ['id'=>auth()->id()]) }}" class="nav-link">Connection</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact us</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-6 pr-0">
                            <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                {{--   <li class="nav-item">
                                    <a href="#" class="icons">
                                      <i class="ti-search" aria-hidden="true"></i>
                                    </a>
                                  </li> --}}
                                {{-- <button class="" type="submit"></button>  --}}
                                <style type="text/css">
                                    .has-search .form-control {
                                        padding-left: 2.375rem;
                                        border-radius: 18.25rem;
                                        margin-top: 22px;
                                    }

                                    .has-search .form-control-feedback {
                                        position: absolute;
                                        z-index: 2;
                                        display: block;
                                        width: 2.375rem;
                                        height: 2.375rem;
                                        line-height: 4.8rem;
                                        margin-top: 3px;

                                        text-align: center;
                                        pointer-events: none;
                                        color: #aaa;
                                    }
                                </style>
                                <form method="GET" action="/results" class="form-group has-search">
                                    {{ csrf_field() }}
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" name="search" class="form-control" placeholder="Search">
                                </form>
                                {{--                                @if (Session::has('cart'))--}}
                                <li class="nav-item">
                                    <a href="{{ route('product.shoppingCart') }}" class="icons">
                                        <i class="ti-shopping-cart"></i>
                                        <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                    </a>
                                </li>
                                {{--                                @else--}}
                                {{--                                    <li class="nav-item">--}}
                                {{--                                        <a href="#" class="icons">--}}
                                {{--                                            <i class="ti-shopping-cart"></i>--}}
                                {{--                                            <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>--}}
                                {{--                                        </a>--}}
                                {{--                                    </li>--}}
                                {{--                                @endif--}}
                                @guest
                                    <li class="nav-item">
                                        <a href="{{ url('login')}}" class="icons">
                                            <i class="ti-user" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @else
                                    @if (auth()->user()->hasRole('admin_shop'))
                                        <li class="nav-item">
                                            <a href="{{ route('createProduct') }}" class="icons">
                                                <i class="ti-plus" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a href="{{ url('profile/'.auth()->id()) }}" class="icons">
                                            <i class="ti-user" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endguest
                                <li class="nav-item">
                                    <a href="{{ route('product.likedProduct') }}" class="icons">
                                        <i class="ti-heart" aria-hidden="true"></i>
                                    </a>
                                </li>
                                


                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--================Header Menu Area =================-->

 