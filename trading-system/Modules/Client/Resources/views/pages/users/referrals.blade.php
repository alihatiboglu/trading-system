@extends('client::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.my_clients') }}</h1>
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
                    <th>{{ __('main.id') }}</th>
                    <th>{{ __('main.name') }}</th>
                    <th>{{ __('main.date') }}</th>
                    <th>{{ __('main.email') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        <td>{{ $item->email }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>{{ __('main.id') }}</th>
                    <th>{{ __('main.name') }}</th>
                    <th>{{ __('main.date') }}</th>
                    <th>{{ __('main.email') }}</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </section>
    <!-- /.content -->
@endsection


