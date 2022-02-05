@extends('layouts.master')

@section('content')
<!--********************* SITE CONTENT *********************-->
<!--********************************************************-->
<span class="display-zero"></span>
<!-- ===========================================  content =================================== -->

<!-- Banner Area Starts -->
<section class="banner-area" style="background-image: url('{{ asset('public/assets/site/images/account_typeplus.jpg') }}');">
    <div class="banner-overlay">
        <div class="banner-text text-center">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <div class="col-xs-12">
                        <!-- Title Starts -->
                        <h2 class="title-head">{!! __('front.type_account') !!}</h2>
                        <!-- Title Ends -->
                        <hr>
                        <!-- Breadcrumb Starts -->
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}"> {!! __('front.home') !!}</a></li>
                            <li> {{ strip_tags(__('front.type_account'))  }}</li>
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
            <div class="col-md-4 col-xs-12  ts-padding bg-image-1"  style="background-image: url('{{ asset('public/assets/site/images/Video-account.jpg') }}');">
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
<!-- Pricing Starts -->
<section class="pricing mtop">
    <div class="container">
        <!-- Section Content Starts -->
        <div class="row pricing-tables-content pricing-page">
            <div class="pricing-container">
                <!-- Pricing Tables Starts -->
                <ul class="pricing-list bounce-invert">
                    <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <ul class="pricing-wrapper">
                            <!-- Pricing Table #1 Starts -->
                            <li>
                                <header class="pricing-header">
                                    <i class="fas fa-user-circle accounttali"></i>
                                    <h2>{!! __('front.type_account') !!}</h2>
                                    <hr>
                                    <div class="price">
                                        <span class="currency"></span>
                                        <span class="value colorfontali2">{{ __('front.minimum_deposit') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.account_currency') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.leverage') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.trade_size') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.commission') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.trading_instruments') }}</span>
                                        <br><br>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.cdf') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.order_execution') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.minimum_spread') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.margin_call') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.stop_out') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.max_lots') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.hedging') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.negative_balance') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.mobile_app') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.swap_account') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.islamic_account') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.expert_advisors') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.trading_platform') }}</span>
                                        <hr>
                                        <span class="value colorfontali2">{{ __('front.segregation_of_funds') }}</span>
                                    </header>
                                    <footer class="pricing-footer">
                                        <a href="{{ route('register') }}" class="btn btn-primary">{{ __('front.open_account_now') }}</a>
                                    </footer>
                                </li>
                                <!-- Pricing Table #1 Ends -->
                            </ul>
                        </li>
                        @foreach($items as $item)
                        <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <ul class="pricing-wrapper">
                                <!-- Pricing Table #2 Starts -->
                                <li>
                                    <header class="pricing-header">
                                        <i class="fas {!! $item->icon !!}"></i>
                                        <h2>{{ $item->name }}</h2>
                                        <hr>
                                        <div class="price">
                                            {!! $item->content !!}
                                        </div>
                                    </header>
                                    <footer class="pricing-footer">
                                        <a href="{{ route('register') }}" class="btn btn-primary">{{ __('front.open_account_now') }}</a>
                                    </footer>
                                </li>
                                <!-- Pricing Table #2 Ends -->
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
