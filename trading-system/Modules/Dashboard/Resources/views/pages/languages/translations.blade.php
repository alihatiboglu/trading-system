@extends('dashboard::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('main.translations') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form>
        <div class="row">
            <div class="col-md-4">
                <input class="form-control" name="key" value="{{ request('key') }}" placeholder="Key">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-info btn-block">{{ __('main.search') }}</button>
            </div>
        </div>
            <br>
        </form>
        @include('flash::message')
        <form action="{{ route('translations.store') }}" method="post">
            <input type="hidden" name="_method" value="POST">
            @csrf
            <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>{{ __('main.id') }}</th>
                            <th>{{ __('main.key') }}</th>
                            @foreach($languages as $language)
                            <th width="20%">{{ $language->name }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->key }}</td>
                                @foreach($languages as $language)
                                <td>
                                    <input type="text" class="form-control value" style="width:100%" name="values[{{ $language->code }}][{{ $item->key }}]"
                                           value="{{ $item->getTranslation('text', $language->code) }}">
                                </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ __('main.id') }}</th>
                            <th>{{ __('main.key') }}</th>
                            @foreach($languages as $language)
                                <th width="20%">{{ $language->name }}</th>
                            @endforeach
                        </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        {{ $items->links() }}
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-info btn-block">{{ __('main.save') }}</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
    <!-- /.content -->
@endsection


