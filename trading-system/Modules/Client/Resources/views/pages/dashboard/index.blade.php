@extends('client::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.dashboard') }}</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    @include('flash::message')
        <!-- Default box -->
        <div class="row">
            <div class="col-md-6">
                @if(auth()->user()->type != 'partner')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('main.dashboard_header') }}</h3>
                    </div>
                    <div class="card-body">
                        {{ __('main.dashboard_desc') }}
                        <br><br>
                        <a href="{{ route('client.accounts.real') }}" class="btn btn-warning btn-block">{{ __('front.new_real_account') }}</a>
                    </div>
                </div>
                @else
                <div class="card">
                    <div class="card-body">
                        <h5>{{ __('main.referral_link') }}</h5>
                        <h6 style="background: darkgrey">{{ route('register') }}/?ref={{ auth()->user()->referral_code }}</h6>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                @foreach(\App\Models\Ad::latest()->take(10)->get() as $ad)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <a href="{{ $ad->url }}" target="_blank">
                                        <img class="d-block w-100"
                                             src="{{ asset('public/uploads/'.$ad->image) }}"
                                             alt="{{ $ad->name }}" style="height: 200px">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                               data-slide="prev">
                                <span class="carousel-control-custom-icon" aria-hidden="true">
                                  <i class="fas fa-chevron-left"></i>
                                </span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                               data-slide="next">
                                <span class="carousel-control-custom-icon" aria-hidden="true">
                                  <i class="fas fa-chevron-right"></i>
                                </span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            @if(auth()->user()->type != 'partner')
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
                @foreach(\App\Models\Account::where('user_id', auth()->id())->where('number', '!=', null)->latest()->get() as $item)
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
            @else
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
                 @foreach(\App\Models\User::where('parent_id', auth()->id())->take(40)->get() as $item)
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
            @endif
        </div>

    </section>
    <!-- /.content -->
@endsection


