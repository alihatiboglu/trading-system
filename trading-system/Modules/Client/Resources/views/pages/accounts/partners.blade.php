@extends('client::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.my_partners') }}</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <form method="post" action="{{ route('client.partners.save') }}">
            <input type="hidden" name="_method" value="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label class="label-control">{{ __('main.name') }}</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="label-control">{{ __('main.account_type') }}</label>
                    <select type="text" name="account_type" class="form-control account_type">
                        <option value="real" selected>{{ __('main.real_account') }}</option>
                        <option value="package">{{ __('main.wallet_account') }}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <div class="platform_area">
                        <label class="label-control">{{ __('front.platform')}}</label>
                        <select class="form-control" name="platform_id">
                            <option value="">{{ __('main.select')}}</option>
                            @foreach(\App\Models\Post::where('type', 'program')->get() as $pr)
                            <option value="{{ $pr->id }}" {{ old('platform_id') == $pr->id ? 'selected' : '' }}>
                                {!! $pr->name !!}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="package_area" style="display: none">
                        <label class="label-control">{{ __('main.wallet')}}</label>
                        <select class="form-control" name="package_id">
                            <option value="">{{ __('main.select')}}</option>
                            @foreach(\App\Models\Package::all() as $package)
                            <option value="{{ $package->id }}" {{ old('package_id') == $package->id ? 'selected' : '' }}>
                                {!! $package->name !!}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-info btn-block" style="margin-top: 35px;">{{ __('main.save') }}</button>
                </div>
            </div>
        </form>
        <br>
        @include('flash::message')
        <div class="table-responsive">
            <table class="table custom-table table-striped table-hover">
                <thead>
                <tr>
                    <th>{{ __('main.name') }}</th>
                    <th>{{ __('main.account_type') }}</th>
                    <th>{{ __('main.date') }}</th>
                    <th>{{ __('main.lots_num') }}</th>
                    <th>{{ __('main.amount') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->account_type }}</td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        <td>{{ $item->lots_num }}</td>
                        <td>{{ $item->amount }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>{{ __('main.name') }}</th>
                    <th>{{ __('main.account_type') }}</th>
                    <th>{{ __('main.date') }}</th>
                    <th>{{ __('main.lots_num') }}</th>
                    <th>{{ __('main.amount') }}</th>
                </tr>
                </tfoot>
            </table>
        </div>

    </section>
    <!-- /.content -->
@endsection

@push('scripts')
    <script>
        $(function(){
            $('.account_type').change(function(){
                var t = $(this).val()
                if (t == 'real') {
                    $('.platform_area').show()
                    $('.package_area').hide()
                }
                if (t == 'package') {
                    $('.platform_area').hide()
                    $('.package_area').show()
                }
            })
        })
    </script>
@endpush
