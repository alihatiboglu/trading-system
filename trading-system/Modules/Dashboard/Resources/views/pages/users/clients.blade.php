@extends('dashboard::layouts.master')
@php $t = request('t') ?? 1; @endphp
@section('content')
    <!-- Content Header (Page header) -->
    <form method="get">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <h1>{{ $user->type == 'partner' ? 'Z3' : 'Z4' }}</h1>
                    </div>
                    <div class="col-sm-5 text-right">
                        <input type="text" name="s" class="form-control" value="{{ request('s') }}" placeholder="{{ __('main.search') }}">
                    </div>
                    <div class="col-sm-2 text-right">
                        <a href="{{ route('users.create') }}" class="btn btn-outline-primary btn-xs mt-3">{{ __('main.add_new') }}</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </form>

    <!-- Main content -->
    <section class="content">
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('main.id') }}</th>
                            <th>{{ __('main.name') }}</th>
                            <th>{{ __('main.date') }}</th>
                            <th>{{ __('main.email') }}</th>
                            <th>{{ __('main.phone') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ __('main.id') }}</th>
                            <th>{{ __('main.name') }}</th>
                            <th>{{ __('main.date') }}</th>
                            <th>{{ __('main.email') }}</th>
                            <th>{{ __('main.phone') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                {{ $items->appends(request()->all())->links() }}
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


