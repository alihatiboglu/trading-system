@extends('layouts.master')

@section('content')
<!--********************* SITE CONTENT *********************-->
<!--********************************************************-->
<span class="display-zero"></span>
<!-- ===========================================  content =================================== -->
        <!-- Banner Area Starts -->
        <section class="banner-area" style="background-image: url('{{ asset('public/assets/site/images/banneer-wallet.jpg') }}');">
            <div class="banner-overlay">
                <div class="banner-text text-center">
                    <div class="container">
                        <!-- Section Title Starts -->
                        <div class="row text-center">
                            <div class="col-xs-12">
                                <!-- Title Starts -->
                                <h2 class="title-head">{!! __('front.account_managment') !!}</h2>
                                <!-- Title Ends -->
                                <hr>
                                <!-- Breadcrumb Starts -->
                                <ul class="breadcrumb">
                                    <li><a href="{{ route('home') }}"> {!! __('front.home') !!}</a></li>
                                    <li> {{ __('front.account_managment') }}</li>
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
        <!-- Starts video -->
<section class="image-block">
    <div class="container-fluid">
        <div class="row">
            <!-- Features Starts -->
            <div class="col-md-8 ts-padding img-block-left">
                <div class="gap-20"></div>
                <div class="row">
                    <!-- Feature Starts -->
                    <div class="col-sm-12 col-md-6 col-lg-10">
                        {!! $page->content ?? '' !!}
                    </div>
                </div>
            </div>
            <!-- Features Ends -->
            <!-- Video Starts -->
            <div class="col-md-4 col-xs-12  ts-padding bg-image-1" style="background-image: url('{{ asset('public/uploads/'.$page->image) }}'">
                <div>
                    <div class="text-center">
                        <a class="button-video mfp-youtube" href="{!! $page->url ?? '' !!}"></a>
                    </div>
                </div>
            </div>
            <!-- Video Ends -->
        </div>
    </div>
</section>

<!-- video Ends -->

<section class="about-us pnormalali">
    <div class="container">
        <!-- Section Content Starts -->
        <div class="about-content " >
            <img class="img-responsive img-about-us " src="{{ asset('public/assets/site') }}/images/norisk.png" alt="about us">

        </div>
        <!-- Section Content Ends -->
    </div>
</section>
        <!-- Pricing Starts -->
        <section class="pricing mtop">
            <div class="container">
                <!-- Section Content Starts -->
                <h3 class="text-center">{{ __('front.customers_in_profit') }}</h3>
                <div class="row pricing-tables-content pricing-page">
                    <div class="pricing-container">
                        <!-- Pricing Tables Starts -->
                        <ul class="pricing-list bounce-invert">
                            @foreach($packages as $package)
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <!-- Pricing Table #1 Starts -->
                                    <li>
                                        <header class="pricing-header">
                                            <i class="fas {!! $package->icon !!}"></i>
                                            <h2>{{ $package->name }}</h2>
                                            <hr>
                                            <div class="price">
                                                {!! $package->content !!}
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="{{ route('register') }}" class="btn btn-primary">{{ __('front.open_wallet_now') }}</a>
                                        </footer>
                                    </li>
                                    <!-- Pricing Table #1 Ends -->
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Ends -->
        @include('partials.call_to_action')
<!-- ===========================================  content =================================== -->
@endsection
