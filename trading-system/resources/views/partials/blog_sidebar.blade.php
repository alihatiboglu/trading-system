<div class="sidebar col-xs-12 col-md-4">
            <!-- Categories Widget Starts -->
            <div class="widget">
                <h3 class="widget-title">{{ __('front.products') }}</h3>
                <ul class="nav nav-tabs">
                    @foreach(\App\Models\Item::all() as $product)
                    <li><a href="{{ route('product', $product->id) }}">{{ $product->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- Categories Widget Ends -->
            <!-- Archives Widget Starts -->
            <div class="widget">
                <h3 class="widget-title">{{ __('front.platforms') }}</h3>
                <ul class="arrow nav nav-tabs">
                    @foreach(\App\Models\Post::where('type', 'program')->get() as $program)
                        <li><a href="{{ route('program', $program->id) }}">{{ $program->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- Archives Widget Ends -->
            <!-- Latest Posts Widget Ends -->
            <div class="widget recent-posts">
                <h3 class="widget-title">{{ __('front.recent_posts') }}</h3>
                <ul class="unstyled clearfix">
                    <!-- Recent Post Widget Starts -->
                    @foreach(\App\Models\Post::where('type', 'post')->latest()->take(4)->get() as $post)
                    <li>
                        <div class="posts-thumb pull-left">
                            @if(!empty($post->image))
                            <a href="{{ route('blog.single', $post->id) }}">
                                <img class="img-responsive" src="{{ asset('public/uploads/' .$post->image) }}" alt="">
                            </a>
                            @endif
                        </div>
                        <div class="post-info">
                            <h4 class="entry-title">
                                <a href="{{ route('blog.single', $post->id) }}">{{ $post->name }}</a>
                            </h4>
                            <p class="post-meta">
                                <span class="post-date"> {{ $post->created_at->format('M d, Y') }}</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <!-- Recent Post Widget Ends -->
                    @endforeach
                </ul>
            </div>
            <!-- Latest Posts Widget Ends -->
        </div>