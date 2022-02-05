@extends('client::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.identity_document') }} (ID)</h1>
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
                <form method='post' enctype="multipart/form-data" action="{{ route('client.documents.update_id') }}">
                    <input type="hidden" name="_method" value="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('main.select_files') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('file_front') ? ' has-error' : '' }}">
                                <label class="control-label w-100">{{ __('main.id_front') }}</label>
                                <input id="file_front" name="file_front" type="file">
                                <div>
                                @if ($errors->has('file_front'))
                                    <span class="help-block">{{ $errors->first('file_front') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('file_back') ? ' has-error' : '' }}">
                                <label class="control-label w-100">{{ __('main.id_back') }}</label><br>
                                <input id="file_back" name="file_back" type="file">
                                <div>
                                @if ($errors->has('file_back'))
                                    <span class="help-block">{{ $errors->first('file_back') }}</span>
                                @endif
                                </div>
                            </div>
                            <div class="btn-group1">
                                <button type="submit" class="btn btn-info btn-block"><span
                                        class="icon-ok icon-white"></span>&nbsp;{{ __('main.upload') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </form>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6">
                @if(isset($item) && !empty($item->id_front))
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('main.id_front') }}</h3>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid" src="{{ asset('public/uploads/' . $item->id_front) }}" style="height: 220px">
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                @if(isset($item) && !empty($item->id_back))
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('main.id_back') }}</h3>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid" src="{{ asset('public/uploads/' . $item->id_back) }}" style="height: 220px">
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection


