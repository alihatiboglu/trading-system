@extends('client::layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>{{ $item->name }}</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Section Title Ends -->
    @include('flash::message')
    <!-- Section Title Ends -->
    <form method="POST" class="p-t-15" role="form" action="{{ route('client.accounts.package.save', $item->id) }}">
        @csrf
        <div class="row">
            <div class="col-md-6 p-2">
                <div class="form-group ">
                    <input placeholder="{{ __('front.fname')}}" id="fname" type="text"
                    class="form-control @error('fname') is-invalid @enderror" name="fname"
                    value="{{ old('fname') ?? auth()->user()->name  }}" required>
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
                    name="email" value="{{ old('email') ?? auth()->user()->email  }}" required autocomplete="email">
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
        </div>
    </form>
    <!-- Form Ends -->

</section>
<!-- /.content -->
@endsection


