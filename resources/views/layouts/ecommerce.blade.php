<!doctype html>
<html lang="en">

<head>

	<meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/img/favicon-16x16.png') }}" type="image/png" sizes="16x16">

    {{-- <title>Fashi | Template</title> --}}
    @yield('title')

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Sofia&display=swap" rel="stylesheet">

	{{-- @yield('css') --}}

  {{-- <link rel="stylesheet" href="{{ asset('ecommerce/css/bootstrap.min.css') }}"> --}}
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  
    {{-- <link rel="stylesheet" href="{{ asset('ecommerce/css/font-awesome.min.css') }}"> --}}
    <script src="https://kit.fontawesome.com/f8bfdb56c7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('ecommerce/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/css/elegant-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/css/style.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-176279050-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-176279050-1');
</script>

    <style>
      @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
      /* @import url(https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap); */

       body {
       font-family: 'Open Sans', 'sans-serif';
       }

       .partner-logo p {
        font-family: 'Sofia', cursive;
       }

       .mega-dropdown {
       position: static !important;
       }
       .mega-dropdown-menu {
           padding: 20px 0px;
           width: 100%;
           box-shadow: none;
           -webkit-box-shadow: none;
       }
       .mega-dropdown-menu > li > ul {
       padding: 0;
       margin: 0;
       }
       .mega-dropdown-menu > li > ul > li {
       list-style: none;
       }
       .mega-dropdown-menu > li > ul > li > a {
       display: block;
       color: #222;
       padding: 3px 5px;
       }
       .mega-dropdown-menu > li ul > li > a:hover,
       .mega-dropdown-menu > li ul > li > a:focus {
       text-decoration: none;
       }
       .mega-dropdown-menu .dropdown-header {
       font-size: 18px;
       color: #ff3546;
       padding: 5px 60px 5px 5px;
       line-height: 30px;
       }

       .carousel-control {
       width: 30px;
       height: 30px;
       top: -35px;

       }
       .left.carousel-control {
       right: 30px;
       left: inherit;
       }
       .carousel-control .glyphicon-chevron-left, 
       .carousel-control .glyphicon-chevron-right {
       font-size: 12px;
       background-color: #fff;
       line-height: 30px;
       text-shadow: none;
       color: #333;
       border: 1px solid #ddd;
       } 

       .navbar-inverse .navbar-brand,
       .navbar-inverse .navbar-nav>li>a {
            color: white;
        }

        .dropdown-menu {
            background-color: white !important;
        }

        /* Make navbar megamenu in mobile responsive mode so that tulisan iphone dengan iphone 7 sejajar (dibawahnya) */
        @media (max-width: 767px) {
            .navbar-nav .open .dropdown-menu>li>a, .navbar-nav .open .dropdown-menu .dropdown-header {
                padding: 0px 0px 0px 0px;
            }
        }

        /* Make search bar style ok again (make search bar length size to be okay) */
        .input-group {
            display: flex;  
            flex-wrap: wrap;
            align-items: stretch;
            width: 100%;
        }

        /* on desktop only when hover display menu */
        @media screen and (min-width: 800px) {
            .dropdown:hover .dropdown-menu {
                display: block;
            }
        }

        .product-shop .product-tab .tab-item .nav {
            display: flex;
            flex-wrap: wrap;
        }

        .product-details .pd-color h6 {
            float: none;
        }

        .product-details .pd-size-choose .sc-item label {
            width: 147px;
            cursor: unset;
            font-weight: 500;
            font-size: 12px;
        }

        .product-details .pd-size-choose .sc-item label.active {
            background: white;
            color: #252525;
        }

        .owl-carousel .owl-item .product-item .pi-pic img {
            height: 264px;
            width: auto;
        }

        .product-item:not(.testi) .pi-pic img:hover {
            -ms-transform: scale(2.5); /* IE 9 */
            -webkit-transform: scale(2.5); /* Safari 3-8 */
            transform: scale(2.5); 
            opacity: 0.5;
        }

        .product-item .pi-text a h5:hover {
            opacity: 0.5;
        }

        /* http://localhost/casingapik/public/collections/case-iphone/iphone-6 */
        .product-item .pi-pic img {
            height: 262px;
        }

        /*Make nice dropdownlist not bold*/
        .nice-select .option.selected {
            font-weight: normal;
        }

        .breadcrumb-text span {
            color: black;
            display: inline-block;
            font-weight: 600;
        }

        .inner-header .advanced-search .input-group input {
            color: black;
        }

        .inner-header .advanced-search .category-btn:after {
            content: "";
        }

        @media (min-width: 768px)
        {
            .inner-header .advanced-search .input-group button {
                right: -138px !important;
            }
        }

        @media (min-width: 992px)
        {
            .inner-header .advanced-search .input-group button {
                right: -10px !important;
            }
        }
        
        @media only screen and (max-width: 767px)
        {
            .inner-header .advanced-search .input-group button {
                right: -2px !important;
            }
        }

        .single-latest-blog img {
            width: 360px;
            height: 672px;
        }

        .spad3 .owl-carousel .owl-item .product-item .pi-pic img {
            height: 664px;
            width: auto;
        }

        .pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus {
            background-color: #e7ab3c;
            border: 1px solid #e7ab3c;
        }

        .pagination>li>a, .pagination>li>span, .pagination>li>a:hover, .pagination>li>span:hover {
            color: #e7ab3c;
        }

        .inner-header .logo a {
            margin-top: -15px;
        }

        @media only screen and (max-width: 767px)
        {
            .inner-header .logo a {
                margin-top: 1px;
            }
        }

        .product-details .pd-desc a,
        .header-section .header-top .ht-right a {
            color: blue;
            text-decoration: underline;
        }

        .product-details .pd-desc a:hover,
        .header-section .header-top .ht-right a:hover {
            color: blue;
        }

        .header-section .header-top .ht-right i {
            color: black;
        }

        .filter-control a {
            color: black;
        }

        .filter-control a:hover {
            color: black;
        }

        .product-details .pd-size-choose .sc-item label #lblColor {
            margin-bottom: -4px !important;
        }

        .header-top .ht-right .login-panel {
            float: none;
        }

        .header-top .ht-right a, 
        .header-top .ht-right a:hover {
            color: black;
        }

        @media only screen and (max-width: 767px)
        {
            .instagram-photo .insta-item {
                width: 27.2%;
                margin: 10px;
                height: 450px;
            }
        }

        @media (min-width: 1281px) {
  
            .instagram-photo .insta-item {
                width: 30%;
                margin: 10px;
                height: 450px;
            }
  
        }

        @media screen and (min-width: 800px) {
            
            .instagram-photo .insta-item {
                width: 30%;
                margin: 10px;
                height: 450px;
            }

        }

        .instagram-photo .insta-item .inside-text i {
            font-size: 150px;
        }

        .instagram-photo .insta-item .inside-text h5 a {
            font-size: 40px;
        }

        @media only screen and (max-width: 767px)
        {
            .instagram-photo .insta-item .inside-text i {
                font-size: 100px;
            }

            .instagram-photo .insta-item .inside-text h5 a {
                font-size: 25px;
            }
        }

        @media only screen and (max-width: 1199px)
        {
            .instagram-photo .insta-item .inside-text i {
                font-size: 70px;
            }

            .instagram-photo .insta-item .inside-text h5 a {
                font-size: 20px;
            }
        }

        .section-title {
            margin-top: 42px;
        }

        .instagram-photo .insta-item .inside-text {
            opacity: 1;
            visibility: visible;
            z-index: 99;
	        background: rgba(0, 0, 0, 0.5);
            height: inherit;
        }

        @media only screen and (max-width: 767px)
        {
            .set-bg {
                background-repeat: no-repeat !important;
                background-size: cover !important;
                background-position: 80% 50% !important;
            }

            .hero-items .single-hero-items {
                height: 725px !important;
                padding-top: 210px !important;
            }

            .hero-items .single-hero-items h1 {
                color: white;

                background:black;
                opacity: 0.5;
                padding: 11px 28px;
            }

            .hero-items .single-hero-items p {
                color: white;

                background:black;
                opacity: 0.5;
                padding: 11px 28px;
            }

            .hero-items .owl-item.active .single-hero-items h1 {
                opacity: 0.5 !important;
	
            }

            .hero-items .owl-item.active .single-hero-items p {
                opacity: 0.5 !important;
	
            }
        }

        @media (min-width: 1200px)
        {
            .banner-section.spad .col-lg-2 {
                width: 20%;
            }
        }

        .single-banner img {
            height: 80%;
        }

        @media (min-width: 1200px)
        {
            .women-banner2.spad {
                display: none;
            }

            .man-banner.spad {
                display: block;
            }
        }

        @media only screen and (max-width: 1199px)
        {
            .women-banner2.spad {
                display: block;
            }

            .man-banner.spad {
                display: none;
            }

        }

        @media only screen and (max-width: 767px)
        {
            .women-banner2.spad {
                display: block;
            }

            .man-banner.spad {
                display: none;
            }
        }

        @media only screen and (max-width: 767px)
        {
            .header-top .ht-right .lan-selector2 {
                padding-top: 0px;
            }

        }

        @media only screen and (max-width: 1199px)
        {
            .header-top .ht-right .lan-selector2 {
                padding-top: 18px;
            }

        }
        
        @media (min-width: 1200px)
        {
            .header-top .ht-right .lan-selector2 {
                padding-top: 18px;
            }
        }

        .footer-widget {
            width: 300px;
        }

        .copyright-reserved .copyright-text a {
            font-weight: 800;
        }

  </style> 
