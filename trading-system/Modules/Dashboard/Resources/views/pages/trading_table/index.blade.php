@extends('dashboard::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trading table</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('tradingTable.create') }}" class="btn btn-outline-primary btn-xs mt-3">{{ __('main.add_new') }}</a>
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
                    <th>Title</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('tradingTable.edit', $item->id) }}" type="button" class="btn btn-info btn-xs btn-flat">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form class="d-inline" method="post" action="{{ route('tradingTable.destroy', $item->id) }}"
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
                    <th>Title</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </section>
    <!-- /.content -->
@endsection


