@extends('dashboard::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.documents') }}</h1>
                </div>
                <div class="col-sm-6">

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
                        <th>{{ __('main.user_id') }}</th>
                        <th>{{ __('main.date') }}</th>
                        <th>{{ __('main.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->user->name ?? '' }}</td>
                            <td>{{ $item->user_id }}</td>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            <td>
                                    <a href="{{ route('documents.confirm', $item->id) }}" type="button" class="btn btn-warning btn-xs btn-flat">
                                        {!! $item->status != 'confirmed' ? __('main.confirm') : '<i class="fas fa-check"></i>' !!}

                                    </a>
                                <a href="{{ route('documents.show', $item->id) }}" type="button" class="btn btn-info btn-xs">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form class="d-inline" method="post" action="{{ route('documents.destroy', $item->id) }}"
                                      onSubmit="if(!confirm('تاكيد الحذف؟')){return false;}">
                                    <input type="hidden" name="_method" value="delete" />
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-xs">
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
                        <th>{{ __('main.user_id') }}</th>
                        <th>{{ __('main.date') }}</th>
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


