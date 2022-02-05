@extends('dashboard::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.languages') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('main.name') }}</th>
                            <th>{{ __('main.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('translations') }}" class="btn btn-warning btn-xs btn-icon btn-circle">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ __('main.name') }}</th>
                            <th>{{ __('main.actions') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                {{ $items->links() }}
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


