@extends('layouts.dezato.master', ['title' => $category->name])

@section('content')
    <!-- ******* CATEGORY ********** -->
    <section class="innerHdr">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                          <a href="{{ url('/') }}" class="bkinner">
                              <svg xmlns="http://www.w3.org/2000/svg" width="33.051" height="28.776" viewBox="0 0 33.051 28.776">
                              <path id="Path_4068" data-name="Path 4068" d="M41.06,28.571a11.325,11.325,0,0,1-11.31,11.317H9.387a1.378,1.378,0,0,1,0-2.755H29.749a8.558,8.558,0,1,0,0-17.117H13.232l4.508,3.707a1.378,1.378,0,1,1-1.75,2.128L8.512,19.7c-.017-.014-.029-.03-.045-.045a1.313,1.313,0,0,1-.1-.1l-.011-.01c-.01-.011-.022-.019-.032-.03v0c-.014-.017-.025-.037-.038-.055a1.212,1.212,0,0,1-.075-.112c-.006-.009-.013-.017-.018-.027s-.017-.023-.023-.035-.014-.037-.023-.055c-.019-.04-.034-.081-.05-.123l0-.012c-.014-.039-.026-.079-.037-.119a1.2,1.2,0,0,1-.023-.124c0-.025-.012-.05-.014-.075s0-.049,0-.073-.006-.039-.006-.06.006-.04.006-.061,0-.048,0-.072a.522.522,0,0,1,.014-.076c.006-.042.014-.083.023-.124a1.19,1.19,0,0,1,.037-.119l0-.012c.015-.042.031-.083.05-.123.008-.018.013-.037.023-.055s.017-.023.023-.035.012-.018.018-.027a1.212,1.212,0,0,1,.074-.112c.013-.018.023-.038.038-.055v0c.014-.017.031-.029.045-.045a1.225,1.225,0,0,1,.1-.1c.016-.014.028-.031.045-.045l.007-.006h0l7.476-6.143a1.378,1.378,0,1,1,1.75,2.128l-4.508,3.707H29.752A11.323,11.323,0,0,1,41.06,28.571Z" transform="translate(-8.009 -11.112)" fill="#2b303a"/>
                            </svg>
                          </a>
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('front.home')</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                      </ol>
                  </nav>
                </div>
                <div class="col-lg-7 col-md-12">
                    <h3>{{ $category->name }}</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="ourP">
      <div class="container">
        @if(count($subcategories) > 0)
          <div class="row slider1">
                @foreach ($subcategories as $subcategory)
                <div class="col-md-8 col-xs-6 col-sm-12 subcategory" data-aos-delay="400" data-aos="flip-left">
                  <a href="{{ url('categories/'.$category->id) }}" class="">
                    <img style="cursor: pointer" src="{{ $subcategory->getFirstMediaUrl() }}" onclick="window.location='{{ url('categories/'.$category->id) }}';" alt="">
                    <h3>{{ $subcategory->name }}</h3>
                  </a>
                </div>
                @endforeach
          </div>
          @endif
          <div class="row">
              <div class="filter filter-basic">

                  <!--div class="dropdown col-12">
                      <button type="button" class="filterBtn" data-toggle="dropdown">
                        filter <i class="fa fa-plus"></i>
                      </button>
                      <div class="filter-nav dropdown-menu">
                          <button class="btn active filter-button dropdown-item" data-filter="">All</button>
                          <button class="btn filter-button dropdown-item" data-filter="nature">Nature</button>
                          <button class="btn filter-button dropdown-item" data-filter="food">Food</button>
                          <button class="btn filter-button dropdown-item" data-filter="architecture">Architecture</button>
                      </div>
                  </div-->
                  <div class="clearfix"></div>
                  <div class="filter-gallery col-12">
                    <div class="row">

                      @foreach ($products as $product)
                          @include('layouts.dezato.partials.product-item')
                      @endforeach
                    <div class="text-center w-100 pt-3">
                        <div class="">{{ $products->render("pagination::simple-bootstrap-4") }}</div>
                    </div>

{{--                       <div class="col-md-3 my-1 animate__zoomIn">
                        <div class="" data-category="nature">
                          <div class="item-content">
                              <div class="PItem">
                                  <img src="{{ asset('front/dezato') }}/img/sp1.png" alt="">
                                  <h4>cake</h4>
                                  <h6> <span>KWD 200</span> KWD 100</h6>
                                </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 my-1 animate__zoomIn">
                        <div class="" data-category="architecture">
                          <div class="item-content">
                              <div class="PItem">
                                  <img src="{{ asset('front/dezato') }}/img/sp2.png" alt="">
                                  <h4>cake</h4>
                                  <h6> <span>KWD 200</span> KWD 100</h6>
                                </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 my-1">
                        <div class="" data-category="nature">
                          <div class="item-content">
                            <div class="PItem">
                            <img src="{{ asset('front/dezato') }}/img/chocoR2.png" alt="">
                            <h4>cake</h4>
                            <h6> <span>KWD 200</span> KWD 100</h6>
                          </div>
                          </div>
                        </div>
                      </div>
 --}}                    </div>
                  </div>
                </div>
          </div>
      </div>
    </section>
@endsection
