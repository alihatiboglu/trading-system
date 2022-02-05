@extends('layouts.master')
@push('styles')
    <style>
        header,footer{ display: none }
    </style>
@endpush
@section('content')
<!-- Wrapper Starts -->
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
  <div class="form-container">
    <div>
      <!-- Section Title Starts -->
      <div class="row text-center">
       <h2 class="title-head hidden-xs">{{ __('front.login')}}</h2>
       <p class="info-form">{{ __('front.send_receive')}}</p>
     </div>
     <!-- Section Title Ends -->
     <!-- Form Starts -->
     <form class="p-t-15" role="form" method="POST" action="{{ route('login') }}">
      @csrf
      <!-- Input Field Starts -->
      <div class="form-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
        value="{{ old('email') }}" placeholder="{{ __('front.email')}}"  required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <!-- Input Field Ends -->
      <!-- Input Field Starts -->
      <div class="form-group">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
        required autocomplete="current-password" placeholder="{{ __('front.password')}}">
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <!-- Input Field Ends -->
      <div>
        <div class="col-md-6">
          <div class="">
            <input type="checkbox" name="remember" id="checkbox1" {{ old('remember') ? 'checked' : '' }}>
            <label for="checkbox1">{{ __('front.remember_me')}}</label>
          </div>
        </div>
        <div class="pull-right">
          @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-info small ">{{ __('front.forgot_password')}}</a>
          @endif
        </div>
      </div>
      <!-- Submit Form Button Starts -->
      <div class="form-group">
        <button class="btn btn-primary" type="submit">{{ __('front.login')}}</button>
        <p class="text-center">{{ __('front.dont_have_account')}}<a href="{{ route('register') }}"> {{ __('front.register')}}</a>
        </div>
        <!-- Submit Form Button Ends -->
      </form>
      <!-- Form Ends -->
    </div>
  </div>
  <!-- Copyright Text Starts -->
  <p class="text-center copyright-text"> {{ __('front.copyright')}}</p>
  <!-- Copyright Text Ends -->
</div>
</div>
</div>
@endsection
