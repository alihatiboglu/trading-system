@extends('client::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.profile') }}</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @include('flash::message')
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('main.contact_info') }}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('main.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <span class="">{{ __('main.phone') }}</span>
                                    <div class="">
                                        <span dir="ltr" class="text-danger">{{ $item->phone }}</span>
{{--                                        <div class="text-danger">--}}
{{--                                            <span><i class="icon-notification"></i> Not verified</span>--}}
{{--                                        </div>--}}
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('client.profile.change_phone') }}">{{ __('main.change') }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="mr20 fl">{{ __('main.email') }}</span>
                                    <div class="fl no-break">
                                        <div class="fl mr20 ng-binding">{{ $item->email }}</div>
{{--                                        <div class="no-break fl text-success">--}}
{{--                                            <span class="ng-scope">--}}
{{--                                                <i class="icon-Verified"></i> Verified</span>--}}
{{--                                        </div>--}}
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('client.profile.change_email') }}">{{ __('main.change') }}</a></td>
                            </tr>
                            <tr class="">
                                <td>
                                    <span class="">{{ __('main.additional_email') }}</span>
                                    <div class="fl no-break">
                                        <div class="fl mr20 ng-binding">{{ $item->email2 }}</div>
                                    </div>
                                </td>
                                <td>
                                    @empty($item->email2)
                                    <a href="{{ route('client.profile.change_email2') }}" class="">{{ __('main.add') }}</a>
                                    @else
                                    <a href="{{ route('client.profile.change_email2') }}" class="">{{ __('main.change') }}</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('main.my_referrals') }}</td>
                                <td><a href="{{ route('client.referrals') }}">{{ __('main.show') }}</a></td>
                            </tr>
                            <tr>
                                <td>{{ __('main.change_password') }}</td>
                                <td><a href="{{ route('client.profile.change_password') }}">{{ __('main.change') }}</a></td>
                            </tr>
                            @if(auth()->user()->type != 'partner')
                            <tr>
                                <td>{{ __('main.request_change') }}</td>
                                <td><a href="{{ route('client.change.password.request') }}">{{ __('main.request') }}</a></td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ $item->name }}</h5>
                        <h5>{{ __('main.id') }}: {{ $item->id }}</h5>
                    </div>
                </div>
                <!-- /.card -->
                <div class="card">
                    <div class="card-body">
                        <h5>{{ __('main.referral_link') }}</h5>
                        <h6 style="background: darkgrey">{{ route('register') }}/?ref={{ $item->referral_code }}</h6>
                    </div>
                </div>
                <!-- /.card -->
                <div class="card">
                    <div class="card-body">
                        @if($item->type == 'partner')
                        <h5>{{ __('main.lots_num') }}: {{ $item->lots_num + 0 }}$</h5>
                        <h5>{{ __('main.amount') }}: {{ $item->amount + 0 }}$</h5>
                        @else
                        <h5>{{ __('main.wallet_balance') }}: {{ $item->wallet + 0 }}$</h5>
                        <h5>{{ __('main.pending_commission') }}: {{ $item->comission + 0 }}$</h5>
                        @endif
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection


