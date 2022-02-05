@extends('client::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.my_accounts') }}</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="table-responsive">
            <table class="table custom-table table-striped table-hover">
                <thead>
                <tr>
                    <th>{{ __('main.name') }}</th>
                    <th>{{ __('main.amount') }}</th>
                    <th>{{ __('main.account_type') }}</th>
                    <th>{{ __('main.account_number') }}</th>
                    <th>{{ __('main.leverage') }}</th>
                    <th>{{ __('main.date') }}</th>
                    <th>{{ __('main.status') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ !empty($item->type) ? __('main.'.$item->type) : '' }}</td>
                        <td>{{ $item->number }}</td>
                        <td>{{ $item->leverage }}</td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a type="button" class="btn btn-warning btn-xs btn-flat">
                                {!! $item->status != 'confirmed' ? __('main.not_confirmed') : __('main.confirmed') !!}

                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>{{ __('main.name') }}</th>
                    <th>{{ __('main.amount') }}</th>
                    <th>{{ __('main.account_type') }}</th>
                    <th>{{ __('main.account_number') }}</th>
                    <th>{{ __('main.leverage') }}</th>
                    <th>{{ __('main.date') }}</th>
                    <th>{{ __('main.status') }}</th>
                </tr>
                </tfoot>
            </table>
            {{ $items->links() }}
        </div>

    </section>
    <!-- /.content -->
@endsection


