@extends('layouts.master')

@section('content')
<!-- ======================= Content Start ======================== -->
<span class="display-zero">en</span>
<!-- Banner Area Starts -->
    <section class="banner-area" style="background-image: url('{{ asset('public/uploads/'.$item->image) }}'">
      <div class="banner-overlay">
        <div class="banner-text text-center">
          <div class="container">
            <!-- Section Title Starts -->
            <div class="row text-center">
              <div class="col-xs-12">
                <!-- Title Starts -->
                <h2 class="title-head"><span>{{ $item->name }}</span></h2>
                <!-- Title Ends -->
                <hr>
                <!-- Breadcrumb Starts -->
                <ul class="breadcrumb">
                  <li><a href="{{ route('home') }}"> {{ __('front.home') }}</a></li>
                  <li>{{ $item->name }}</li>
                </ul>
                <!-- Breadcrumb Ends -->
              </div>
            </div>
            <!-- Section Title Ends -->
          </div>
        </div>
      </div>
    </section>
    <!-- Banner Area Ends -->
        <br><br>
        <!-- Features and Video Section Starts -->
        <section class="image-block">
            <div class="container-fluid">
                <div class="row">
                    <!-- Features Starts -->
                    <div class="col-md-8 ts-padding img-block-left">
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-12 col-md-6 col-lg-10">
                                <h3 class="title-about">{{ $item->name }}</h3>
                                <p class="about-text">
                                <p>{!! $item->description !!}</p>
                              </p>
                                <!-- <a class="btn btn-primary" href="{{ route('contact') }}">{{ __('front.contact_us') }}</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- Features Ends -->
                    <!-- Video Starts -->
                    @if($item->id == 1)
                      <div class="col-md-4 col-xs-12 ts-padding img-higth-ali" style="background-image: url('{{ asset('public/assets/site/images/forex_vide.jpg') }}'">
           @elseif($item->id == 2)
           <div class="col-md-4 col-xs-12 ts-padding img-higth-ali" style="background-image: url('{{ asset('public/assets/site/images/asr.jpg') }}'">
                    
                    @elseif($item->id == 3)
            <div class="col-md-4 col-xs-12 ts-padding img-higth-ali" style="background-image: url('{{ asset('public/assets/site/images/power.jpg') }}'">
                        @elseif($item->id == 5)
            <div class="col-md-4 col-xs-12 ts-padding img-higth-ali" style="background-image: url('{{ asset('public/assets/site/images/adn.jpg') }}'">
              @elseif($item->id == 6)
            <div class="col-md-4 col-xs-12 ts-padding img-higth-ali" style="background-image: url('{{ asset('public/assets/site/images/ashm.jpg') }}'">
            @endif
      
                        <div>
                            <div class="text-center">
                                <a class="button-video mfp-youtube" href="{{ $item->url }}"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Video Ends -->
                </div>
            </div>
        </section>
    <!-- Section Forex Starts -->
@if(!empty($item->content) || count($trading_table) > 0)
        <section class="terms-of-services">
      <div class="container">
          @if(!empty($item->content))
        <div class="row">
          <div class="col-xs-12">
            
                {!! $item->content !!}
            <hr>
          </div>
        </div>
          @endif
          @if(count($trading_table) > 0)
          <br>
           <div class="table-responsive">
                  <table id="dt" class="table custom-table table-striped1 table-hover">
                      <thead>
                      <tr>
                          <th>{{ __('front.symbol') }}</th>
                          <th>{{ __('front.margin') }}</th>
                          <th>{{ __('front.spread') }}</th>
                          <th>{{ __('front.stop_level') }}</th>
                          <th>{{ __('front.swap') }}</th>
                          <th>{{ __('front.leverage') }}</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($trading_table as $obj)
                          <tr>
                              <td>{{ $obj->symbol }}</td>
                              <td>{{ $obj->margin }}</td>
                              <td>{{ $obj->spread }}</td>
                              <td>{{ $obj->stop_level }}</td>
                              <td>{{ $obj->swap }}</td>
                              <td>{{ $obj->leverage }}</td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
              </div>
          @endif
      </div>
    </section>
        @endif
    <!-- Section Terms of Services Ends -->
    @include('partials.call_to_action')
<!-- ====================================== Content =============================== -->
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dt').DataTable(

                {
                    "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
                    "iDisplayLength": 5
                }
            );
        } );
    </script>
@endpush
