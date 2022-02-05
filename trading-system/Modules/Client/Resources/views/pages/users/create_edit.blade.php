@extends('dashboard::layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row-fluid">

        <div class="span12">
            <div>
                <h3 class="page-title">سجل المستخدمين <small>{{ isset($item) ? 'تعديل' : 'اضافة' }} بيانات مستخدم</small></h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="dashboard.blade.html"><i class="icon-home"></i></a>
                        <span class="divider">&nbsp;</span>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}">سجل المستخدمين </a> <span class="divider">&nbsp;</span>
                    </li>
                    <li><a href="#">{{ isset($item) ? 'تعديل' : 'اضافة' }} بيانات مستخدم</a><span class="divider">&nbsp;</span></li>
                </ul>
            </div>
        </div>

        <div id="page">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>&nbsp; {{ isset($item) ? 'تعديل' : 'اضافة' }} بيانات مستخدم</h4>
                        </div>
                        <form method='post' enctype="multipart/form-data" action="{{ isset($item) ? route('users.update', $item->id) : route('users.store') }}">
                            <input type="hidden" name="_method" value="{{ isset($item) ? 'PUT' : 'POST' }}">
                            @csrf
                            <div class="widget-body form">
                                <div class="form-horizontal">
                                    <?php $role_id = isset($item) && isset($item_role) ? $item_role : old('role_id') ?>
                                    <div class="control-group">
                                        <label class="control-label">اختيار المجموعة<span class="required">*</span></label>
                                        <div class="controls {{ $errors->has('role_id') ? ' has-error' : '' }}">
                                            <select id="role_id" name="role_id" class="span6">
                                                <option value="">--اختر--</option>
                                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                                    <option value="{{ $role->id }}" {{ $role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role_id'))
                                                <span class="help-block">{{ $errors->first('role_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="name" class="control-label">اسم المستخدم<span class="required">*</span></label>
                                        <div class="controls {{ $errors->has('name') ? ' field_invalid' : '' }}">
                                            <input name="name" type="text" value="{{ $item->name ?? old('name') }}" class="span6">
                                            @if ($errors->has('name'))
                                                <span class="help-block">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="email" class="control-label">البريد الالكترونى<span class="required">*</span></label>
                                        <div class="controls {{ $errors->has('email') ? ' field_invalid' : '' }}">
                                            <input name="email" type="email" value="{{ $item->email ?? old('email') }}" class="span6">
                                            @if ($errors->has('email'))
                                                <span class="help-block">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="password" class="control-label">كلمة المرور<span class="required">*</span></label>
                                        <div class="controls {{ $errors->has('password') ? ' field_invalid' : '' }}">
                                            <input name="password" type="text" class="span6">
                                            @if ($errors->has('password'))
                                                <span class="help-block">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="btn-group">
                                        <button type="submit" class="btn b-w-m btn-primary"><span class="icon-ok icon-white"></span>&nbsp;حـفــظ</button>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="#"><span class="icon-ban-circle icon-white"></span>&nbsp;رجوع</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--PAGE CONTENT END============================================================================-->
@stop
