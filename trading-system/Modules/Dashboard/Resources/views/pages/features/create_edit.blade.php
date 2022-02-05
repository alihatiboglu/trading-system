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
        <form method='post' enctype="multipart/form-data"
              action="{{ isset($item) ? route('features.update', $item->id) : route('features.store') }}">
            <input type="hidden" name="_method" value="{{ isset($item) ? 'PUT' : 'POST' }}">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <h3>
                            @isset($item)
                                {{ __('main.edit') }}
                                <a href="{{ route('features.create') }}"
                                   class="btn btn-outline-primary btn-xs">{{ __('main.add_new') }}</a>
                            @else
                                {{ __('main.add') }}
                            @endisset
                        </h3>
                        @include('flash::message')
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <input id="name" name="name" type="text" class="form-control"
                                   value="{{ $item->name ?? old('name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('parent_id') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.program') }}</label>
                                <?php $parent_id = $item->parent_id ?? old('parent_id'); ?>
                                <select id="parent_id" name="parent_id" type="text" class="form-control" value="">
                                    <option value="">Select</option>
                                    @foreach(\App\Models\Post::where('type', 'program')->get() as $program)
                                    <option value="{{ $program->id }}" {{ $parent_id == $program->id ? 'selected' : '' }}>{{ $program->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('parent_id'))
                                    <span class="help-block">{{ $errors->first('parent_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                                <textarea class="summernote"
                                          name="content">{!! $item->content ?? old('content') !!}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">{{ $errors->first('content') }}</span>
                                @endif
                            </div>
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


