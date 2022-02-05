@extends('client::layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>{{ __('main.open_wallet_account') }}</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    @include('flash::message')
    <!-- Pricing Starts -->
    <section class="pricing mtop">
        <!-- Section Content Starts -->
        <div class="pricing-tables-content pricing-page">
            <div class="pricing-container">
                <!-- Pricing Tables Starts -->
                <div class="pricing-list bounce-invert row">
                    @foreach($packages as $package)
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <div class="pricing-wrapper">
                            <!-- Pricing Table #1 Starts -->
                            <header class="pricing-header">
                                <i class="fas {!! $package->icon !!}"></i>
                                <h2>{{ $package->name }}</h2>
                                <hr>
                                <div class="price">
                                    {!! $package->content !!}
                                </div>
                            </header>
                            <footer class="pricing-footer">
                                <a href="{{ route('client.accounts.package', $package->id) }}" class="btn btn-primary">{{ __('front.open_wallet_now') }}</a>
                            </footer>
                            <!-- Pricing Table #1 Ends -->
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Ends -->

</section>
<!-- /.content -->
@endsection


