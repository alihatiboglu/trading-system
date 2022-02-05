@extends('layouts.master')

@section('content')
    <!--********************* SITE CONTENT *********************-->
    <!--********************************************************-->
{{--    <span class="display-zero">en</span>--}}
    <!-- ===========================================  content =================================== -->
    <!-- Banner Area Starts -->
    <section class="banner-area" style="background-image: url('{{ asset('public/assets/site/images/backgrounds/contact-us.jpg') }}');">
        <div class="banner-overlay">
            <div class="banner-text text-center">
                <div class="container">
                    <!-- Section Title Starts -->
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <!-- Title Starts -->
                            <h2 class="title-head">{!! __('front.get_touch') !!}</span></h2>
                            <!-- Title Ends -->
                            <hr>
                            <!-- Breadcrumb Starts -->
                            <ul class="breadcrumb">
                                <li><a href="{{ route('home') }}"> {{ __('front.home') }}</a></li>
                                <li>{{ __('front.contact_us') }}</li>
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
    <!-- Contact Section Starts -->
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 contact-form">
                    {!! $page->content ?? '' !!}
                    <!--   ================  Messagge ==============================================  -->
                    @if(session('messagge'))
                        <div class="alert alert-primary" role="alert">
                            <p>{{ __('front.Congratulations')}}</p>
                        </div>
                    @endif
                <!--   ===============================  Messagge  ==============================  -->
                    @if ($errors->any())
                        <div class="alert alert-primary" role="alert">
                            <p>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </p>
                        </div>
                @endif
                <!-- ===============================  Messagge  ==================================== -->
                    <!-- Contact Form Starts -->
                    <form method="post" action="{{ route('send') }}">
                    {{ csrf_field() }}
                    <!-- Input Field Starts -->
                        <div class="form-group col-md-12 p-2">
                            <input class="form-control @error('name') is-invalid @enderror"
                                   type="text" placeholder="{{ __('front.your_name')}}" name="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Input Field Starts -->
                        <div class="form-group col-md-6 p-2 @error('email') is-invalid @enderror">
                            <input class="form-control" name="email" placeholder="{{ __('front.email')}}"
                                   type="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Input Field Starts -->
                        <div class="form-group col-md-6 p-2 @error('subject') is-invalid @enderror">
                            <input class="form-control" name="subject" id="subject"
                                   placeholder="{{ __('front.subject')}}" type="text" value="{{ old('subject') }}">
                            @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Input Field Starts -->
                        <div class="form-group col-md-4 p-2 @error('calling_code') is-invalid @enderror">
                            <select class="form-control" name="calling_code">
                                <option value="">{{ __('front.country_key')}}</option>
                                @foreach(\App\Models\Country::all() as $country)
                                    <option value="{!! $country->id !!}" name="phonecode">{!! $country->name !!}
                                        ({!! $country->calling_code !!})
                                    </option>
                                @endforeach
                            </select>
                            @error('calling_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8 p-2 @error('phone') is-invalid @enderror">
                            <input class="form-control" name="phone" id="phone"
                                   placeholder="{{ __('front.phone')}}" type="text" required value="{{ old('phone') }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Input Field Starts -->
                        <div class="form-group col-xs-12 p-2 @error('message') is-invalid @enderror">
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                      rows="6" placeholder="{{ __('front.message')}}">{{ old('message') }}</textarea>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Submit Form Button Starts -->
                        <div class="form-group col-xs-12 col-sm-4 p-2">
                            <button class="btn btn-primary" type="submit">{{ __('front.send')}}</button>
                        </div>
                        <!-- Submit Form Button Ends -->
                    </form>
                    <!-- Contact Form Ends -->
                </div>
                <!-- Contact Widget Starts -->
                <div class="col-xs-12 col-md-4">
                    <div class="widget">
                        <div class="contact-page-info">
                            <!-- Contact Info Box Starts -->
                            <div class="contact-info-box">
                                <i class="fa fa-home big-icon green"></i>
                                <div class="contact-info-box-content">
                                    <h4>{{ __('front.address')}}</h4>
                                    <p>{{ __('front.site_address') }}</p>
                                </div>
                            </div>
                            <!-- Contact Info Box Ends -->
                            <!-- Contact Info Box Starts -->
                            <div class="contact-info-box">
                                <i class="fa fa-phone big-icon"></i>
                                <div class="contact-info-box-content">
                                    <h4>{{ __('front.phone_numbers')}}</h4>
                                    <p></p>{{ __('front.site_phone') }}</p>
                                </div>
                            </div>
                            <!-- Contact Info Box Ends -->
                            <!-- Contact Info Box Starts -->
                            <div class="contact-info-box">
                                <i class="fa fa-envelope big-icon"></i>
                                <div class="contact-info-box-content">
                                    <h4>{{ __('front.emails')}}</h4>
                                    <p>
                                        &#x2709; {{ __('front.info')}} <br>{{ __('front.site_email')}}<br>
                                        &#x2709; {{ __('front.email_support')}}<br>{{ __('front.site_email_support')}}<br>
                                        &#x2709; {{ __('front.email_managment')}} <br> {{ __('front.site_email_managment')}}</p>
                                </div>
                            </div>
                            <!-- Contact Info Box Ends -->
                            <!-- Social Media Icons Starts -->
                            <div class="contact-info-box">
                                <i class="fa fa-share-alt big-icon"></i>
                                <div class="contact-info-box-content">
                                    <h4>{{ __('front.social_profiles')}}</h4>
                                    <div class="social-contact">
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
                                </div>
                            </div>
                            <!-- Social Media Icons Starts -->
                        </div>
                    </div>
                </div>
                <!-- Contact Widget Ends -->
            </div>
        </div>
    </section>
    <!-- Contact Section Ends -->
    @include('partials.call_to_action')
    <!-- ===========================================  content =================================== -->
@endsection
