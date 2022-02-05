@extends('dashboard::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.accounts') }}</h1>
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
                    <table class="table custom-table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('main.name') }}</th>
                            <th>{{ __('main.account_number') }}</th>
                            <th>{{ __('main.email') }}</th>
                            <th>{{ __('main.phone') }}</th>
                            <th>{{ __('main.amount') }}</th>
                            <th>{{ __('main.account') }}</th>
                            <th>{{ __('main.account_type') }}</th>
                            <th>{{ __('main.leverage') }}</th>
                            <th>{{ __('main.date') }}</th>
                            <th>{{ __('main.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                           <!-- Mazagy keda mesh  3mel Eager Loading (:-->
                           <?php
                              $user = \App\Models\User::find($item->user_id); 
                              $package = \App\Models\Package::find($item->package_id); 
                           ?>
                            <tr> 
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->number }}</td>
                                <td>{{ $user->email ?? '' }}</td>
                                <td>{{ $user->phone ?? '' }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ !empty($item->type) ? __('main.'.$item->type) : '' }}</td>
                                <td>{{ $package->name ?? '' }}</td>
                                <td>{{ $item->leverage }}</td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('accounts.confirm', $item->id) }}" type="button" class="btn btn-warning btn-xs btn-flat">
                                        {!! $item->status != 'confirmed' ? __('main.confirm') : '<i class="fas fa-check"></i>' !!}

                                    </a>
                                    <a href="{{ route('accounts.edit', $item->id) }}" type="button" class="btn btn-info btn-xs btn-flat">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form class="d-inline" method="post" action="{{ route('accounts.destroy', $item->id) }}"
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
                            <th>{{ __('main.account_number') }}</th>
                            <th>{{ __('main.email') }}</th>
                            <th>{{ __('main.phone') }}</th>
                            <th>{{ __('main.amount') }}</th>
                            <th>{{ __('main.account') }}</th>
                            <th>{{ __('main.account_type') }}</th>
                            <th>{{ __('main.leverage') }}</th>
                            <th>{{ __('main.date') }}</th>
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


