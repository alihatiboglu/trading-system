@extends('client::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.binance') }}</h1>
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
                <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{{ route('deposits.binance.pay') }}" >
                    {{ csrf_field() }}

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
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label">{{ __('main.wallet_address') }}</label>
                        <div class="form-group">
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="1C5gqLRs96Xq4V2ZZAR1347yUCpHie7sa">
                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="submit" class="btn b-w-m btn-info"><span class="icon-ok icon-white"></span>&nbsp;{{ __('main.deposit') }}</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection


