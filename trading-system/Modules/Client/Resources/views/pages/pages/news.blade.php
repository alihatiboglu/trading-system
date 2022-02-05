@extends('client::layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>{{ __('main.news') }}</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        @foreach($items as $item)
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('client.news.single', $item->id) }}">
                        @if(!empty($item->image))
                        <div>
                           <img class="img-fluid" src="{{ asset('public/uploads/'.$item->image) }}" style="height: 220px;width: 100%">
                       </div>
                       <br>
                       @endif
                       <h3 class="bold">{{ $item->name }}</h3>
                   </a>
                   {!! $item->description !!}
               </div>
           </div>
           <!-- /.card -->
       </div>
       @endforeach
   </div>

</section>
<!-- /.content -->
@endsection


