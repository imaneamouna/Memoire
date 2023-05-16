<!DOCTYPE html>
<html lang="ar">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>@yield('title')</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('User') }}/assets/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('User') }}/assets/css/style.css" rel="stylesheet" />
    <!-- respons/assetsive style -->
    <link href="{{ asset('User') }}/assets/scss/responsive.css" rel="stylesheet" />




</head>

<body dir="ltr" class="sub_page">
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html"><img width="250"
                            src="/dashboard/assets/images/dashboard/multikart-logo-black.png" alt="#" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">


                            </li>



                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">الصفحه الرئيسيه <span
                                        class="sr-only">(current)</span></a>
                            </li>


                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('our_products') }}"> {{ auth()->user()->name}}</a>
                            </li> 
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="true"> <span
                                        class="nav-label">{{ auth()->user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a style="font-size: 20%" href="">{{ auth()->user()->email }}</a></li>
                                </ul>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="true"> <span class="nav-label">الاقسام <span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($categories as $category)
                                        <li><a href="{{route('order',$category->id)}}">{{ $category->name }}</a></li>
                                    @endforeach

                                </ul>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contactus') }}">تواصل معنا</a>
                            </li>

                            </li>
                            {{-- <li class="nav-item">
                           <a class="nav-link" href="blog_list.html">Blog</a>
                        </li> --}}

                            <form class="form-inline">
                                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    </div>



    @yield('body')


    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                        <h4>
                            Reach at..
                        </h4>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    {{ $setting->address }}
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call {{ $setting->phone }}
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    {{ $setting->email }}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                        <a href="index.html" class="footer-logo">
                            {{ $setting->logo }}
                        </a>
                        <p>
                            {{ $setting->description }}
                            {{-- Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with --}}
                        </p>
                        <div class="footer_social">
                            <a href="{{ $setting->facebook }}">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"> </i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="{{ $setting->instagram }}">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a href="{{ $setting->tiktok }}">
                                <i class="fa fa-pinterest" aria-hidden="true"> </i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="map_container">
                        <div class="map">
                            <div id="googleMap"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-info">
                <div class="col-lg-7 mx-auto px-0">
                    <p>
                        &copy; <span id="displayYear"></span> جميع الحقوق محفوظة بواسطة
                        <a href="https://html.design/">Imane daga && lila fatima el zohra && chihani intissar</a><br>

                        {{-- Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a> --}}
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer section -->
    <!-- jQery -->
    <script src="{{ asset('User') }}/assets/js/jquery-3.4.1.min.js"></script>
    <!-- popper j/assets/s -->
    <script src="{{ asset('User') }}/assets/js/popper.min.js"></script>
    <!-- bootstra{ -->
    <script src="{{ asset('User') }}/assets/js/bootstrap.js"></script>
    <!-- custom j/assets/s -->
    <script src="{{ asset('User') }}/assets/js/custom.js"></script>

</body>

</html>
