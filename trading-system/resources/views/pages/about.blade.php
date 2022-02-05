@extends('layouts.master')

@section('content')
<!--********************* SITE CONTENT *********************-->
<!--********************************************************-->
<!-- <span class="display-zero">en</span> -->
<!-- ===========================================  content =================================== -->
<!-- Banner Area Starts -->
<section class="banner-area" style="background-image: url('{{ asset('public/assets/site/images/من نحن.jpg') }}'">
    <div class="banner-overlay">
        <div class="banner-text text-center">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <div class="col-xs-12">
                        <!-- Title Starts -->
                        <h2 class="title-head">{!! __('front.about_us') !!}</h2>
                        <!-- Title Ends -->
                        <hr>
                        <!-- Breadcrumb Starts -->
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}"> {{ __('front.home') }}</a></li>
                            <li>{{ __('front.about') }}</li>
                        </ul>
                        <!-- Breadcrumb Ends -->
                    </div>
                </div>
                <!-- Section Title Ends -->
            </div>
        </div>
    </div>
</section>
<!-- Banner Area Starts -->
<!-- About Section Starts -->
<section class="about-page">
    <div class="container">
        <!-- Section Content Starts -->
        <div class="row about-content">
            <!-- Image Starts -->
            <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                @if($page && !empty($page->image))
                 <img class="img-responsive img-about-us" src="{{ asset('public/uploads/'.$page->image) }}" alt="img">
                @endif
            </div>
            <!-- Image Ends -->
            <!-- Content Starts -->
            <div class="col-sm-12 col-md-7 col-lg-6">
                <div class="feature-about">
                    {!! $page->content ?? '' !!}
                </div>
            </div>
            <!-- Content Ends -->
        </div>
        <!-- Section Content Ends -->
    </div><!--/ Content row end -->
</section>
<!-- About Section Ends -->
<!-- Facts Section Starts -->
<section class="facts">
    <!-- Container Starts -->
    <div class="container">
        <!-- Fact Badges Starts -->
        <div class="row text-center facts-content">
            <div class="text-center heading-facts">
                <h2>{!! __('front.weearn_numbers') !!}</h2>
                <span class="mb-0">{{ __('front.leading_distribution') }} <br> {{ __('front.leading_distribution2') }}</span> <br>
                <div class="text-center">
                    <span>{!! __('front.about_one') !!}</span><br>
                    <span>{!! __('front.about_two') !!}</span><br>
                    <span>{!! __('front.about_three') !!}</span><br>
                    <span>{!! __('front.about_four') !!}</span><br>
                    <span>{!! __('front.about_five') !!}</span><br>
                    <span>{!! __('front.about_six') !!}</span><br>
                    <span>{!! __('front.about_seven') !!}</span><br>
                    <span>{!! __('front.about_eight') !!}</span><br>
                <p>{!! __('front.about_last') !!}</p>
                </div>
            </div>
            <!-- Fact Badge Item Starts -->
            
           
        </div>
        <!-- Fact Badges Ends -->
    </div>
    <!-- Container Ends -->
</section>
<!-- facts Section Ends -->
<!-- Team Section Starts -->
<section class="team">
    <div class="container">
        <!-- Section Title Starts -->
        <div class="row text-center">
            <h2 class="title-head">{!! __('front.our_experts') !!}</h2>
            <div class="title-head-subtitle">
                <p>{{ __('front.our_experts_desc') }}</p>
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
@include('partials.call_to_action')
<!-- ===========================================  content =================================== -->
@endsection
