@extends('layouts.master')

@section('content')
<!--********************* SITE CONTENT *********************-->
<!--********************************************************-->
<!-- ===========================================  content =================================== -->
<!-- Section Content Starts -->
<section class="container blog-page" style="padding-top: 15px;">
    <div class="row">
        <!-- Sidebar Ends -->
        <div class="content">
            <div class="row">
            @foreach($items as $item)
                    <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="latest-post">
                            <!-- Featured Image Starts -->
                            <a href="{{ route('blog.single', $item->id) }}">
                                <img class="img-responsive" src="{{ asset('public/uploads/'.$item->image) }}" style="height: 200px;width: 100%">
                            </a>
                            <!-- Featured Image Ends -->
                            <!-- Article Content Starts -->
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="{{ route('blog.single', $item->id) }}">{{ $item->name }}</a>
                                </h4>
                                <div class="post-text">
                                    <p>{{ \Illuminate\Support\Str::limit($item->description, 100, '..') }}</p>
                                </div>
                            </div>
                            <div class="post-date">
                                <span>{{ $item->created_at->format('j') }}</span>
                                <span>{{ $item->created_at->format('M') }}</span>
                            </div>
                            <a href="{{ route('blog.single', $item->id) }}" class="btn btn-primary">{{ __('main.Read_more') }}</a>
                            <!-- Article Content Ends -->
                        </div>
                    </div>
            @endforeach
            </div>
            <nav class="col-xs-12 text-center" aria-label="Page navigation">
                {{ $items->links() }}
            </nav>
        </div>
    </div>
</section>
<!-- Section Content Ends -->
@include('partials.call_to_action')
<!-- ===========================================  content =================================== -->
@endsection
