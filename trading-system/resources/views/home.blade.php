@extends('layouts.app')

@section('content')
<form class="">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="search_bar">
                <div class="row">
                    <div class="col-md-8">
                        <input class="form-control" name="s" placeholder="Item name" value="{{ request('s') }}">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-block btn-brown">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</form>
<div class="mt-5 mb-5">
    <table class="table table-bordered" style="border: 2px solid #8D7450; border-radius:7px !important;">
        <thead>
        <tr>
            <th scope="col">Item Code</th>
            <th scope="col">Item name</th>
            <th scope="col">Photo</th>
            <th scope="col">Item description</th>
            <th scope="col">Box size</th>
            <th scope="col">Available to sell in sqm</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <th>{{ $item->code }}</th>
                <th>{{ $item->name }}</th>
                <th>
                    @if(!empty($item->image))
                        <div class="thumbnail">
                            <img class="img-responsive" src="{{ asset('public/uploads/' . $item->image) }}"
                                 style="max-height: 60px;border: 2px solid #ccc;border-radius: 3px">
                        </div>
                    @endif
                </th>
                <th>{{ $item->description }}</th>
                <th>{{ $item->size }}</th>
                <th>{{ $item->qty }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $items->links() }}
</div>
@stop
