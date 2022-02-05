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
        <form method='post' enctype="multipart/form-data" action="{{ isset($item) ? route('tradingTable.update', $item->id) : route('tradingTable.store') }}">
            <input type="hidden" name="_method" value="{{ isset($item) ? 'PUT' : 'POST' }}">
            @csrf
            <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <h3>
                        @isset($item)
                            Edit country
                            <a href="{{ route('tradingTable.create') }}" class="btn btn-outline-primary btn-xs">{{ __('main.add_new') }}</a>
                        @else
                            Add country
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
            </div>
            <div class="col-md-4">
                <div class="mt-40 pl-3">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Publish</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="mb-3">
                                <?php $status = $item->status ?? old('status'); ?>
                                Status: <strong id="post-status-display">
                                    @if($status == 'publish')Published
                                    @elseif($status == 'pending')Pending
                                    @else
                                        Draft
                                    @endif

                                </strong>
                                <a href="#" data-toggle="collapse" data-target="#post-status-area" role="button">
                                    <span>Edit</span>
                                </a>
                                <div id="post-status-area" class="collapse mt-3">
                                    <select name="status" id="status">
                                        <option value="publish" {{ $status == 'publish' ? 'selected' : '' }}>Published</option>
                                        <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>Pending Review</option>
                                        <option value="draft" {{ $status == 'draft' ? 'selected' : '' }}>Draft</option>
                                    </select>
                                    <a href="#" class="btn btn-info btn-sm btn-flat">OK</a>
                                    <a href="#" class="btn btn-link underline btn-sm">Cancel</a>
                                </div>
                            </div>

                            <div class="mb-2">
                                <span id="timestamp">Published
                                    @isset($item)
                                        on: <b>{{ $item->created_at->format('M d, Y  h:i a') }}</b>
                                    @else
                                        immediately
                                    @endif
                                </span>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-block btn-info btn-sm">Publish</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('dashboard::partials.featured_image')
                </div>
            </div>
        </div>
        </form>
    </section>
    <!-- /.content -->
@endsection


