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
    <form method='post' enctype="multipart/form-data" action="{{ isset($item) ? route('users.update', $item->id) : route('users.store') }}">
        <input type="hidden" name="_method" value="{{ isset($item) ? 'PUT' : 'POST' }}">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <h3>
                        @isset($item)
                        {{ __('main.edit') }} {{ __('main.user') }}
                        <a href="{{ route('users.create') }}" class="btn btn-outline-primary btn-xs">{{ __('main.add_new') }}</a>
                        @else
                        {{ __('main.add') }} {{ __('main.user') }}
                        @endisset
                    </h3>
                    @include('flash::message')
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" name="name" type="text" class="form-control" value="{{ $item->name ?? old('name') }}">
                        @if ($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="control-label">{{ __('main.email') }}</label>
                        <input id="email" name="email" type="text" class="form-control" value="{{ $item->email ?? old('email') }}">
                        @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

          <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="control-label">{{ __('front.password') }}</label>
            <div class="" style="position: relative;">
              <input id="password-field" type="password" class="form-control" name="password">
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="position:absolute; right: 6px;top: 11px;"></span>
            </div>
                        @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
        </div>


          <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label class="control-label">{{ __('front.confirm_password') }}</label>
            <div class="" style="position: relative;">
              <input id="password-field2" type="password" class="form-control" name="password_confirmation">
              <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password2" style="position:absolute; right: 6px;top: 11px;"></span>
            </div>
                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                        @endif
        </div>


                    <?php $role_id = isset($item) && isset($item_role) ? $item_role : old('role_id') ?>
                    <div class="control-group">
                        <label class="control-label">{{ __('main.role') }}</label>
                        <div class="controls {{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <select id="role_id" name="role_id" class="form-control">
                                <option value="">{{ __('main.select') }}</option>
                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                <option value="{{ $role->id }}" {{ $role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('role_id'))
                            <span class="help-block">{{ $errors->first('role_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div>
                    <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                        <label class="control-label">{{ __('main.description') }}</label>
                        <textarea rows="5" class="summernote11 form-control" name="content">{!! $item->content ?? old('content') !!}</textarea>
                        @if ($errors->has('content'))
                        <span class="help-block">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mt-40 pl-3">
                    <div class="card card-outline card-warning">
                        <!-- /.card-body -->
                        <div class="card-footer">
                            @if((isset($item) && $item->type == 'partner' ) || !isset($item))
                            <div class="form-group {{ $errors->has('lots_num') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.lots_num') }}</label>
                                <input id="lots_num" name="lots_num" type="number" class="form-control" value="{{ $item->lots_num ?? old('lots_num') }}">
                                @if ($errors->has('lots_num'))
                                <span class="help-block">{{ $errors->first('lots_num') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.amount') }}</label>
                                <input id="amount" name="amount" type="number" class="form-control" value="{{ $item->amount ?? old('amount') }}">
                                @if ($errors->has('amount'))
                                <span class="help-block">{{ $errors->first('amount') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('account_number') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.account_number') }}</label>
                                <input id="account_number" name="account_number" type="number" class="form-control" value="{{ $item->account_number ?? old('account_number') }}">
                                @if ($errors->has('account_number'))
                                <span class="help-block">{{ $errors->first('account_number') }}</span>
                                @endif
                            </div>
                            @endif
                            @if((isset($item) && $item->type != 'partner' ) || !isset($item))
                            <div class="form-group {{ $errors->has('wallet') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.wallet_balance') }}</label>
                                <input id="wallet" name="wallet" type="wallet" class="form-control" value="{{ $item->wallet ?? old('wallet') }}">
                                @if ($errors->has('wallet'))
                                    <span class="help-block">{{ $errors->first('wallet') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('comission') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.pending_commission') }}</label>
                                <input id="comission" name="comission" type="number" class="form-control" value="{{ $item->comission ?? old('comission') }}">
                                @if ($errors->has('comission'))
                                    <span class="help-block">{{ $errors->first('comission') }}</span>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                    @include('dashboard::partials.submit')
                    @include('dashboard::partials.featured_image')

                </div>
            </div>
        </div>
    </form>
</section>
<!-- /.content -->
@endsection


@push('scripts')
<script>
    $(function(){
        $(".toggle-password").click(function() {

          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $($(this).attr("toggle"));
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
        });

        $(".toggle-password2").click(function() {

          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $($(this).attr("toggle"));
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
        });
    })
</script>
@endpush