@extends('layouts.master')

@section('content')
<!--********************* SITE CONTENT *********************-->
<!--********************************************************-->
{{--<span class="display-zero">en</span>--}}
<!-- ===========================================  content =================================== -->
<!-- Banner Area Starts -->
<section class="banner-area">
    <div class="banner-overlay">
        <div class="banner-text text-center">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <div class="col-xs-12">
                        <!-- Title Starts -->
                        <h2 class="title-head">{{ $item->name  }}</span></h2>
                        <!-- Title Ends -->
                        <hr>
                        <!-- Breadcrumb Starts -->
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}"> {{ __('main.Home') }}</a></li>
                            <li>{{ $item->name }}</li>
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
<!-- Section Content Starts -->
<section class="container blog-page">
    <div class="row">
        <!-- Sidebar Starts -->
        @include('partials.blog_sidebar')
        <!-- Sidebar Ends -->
        <div class="content col-xs-12 col-md-8">
            <!-- Article Starts -->
            <article>
                <a href="{{ route('blog.single', $item->id) }}"><h4 style="color: #FFF">{{ $item->name }}</h4></a>
                <!-- Figure Starts -->
                @if(!empty($item->image))
                <figure>
                    <a href="{{ route('blog.single', $item->id) }}">
                        <img class="img-responsive" src="{{ asset('public/uploads/' .$item->image) }}" alt="">
                    </a>
                </figure>
                @endif
                <!-- Figure Ends -->
                <br>
                {!! $item->content !!}
            </article>
            <br>
            <!-- Article Ends -->
        </div>
    </div>
</section>
<!-- Section Content Ends -->
@include('partials.call_to_action')
<!-- ===========================================  content =================================== -->
@endsection
