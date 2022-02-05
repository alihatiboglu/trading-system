@extends('client::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.change_password') }}</h1>
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
                <form method='post'  action="{{ route('client.profile.update_password') }}">
                    <input type="hidden" name="_method" value="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="control-label">{{ __('main.old_password') }}</label>
                        <input id="password" name="password" type="password" class="form-control" value="">
                        @if ($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('new_password') ? ' has-error' : '' }}">
                        <label class="control-label">{{ __('main.new_password') }}</label>
                        <input id="new_password" name="new_password" type="password" class="form-control" value="">
                        @if ($errors->has('new_password'))
                            <span class="help-block">{{ $errors->first('new_password') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                        <label class="control-label">{{ __('main.confirm_password') }}</label>
                        <input id="new_password_confirmation" name="new_password_confirmation" type="password" class="form-control" value="">
                        @if ($errors->has('new_password_confirmation'))
                            <span class="help-block">{{ $errors->first('new_password_confirmation') }}</span>
                        @endif
                    </div>
                    <div class="btn-group">
                        <button type="submit" class="btn b-w-m btn-info"><span class="icon-ok icon-white"></span>&nbsp;{{ __('main.save') }}</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection


