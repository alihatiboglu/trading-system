@extends('dashboard::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        {{ __('main.orders') }} 
                        <a href="{{ route('orders.export') }}"><i class="fas fa-cloud-download-alt"></i></a>
                    </h1>
                </div>
                <div class="col-sm-6 text-right">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
            <table class="table custom-table table-striped table-hover">
                <thead>
                <tr>
                    <th>{{ __('main.name') }}</th>
                    <th>{{ __('main.nickname') }}</th>
                    <th>{{ __('main.phone') }}</th>
                    <th>{{ __('main.course') }}</th>
                    <th>{{ __('main.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nickname }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->course->name ?? '' }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>
                        <form class="d-inline" method="post" action="{{ route('orders.destroy', $item->id) }}"
                              onSubmit="if(!confirm('تاكيد الحذف؟')){return false;}">
                            <input type="hidden" name="_method" value="delete" />
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
                    <th>{{ __('main.name') }}</th>
                    <th>{{ __('main.nickname') }}</th>
                    <th>{{ __('main.phone') }}</th>
                    <th>{{ __('main.course') }}</th>
                    <th>{{ __('main.actions') }}</th>
                </tr>
                </tfoot>
            </table>
        </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


