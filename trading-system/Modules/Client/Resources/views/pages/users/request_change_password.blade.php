@extends('client::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.request_change') }}</h1>
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
                <form method='post'  action="{{ route('client.change.password.send') }}">
                    <input type="hidden" name="_method" value="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('account_number') ? ' has-error' : '' }}">
                        <label class="control-label">{{ __('main.account_number') }}</label>
                        <select id="account_number" name="account_number" class="form-control" required>
                            @foreach($items as $item)
                            <option value="{{ $item->id }}">{{ $item->number ?? $item->id }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('account_number'))
                            <span class="help-block">{{ $errors->first('account_number') }}</span>
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


