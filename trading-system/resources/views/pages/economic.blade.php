@extends('layouts.master')

@section('content')
<!--********************* SITE CONTENT *********************-->
<!--********************************************************-->
{{--<span class="display-zero">en</span>--}}
<!-- ===========================================  content =================================== -->
    <!-- Banner Area Starts -->
        <section class="banner-area" style="background-image: url('{{ asset('public/assets/site/images/Bannere.jpg') }}');">
            <div class="banner-overlay">
                <div class="banner-text text-center">
                    <div class="container">
                        <!-- Section Title Starts -->
                        <div class="row text-center">
                            <div class="col-xs-12">
                                <!-- Title Starts -->
                                 <h2 class="title-head"><span>{{ __('front.mt4_ipad') }} </span></h2>
                                <!-- Title Ends -->
                                <hr>
                                <!-- Breadcrumb Starts -->
                                <ul class="breadcrumb">
                                    <li><a href="{{ route('home') }}"> {{ __('front.home') }}</a></li>
                                    <li>{{ __('front.mt4_ipad') }} </li>
                                </ul>
                                <!-- Breadcrumb Ends -->
                            </div>
                        </div>
                        <!-- Section Title Ends -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Area Ends -->
        <br>
        
        <br>
        <br>
        <!-- About Section Starts -->
        <section class="about-us">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    
                    <div class="title-head-subtitle">
                        <p>{{ __('front.download_trading') }}</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row about-content">
                    <script type="text/javascript" src="https://www.tradays.com/c/js/widgets/calendar/widget.js?8"></script>
                    <div id="economicCalendarWidget"></div>
                    <script type="text/javascript">
                        new economicCalendar({ width: "100%", height: "600", mode: 1, lang: "en" });
                    </script>
                </div>
                <!-- Section Content Ends -->
            </div>
        </section>
        <!-- About Section Ends -->
<!-- ===========================================  content =================================== -->
@endsection
