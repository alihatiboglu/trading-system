@php
    $locale = LaravelLocalization::getCurrentLocale();
    $programs = \App\Models\Post::where('type', 'program')->get();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Primary Meta Tags -->
    <meta charset="utf-8">
    <title>{{ __('front.meta_title')}}</title>
    <meta name="title" content="{{ __('front.meta_title')}}">
    <meta name="description" content="{{ __('front.meta_description')}}">
    <meta name="google-site-verification" content="PV3dYZwDsjh4Ywjz4Wh33mIWfqa7peelB4u_A3--HKw"/>
    <meta name="robots" content="{{ __('front.meta_robots')}}">
    <meta name="keywords" content="{{ __('front.meta_keywords')}}">
    <meta name="author" content="{{ __('front.meta_author')}}"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('public/assets/site/images/favicon.png') }}">
    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/assets/site/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/site/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/site/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/site/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/site/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/site/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/site/css/skins/green.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- Template JS Files -->
    <script src="{{ asset('public/assets/site/js/modernizr.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('public/assets/site/css/material.css') }}" />
    <!-- ===========================================  LaravelLocalization =================================== -->
    <span class="display-zero">{{ $locale }}</span>
    @if($locale == 'ar')
        <link rel="stylesheet" href="{{ asset('public/assets/site/css/rtl.css') }}" />
       <link rel="preconnect" href="https://fonts.gstatic.com">
       <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700&display=swap" rel="stylesheet">  
    @else
    @endif
    @stack('styles')
    <script src="//code.tidio.co/ugyafvdew7t5bky0ftutwfic44o1imuc.js" async></script>
</head>
<body>

<!-- Wrapper Starts -->
<div class="wrapper">
    <!-- Header Starts -->
    <header class="header">
        <div class="container">
            <div class="row">
                <!-- Logo Starts -->
                <div class="main-logo col-xs-12 col-md-3 col-md-2 col-lg-2 hidden-xs">
                    <a href="{{ route('home') }}">
                        <img class="img-responsive" src="{{ asset('public/assets/site') }}/images/logo.png" alt="logo-2">
                    </a>
                </div>
                <!-- Logo Ends -->
                <!-- Statistics Starts -->
                <div class="col-md-7 col-lg-7">
                    <ul class="unstyled bitcoin-stats text-center">
                        <li>
                            <h6>9,450 USD</h6><span>Last trade price</span></li>
                        <li>
                            <h6>+5.26%</h6><span>24 hour price</span></li>
                        <li>
                            <h6>12.820 BTC</h6><span>24 hour volume</span></li>
                        <li>
                            <h6>2,231,775</h6><span>active traders</span></li>
                        <li>
                            <div class="btcwdgt-price" data-bw-theme="light" data-bw-cur="usd"></div>
                            <span>Live Bitcoin price</span>
                        </li>
                    </ul>
                </div>
                <!-- Statistics Ends -->
                <!-- User Sign In/Sign Up Starts -->
                <div class="col-md-3 col-lg-3">
                    @guest
                        <ul class="unstyled user">
                            <li class="sign-in"><a href="{{ route('login') }}" class="btn btn-primary"><i class="fa fa-user"></i> {{ __('front.login')}}</a></li>
                            <li class="sign-up"><a href="{{ route('register') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> {{ __('front.register')}}</a></li>
                        </ul>
                    @else
                        <ul class="unstyled user">
                            @hasrole('admin')
                            <li class="sign-up"><a href="{{ route('dashboard.index') }}" class="btn btn-primary"> {{ \Illuminate\Support\Str::limit(auth()->user()->name, 6, '..') }}</a></li>
                            @else
                                <li class="sign-in"><a href="{{ route('client.index') }}" class="btn btn-primary"><i class="fa fa-user"></i> {{ \Illuminate\Support\Str::limit(auth()->user()->name, 6, '..') }}</a></li>
                                @endhasrole
                                <!-- ===============================  Logout ======================================== -->
                                <li class="sign-in"> <a class="btn btn-primary" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <span class="fa fa-sign-out-alt mr-2"></span>
                                        {{ __('front.logout')}}</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display-zero">
                                    @csrf
                                </form>
                                <!-- ===============================  Logout ======================================== -->
                        </ul>
                    @endguest
                </div>
                <!-- User Sign In/Sign Up Ends -->
            </div>
        </div>
        <!-- Navigation Menu Starts -->
        <nav class="site-navigation navigation" id="site-navigation">
            <div class="container-fluid">
                <div class="site-nav-inner">
                    <!-- Logo For ONLY Mobile display Starts -->
                    <a class="logo-mobile" href="{{ route('home') }}">
                        <img class="img-responsive" src="{{ asset('public/assets/site') }}/images/logo.png" alt="logo-2">
                    </a>
                    <!-- Logo For ONLY Mobile display Ends -->
                    <!-- Toggle Icon for Mobile Starts -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Toggle Icon for Mobile Ends -->
                    <div class="collapse navbar-collapse navbar-responsive-collapse">
                        <!-- Main Menu Starts -->
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{ route('home') }}">{{ __('front.home')}}</a></li>
                            <li><a href="{{ route('about') }}">{{ __('front.about')}}</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ __('front.products')}} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(\App\Models\Item::all() as $product)
                                        <li><a href="{{ route('product', $product->id) }}">{{ $product->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ __('front.platforms')}} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach($programs as $program)
                                        <li><a href="{{ route('program', $program->id) }}">{{ $program->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ __('front.accounts')}} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <!-- Cart Icon Starts -->
                                    <li><a href="{{ route('accounts.type') }}">{{ __('front.type_account')}}</a></li>
                                    <li><a href="{{ route('register') }}">{{ __('front.new_real_account')}}</a></li>
                                    <li><a href="{{ route('register') }}">{{ __('front.new_demo_account')}}</a></li>
                                    <li><a href="{{ route('register') }}?p=1">{{ __('front.partner_account')}}</a></li>
                                    <!-- Cart Icon Starts -->
                                </ul>
                            </li>
                            <!-- Cart Icon Starts -->
                            <li><a href="{{ route('management') }}">{{ __('front.account_managment')}}</a></li>
                            <li><a href="{{ route('economic') }}">{{ __('front.economic_calendar')}}</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ __('front.reserach_education')}} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <!-- Cart Icon Starts -->
                                    <li><a href="{{ route('education') }}">{{ __('front.courses')}}</a></li>
                                    <li><a href="{{ route('seminars') }}">{{ __('front.seminars')}}</a></li>
                                    <li><a href="{{ route('blog.index') }}">{{ __('front.news')}}</a></li>
                                    <!-- Cart Icon Starts -->
                                </ul>
                            </li>
                            <li><a href="{{ route('contact') }}">{{ __('front.contact_us')}}</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $locale }} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- Cart Icon Starts -->
                        </ul>
                        <!-- Main Menu Ends -->
                    </div>
                </div>
            </div>
            <!-- Search Input Starts -->
            <div class="site-search">
                <div class="container">
                    <input type="text" placeholder="type your keyword and hit enter ...">
                    <span class="close">×</span>
                </div>
            </div>
            <!-- Search Input Ends -->
        </nav>
        <!-- Navigation Menu Ends -->
    </header>
    <!-- Header Ends -->
    <!-- ===========================================  content =================================== -->
