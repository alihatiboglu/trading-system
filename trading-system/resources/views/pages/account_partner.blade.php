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
                <div class="form-container form-overflow">
                    <div>
                        <!-- Section Title Starts -->
                        <div class="text-center">
                            <h2 class="title-head hidden-xs"><span>{{ __('front.partner_account')}}</span></h2>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">@include('flash::message')</div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                        <!-- Section Title Ends -->
                        <form method="POST" class="p-t-15" role="form" action="{{ route('accounts.partner.save') }}">
                            @csrf
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
                                    <input placeholder="{{ __('front.birthdate')}}" id="birthdate" type="text"
                                           class="form-control @error('birthdate') is-invalid @enderror" name="birthdate"
                                           value="{{ old('birthdate') }}" required>
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
                            <div class="col-md-6 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.residence_address')}}" id="address" type="text"
                                           class="form-control @error('address') is-invalid @enderror" name="address"
                                           value="{{ old('address') }}" required>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.postal_code')}}" id="postal_code" type="text"
                                           class="form-control @error('postal_code') is-invalid @enderror" name="postal_code"
                                           value="{{ old('postal_code') }}" required>
                                    @error('postal_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="form-group">
{{--                                    <label class="control-label">{{ __('front.E-Mail_Address')}}</label>--}}
                                    <input placeholder="{{ __('front.E-Mail_Address')}}" id="email" type="email"
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
                                        <option value="{{ $country->calling_code }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
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
                                    <input placeholder="{{ __('front.experience')}}" id="experience" type="text"
                                           class="form-control @error('experience') is-invalid @enderror" name="experience"
                                           value="{{ old('experience') }}">
                                    @error('experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.Password')}}" id="password" type="password"
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
                                    <input placeholder="{{ __('front.Confirm_Password')}}" id="password-confirm"
                                           type="password" class="form-control ml-3" name="password_confirmation"
                                           required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="@error('policy') is-invalid @enderror">
                                    <input type="checkbox" name="policy" id="policy" {{ old('policy') ? 'checked' : '' }}>
                                    <label for="policy">{{ __('front.policy')}}</label>
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
                <p class="text-center copyright-text"> {{ __('front.copyright')}}</p>
                <!-- Copyright Text Ends -->
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3"></div>
        </div>
    </div>
    <!-- Wrapper Ends -->
@endsection
