@extends('client::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.visa') }}</h1>
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
                <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{{ route('deposits.iyzipay') }}" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12 form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="control-label">{{ __('main.amount') }}</label>
                            <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>
                            @if ($errors->has('amount'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-12 form-group {{ $errors->has('holder_name') ? ' has-error' : '' }}">
                            <label for="holder_name" class="control-label">{{ __('main.holder_name') }}</label>
                            <input id="holder_name" type="text" class="form-control" name="holder_name" value="John Doe">
                            @if ($errors->has('holder_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('holder_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-12 form-group {{ $errors->has('card_number') ? ' has-error' : '' }}">
                            <label for="card_number" class="control-label">{{ __('main.card_number') }}</label>
                            <input id="card_number" type="text" class="form-control" name="card_number" value="5528790000000008">
                            @if ($errors->has('card_number'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('card_number') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group {{ $errors->has('expire_month') ? ' has-error' : '' }}">
                            <label for="expire_month" class="control-label">{{ __('main.expire_month') }}</label>
                            <input id="expire_month" type="text" class="form-control" name="expire_month" value="12">
                            @if ($errors->has('expire_month'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('expire_month') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group {{ $errors->has('expire_year') ? ' has-error' : '' }}">
                            <label for="expire_year" class="control-label">{{ __('main.expire_year') }}</label>
                            <input id="expire_year" type="text" class="form-control" name="expire_year" value="2030">
                            @if ($errors->has('expire_year'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('expire_year') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group {{ $errors->has('cvc') ? ' has-error' : '' }}">
                            <label for="cvc" class="control-label">{{ __('main.cvv') }}</label>
                            <input id="cvc" type="text" class="form-control" name="cvc" value="123">
                            @if ($errors->has('cvc'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('cvc') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-12 btn-group">
                            <button type="submit" class="btn b-w-m btn-info"><span class="icon-ok icon-white"></span>&nbsp;{{ __('main.deposit') }}</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="col-md-6">
            </div>
        </div>
        <br>
    </section>
    <!-- /.content -->
@endsection


