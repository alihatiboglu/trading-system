@extends('layouts.master')

@section('content')
<!-- ================================= Content Start ============================================================= -->
{{--<span class="display-zero">en</span>--}}
<!-- Banner Area Starts -->
<section class="banner-area"
    @if($item->id == 14)
     style="background-image: url('{{ asset('public/assets/site/images/win2.jpg') }}'"
    @elseif($item->id == 15)
     style="background-image: url('{{ asset('public/assets/site/images/ipod.jpg') }}'"
    @elseif($item->id == 16)
     style="background-image: url('{{ asset('public/assets/site/images/and1.jpg') }}'"
    @endif
    >
  <div class="banner-overlay">
    <div class="banner-text text-center">
      <div class="container">
        <!-- Section Title Starts -->
        <div class="row text-center">
          <div class="col-xs-12">
            <!-- Title Starts -->
            <h2 class="title-head">{{ __('front.platforms') }} <span>{{ $item->name }}</span></h2>
            <!-- Title Ends -->
            <hr>
            <!-- Breadcrumb Starts -->
            <ul class="breadcrumb">
              <li><a href="{{ route('home') }}"> {{ __('front.home') }}</a></li>
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
<!-- Banner Area Ends -->
<br>
<br>
<br><br><br><br>
<!-- About Section Starts -->
<section class="about-us">
    <div class="container">
        <!-- Section Title Starts -->
        <div class="row text-center">
            <h2 class="title-head"><span> {!! $item->name !!}</span></h2>
            <div class="title-head-subtitle">
                <p>{{ __('front.platforms_desc') }}</p>
            </div>
        </div>
        <!-- Section Title Ends -->
        <!-- Section Content Starts -->
        <div class="row about-content">
            <!-- Content Starts -->
            <div class="col-sm-12 col-md-7 col-lg-6">
                {!! $item->content2 !!}
                <a class="btn btn-primary display Open-account-btn"  href="{!! $item->url2 !!}"><i class="fas fa-download"></i> {{ __('front.download') }}</a>
            </p>

        </div>
        <!-- Content Ends -->
        <!-- Image Starts -->
        <div class="col-sm-12 col-md-5 col-lg-6 text-center">
            <div class="row">
                @if(!empty($item->image))
                <img class="img-responsive img-android-ali" src="{{ asset('public/uploads/' .$item->image) }}" alt="">
                @endif
            </div>
        </div>
        <!-- Image Ends -->

    </div>
    <!-- Section Content Ends -->
</div>
</section>
<!-- About Section Ends -->
<!-- Section Services Starts -->
<section class="services">
  <div class="container">
    <div class="row">
        @foreach(\App\Models\Post::where('type', 'feature')->where('parent_id', $item->id)->get() as $feature)
        <div class="col-md-12 service-box">
            <div>
                @if(!empty($feature->image))
                <img src="{{ asset('public/uploads/'.$feature->image) }}" class="color-doenload-ali" alt="">
                @endif
                <div class="service-box-content">
                    <h3>{{ $feature->name }}</h3>
                    {!! $feature->content!!}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</section>

<!-- Section Content Ends -->
<!-- Blog Section Starts -->
<section class="blog">
    <div class="container">
        <!-- Section Title Starts -->
        <div class="row text-center">
            <h2 class="title-head">{!! __('front.we_earn_platforms') !!}</h2>
            <div class="title-head-subtitle">
                <p>{!! __('front.we_earn_platforms_desc') !!}</p>
            </div>
        </div>
        <!-- Section Title Ends -->
        <div class="row latest-posts-content">
            <!-- Article Starts -->
            @foreach(\App\Models\Post::where('type', 'program')->get() as $program)
            <div class="col-sm-4 col-md-4 col-xs-12">
                <div class="latest-post">
                    <!-- Featured Image Starts -->
                    <a href="{{ route('program', $program->id) }}">
                        @if(!empty($program->icon)) 
                        <img class="img-responsive img-ali1" src="{{ asset('public/uploads/'.$program->icon) }}" alt="img" style="width: 50%;height: 50%;">
                        @endif
                    </a>
                    <!-- Featured Image Ends -->
                    <!-- Article Content Starts -->
                    <div class="post-body">
                        <h4 class="post-title">
                        </h4><h3><a href="{{ route('program', $program->id) }}">{{ $program->name }}</a></h3>

                        <div class="post-text">
                            <p>{{ \Illuminate\Support\Str::limit($program->description, 120, '..') }}</p>
                        </div>
                    </div>

                    <a href="{{ $program->url2 }}" class="btn btn-primary btn-ali-siz">{{ __('front.download') }}</a>
                    <!-- Article Content Ends -->
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Section Ends -->
@include('partials.call_to_action')
@endsection
