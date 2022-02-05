<div class="card card-outline card-danger">
    <div class="card-header">
        <h3 class="card-title">{{ __('main.image') }}</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="form-group">
            <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                <input type="file" id="file" name="file">
                @if ($errors->has('file'))
                    <span class="help-block">{{ $errors->first('file') }}</span>
                @endif
            </div>
            @if(isset($item) && !empty($item->image))
                <div>
                    <img class="img-fluid" src="{{ asset('public/uploads/'. $item->image) }}">
                </div>
            @endif
        </div>
        @if(isset($show_icon) && $show_icon)
        <div class="form-group">
            <div class="form-group {{ $errors->has('file_icon') ? ' has-error' : '' }}">
                <label>Icon</label>
                <input type="file" id="file_icon" name="file_icon">
                @if ($errors->has('file_icon'))
                    <span class="help-block">{{ $errors->first('file_icon') }}</span>
                @endif
            </div>
            @if(isset($item) && !empty($item->icon))
                <div>
                    <img class="img-fluid" src="{{ asset('public/uploads/'. $item->icon) }}">
                </div>
            @endif
        </div>
        @endif
    </div>
    <!-- /.card-body -->
</div>
