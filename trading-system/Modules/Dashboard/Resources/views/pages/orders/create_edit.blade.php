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
              action="{{ isset($item) ? route('items.update', $item->id) : route('items.store') }}">
            <input type="hidden" name="_method" value="{{ isset($item) ? 'PUT' : 'POST' }}">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <h3>
                            @isset($item)
                                Edit product
                                <a href="{{ route('items.create') }}"
                                   class="btn btn-outline-primary btn-xs">{{ __('main.add_new') }}</a>
                            @else
                                Add product
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
                            <div class="form-group {{ $errors->has('icon') ? ' has-error' : '' }}">
                                <label class="control-label">{{ __('main.icon') }}</label>
                                <input id="icon" name="icon" type="text" class="form-control" value="{{ $item->icon ?? old('icon') }}">
                                @if ($errors->has('icon'))
                                    <span class="help-block">{{ $errors->first('icon') }}</span>
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

        @isset($item)
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('main.trading_table') }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>{{ __('main.symbol') }}</th>
                                <th>{{ __('main.margin') }}</th>
                                <th>{{ __('main.spread') }}</th>
                                <th>{{ __('main.stop_level') }}</th>
                                <th>{{ __('main.swap') }}</th>
                                <th>{{ __('main.leverage') }}</th>
                                <th>{{ __('main.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trading_table as $obj)
                                <tr>
                                    <td>{{ $obj->symbol }}</td>
                                    <td>{{ $obj->margin }}</td>
                                    <td>{{ $obj->spread }}</td>
                                    <td>{{ $obj->stop_level }}</td>
                                    <td>{{ $obj->swap }}</td>
                                    <td>{{ $obj->leverage }}</td>
                                    <td>
                                        <form class="d-inline" method="post"
                                              action="{{ route('tradingTable.destroy', $obj->id) }}"
                                              onSubmit="if(!confirm('تاكيد الحذف؟')){return false;}">
                                            <input type="hidden" name="_method" value="delete"/>
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs btn-flat">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ __('main.symbol') }}</th>
                                <th>{{ __('main.margin') }}</th>
                                <th>{{ __('main.spread') }}</th>
                                <th>{{ __('main.stop_level') }}</th>
                                <th>{{ __('main.swap') }}</th>
                                <th>{{ __('main.leverage') }}</th>
                                <th>{{ __('main.actions') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form method='post' enctype="multipart/form-data" action="{{ route('tradingTable.store') }}">
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        @csrf

                        <div class="form-group {{ $errors->has('symbol') ? ' has-error' : '' }}">
                            <label class="control-label">{{ __('main.symbol') }}</label>
                            <input id="symbol" name="symbol" type="text" class="form-control"
                                   value="{{ $item->symbol ?? old('symbol') }}">
                            @if ($errors->has('symbol'))
                                <span class="help-block">{{ $errors->first('symbol') }}</span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('margin') ? ' has-error' : '' }}">
                            <label class="control-label">{{ __('main.margin') }}</label>
                            <input id="margin" name="margin" type="text" class="form-control"
                                   value="{{ $item->margin ?? old('margin') }}">
                            @if ($errors->has('margin'))
                                <span class="help-block">{{ $errors->first('margin') }}</span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('spread') ? ' has-error' : '' }}">
                            <label class="control-label">{{ __('main.spread') }}</label>
                            <input id="spread" name="spread" type="number" class="form-control"
                                   value="{{ $item->spread ?? old('spread') }}">
                            @if ($errors->has('spread'))
                                <span class="help-block">{{ $errors->first('spread') }}</span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('stop_level') ? ' has-error' : '' }}">
                            <label class="control-label">{{ __('main.stop_level') }}</label>
                            <input id="stop_level" name="stop_level" type="number" class="form-control"
                                   value="{{ $item->stop_level ?? old('stop_level') }}">
                            @if ($errors->has('stop_level'))
                                <span class="help-block">{{ $errors->first('stop_level') }}</span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('swap') ? ' has-error' : '' }}">
                            <label class="control-label">{{ __('main.swap') }}</label>
                            <input id="swap" name="swap" type="text" class="form-control"
                                   value="{{ $item->swap ?? old('swap') }}">
                            @if ($errors->has('swap'))
                                <span class="help-block">{{ $errors->first('swap') }}</span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('leverage') ? ' has-error' : '' }}">
                            <label class="control-label">{{ __('main.leverage') }}</label>
                            <input id="leverage" name="leverage" type="text" class="form-control"
                                   value="{{ $item->leverage ?? old('leverage') }}">
                            @if ($errors->has('leverage'))
                                <span class="help-block">{{ $errors->first('leverage') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        @endisset
    </section>
    <!-- /.content -->
@endsection


