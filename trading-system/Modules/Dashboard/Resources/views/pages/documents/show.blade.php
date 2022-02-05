@extends('dashboard::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.documents') }} : {{ $item->user->name  }}</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12"><h3>{{ __('main.identity_document') }} (ID)</h3></div>
            <div class="col-md-6">
                @if(isset($item) && !empty($item->id_front))
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('main.id_front') }}</h3>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid" src="{{ asset('public/uploads/' . $item->id_front) }}" style="height: 300px">
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                @if(isset($item) && !empty($item->id_back))
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('main.id_back') }}</h3>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid" src="{{ asset('public/uploads/' . $item->id_back) }}" style="height: 300px">
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-12"><h3>{{ __('main.por') }} (ID)</h3></div>
            <div class="col-md-6">
                @if(isset($item) && !empty($item->por))
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Scan/Photo of POR</h3>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid" src="{{ asset('public/uploads/' . $item->por) }}" style="height: 300px">
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection


