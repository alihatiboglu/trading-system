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
        <form method='post' enctype="multipart/form-data" action="{{ isset($item) ? route('countries.update', $item->id) : route('countries.store') }}">
            <input type="hidden" name="_method" value="{{ isset($item) ? 'PUT' : 'POST' }}">
            @csrf
            <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <h3>
                        @isset($item)
                            {{ __('main.edit') }} {{ __('main.country') }}
                            <a href="{{ route('countries.create') }}" class="btn btn-outline-primary btn-xs">{{ __('main.add_new') }}</a>
                        @else
                            {{ __('main.add') }} {{ __('main.country') }}
                        @endisset
                    </h3>
                    @include('flash::message')
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.name') }}</label>
                                <input id="name" name="name" type="text" class="form-control" value="{{ $item->name ?? old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.country_code') }}</label>
                                <input id="code" name="code" type="text" class="form-control" value="{{ $item->code ?? old('code') }}">
                                @if ($errors->has('code'))
                                    <span class="help-block">{{ $errors->first('code') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('calling_code') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.calling_code') }}</label>
                                <input id="calling_code" name="calling_code" type="text" class="form-control" value="{{ $item->calling_code ?? old('calling_code') }}">
                                @if ($errors->has('calling_code'))
                                    <span class="help-block">{{ $errors->first('calling_code') }}</span>
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


