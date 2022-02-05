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
    <form method='post' enctype="multipart/form-data" action="{{ isset($item) ? route('education.update', $item->id) : route('education.store') }}">
        <input type="hidden" name="_method" value="{{ isset($item) ? 'PUT' : 'POST' }}">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <h3>
                        @isset($item)
                        {{ __('main.edit') }} {{ __('main.education') }}
                        <a href="{{ route('posts.create') }}" class="btn btn-outline-primary btn-xs">{{ __('main.add_new') }}</a>
                        @else
                        {{ __('main.add') }} {{ __('main.education') }}
                        @endisset
                    </h3>
                    @include('flash::message')
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" name="name" type="text" class="form-control" value="{{ $item->name ?? old('name') }}">
                        @if ($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="form-group {{ $errors->has('education_type') ? ' has-error' : '' }}">
                        <label class="control-label">{{ __('main.type') }}</label>
                        <?php $education_type = $item->education_type ?? old('education_type') ?? 1; ?>
                        <select id="education_type" name="education_type" class="form-control">
                            <option value="1" {{ $education_type == 1 ? 'selected' : '' }}>Technical Analysis</option>
                            <option value="2" {{ $education_type == 2 ? 'selected' : '' }}>Foundmental Analysis</option>
                        </select>
                        @if ($errors->has('education_type'))
                        <span class="help-block">{{ $errors->first('education_type') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
                        <label>{{ __('main.video_url1') }}</label>
                        <input id="url" rows="7" name="url" type="text" class="form-control"
                        value="{{ $item->url ?? old('url') }}">
                        @if ($errors->has('url'))
                        <span class="help-block">{{ $errors->first('url') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label>{{ __('main.short_description') }}</label>
                        <textarea class="form-control"
                        name="description">{!! $item->description ?? old('description') !!}</textarea>
                        @if ($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                        <textarea class="summernote" name="content">{!! $item->content ?? old('content') !!}</textarea>
                        @if ($errors->has('content'))
                        <span class="help-block">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mt-40 pl-3">
                    @include('dashboard::partials.submit')
                    @include('dashboard::partials.featured_image')
                </div>
            </div>
        </div>
    </form>
</section>
<!-- /.content -->
@endsection