@yield('content')
<!-- ===========================================  content =================================== -->
    <!-- Footer Starts -->
    <footer class="footer">
        <!-- Footer Top Area Starts -->
        <div class="container">
            <p class="" style="padding: 10px 0">{{ __('front.privacy_content') }}</p>
        </div>
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Starts -->
                    <div class="col-sm-4 col-md-2">
                        <h4>{{ __('front.accounts')}}</h4>
                        <div class="menu">
                            <ul>
                                <li><a href="{{ route('register') }}">{{ __('front.new_real_account')}}</a></li>
                                <li><a href="{{ route('register') }}">{{ __('front.new_demo_account')}}</a></li>
                                <li><a href="{{ route('register') }}?p=1">{{ __('front.partner_account')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Ends -->
                    <!-- Footer Widget Starts -->
                    <div class="col-sm-4 col-md-2">
                        <h4>{{ __('front.platforms')}}</h4>
                        <div class="menu">
                            <ul>
                                @foreach($programs as $program)
                                    <li><a href="{{ route('program', $program->id) }}">{{ $program->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Ends -->
                    <!-- Footer Widget Starts -->
                    <div class="col-sm-4 col-md-3">
                        <h4>{{ __('front.contact_us')}}</h4>
                        <div class="contacts">
                            <div>
                                <span style="padding-bottom: 12px;font-size: 13px;font-weight: 400;text-transform: none;">{{ __('front.site_email')}}</span>
                            </div>
                            <div>
                                <span style="padding-bottom: 12px;font-size: 13px;font-weight: 400;text-transform: none;">{{ __('front.site_phone')}}</span>
                            </div>
                            <div>
                                <span style="padding-bottom: 12px;font-size: 13px;font-weight: 400;text-transform: none;">{{ __('front.site_address')}}</span>
                            </div>
                            <div>
                                <span style="padding-bottom: 12px;font-size: 13px;font-weight: 400;text-transform: none;">{{ __('front.working_hours_desc')}}</span>
                            </div>
                        </div>
                        <!-- Social Media Profiles Starts -->
                        <div class="social-footer">
                            <ul>
                                <li><a href="{{ __('front.url_facebook')}}" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ __('front.url_twitter')}}" target="_blank"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ __('front.url_telegram')}}" target="_blank"><i
                                            class="fab fa-telegram"></i></a></li>
                                <li><a href="{{ __('front.url_instagram')}}" target="_blank"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a href="{{ __('front.url_whatsapp')}}" target="_blank"><i
                                            class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        <!-- Social Media Profiles Ends -->
                    </div>
                    <!-- Footer Widget Ends -->
                    <!-- Footer Widget Starts -->
                    <div class="col-sm-12 col-md-5">
                        <!-- Facts Starts -->
                        <div class="facts-footer">
                            <!-- <div>
                                <h5>{{ __('front.market_cap_number')}}</h5>
                                <span>{{ __('front.market_cap')}}</span>
                            </div>
                            <div>
                                <h5>{{ __('front.daily_transactions_number')}}</h5>
                                <span>{{ __('front.daily_transactions')}}</span>
                            </div>
                            <div>
                                <h5>{{ __('front.active_accounts_number')}}</h5>
                                <span>{{ __('front.active_accounts')}}</span>
                            </div>
                            <div>
                                <h5>{{ __('front.years_market_number')}}</h5>
                                <span></span>
                            </div> -->
                            <p> {{ __('front.WE_EARN_FINANCE_a')}} </p>
                            
                            
                        </div>
                        <!-- Facts Ends -->
                        <hr>
                        <!-- Supported Payment Cards Logo Starts -->
                        <div class="payment-logos">
                            <h4 class="payment-title">{{ __('front.payment_methods')}}</h4>
                            <img src="{{ asset('public/assets/site/images/icons/payment/american-express.png') }}" alt="american-express">
                            <img src="{{ asset('public/assets/site/images/icons/payment/mastercard.png') }}" alt="mastercard">
                            <img src="{{ asset('public/assets/site/images/icons/payment/visa.png') }}" alt="visa">
                            <img src="{{ asset('public/assets/site/images/icons/payment/paypal.png') }}" alt="paypal">
                            <img class="last" src="{{ asset('public/assets/site/images/icons/payment/maestro.png') }}" alt="maestro">
                        </div>
                        <!-- Supported Payment Cards Logo Ends -->
                    </div>
                    <!-- Footer Widget Ends -->
                </div>
            </div>
        </div>
        <!-- Footer Top Area Ends -->
        <!-- Footer Bottom Area Starts -->
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Copyright Text Starts -->
                        <p class="text-center">  {{ __('front.copyright') }} </p>
                        <!-- Copyright Text Ends -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom Area Ends -->
    </footer>
    <!-- Footer Ends -->
    <!-- Back To Top Starts  -->
    <a id="back-to-top" class="back-to-top fa fa-arrow-up" onclick="scrollToTop()"
    style="width: 28px;cursor:pointer;"></a>
    <!-- Back To Top Ends  -->
    <!-- Template JS Files -->
    <script src="{{ asset('public/assets/site/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('public/assets/site/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/site/js/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('public/assets/site/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/assets/site/js/all.js') }}"></script>
    <script src="{{ asset('public/assets/site/js/custom.js') }}"></script>
    <script>
        function scrollToTop() {
            $(window).scrollTop(0);
        }
        
        $(function(){
            $('.datepicker').datepicker(); 
        })
    </script>
    @stack('scripts')
</div>
<!-- Wrapper Ends -->

</body>
</html>
