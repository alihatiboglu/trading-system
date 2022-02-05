<!-- Call To Action Section Starts -->
<section class="call-action-all" style="background-image: url('{{ asset('public/assets/site/images/open-account.jpg') }}');">
    <div class="call-action-all-overlay">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Call To Action Text Starts -->
                    <div class="action-text">
                        <h2>{{ __('front.get_started') }}</h2>
                        <p class="lead">{{ __('front.open_account') }}</p>
                    </div>
                    <!-- Call To Action Text Ends -->
                    <!-- Call To Action Button Starts -->
                    <p class="text-center">
                        <a href="{{ route('register') }}" class=" btn btn-primary">{{ __('front.new_real_account') }}</a>
                        <a href="{{ route('register') }}" class=" btn btn-primary">{{ __('front.new_demo_account') }}</a>
                    </p>
                    <!-- Call To Action Button Ends -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Call To Action Section Ends -->
