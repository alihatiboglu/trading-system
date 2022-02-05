@extends('layouts.master')
@push('styles')
    <style>
        header,footer{ display: none }
    </style>
@endpush
@section('content')
    <div class="wrapper">
        <div class="container-fluid user-auth">
            <div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
                <!-- Logo Starts -->
                <a class="logo" href="{{ route('home') }}">
                    <img class="img-responsive" src="{{ asset('public/assets/site') }}/images/logo.png" alt="logo-2">
                </a>
                <!-- Logo Ends -->
                <!-- Slider Starts -->
                @include('partials.testimonials')
                <!-- Slider Ends -->
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <!-- Logo Starts -->
                <a class="visible-xs" href="{{ route('home') }}">
                    <img class="img-responsive mobile-logo" src="{{ asset('public/assets/site') }}/images/logo.png" alt="logo-2">
                </a>
                <!-- Logo Ends -->
                <div class="form-container form-overflow1">
                    <div>
                        <!-- Section Title Starts -->
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <h2 class="title-head hidden-xs" style="font-size: 29px"><span>{{ __('front.seminars')}}</span></h2>
                                @include('flash::message')
                            </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                        <!-- Section Title Ends -->
                        <form method="POST" class="p-t-15" role="form" action="{{ route('courses.order') }}">
                            @csrf
                            <input type="hidden" name="referral_code" value="{{ request('ref') }}">
                            <div class="col-md-6 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.name')}}" id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.nickname')}}" id="nickname" type="text"
                                           class="form-control @error('nickname') is-invalid @enderror" name="nickname"
                                           value="{{ old('nickname') }}" required>
                                    @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.email')}}" id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <select class="form-control @error('calling_code') is-invalid @enderror" name="calling_code">
                                    <option value="">{{ __('front.country_key')}}</option>
                                    @foreach(\App\Models\Country::all() as $country)
                                        <option value="{{ $country->calling_code }}" {{ old('calling_code') == $country->calling_code ? 'selected' : '' }}>
                                            {!! $country->name !!}
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
                            <div class="col-md-6 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.phone')}}" id="phone" type="text"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ old('phone') }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 p-2">
                                <select class="form-control @error('course_id') is-invalid @enderror" name="course_id">
                                    <option value="">{{ __('front.course')}}</option>
                                    @foreach(\App\Models\Course::all() as $course)
                                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                            {!! $course->name !!}
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-block" type="submit">{{ __('front.create')}}</button>
                                </div>
                            </div>
                        </form>
                        <!-- Form Ends -->
                    </div>
                </div>
                <!-- Copyright Text Starts -->
                <p class="text-center copyright-text"> {{ __('front.copyright')}}</p>
                <!-- Copyright Text Ends -->
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3"></div>
        </div>
    </div>
    <!-- Wrapper Ends -->
@endsection
