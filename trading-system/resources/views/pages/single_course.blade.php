@extends('layouts.master')

@section('content')
<!--********************* SITE CONTENT *********************-->
<!--********************************************************-->
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
    <div class="content">
        <!-- Article Starts -->
        <article>
            <div class="row">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="{{ $item->url }}" allowfullscreen></iframe>
                  </div>
              </div>
              <div class="col-md-6">
                <a href="{{ route('blog.single', $item->id) }}">
                    <img class="img-responsive" src="{{ asset('public/uploads/'.$item->image) }}" style="height: 310px !important;width: 100%">
                </a>
            </div>
        </div>
        <br>
        {!! $item->content !!}
    </article>
    <br>
    <!-- Article Ends -->
</div>
</section>
<!-- Section Content Ends -->
@include('partials.call_to_action')
<!-- ===========================================  content =================================== -->
@endsection
