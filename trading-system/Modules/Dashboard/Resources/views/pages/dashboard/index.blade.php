@extends('dashboard::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('main.dashboard') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('main.services') }}</span>
                                    <span class="info-box-number">{{ \App\Models\Post::where('type', 'service')->count() }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('main.posts') }}</span>
                                    <span class="info-box-number">{{ \App\Models\Post::where('type', 'post')->count() }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('main.products') }}</span>
                                    <span class="info-box-number">{{ \App\Models\Item::count() }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('main.courses') }}</span>
                                    <span class="info-box-number">{{ \App\Models\Course::count() }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
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
                                            <a href="{{ $ad->url }}">
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
            <!-- /.row -->

            <div class="card">
                <div class="card-body">
                    <h5><strong>{{ __('main.recent_users') }}</strong></h5>
                    <div class="table-responsive">
                        <table class="table custom-table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>{{ __('main.id') }}</th>
                                <th>{{ __('main.name') }}</th>
                                <th>{{ __('main.role') }}</th>
                                <th>{{ __('main.referral_by') }}</th>
                                <th>{{ __('main.date') }}</th>
                                <th>{{ __('main.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\User::latest()->take(10)->get() as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->roles->first()->name ?? '' }}</td>
                                    <td>{{ $item->parent->name ?? '' }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td>
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
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ __('main.id') }}</th>
                                <th>{{ __('main.name') }}</th>
                                <th>{{ __('main.role') }}</th>
                                <th>{{ __('main.referral_by') }}</th>
                                <th>{{ __('main.date') }}</th>
                                <th>{{ __('main.actions') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection


