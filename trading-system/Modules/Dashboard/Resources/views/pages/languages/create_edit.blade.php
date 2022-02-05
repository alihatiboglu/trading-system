@extends('dashboard::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6><strong>{{ isset($item) ? __('main.edit') : __('main.add') }} {{ __('main.language') }}</strong></h6>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form method='post' enctype="multipart/form-data" action="{{ isset($item) ? route('languages.update', $item->id) : route('languages.store') }}">
            <input type="hidden" name="_method" value="{{ isset($item) ? 'PUT' : 'POST' }}">
            @csrf
            <div class="row">
            <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 h6">Language Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row  {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-3 col-from-label">Name<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" placeholder="Name" required value="{{ $item->name ?? old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row  {{ $errors->has('code') ? ' has-error' : '' }}">
                                <label class="col-md-3 col-from-label">Code<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="code" placeholder="Code" required value="{{ $item->code ?? old('code') }}">
                                    @if ($errors->has('code'))
                                        <span class="help-block">{{ $errors->first('code') }}</span>
                                    @endif
                                </div>
                            </div>
                            <?php $rtl = $item->rtl ?? old('rtl'); ?>
                            <div class="form-group row {{ $errors->has('rtl') ? ' has-error' : '' }}">
                                <label class="col-md-3 col-from-label">Direction</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="rtl" id="rtl">
                                        <option value="">LTR</option>
                                        <option value="1" {{ $rtl == 1 ? 'selected' : '' }}>RTL</option>
                                    </select>
                                    @if ($errors->has('rtl'))
                                        <span class="help-block">{{ $errors->first('rtl') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <div class="col-md-4">
                <div class="card">
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
                            <a href="#"  data-toggle="collapse" data-target="#timestampdiv" role="button">
                                <span>Edit</span>
                            </a>
                            <fieldset id="timestampdiv" class="collapse mt-2">
                                <legend class="screen-reader-text">Date and time</legend>
                                <div class="timestamp-wrap">
                                    <label>
                                        <span class="screen-reader-text">Month</span>
                                        <select class="form-required" id="mm" name="mm">
                                            <option value="01" data-text="Jan">01-Jan</option>
                                            <option value="02" data-text="Feb" selected="selected">02-Feb</option>
                                            <option value="03" data-text="Mar">03-Mar</option>
                                            <option value="04" data-text="Apr">04-Apr</option>
                                            <option value="05" data-text="May">05-May</option>
                                            <option value="06" data-text="Jun">06-Jun</option>
                                            <option value="07" data-text="Jul">07-Jul</option>
                                            <option value="08" data-text="Aug">08-Aug</option>
                                            <option value="09" data-text="Sep">09-Sep</option>
                                            <option value="10" data-text="Oct">10-Oct</option>
                                            <option value="11" data-text="Nov">11-Nov</option>
                                            <option value="12" data-text="Dec">12-Dec</option>
                                        </select>
                                    </label>
                                    <label>
                                        <span class="screen-reader-text">Day</span>
                                        <input type="text" id="jj" name="jj" value="25" size="2" maxlength="2" autocomplete="off" class="form-required custom-input">
                                    </label>,
                                    <label>
                                        <span class="screen-reader-text">Year</span>
                                        <input type="text" id="aa" name="aa" value="2021" size="4" maxlength="4" autocomplete="off" class="form-required custom-input">
                                    </label> at
                                    <label>
                                        <span class="screen-reader-text">Hour</span>
                                        <input type="text" id="hh" name="hh" value="16" size="2" maxlength="2" autocomplete="off" class="form-required custom-input"></label>
                                    :<label>
                                        <span class="screen-reader-text">Minute</span>
                                        <input type="text" id="mn" name="mn" value="21" size="2" maxlength="2" autocomplete="off" class="form-required custom-input">
                                    </label>
                                </div>
                                <p>
                                    <a href="#edit_timestamp" class="save-timestamp hide-if-no-js button">OK</a>
                                    <a href="#edit_timestamp" class="cancel-timestamp hide-if-no-js button-cancel">Cancel</a>
                                </p>
                            </fieldset>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <button class="btn btn-block btn-info btn-sm">Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
    <!-- /.content -->
@endsection


