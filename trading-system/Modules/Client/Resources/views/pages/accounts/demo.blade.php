@extends('client::layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>{{ __('front.new_demo_account') }}</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    @include('flash::message')
    <form method="POST" class="p-t-15" role="form" action="{{ route('client.accounts.demo.save') }}">
        @csrf
        <div class="row">
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
                    name="email" value="{{ old('email')?? auth()->user()->email }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 p-2">
                <?php $calling_code = old('calling_code') ?? auth()->user()->name; ?>
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
                    value="{{ old('phone') ?? auth()->user()->phone }}">
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
                <div class="form-group @error('currency_code') is-invalid @enderror">
                    <?php $currency_code = old('currency_code'); ?>
                    <select class="form-control" name="currency_code">
                        <option value="">{{ __('front.currency')}}</option>
                        <option value="usd" {{ $currency_code == 'usd' ? 'selected' : '' }}>USD</option>
                        <option value="eur" {{ $currency_code == 'eur' ? 'selected' : '' }}>EUR</option>
                    </select>
                    @error('currency_code')
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
            <div class="col-md-6 p-2">
                <div class="form-group @error('amount') is-invalid @enderror">
                    <select class="form-control" name="amount">
                        <option value="">{{ __('front.amount')}}</option>
                        <option value="1000" {{ old('amount') == 1000 ? 'selected' : '' }}>1000</option>
                        <option value="3000" {{ old('amount') == 3000 ? 'selected' : '' }}>3000</option>
                        <option value="5000" {{ old('amount') == 5000 ? 'selected' : '' }}>5000</option>
                        <option value="10000" {{ old('amount') == 10000 ? 'selected' : '' }}>10.000</option>
                        <option value="50000" {{ old('amount') == 50000 ? 'selected' : '' }}>50.000</option>
                        <option value="100000" {{ old('amount') == 100000 ? 'selected' : '' }}>100.000</option>
                        <option value="1000000" {{ old('amount') == 1000000 ? 'selected' : '' }}>1.000.000</option>
                    </select>
                    @error('amount')
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
        </div>
    </form>

</section>
<!-- /.content -->
@endsection


