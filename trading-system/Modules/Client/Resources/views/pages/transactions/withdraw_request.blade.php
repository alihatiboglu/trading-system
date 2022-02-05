@extends('client::layouts.master')
@php
$type = request('t') ?? 'visa';
@endphp
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('main.withdraw') }}</h1>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            @include('flash::message')
            <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! route('client.withdraw.send') !!}" >
                {{ csrf_field() }}
                <input type="hidden" name="type" value="{{ $type }}">

                <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                    <label for="amount" class="col-md-4 control-label">{{ __('main.amount') }}</label>
                    <div class="form-group">
                        <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>
                        @if ($errors->has('amount'))
                        <span class="help-block">
                            <strong>{{ $errors->first('amount') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                @if($type == 'paypal')
                <div class="form-group{{ $errors->has('card_number') ? ' has-error' : '' }}">
                    <label for="card_number" class="col-md-4 control-label">{{ __('main.paypal_email') }}</label>
                    <div class="form-group">
                        <input id="card_number" type="text" class="form-control" name="card_number" value="{{ old('card_number') }}" autofocus>
                        @if ($errors->has('card_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('card_number') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                @elseif($type == 'visa')
                <div class="form-group {{ $errors->has('card_number') ? ' has-error' : '' }}">
                    <label for="card_number" class="control-label">{{ __('main.card_number') }}</label>
                    <input id="card_number" type="text" class="form-control" name="card_number" value="5528790000000008">
                    @if ($errors->has('card_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('card_number') }}</strong>
                    </span>
                    @endif
                </div>
                @elseif($type == 'binance')
                <div class="form-group{{ $errors->has('card_number') ? ' has-error' : '' }}">
                    <label for="card_number" class="col-md-4 control-label">{{ __('main.wallet_address') }}</label>
                    <div class="form-group">
                        <input id="card_number" type="text" class="form-control" name="address" value="{{ old('card_number') }}" placeholder="1C5gqLRs96Xq4V2ZZAR1347yUCpHie7sa">
                        @if ($errors->has('card_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('card_number') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                @endif
                <div class="btn-group">
                    <button type="submit" class="btn b-w-m btn-info"><span class="icon-ok icon-white"></span>&nbsp;{{ __('main.send') }}</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
        </div>
    </div>

</section>
<!-- /.content -->
@endsection


