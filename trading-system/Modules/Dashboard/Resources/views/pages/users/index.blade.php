@extends('dashboard::layouts.master')
@php $t = request('t') ?? 1; @endphp
@section('content')
    <!-- Content Header (Page header) -->
    <form method="get">
        <input type="hidden" name="t" value="{{ $t }}">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <h1>
                            {{ __('main.users'.$t ) }}
                            <a href="{{ route('users.export','t='.$t ) }}"><i class="fas fa-cloud-download-alt"></i></a>
                        </h1>
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
                            <th>{{ __('main.birthdate') }}</th>
                            <th>{{ __('front.residence_country') }}</th>
                            <th>{{ __('main.email') }}</th>
                            <th>{{ __('main.phone') }}</th>
                            <th>{{ __('main.date') }}</th>
                            @if($t == 2)
                            <th>{{ __('main.client_no') }}</th>
                            <th>{{ __('main.amount') }}</th>
                            @endif
                            @if($t == 3)
                            <th>{{ __('main.lots_num') }}</th>
                            <th>{{ __('main.amount') }}</th>
                            @endif
                            <th>{{ __('main.role') }}</th>
                            <th>{{ __('main.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->birthdate }}</td>
                                <td>{{ $item->country }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                @if($t == 2)
                                <th>{{ $item->referrals_count }}</th>
                                <td>{{ $item->amount }}</td>
                                @endif
                                @if($t == 3)
                                <th>{{ $item->lots_num }}</th>
                                <td>{{ $item->amount }}</td>
                                @endif
                                <td>{{ $item->roles->first()->name ?? __('main.user') }}</td>
                                <td>
                                    @if($t == 2 || $t == 3)
                                    <a href="{{ route('user.clients', $item->id) }}" type="button" class="btn btn-warning btn-xs btn-flat">
                                        <i class="fa fa-users"></i>
                                    </a>
                                    @endif
                                    @if($item->is_master != 1 || \Auth::user()->is_master == 1)
                                    <a href="{{ route('users.edit', $item->id) }}" type="button" class="btn btn-info btn-xs btn-flat">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form class="d-inline" method="post" action="{{ route('users.destroy', $item->id) }}"
                                          onSubmit="if(!confirm('تاكيد الحذف؟')){return false;}">
                                        <input type="hidden" name="_method" value="delete" />
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-xs btn-flat">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ __('main.id') }}</th>
                            <th>{{ __('main.name') }}</th>
                            <th>{{ __('main.birthdate') }}</th>
                            <th>{{ __('front.residence_country') }}</th>
                            <th>{{ __('main.email') }}</th>
                            <th>{{ __('main.phone') }}</th>
                            <th>{{ __('main.date') }}</th>
                            @if($t == 2)
                                <th>{{ __('main.client_no') }}</th>
                                <th>{{ __('main.amount') }}</th>
                            @endif
                            @if($t == 3)
                                <th>{{ __('main.lots_num') }}</th>
                                <th>{{ __('main.amount') }}</th>
                            @endif
                            <th>{{ __('main.role') }}</th>
                            <th>{{ __('main.actions') }}</th>
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


