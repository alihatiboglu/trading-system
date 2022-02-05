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
                        <h2 class="title-head">{{ __('front.news') }}</span></h2>
                        <!-- Title Ends -->
                        <hr>
                        <!-- Breadcrumb Starts -->
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}"> {{ __('front.home') }}</a></li>
                            <li>{{ __('front.news') }}</li>
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
            @foreach($items as $item)
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
                <!-- Excerpt Starts -->
                <p class="excerpt">{!! \Str::limit($item->description, 200, ' ...') !!}</p>
                <!-- Excerpt Ends -->
                <a href="{{ route('blog.single', $item->id) }}" class="btn btn-primary btn-readmore">
                    {{ __('front.more') }}
                </a>
                <!-- Meta Starts -->
{{--                <div class="meta">--}}
{{--                    <span><i class="fa fa-user"></i> <a href="#">admin</a></span>--}}
{{--                    <span><i class="fa fa-calendar"></i> 9 November 2017</span>--}}
{{--                    <span><i class="fa fa-commenting"></i> <a href="blog-post.html">18 comments</a></span>--}}
{{--                    <span><i class="fa fa-tags"></i> market, cryptocurrency, trading</span>--}}
{{--                    <span><i class="fa fa-link"></i> <a href="blog-post.html">permalink</a></span>--}}
{{--                </div>--}}
                <!-- Meta Ends -->
            </article>
            <br>
            <!-- Article Ends -->
            @endforeach
            <nav class="col-xs-12 text-center" aria-label="Page navigation">
                {{ $items->links() }}
            </nav>
        </div>
    </div>
</section>
<!-- Section Content Ends -->
@include('partials.call_to_action')
<!-- ===========================================  content =================================== -->
@endsection
