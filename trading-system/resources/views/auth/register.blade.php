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
                @include('partials.testimonials')
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
                            <h2 class="title-head hidden-xs"><span>{{ request('p') ? __('front.partner_account') : __('front.register') }}</span></h2>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">@include('flash::message')</div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                        <!-- Section Title Ends -->
                        <form method="POST" class="p-t-15" role="form" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="referral_code" value="{{ request('ref') }}">
                            <input type="hidden" name="type" value="{{ request('p') && request('p') == 1 ? 'partner' : '' }}">
                            <div class="col-md-6 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.fname')}}" id="fname" type="text"
                                           class="form-control @error('fname') is-invalid @enderror" name="fname"
                                           value="{{ old('fname') }}" required>
                                    @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.lname')}}" id="lname" type="text"
                                           class="form-control @error('lname') is-invalid @enderror" name="lname"
                                           value="{{ old('lname') }}" required>
                                    @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.birthdate')}}" id="birthdate" type="date"
                                           class="form-control @error('birthdate') is-invalid @enderror" name="birthdate"
                                           value="{{ old('birthdate') }}" required autocomplete="off">
                                    @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.residence_country')}}" id="country" type="text"
                                           class="form-control @error('country') is-invalid @enderror" name="country"
                                           value="{{ old('country') }}" required>
                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.city')}}" id="city" type="text"
                                           class="form-control @error('city') is-invalid @enderror" name="city"
                                           value="{{ old('city') }}" required>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="form-group">
                                    <input placeholder="{{ __('front.email')}}" id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email">
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
                            <div class="form-group ">
                                <select class="form-control @error('experience') is-invalid @enderror" name="experience" id="experience">
                                    <option value="{{ __('front.experience_0')}}">{{ __('front.experience_0')}}</option>
                                    <option value="{{ __('front.experience_1')}}">{{ __('front.experience_1')}}</option>
                                    <option value="{{ __('front.experience_2')}}">{{ __('front.experience_2')}}</option>
                                    <option value="{{ __('front.experience_3')}}">{{ __('front.experience_3')}}</option>
                                    <option value="{{ __('front.experience_4')}}">{{ __('front.experience_4')}}</option>
                                </select>
                                @error('experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.password')}}" id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="form-group">
                                    <input placeholder="{{ __('front.confirm_password')}}" id="password-confirm"
                                           type="password" class="form-control ml-3" name="password_confirmation"
                                           required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="@error('policy') is-invalid @enderror">
                                    <input type="checkbox" name="policy" id="policy" {{ old('policy') ? 'checked' : '' }}>
                                    <label for="policy"><small>{{ __('front.policy')}}</small></label>
                                    <a class="slider btn btn-primary other" href="{{ route('home') }}" style="font-size: 10px !important;padding: 5px !important;">{{ __('front.home')}} </a>
                                    <a class="slider btn btn-primary other" href="{{ route('contact') }}" style="font-size: 10px !important;padding: 5px !important;">{{ __('front.contact_us')}} </a>
                                </div>
                                @error('policy')
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
                <p class="text-center copyright-text"> {{ __('front.copyright')}} </p>
                <!-- Copyright Text Ends -->
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3"></div>
        </div>
    </div>
    <!-- Wrapper Ends -->
@endsection
