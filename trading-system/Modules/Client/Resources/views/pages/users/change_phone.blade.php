@extends('client::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.change_phone') }}</h1>
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
                <form method='post'  action="{{ route('client.profile.update_phone') }}">
                    <input type="hidden" name="_method" value="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label class="control-label">{{ __('main.plz_set_new_phone') }}</label>
                        <input id="phone" name="phone" type="text" class="form-control" value="{{ $item->phone ?? old('phone') }}">
                        @if ($errors->has('phone'))
                            <span class="help-block">{{ $errors->first('phone') }}</span>
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


