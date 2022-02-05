@extends('layouts.master')

@section('content')
    <!--********************* SITE CONTENT *********************-->
    <!--********************************************************-->
    <!-- <span class="display-zero">ar</span> -->
    <!-- Slider Starts -->
    <div id="main-slide" class="carousel slide carousel-fade">
        <!-- Indicators Starts -->
        <ol class="carousel-indicators visible-lg visible-md">
            <li data-target="#main-slide" data-slide-to="0" class="active"></li>
            <li data-target="#main-slide" data-slide-to="1"></li>
            <li data-target="#main-slide" data-slide-to="2"></li>
        </ol>
        <!-- Indicators Ends -->
        <!-- Carousel Inner Starts -->
        <div class="carousel-inner">
            @isset($sliders)
        @foreach($sliders as $key => $slider)
            <!-- Carousel Item Starts -->
                <div class="item {{ $key >= 1 ? '' : 'active' }}  bg-parallax" style="background-image: url('{{ asset('public/uploads/'.$slider->image) }}');">
                    <div class="slider-content">
                        <div class="container">
                            <div class="slider-text text-center">
                                <h3 class="slide-title"> {!! $slider->name !!}</h3>
                                <h5 class="slide-title1"><span>{!! $slider->content !!}</span><br/></h5>
                                <p>
                                    <a href="{{ route('register') }}" class="slider btn btn-primary"class="ts-padding">{{ __('front.new_real_account') }}</a>
                                    <a href="{{ route('register') }}" class="slider btn btn-primary"class="ts-padding">{{ __('front.new_demo_account') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item Ends -->
        @endforeach
            @endisset
            @isset($sliderss)
        @foreach($sliders as $slider)
            <!-- Carousel Item Starts -->
                <div class="item bg-parallax" style="background-image: url('{{ asset('public/uploads/'.$slider->image) }}');">
                    <div class="slider-content">
                        <div class="container">
                            <div class="slider-text text-center">
                                <h3 class="slide-title"><span>{{ $slider->name }}<br/></span></h3>
                                <h6 class="slide-title1"><span>{!! $slider->content !!}</span><br/></h6>
                                <p>
                                    <a href="{{ route('register') }}" class="slider btn btn-primary"class="ts-padding">{{ __('front.New_realaccount') }}</a>
                                    <a href="{{ route('register') }}" class="slider btn btn-primary"class="ts-padding">{{ __('front.New_demo') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item Ends -->
            @endforeach
                @endisset
        </div>
        <!-- Carousel Inner Ends -->
        <!-- Carousel Controlers Starts -->
        <a class="left carousel-control" href="{{ url('') }}#main-slide" data-slide="prev">
            <span><i class="fa fa-angle-left"></i></span>
        </a>
        <a class="right carousel-control" href="{{ url('') }}#main-slide" data-slide="next">
            <span><i class="fa fa-angle-right"></i></span>
        </a>
        <!-- Carousel Controlers Ends -->
    </div>
    <!-- Slider Ends -->
    <!-- Features Section Starts -->
    <section class="features">
        <div class="container">
            <div class="row pricing-tables-content">
                <div class="pricing-container">
                    <!-- Pricing Tables Starts -->
                    <ul class="pricing-list bounce-invert">
                        <li class="col-xs-6 col-lg-2">
                            <ul class="pricing-wrapper">
                                <li data-type="buy" class="is-visible">
                                    <header class="pricing-header">
                                        <h2>{{ __('front.fees_deposits') }}</h2>
                                        <div class="price mt-60">
                                            <span class="value">{{ __('front.fees_deposits_number') }}</span>
                                        </div>
                                    </header>
                                </li>
                                <!-- Sell Pricing Table #2 Ends -->
                            </ul>
                        </li>
                        <li class="col-xs-6 col-lg-2">
                            <ul class="pricing-wrapper">
                                <li data-type="buy" class="is-visible">
                                    <header class="pricing-header">
                                        <h2>{{ __('front.currency_pair') }}</h2>
                                        <div class="price mt-60">
                                            <span class="value">{{ __('front.currency_pair_number') }}</span>
                                        </div>
                                    </header>
                                </li>
                                <!-- Sell Pricing Table #2 Ends -->
                            </ul>
                        </li>
                        <li class="col-xs-6 col-lg-2">
                            <ul class="pricing-wrapper">
                                <li data-type="buy" class="is-visible">
                                    <header class="pricing-header">
                                        <h2>{{ __('front.support') }}</h2>
                                        <div class="price mt-60">
                                            <span class="value">{{ __('front.support_number') }}</span>
                                        </div>
                                    </header>
                                </li>
                                <!-- Sell Pricing Table #2 Ends -->
                            </ul>
                        </li>

                        <li class="col-xs-6 col-lg-2">
                            <ul class="pricing-wrapper">
                                <li data-type="buy" class="is-visible">
                                    <header class="pricing-header">
                                        <h2>{{ __('front.lot_size') }}</h2>
                                        <div class="price mt-60">
                                            <span class="value">{{ __('front.lot_size_number') }}</span>
                                        </div>
                                    </header>
                                </li>
                                <!-- Sell Pricing Table #2 Ends -->
                            </ul>
                        </li>
                        <li class="col-xs-6 col-lg-2">
                            <ul class="pricing-wrapper">
                                <li data-type="buy" class="is-visible">
                                    <header class="pricing-header">
                                        <h2>{{ __('front.spread') }}</h2>
                                        <div class="price mt-60">
                                            <span class="value">{{ __('front.spread_number') }}</span>
                                        </div>
                                    </header>
                                </li>
                                <!-- Sell Pricing Table #2 Ends -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section Ends -->
    <!-- About Section Starts -->
    <section class="about-us">
        <div class="container">
            <!-- Section Title Starts -->
            <div class="row text-center">
                <h2 class="title-head"><span>{{ __('front.platforms') }}</span></h2>
                <div class="title-head-subtitle">
                    <p>{{ __('front.why_finance') }}</p>
                </div>
            </div>
            <!-- Section Title Ends -->
            <?php $page_part1 = $pages->where('slug', 'home_part1')->first(); ?>
            @if($page_part1)
            <!-- Section Content Starts -->
            <div class="row about-content">
                <!-- Image Starts -->
                <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                    <div class="row">
                        @if(!empty($page_part1->image))
                        <img class="img-responsive img-about-us" src="{{ asset('public/uploads/'.$page_part1->image) }}" alt="about us">
                        @endif
                    </div>
                </div>
                <!-- Image Ends -->
                <!-- Content Starts -->
                <div class="col-sm-12 col-md-7 col-lg-6">
                    {!! $page_part1->content !!}
                </div>
                <!-- Content Ends -->
            </div>
            <!-- Section Content Ends -->
            @endif
        </div>
    </section>
    <!-- About Section Ends -->
    <!-- Features and Video Section Starts -->
                <?php $page_part2 = $pages->where('slug', 'home_part2')->first(); ?>
            @if($page_part2)
    <section class="image-block">
        <div class="container-fluid">
            <div class="row">
                <!-- Features Starts -->
                <div class="col-md-8 top-footer img-block-left">
                    <div class="gap-20"></div>
                    <div class="row">
                        <!-- Feature Starts -->
                        <div class="col-sm-12 col-md-6 col-lg-10">
                            {!! $page_part2->content !!}
                        </div>
                    </div>
                </div>
                <!-- Features Ends -->
                <!-- Video Starts -->
                <div class="col-md-4 ts-padding bg-image-1" style="background-image: url('{{ asset('https://we-earn-finance.com/public/uploads/df.jpg') }}'">
                    <div>
                        <div class="text-center">
                            <a class="button-video mfp-youtube" href="{!! $page_part2->url !!}"></a>
                        </div>
                    </div>
                </div>
                <!-- Video Ends -->
            </div>
        </div>
    </section>
    <!-- Features and Video Section Ends -->
    @endif
    <!-- Pricing Starts -->
    <section class="pricing">
        <div class="container">
            <!-- Section Title Starts -->
            <div class="row text-center">
                <h2 class="title-head">{!! __('front.our_company_products') !!}</span></h2>
                <div class="title-head-subtitle">
                    <p>{{ __('front.our_company_products_desc1') }}</p>
                </div>
            </div>
            <!-- Section Title Ends -->
            <!-- Section Content Starts -->
            <div class="row pricing-tables-content">
                <div class="pricing-container">
                    <!-- Pricing Tables Starts -->
                    <ul class="pricing-list bounce-invert">
                        @foreach($products as $product)
                        <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <ul class="pricing-wrapper">
                                <!-- Buy Pricing Table #1 Starts -->
                                <li data-type="buy" class="is-visible">
                                    <header class="pricing-header">
                                        <i class="fas {{ $product->icon }}"></i>
                                        <h2>{{ $product->name }}</h2> <hr>
                                        <p>{{ \Str::limit($product->description, 120, ' ...') }}</p>
                                    </header>
                                    <footer class="pricing-footer">
                                        <a href="{{ route('product', $product->id) }}" class="btn btn-primary">{{ __('front.read_more') }}</a>
                                    </footer>
                                </li>
                                <!-- Buy Pricing Table #1 Ends -->
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Ends -->
    <!-- Bitcoin Calculator Section Starts -->
    <section class="bitcoin-calculator-section" style="background-image: url('{{ asset('public/assets/site/images/backgrounds/bg-soonk1.jpg') }}');">
        <div class="container">
            <div class="row">
                <!-- Section Heading Starts -->
                <div class="col-md-12">
                    <h2 class="title-head text-center" style="font-size: 40px;"><span>{{ __('front.comming_soon') }} <hr></span></h2>
                    <p class="text-center">
                    <img src="{{ asset('public/assets/site/images/1.png') }}" style="width: 15%;">
                    <img src="{{ asset('public/assets/site/images/2.png') }}" style="width: 15%;">
                    <img src="{{ asset('public/assets/site/images/3.png') }}" style="width: 15%;">
                    <img src="{{ asset('public/assets/site/images/4.png') }}" style="width: 15%;"></p>
                </div>
                <!-- Section Heading Ends -->
            </div>
        </div>
    </section>
    <!-- Bitcoin Calculator Section Ends -->
    <!-- Team Section Starts -->
    <section class="team">
        <div class="container">
            <!-- Section Title Starts -->
            <div class="row text-center">
                <h2 class="title-head">{!! __('front.our_experts') !!}</h2>
                <div class="title-head-subtitle">
                    <p>{!! __('front.our_experts_desc') !!}</p>
                </div>
            </div>
            <!-- Section Title Ends -->
            <!-- Team Members Starts -->
            <div class="row team-content team-members">
                @isset($team)
            @foreach($team as $tt)
                <!-- Team Member Starts -->
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="team-member">
                            <!-- Team Member Picture Starts -->
                            <img src="{{ asset('public/uploads/'.$tt->image) }}" class="img-responsive" alt="{{ $tt->name }}" style="height: 320px; width: 100%">
                            <!-- Team Member Picture Ends -->
                            <!-- Team Member Details Starts -->
                            <div class="team-member-caption social-icons">
                                <h4>{{ $tt->content }}</h4>
                                <p>{{ $tt->name }}</p>
                            </div>
                            <!-- Team Member Details Ends -->
                        </div>
                    </div>
                    <!-- Team Member Ends -->
                @endforeach
                    @endisset
            </div>
            <!-- Team Members Ends -->
        </div>
    </section>
    <!-- Team Section Ends -->
    <!-- Blog Section Starts -->
    <section class="blog">
        <div class="container">
            <!-- Section Title Starts -->
            <div class="row text-center">
                <h2 class="title-head">{{ __('front.courses') }}</h2>
                <div class="title-head-subtitle">
                </div>
            </div>
            <!-- Section Title Ends -->
            <!-- Section Content Starts -->
            <div class="row latest-posts-content">
                @isset($education)
            @foreach($education as $edu)
                <!-- Article Starts -->
                    <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="latest-post">
                            <!-- Featured Image Starts -->
                            <a href="{{ route('education.single', $edu->id) }}">
                                <img class="img-responsive" src="{{ asset('public/uploads/'.$edu->image) }}" style="height: 250px;width: 100%">
                            </a>
                            <!-- Featured Image Ends -->
                            <!-- Article Content Starts -->
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="{{ route('education.single', $edu->id) }}">{{ $edu->name }}</a>
                                </h4>
                                <div class="post-text">
                                    <p>{{ \Illuminate\Support\Str::limit($edu->description, 100, '..') }}</p>
                                </div>
                            </div>
                            <div class="post-date">
                                <span>{{ $edu->created_at->format('j') }}</span>
                                <span>{{ $edu->created_at->format('M') }}</span>
                            </div>
                            <a href="{{ route('education.single', $edu->id) }}" class="btn btn-primary">{{ __('front.read_more') }}</a>
                            <!-- Article Content Ends -->
                        </div>
                    </div>
                    <!-- Article Ends -->
                @endforeach
                    @endisset
            </div>
            <!-- Section Content Ends -->
        </div>
    </section>
    <!-- Blog Section Ends -->
    <!-- Quote and Chart Section Starts -->
    <section class="image-block2">
        <div class="container-fluid">
            <div class="row">
                <!-- Quote Starts -->
                <div class="col-md-4 img-block-quote bg-image-2">
                    <blockquote>
                        <p>{{ __('front.bitcoin_one') }}</p>
                    </blockquote>
                </div>
                <!-- Quote Ends -->
                <!-- Chart Starts -->
                <div class="col-md-8 bg-grey-chart">
                    <div class="chart-widget dark-chart chart-1">
                        <div>
                            <div class="btcwdgt-chart" data-bw-theme="dark"></div>
                            
                            
                       
                        </div>
                    </div>
                </div>
                <!-- Chart Ends -->
            </div>
        </div>
    </section>
    <!-- Quote and Chart Section Ends -->
    <!-- Blog Section Starts -->
    <section class="blog">
        <div class="container">
            <!-- Section Title Starts -->
            <div class="row text-center">
                <h2 class="title-head">{{ __('front.news') }}</h2>
                <div class="title-head-subtitle">
                    <p>{{ __('front.discover_blog') }}</p>
                </div>
            </div>
            <!-- Section Title Ends -->
            <!-- Section Content Starts -->
            <div class="row latest-posts-content">
                @isset($news)
            @foreach($news as $new)
                <!-- Article Starts -->
                    <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="latest-post">
                            <!-- Featured Image Starts -->
                            <a href="{{ route('blog.single', $new->id) }}">
                                <img class="img-responsive" src="{{ asset('public/uploads/'.$new->image) }}" style="height: 250px;width: 100%">
                            </a>
                            <!-- Featured Image Ends -->
                            <!-- Article Content Starts -->
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="{{ route('blog.single', $new->id) }}">{{ $new->name }}</a>
                                </h4>
                                <div class="post-text">
                                    <p>{{ \Illuminate\Support\Str::limit($new->description, 100, '..') }}</p>
                                </div>
                            </div>
                            <div class="post-date">
                                <span>{{ $new->created_at->format('j') }}</span>
                                <span>{{ $new->created_at->format('M') }}</span>
                            </div>
                            <a href="{{ route('blog.single', $new->id) }}" class="btn btn-primary">{{ __('front.read_more') }}</a>
                            <!-- Article Content Ends -->
                        </div>
                    </div>
                    <!-- Article Ends -->
                @endforeach
                    @endisset($new)
            </div>
            <!-- Section Content Ends -->
        </div>
    </section>
    <!-- Blog Section Ends -->
    @include('partials.call_to_action')
@endsection
