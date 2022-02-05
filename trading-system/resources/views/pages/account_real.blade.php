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
                            <h2 class="title-head hidden-xs"><span>{{ __('front.new_real_account')}}</span></h2>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">@include('flash::message')</div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                        <!-- Section Title Ends -->
                        <form method="POST" class="p-t-15" role="form" action="{{ route('accounts.real.save') }}">
                            @csrf
                            <div class="col-md-6 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.fname')}}" id="fname" type="text"
                                           class="form-control @error('fname') is-invalid @enderror" name="fname"
                                           value="{{ old('fname') ?? auth()->user()->name }}" required>
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
                                <div class="form-group">
                                    <input placeholder="{{ __('front.email')}}" id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') ?? auth()->user()->email }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <select class="form-control" name="calling_code">
                                    <option value="">{{ __('front.country_key')}}</option>
                                    @foreach(\App\Models\Country::all() as $country)
                                        <option value="{{ $country->calling_code }}" {{ old('calling_code') == $country->calling_code ? 'selected' : '' }}>
                                            {!! $country->name !!}
                                            ({!! $country->calling_code !!})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.phone')}}" id="phone" type="text"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ old('phone') ?? auth()->user()->phone  }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <?php $platform = old('platform') ?>
                                <div class="form-group @error('platform') is-invalid @enderror">
                                    <select class="form-control" name="platform">
                                        <option value="">{{ __('front.platform')}}</option>
                                        @foreach(\App\Models\Post::where('type', 'program')->get() as $pr)
                                            <option value="{{ $pr->id }}" {{ $platform== $pr->id ? 'selected' : '' }}>
                                                {!! $pr->name !!}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('platform')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <?php $account_type = old('account_type') ?? request('t'); ?>
                                <div class="form-group @error('account_type') is-invalid @enderror">
                                    <select class="form-control" name="account_type">
                                        <option value="">{{ __('front.account_type')}}</option>
                                        @foreach(\App\Models\TypeAccount::all() as $acc_type)
                                            <option value="{{ $acc_type->id }}" {{ $account_type== $acc_type->id ? 'selected' : '' }}>
                                                {!! $acc_type->name !!}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('account_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="form-group @error('leverage') is-invalid @enderror">
                                    <select class="form-control" name="leverage">
                                        <option value="">{{ __('front.leverage')}}</option>
                                        <option value="1:1" {{ old('leverage') == 1 ? 'selected' : '' }}>1:1</option>
                                        <option value="1:10" {{ old('leverage') == 2 ? 'selected' : '' }}>1:10</option>
                                        <option value="1:30" {{ old('leverage') == 3 ? 'selected' : '' }}>1:30</option>
                                        <option value="1:50" {{ old('leverage') == 4 ? 'selected' : '' }}>1:50</option>
                                        <option value="1:100" {{ old('leverage') == 5 ? 'selected' : '' }}>1:100</option>
                                        <option value="1:500" {{ old('leverage') == 6 ? 'selected' : '' }}>1:500</option>
                                    </select>
                                    @error('leverage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="form-group ">
                                    <input placeholder="{{ __('front.your_challenge')}}" id="description" type="text"
                                           class="form-control @error('description') is-invalid @enderror" name="description"
                                           value="{{ old('description') }}" required>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
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