</head>

<body>
	<!--================Header Menu Area =================-->
	
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        {{-- <i class=" fa fa-envelope"></i> --}}
                        Case iPhone Premium, Aksesoris iPhone
                    </div>
                    {{-- <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        089651061361
                    </div> --}}
                </div>
                <div class="ht-right">
                    {{-- <a href="#" class="login-panel">
                        <i class="fa fa-user"></i>Login
                    </a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="{{ asset('ecommerce/img/flag-1.jpg') }}" data-imagecss="flag yt"
                                data-title="English">English</option>
                            <option value='yu' data-image="{{ asset('ecommerce/img/flag-2.jpg') }}" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                        </select>
                    </div> --}}
                    <div class="login-panel">
                        <a href="https://www.instagram.com/casingapik/">
                            <i class="fa fa-instagram"></i>
                            <a href="https://www.instagram.com/casingapik/">@casingapik</a>
                        </a> 
                    </div>
                    <div class="lan-selector">
                        <a href="https://wa.me/62895403920207">
                            <i class="fab fa-dribbble"></i>
                            <a href="https://wa.me/62895403920207">Website By Vincent</a></a>
                        </a> 
                    </div>
                    <div class="lan-selector2">
                        <a href="https://wa.me/6289651061361?text=HALLO!%20Selamat%20datang%20di%20@casingapik%0A%0ASEMUA%20case%20yang%20dijual%20READY%20STOCK%20dan%20SIAP%20DIPESAN%20yaa%20:)%0A%0AFORMAT%20PESANAN:%0ANama:%0ANo Hp:%0AAlamat :%0AKecamatan:%0AKota :%0AOrder:%20nama%20case%20/%20warna,%20motif%20/%20tipe%20hp%0A%0ACHECK%20KOLEKSI%20DI%20INSTAGRAM:%20@casingapik%0A%0APengiriman:%0ASENIN-JUMAT%20(closed%20order:%2015:00)%0ASABTU%20:%2013:00)%0ALayanan%20chat:%2010:00%20-%2020:00">
                            <i class="fa fa-whatsapp"></i>
                            <a href="https://wa.me/6289651061361?text=HALLO!%20Selamat%20datang%20di%20@casingapik%0A%0ASEMUA%20case%20yang%20dijual%20READY%20STOCK%20dan%20SIAP%20DIPESAN%20yaa%20:)%0A%0AFORMAT%20PESANAN:%0ANama:%0ANo Hp:%0AAlamat :%0AKecamatan:%0AKota :%0AOrder:%20nama%20case%20/%20warna,%20motif%20/%20tipe%20hp%0A%0ACHECK%20KOLEKSI%20DI%20INSTAGRAM:%20@casingapik%0A%0APengiriman:%0ASENIN-JUMAT%20(closed%20order:%2015:00)%0ASABTU%20:%2013:00)%0ALayanan%20chat:%2010:00%20-%2020:00">089651061361</a>
                        </a>
                    </div>
                    {{-- <div class="top-social">
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="container">
            
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                        <a href="{{URL::to('/')}}">
                                {{-- <img src="{{ asset('ecommerce/img/logo.png') }}" alt=""> --}}
                                <img src="{{ asset('ecommerce/img/Casing Apik.png') }}" alt="Casing Apik" width="100px" height="100px">
                            </a>
                        </div>
                    </div>
                    {{-- <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <form action="{{ route('front.search') }}" method="get">
                                <button type="button" class="category-btn">Search</button>
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="What do you need?">
                                    <button type="submit" id="btnSearch"><i class="ti-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div> --}}
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">Pencarian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            <form action="{{ route('front.search') }}" method="get" class="input-group">
                                <input type="text" name="keyword" placeholder="Apa yang anda cari?">
                                <button type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        {{-- <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>3</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-pic"><img src="{{ asset('ecommerce/img/select-product-1.jpg') }}" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-pic"><img src="img/select-product-2.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>$120.00</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">$150.00</li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
        
    </header>
    <!-- Header End -->

    <!--william-->
    
        <div class="container-fluid">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{URL::to('/')}}">Casing Apik</a>
                </div>

            <div class="collapse navbar-collapse js-navbar-collapse">
            <ul class="nav navbar-nav">

                    @php
                        $categories = App\Category::orderBy('id', 'ASC')->get();
                        $counter = 1;
                    @endphp
                    @foreach ($categories as $category)
                        <li class="dropdown mega-dropdown" id="mega-{{$counter}}">

                                @if($category->name != 'Aksesoris' && $category->name != 'Strap Apple Watch')
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$category->name}} <span class="caret"></span></a>

                                    <!-- MEGA MENU-->
                                    <ul class="dropdown-menu mega-dropdown-menu">
                                        <li class="col-sm-3">
                                            <ul>
                                                
                                                @if($category->name == 'Case iPhone + FunPop' || $category->name == 'Case iPhone')

                                                    <li class="dropdown-header">All</li>
                                                    <li><a href="{{URL::to('/')}}/collections?sortBy=newest&category={{ $category->slug }}">All {{ $category->name }}</a></li>                                                        
                                                    <br>

                                                    <li class="dropdown-header">Apple</li>

                                                    @php
                                                    
                                                        $tipeIphone = App\AttributeOption::select('attribute_options.name','attribute_options.slug')
                                                        ->where('attributes.name', 'Tipe iPhone')
                                                        ->join('attributes', 'attribute_options.attribute_id', '=', 'attributes.id')
                                                        ->get();    

                                                    @endphp

                                                    @foreach ($tipeIphone as $eachItem)
                                                        {{-- <li><a href="collections/newest/{{ $category->slug }}/{{ $eachItem->slug }}">{{ $eachItem->name }}</a></li> --}}
                                                        <li><a href="{{URL::to('/')}}/collections?sortBy=newest&category={{ $category->slug }}&attribute_options={{ $eachItem->slug }}">{{ $eachItem->name }}</a></li>                                                        
                                                    @endforeach

                                                @else

                                                    <li class="dropdown-header">All</li>
                                                    <li><a href="collections?sortBy=newest&category={{ $category->slug }}">All {{ $category->name }}</a></li>                                                        
                                                    <br>

                                                    <li class="dropdown-header">AirPod</li>

                                                    @php
                                                    
                                                        $tipeAirpod = App\AttributeOption::select('attribute_options.name','attribute_options.slug')
                                                        ->where('attributes.name', 'Tipe AirPod')
                                                        ->join('attributes', 'attribute_options.attribute_id', '=', 'attributes.id')
                                                        ->get();    

                                                    @endphp

                                                    @foreach ($tipeAirpod as $eachItem)
                                                        {{-- <li><a href="collections/newest/{{ $category->slug }}/{{ $eachItem->slug }}">{{ $eachItem->name }}</a></li> --}}
                                                        <li><a href="{{URL::to('/')}}/collections?sortBy=newest&category={{ $category->slug }}&attribute_options={{ $eachItem->slug }}">{{ $eachItem->name }}</a></li>                                                        

                                                    @endforeach

                                                @endif

                                            </ul>
                                        </li>
                                            @if($category->name == 'Case iPhone')
                                                <li class="col-sm-3">
                                                    <ul>
                                                        <li class="dropdown-header"><a href="{{ url('/product/rainbow-silicon-apple') }}">RAINBOW Silicon Apple</a></li>                            
                                                        <div id="womenCollection" class="carousel slide" data-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="item active">
                                                                    {{-- <a href="{{ url('/product/rainbow-silicon-apple') }}"><img src="{{ asset('storage/products/1598278520rainbow-silicone-apple-1.jpg') }}" class="img-responsive" alt="product 1"></a> --}}
                                                                    <a href="{{ url('/product/rainbow-silicon-apple') }}"><img src="{{ asset('ecommerce/products/1598278520rainbow-silicone-apple-1.jpg') }}" class="img-responsive" alt="product 1"></a>
                                                                </div><!-- End Item -->
                                                            </div><!-- End Carousel Inner -->
                                                        </div><!-- /.carousel -->
                                                    </ul>
                                                </li>
                                                <li class="col-sm-3">
                                                    <ul>
                                                        <li class="dropdown-header"><a href="{{ url('/product/korean-pet-case') }}">KOREAN PET CASE</a></li>                            
                                                        <div id="womenCollection" class="carousel slide" data-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="item active">
                                                                    <a href="{{ url('/product/korean-pet-case') }}"><img src="{{ asset('ecommerce/products/1598196990korean-pet-case-1.jpg') }}" class="img-responsive" alt="product 1"></a>
                                                                </div><!-- End Item -->
                                                            </div><!-- End Carousel Inner -->
                                                        </div><!-- /.carousel -->
                                                    </ul>
                                                </li>
                                            @elseif($category->name == 'Case iPhone + FunPop')
                                                <li class="col-sm-3">
                                                    <ul>
                                                        <li class="dropdown-header"><a href="{{ url('/product/lax-case-funpop') }}">Lax Case Funpop</a></li>                            
                                                        <div id="womenCollection" class="carousel slide" data-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="item active">
                                                                    <a href="{{ url('/product/lax-case-funpop') }}"><img src="{{ asset('ecommerce/products/1598276785lax-case-funpop-1.jpg') }}" class="img-responsive" alt="product 1"></a>
                                                                </div><!-- End Item -->
                                                            </div><!-- End Carousel Inner -->
                                                        </div><!-- /.carousel -->
                                                                    
                                                    </ul>
                                                </li>
                                                <li class="col-sm-3">
                                                    <ul>
                                                        <li class="dropdown-header"><a href="{{ url('/product/rimolux-case') }}">Rimolux Case</a></li>                            
                                                        <div id="womenCollection" class="carousel slide" data-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="item active">
                                                                    <a href="{{ url('/product/rimolux-case') }}"><img src="{{ asset('ecommerce/products/1598278386rimolux-case-1.jpg') }}" class="img-responsive" alt="product 1"></a>
                                                                </div><!-- End Item -->
                                                            </div><!-- End Carousel Inner -->
                                                        </div><!-- /.carousel -->
                                                                    
                                                    </ul>
                                                </li>
                                            @elseif($category->name == 'Case AirPod')
                                                <li class="col-sm-3">
                                                    <ul>
                                                        <li class="dropdown-header"><a href="{{ url('/product/stella-lou-airpod-case') }}">STELLA LOU Airpod Case</a></li>                            
                                                        <div id="womenCollection" class="carousel slide" data-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="item active">
                                                                    <a href="{{ url('/product/stella-lou-airpod-case') }}"><img src="{{ asset('ecommerce/products/1598198384stella-lou-airpod-case-1.jpg') }}" class="img-responsive" alt="product 1"></a>
                                                                </div><!-- End Item -->
                                                            </div><!-- End Carousel Inner -->
                                                        </div><!-- /.carousel -->
                                                                    
                                                    </ul>
                                                </li>
                                                <li class="col-sm-3">
                                                    <ul>
                                                        <li class="dropdown-header"><a href="{{ url('/product/mc-drink-airpod-case') }}">Mc Drink Airpod Case</a></li>                            
                                                        <div id="womenCollection" class="carousel slide" data-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="item active">
                                                                    <a href="{{ url('/product/mc-drink-airpod-case') }}"><img src="{{ asset('ecommerce/products/1598199855mc-drink-airpod-case-1.jpg') }}" class="img-responsive" alt="product 1"></a>
                                                                </div><!-- End Item -->
                                                            </div><!-- End Carousel Inner -->
                                                        </div><!-- /.carousel -->
                                                                    
                                                    </ul>
                                                </li>
                                            @endif
                                        
                                        
                                    </ul>	
                                    <!-- MEGA MENU-->

                                @else
                                    <a href="{{URL::to('/')}}/collections?sortBy=newest&category={{ $category->slug }}">{{$category->name}}</span></a>

                                @endif
                        </li>

                    @php $counter++; @endphp
                    @endforeach

            </ul>
        </div><!-- /.nav-collapse -->
        </nav>
        </div>
    
    <!--william-->

	<!--================Header Menu Area =================-->

    @yield('content')
    
	
    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            {{-- <div class="logo-carousel owl-carousel"> --}}
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <p style="text-align: center; font-size: 30px; color: white;">~ Life isn't perfect but your case can be ~</p>
                        {{-- <img src="{{ asset('ecommerce/img/logo-carousel/logo-1.png') }}" alt=""> --}}
                    </div>
                </div>
                {{-- <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('ecommerce/img/logo-carousel/logo-2.png') }}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('ecommerce/img/logo-carousel/logo-3.png') }}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('ecommerce/img/logo-carousel/logo-4.png') }}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('ecommerce/img/logo-carousel/logo-5.png') }}" alt="">
                    </div>
                </div> --}}
            {{-- </div> --}}
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    {{-- <div class="footer-left">

                        <h5>Keep In Touch</h5>
                        <ul>
                            <li><a href="#"><i class="fa fa-whatsapp"></i><span>&nbsp;&nbsp;&nbsp;089651061361</a></span></li>
                            <li><a href="#"><i class="fa fa-instagram"></i><span>&nbsp;&nbsp;&nbsp;@casingapik</a></span></li>
                            <li><a href="#"><i class="fab fa-line"></i></a></li>
                        </ul>
                    </div>
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-whatsapp"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-line"></i></a>
                        </div>
                    </div> --}}
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="https://wa.me/6289651061361?text=HALLO!%20Selamat%20datang%20di%20@casingapik%0A%0ASEMUA%20case%20yang%20dijual%20READY%20STOCK%20dan%20SIAP%20DIPESAN%20yaa%20:)%0A%0AFORMAT%20PESANAN:%0ANama:%0ANo Hp:%0AAlamat :%0AKecamatan:%0AKota :%0AOrder:%20nama%20case%20/%20warna,%20motif%20/%20tipe%20hp%0A%0ACHECK%20KOLEKSI%20DI%20INSTAGRAM:%20@casingapik%0A%0APengiriman:%0ASENIN-JUMAT%20(closed%20order:%2015:00)%0ASABTU%20:%2013:00)%0ALayanan%20chat:%2010:00%20-%2020:00">Whatsapp&nbsp;&nbsp;&nbsp;089651061361</a></li>
                            <li><a href="https://www.instagram.com/casingapik/">Instagram&nbsp;&nbsp;&nbsp;@casingapik</a></li>
                            <li><a href="http://line.me/R/oaMessage/@zji5471j/?HALLO!%20Selamat%20datang%20di%20@casingapik%0A%0ASEMUA%20case%20yang%20dijual%20READY%20STOCK%20dan%20SIAP%20DIPESAN%20yaa%20:)%0A%0AFORMAT%20PESANAN:%0ANama:%0ANo%20Hp:%0AAlamat%20:%0AKecamatan:%0AKota%20:%0AOrder:%20nama%20case%20or%20warna,%20motif%20or%20tipe%20hp%0A%0ACHECK%20KOLEKSI%20DI%20INSTAGRAM:%20@casingapik%0A%0APengiriman:%0ASENIN-JUMAT%20(closed%20order:%2015:00)%0ASABTU%20:%2013:00)%0ALayanan%20chat:%2010:00%20-%2020:00">Line&nbsp;&nbsp;&nbsp;@zji5471j</a></li>
                            <li><a style="font-weight: 800;" href="https://wa.me/62895403920207">Website By Vincent&nbsp;&nbsp;&nbsp;0895403920207</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    {{-- <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div> --}}
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        {{-- <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>READY STOCK IPHONE CASES</h5>
                        <p>Est 2017</p>
                        <p>WELCOME RESELLER / DROPSHIPPER</p>
                        <p>Jakarta, Indonesia</p>
                        {{-- <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> CasingApik | All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://wa.me/62895403920207" target="_blank">Vincent - 0895403920207</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <script src="{{ asset('ecommerce/js/jquery-3.3.1.min.js') }}"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    
    {{-- <script src="{{ asset('ecommerce/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('ecommerce/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('ecommerce/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('ecommerce/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('ecommerce/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('ecommerce/js/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('ecommerce/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('ecommerce/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('ecommerce/js/main.js') }}"></script>

	@yield('js')

  <script>
    $(document).ready(function(){

        //Recreate this functionality in product detail page (because bootstrap js that is used behave differently than previous one)
        $(".product-shop.page-details .product-tab .tab-item ul.nav li a").click(function(){

            $(".product-shop.page-details .product-tab .tab-item ul.nav li a").removeClass("active");
            $(this).addClass("active");

        });

        //get count of product per page
        var productItemLength = $(".product-item").length;
        $("#productItemCountPerPage").html(productItemLength); 

        const urlParams = new URLSearchParams(window.location.search);
        const sortByParam = urlParams.get('sortBy');
        const url = window.location.href;

        var selectedSortBy = $(".sorting option[value='" + sortByParam + "']").text();
        $(".nice-select .current").html(selectedSortBy);

        //http://localhost/casingapik/public/collections/case-iphone/iphone-6?page=1
        //Sort By functionality

        $(".sorting").change(function() {
            var sortBy = $("select[class='sorting']").val();
            var categorySlug = $("#hidCategorySlug").val();
            var attributeOptionsSlug = $("#hidAttributeOptionsSlug").val();

            $.ajax({
                url: "{{ url('collections') }}",
                type: "GET",
                data: { sortBy: sortBy, category: categorySlug, attribute_options: attributeOptionsSlug },
                success: function(html){
                    $('.product-list').empty()
                    $('.product-list').append('<div class="row">');

                    $.each(html.data.data, function(key, item) {
                        
                        $('.product-list').append('<div class="col-lg-3 col-sm-6"><div class="product-item"><div class="pi-pic"><a href="product/' + item.slug + '"><img src="ecommerce/products/' + item.image + '" alt=""></a><div class="sale pp-sale">Sale</div></li></ul></div><div class="pi-text"><a href="product/' + item.slug + '"><h5>' + item.name + '</h5></a><div class="product-price">Rp' + numberWithCommas(item.price) + '</div></div></div></div>');

                    })
              
                    $('.product-list').append('</div>');

                    //rewrite pagination url with selected sortBy    
                    var paginationEl = $("ul.pagination");
                    var paginationListEl = $("ul.pagination li.page-item:not(.active) a.page-link");
                    if (paginationEl.length > 0)
                    {
                        paginationListEl.each(function(idx, li) {


                            var href = $(this).attr("href");
                            
                            href = href.replace("sortBy=newest", "sortBy=" + sortBy);
                            
                            href = href.replace(/(sortBy=)[^\&]+/, '$1' + sortBy);

                            $(this).attr('href',href);

                        });
                    }

                    //set previously active page to not active page
                    
                    var activePageItemEl = $("ul.pagination li.page-item.active");
                    var activePageLinkEl = $("ul.pagination li.page-item.active span.page-link");
                    var activePageItemText = activePageItemEl.text();

                    // var href = 'google.com';
                    // http://localhost/casingapik/public/collections?sortBy=price-ascending&category=case-iphone&attribute_options=iphone-6&page=1
                    var href = $("ul.pagination li.page-item:not(.active) .page-link").first().attr('href');
                    href = href.replace(/(page=)[^\&]+/, '$1' + activePageItemText);

                    activePageItemEl.removeClass("active");

                    activePageLinkEl.remove();
                    activePageItemEl.html("<a class='page-link' href='"+ href +"'>"+ activePageItemText +"</a>");

                    //set page 1 to active
                    var onePageItemEl = $(".pagination .page-item").filter(function () {
                        var text = $(this).text();
                        return text === "1"
                    });

                    onePageItemEl.addClass("active");
                    onePageItemEl.find('.page-link').remove();
                    onePageItemEl.html('<span class=page-link>1</span>');

                }
            });
        });

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

    });
    </script>
    
</body>
</html>