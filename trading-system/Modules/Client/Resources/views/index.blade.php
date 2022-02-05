@extends('dashboard::layouts.master')
@php $logged = auth()->user(); @endphp
@section('content')
<h4>مرحبا {{ $logged->name }}</h4><br>
<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">الطلاب</span>
              <span class="info-box-number">{{ \App\Models\User::where('type',3)->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">الكورسات</span>
              <span class="info-box-number">{{ \App\Models\Item::count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">المدربين</span>
              <span class="info-box-number">{{ \App\Models\User::where('type',2)->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">الامتحانات</span>
              <span class="info-box-number">{{ \App\Models\Exam::count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
<br>

    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">اخر الطلاب المنضمين</h3>
        </div>

        <div class="box-body">
            <div class="dataTables_wrapper">
                <div class="table-responsive">
                    <table class="table table-striped no-margin" id="show_table">
                        <thead>
                        <tr>
                            <th>{{ __('main.name') }}</th>
                            <th>{{ __('main.email') }}</th>
                            <th>{{ __('main.phone') }}</th>
                            <th>{{ __('main.created_at') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
