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
    <form method='post' enctype="multipart/form-data" action="{{ isset($item) ? route('programs.update', $item->id) : route('programs.store') }}">
        <input type="hidden" name="_method" value="{{ isset($item) ? 'PUT' : 'POST' }}">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <h3>
                        @isset($item)
                        {{ __('main.edit') }} {{ __('main.program') }}
                        <a href="{{ route('programs.create') }}" class="btn btn-outline-primary btn-xs">{{ __('main.add_new') }}</a>
                        @else
                        {{ __('main.add') }} {{ __('main.program') }}
                        @endisset
                    </h3>
                    @include('flash::message')
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" name="name" type="text" class="form-control" value="{{ $item->name ?? old('name') }}">
                        @if ($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
                        <label>Video url</label>
                        <input id="url" name="url" type="text" class="form-control" value="{{ $item->url ?? old('url') }}">
                        @if ($errors->has('url'))
                        <span class="help-block">{{ $errors->first('url') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('url2') ? ' has-error' : '' }}">
                        <label>Download url</label>
                        <input id="url2" name="url2" type="text" class="form-control" value="{{ $item->url2 ?? old('url2') }}">
                        @if ($errors->has('url2'))
                        <span class="help-block">{{ $errors->first('url2') }}</span>
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
                </div>
                <div>
                    <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                        <label>Content</label>
                        <textarea class="summernote" name="content">{!! $item->content ?? old('content') !!}</textarea>
                        @if ($errors->has('content'))
                        <span class="help-block">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('content2') ? ' has-error' : '' }}">
                        <label>Content part2</label>
                        <textarea rows="5" class="summernote" name="content2">{!! $item->content2 ?? old('content2') !!}</textarea>
                        @if ($errors->has('content2'))
                        <span class="help-block">{{ $errors->first('content2') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mt-40 pl-3">
                    @include('dashboard::partials.submit')
                    @include('dashboard::partials.featured_image', ['show_icon' => true])
                </div>
            </div>
        </div>
    </form>
</section>
<!-- /.content -->
@endsection


