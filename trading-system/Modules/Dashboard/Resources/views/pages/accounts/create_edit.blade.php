@extends('dashboard::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form method='post' enctype="multipart/form-data" action="{{ isset($item) ? route('accounts.update', $item->id) : route('accounts.store') }}">
            <input type="hidden" name="_method" value="{{ isset($item) ? 'PUT' : 'POST' }}">
            @csrf
            <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <h3>
                        @isset($item)
                            {{ __('main.edit') }} {{ __('main.account') }}
                            <a href="{{ route('accounts.create') }}" class="btn btn-outline-primary btn-xs">{{ __('main.add_new') }}</a>
                        @else
                            {{ __('main.add') }} {{ __('main.account') }}
                        @endisset
                    </h3>
                    @include('flash::message')
                    <div class="card">
                        <div class="card-body">
                            <?php $user_id = $item->user_id ?? old('user_id'); ?>
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.username') }}</label>
                                <select id="user_id" name="user_id" class="form-control">
                                    @foreach(\App\Models\User::all() as $user)
                                        <option value="{{ $user->id }}" {{ $user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_id'))
                                    <span class="help-block">{{ $errors->first('user_id') }}</span>
                                @endif
                            </div>
                                <?php $type = $item->type ?? old('type'); ?>
                                <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label class="control-label">{{ __('main.account') }}</label>
                                    <select id="type" name="type" class="form-control">
                                        <option value="">{{ __('main.select') }}</option>
                                        <option value="real" {{ $type == 'real' ? 'selected' : '' }}>{{ __('main.real_account') }}</option>
                                        <option value="demo" {{ $type == 'demo' ? 'selected' : '' }}>{{ __('main.demo_account') }}</option>
                                        <option value="package" {{ $type == 'package' ? 'selected' : '' }}>{{ __('main.wallet_account') }}</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="help-block">{{ $errors->first('type') }}</span>
                                    @endif
                                </div>
                                <?php $package_id = $item->package_id ?? old('package_id'); ?>
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="control-label">{{ __('main.account_type') }}</label>
                                    <select id="package_id" name="package_id" class="form-control">
                                        <option value="">{{ __('main.select') }}</option>
                                        @foreach(\App\Models\Package::all() as $package)
                                            <option value="{{ $package->id }}" {{ $package_id == $package->id ? 'selected' : '' }}>{{ $package->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('package_id'))
                                        <span class="help-block">{{ $errors->first('package_id') }}</span>
                                    @endif
                                </div>
                            <div class="form-group {{ $errors->has('number') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.account_number') }}</label>
                                <input id="number" name="number" type="number" class="form-control" value="{{ $item->number ?? old('number') }}">
                                @if ($errors->has('number'))
                                    <span class="help-block">{{ $errors->first('number') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.amount') }}</label>
                                <input id="amount" name="amount" type="number" class="form-control" value="{{ $item->amount ?? old('amount') }}">
                                @if ($errors->has('amount'))
                                    <span class="help-block">{{ $errors->first('amount') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('leverage') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.leverage') }}</label>
                                <input id="leverage" name="leverage" type="text" class="form-control" value="{{ $item->leverage ?? old('leverage') }}">
                                @if ($errors->has('leverage'))
                                    <span class="help-block">{{ $errors->first('leverage') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mt-40 pl-3">
                    @include('dashboard::partials.submit')
                </div>
            </div>
        </div>
        </form>
    </section>
    <!-- /.content -->
@endsection


