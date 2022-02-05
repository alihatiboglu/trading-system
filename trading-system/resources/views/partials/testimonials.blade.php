                <div id="carousel-testimonials" class="carousel slide carousel-fade" data-ride="carousel">
                    <!-- Indicators Starts -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-testimonials" data-slide-to="1"></li>
                    </ol>
                    <!-- Indicators Ends -->
                    <!-- Carousel Inner Starts -->
                    <div class="carousel-inner">
                        <!-- Carousel Item Starts -->
                        <div class="item active"  style="background-image: url('{{ asset('public/assets/site/images/User-login1.jpg') }}'">
                            <div>
                                <blockquote>
                                    <p>{{ __('front.testimonial1_description') }}</p>
                                    <footer><span>{{ __('front.testimonial1_name') }}</span>, {{ __('front.testimonial1_country') }}</footer>
                                </blockquote>
                            </div>
                        </div>
                        <!-- Carousel Item Ends --> 
                        <!-- Carousel Item Starts -->
                        <div class="item item-2" style="background-image: url('{{ asset('public/assets/site/images/register.jpg') }}'">
                            <div>
                                <blockquote>
                                    <p>{{ __('front.testimonial2_description') }}</p>
                                    <footer><span>{{ __('front.testimonial2_name') }}</span>, {{ __('front.testimonial2_country') }}</footer>
                                </blockquote>
                            </div>
                        </div>
                        <!-- Carousel Item Ends -->
                      
                    </div>
                    <!-- Carousel Inner Ends -->
                </div>