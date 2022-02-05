@extends('client::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ __('main.documents') }}</h1>
                    <h6></h6>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @include('flash::message')
        <div class="card-white card">
            <div class="card-body pt5 pb5">
                <table class="table table-layout-fixed uploaded-docs-table" width="100%">
                    <tbody>
                    <tr>
                        <td class="uploaded-docs-table-name">
                            <span class="document-verify-step1 lead mb0">
                                <i class="fas fa-id-card cl-blue"></i>
                                {{ __('main.identity_document') }} (ID)
                            </span>
                        </td>
                        <td class="uploaded-docs-table-status">
                            <div class="color-pink-bright text-bold ng-scope">
                                @if(isset($item) && (!empty($item->id_front) || !empty($item->id_black)))
                                    {{ __('main.uploaded') }}
                                @else
                                    {{ __('main.not_uploaded') }}
                                @endif
                            </div>
                        </td>
                        <td class="uploaded-docs-table-btn pr0">
                            @if(isset($item) && (!empty($item->id_front) || !empty($item->id_black)))
                                <a class="btn btn-warning rounded btn-with-arrow attach" href="{{ route('client.documents.id') }}">
                                    {{ __('main.open') }}
                                </a>
                            @else
                                <a class="btn btn-info rounded btn-with-arrow attach" href="{{ route('client.documents.id') }}">
                                    {{ __('main.upload') }}
                                </a>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td class="uploaded-docs-table-name">
                            <span class="document-verify-step1 lead mb0">
                              <i class="fas fa-map-marker-alt cl-blue"></i>
                               {{ __('main.por') }} (POR)
                            </span>
                        </td>
                        <td class="uploaded-docs-table-status">
                            <div class="text-bold ng-scope">
                                <span class="color-pink-bright ng-scope">
                                    @if(isset($item) && !empty($item->por))
                                        {{ __('main.uploaded') }}
                                    @else
                                        {{ __('main.not_uploaded') }}
                                    @endif
                                </span>
                            </div>
                        </td>
                        <td class="uploaded-docs-table-btn pr0">
                            @if(isset($item) && !empty($item->por))
                                <a class="btn btn-warning rounded btn-with-arrow attach" href="{{ route('client.documents.por') }}">{{ __('main.open') }}
                                </a>
                            @else
                                <a class="btn btn-info rounded btn-with-arrow attach" href="{{ route('client.documents.por') }}">
                                {{ __('main.upload') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


