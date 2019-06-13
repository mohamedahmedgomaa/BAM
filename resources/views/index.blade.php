@include('include.header')

  @if(Session::has('success'))
  <div class="row">
    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
        <div id="charge-message" class="alert alert-success">
          {{ Session::get('success') }}
        </div>
    </div>
  </div>
  @endif
 <!--================Home Banner Area =================-->
  <section class="home_banner_area mb-50">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content row">
          <div class="col-lg-12" style="margin-top: -90px;">
            <h3><span>Show</span> Your <br />Personal <span>Style</span></h3>
            <h4>find which you want and buy it from us.</h4>
            <a class="button3D" href="{{ route('allProduct') }}">
              <span>View All</span>
              <span></span>
              <span></span>
              <span>View All</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!--================ Feature Product Area =================-->
  <br><br>
  <section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Featured product</span></h2>
            <p>Bring to you the highest three products on sales</p>
          </div>
        </div>
      </div>
      {{-- ///////////////////////////////////////////// --}}
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="/upload/{{ $first_post->photo }}" alt="" />
              <div class="p_icon">
                <a href="/homepage/{{ $first_post->id }}">
                  <i class="ti-eye"></i>
                </a>
                <a href="{{ route('product.addToCart', ['id' => $first_post->id]) }}">
                  <i class="ti-shopping-cart"></i>
                </a>
                @guest
                <a href="{{ route('login') }}" class="icons">
                    <i class="ti-heart" aria-hidden="true"></i>
                </a>
                @else
                @php
                    $like_count = 0;

                    $like_status = "btn-secondry";
                @endphp

                @foreach ($first_post->likes as $like)
                    @php
                        if ($like->like == 1) {
                            $like_count++;
                        }
                        if (Auth::check()) {
                            if ($like->like == 1 && $like->user_id == Auth::user()->id) {
                                $like_status = "btn-success";
                            }

                        }

                    @endphp
                @endforeach
                <button type="button" data-productid="{{ $first_post->id }}_l" data-like="{{ $like_status }}"
                        class="ti-heart like btn {{ $like_status }}" style="">
                    <i aria-hidden="true"></i>
                </button>
                @endguest
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4>{{  $first_post->title }}</h4>
              </a>
              <a href="{{ route('category.show', ['id' => $first_post->category->id]) }}" class="d-block">
                <span class="mr-4">{{ $first_post->category->name }}</span>
              </a>
              <div class="mt-3">
                <span class="mr-4">{{ $first_post->price }} $</span>
                @if($first_post->offer > 0 )
                <del>{{ $first_post->offer }}</del>
                @else
                <del>No Offer</del>
                @endif
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="/upload/{{ $second_post->photo }}" alt="" />
              <div class="p_icon">
                <a href="/homepage/{{ $second_post->id }}">
                  <i class="ti-eye"></i>
                </a>
                <a href="{{ route('product.addToCart', ['id' => $second_post->id]) }}">
                  <i class="ti-shopping-cart"></i>
                </a>
                @guest
                <a href="{{ route('login') }}" class="icons">
                    <i class="ti-heart" aria-hidden="true"></i>
                </a>
                @else
                @php
                    $like_count = 0;
                    $like_status = "btn-secondry";
                @endphp
                @foreach ($second_post->likes as $like)
                    @php
                        if ($like->like == 1) {
                            $like_count++;
                        }
                        if (Auth::check()) {

                            if ($like->like == 1 && $like->user_id == Auth::user()->id) {
                                $like_status = "btn-success";
                            }
                        }
                    @endphp
                @endforeach
                <button type="button" data-productid="{{ $second_post->id }}_l" data-like="{{ $like_status }}"
                        class="ti-heart like btn {{ $like_status }}" style="">
                    <i aria-hidden="true"></i>
                </button>
                @endguest
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4>{{  $second_post->title }}</h4>
              </a>
              <a href="{{ route('category.show', ['id' => $second_post->category->id]) }}" class="d-block">
                <span class="mr-4">{{ $second_post->category->name }}</span>
              </a>
              <div class="mt-3">
                <span class="mr-4">{{ $second_post->price }} $</span>
                @if($second_post->offer > 0 )
                <del>{{ $second_post->offer }}</del>
                @else
                <del>No Offer</del>
                @endif
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="/upload/{{ $third_post->photo }}" alt="" />
              <div class="p_icon">
                <a href="/homepage/{{ $third_post->id }}">
                  <i class="ti-eye"></i>
                </a>
                <a href="{{ route('product.addToCart', ['id' => $third_post->id]) }}">
                  <i class="ti-shopping-cart"></i>
                </a>
                @guest
                <a href="{{ route('login') }}" class="icons">
                    <i class="ti-heart" aria-hidden="true"></i>
                </a>
                @else
                @php
                    $like_count = 0;

                    $like_status = "btn-secondry";
                @endphp

                @foreach ($third_post->likes as $like)
                    @php
                        if ($like->like == 1) {
                            $like_count++;
                        }
                        if (Auth::check()) {
                            if ($like->like == 1 && $like->user_id == Auth::user()->id) {
                                $like_status = "btn-success";
                            }
                        }
                    @endphp
                @endforeach
                <button type="button" data-productid="{{ $third_post->id }}_l" data-like="{{ $like_status }}"
                        class="ti-heart like btn {{ $like_status }}" style="">
                    <i aria-hidden="true"></i>
                </button>
                @endguest
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4>{{  $third_post->title }}</h4>
              </a>
              <a href="{{ route('category.show', ['id' => $third_post->category->id]) }}" class="d-block">
                <span class="mr-4">{{ $third_post->category->name }}</span>
              </a>
              <div class="mt-3">
                <span class="mr-4">{{ $third_post->price }} $</span>
                @if($third_post->offer > 0 )
                <del>{{ $third_post->offer }}</del>
                @else
                <del>No Offer</del>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Feature Product Area =================-->

  <!--================ Offer Area =================-->
  <section class="offer_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="offset-lg-4 col-lg-6 text-center">
          <div class="offer_content">
            <h3 class="text-uppercase mb-40">offer</h3>
            <h2 class="text-uppercase">50% off</h2>
            {{-- <a href="{{ route('allOffer') }}" class="main_btn mb-20 mt-5">Show Offers</a> --}}
            <a class="button3D" href="{{ route('allOffer') }}" style="left: 200px;">
              <span>Show Offers</span>
              <span></span>
              <span></span>
              <span>Show Offers</span>
            </a>
            <p style="margin-top: 130px;">Limited Time Offer</p>
            <p>this offer ends in 4/15/2019</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Offer Area =================-->

  <!--================ New Product Area =================-->
  <section class="new_product_area section_gap_top section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>new products</span></h2>
            <p>Bring out what you want</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="new_product">
            <a href="{{ route('category.show', ['id' => $four_post->category->id]) }}" class="d-block">
              <h5 class="text-uppercase">{{ $four_post->category->name }}</h5>
            </a>
            <h3 class="text-uppercase">{{ $four_post->title }}</h3>
            <div class="product-img">
              <img class="img-fluid" src="/upload/{{ $four_post->photo }}" alt="" />
            </div>
            @if($four_post->offer > 0 )
            <del>{{ $four_post->offer }}</del>
            @else
            <del>No Offer</del>
            @endif
            <h4>{{ $four_post->price }} $</h4>
            <a href="/homepage/{{ $four_post->id }}" class="main_btn">Show Product</a>
            <a href="{{ route('product.addToCart', ['id' => $four_post->id]) }}" class="main_btn">Add To Shopping Cart</a>
          </div>
        </div>

        <div class="col-lg-6 mt-5 mt-lg-0">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="img-fluid w-100" src="/upload/{{ $five_post->photo }}" alt="" />
                  <div class="p_icon">
                    <a href="/homepage/{{ $five_post->id }}">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="{{ route('product.addToCart', ['id' => $five_post->id]) }}">
                      <i class="ti-shopping-cart"></i>
                    </a>
                    @guest
                    <a href="{{ route('login') }}" class="icons">
                        <i class="ti-heart" aria-hidden="true"></i>
                    </a>
                    @else
                    @php
                        $like_count = 0;
                        $like_status = "btn-secondry";
                    @endphp
                    @foreach ($five_post->likes as $like)
                        @php
                            if ($like->like == 1) {
                                $like_count++;
                            }
                            if (Auth::check()) {
                                if ($like->like == 1 && $like->user_id == Auth::user()->id) {
                                    $like_status = "btn-success";
                                }
                            }
                        @endphp
                    @endforeach
                    <button type="button" data-productid="{{ $five_post->id }}_l" data-like="{{ $like_status }}"
                            class="ti-heart like btn {{ $like_status }}" style="">
                        <i aria-hidden="true"></i>
                    </button>
                    @endguest
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4>{{ $five_post->title }}</h4>
                  </a>
                  <a href="{{ route('category.show', ['id' => $five_post->category->id]) }}" class="d-block">
                    <h6 class="text-uppercase">{{ $five_post->category->name }}</h6>
                  </a>
                  <div class="mt-3">
                    <span class="mr-4">{{ $five_post->price }} $</span>
                    @if($five_post->offer > 0 )
                    <del>{{ $five_post->offer }}</del>
                    @else
                    <del>No Offer</del>
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="img-fluid w-100" src="/upload/{{ $sex_post->photo }}" alt="" />
                  <div class="p_icon">
                    <a href="/homepage/{{ $sex_post->id }}">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="{{ route('product.addToCart', ['id' => $sex_post->id]) }}">
                      <i class="ti-shopping-cart"></i>
                    </a>
                    @guest
                    <a href="{{ route('login') }}" class="icons">
                        <i class="ti-heart" aria-hidden="true"></i>
                    </a>
                    @else
                    @php
                        $like_count = 0;
                        $like_status = "btn-secondry";
                    @endphp
                    @foreach ($sex_post->likes as $like)
                        @php
                            if ($like->like == 1) {
                                $like_count++;
                            }
                            if (Auth::check()) {
                                if ($like->like == 1 && $like->user_id == Auth::user()->id) {
                                    $like_status = "btn-success";
                                }
                            }
                        @endphp
                    @endforeach
                    <button type="button" data-productid="{{ $sex_post->id }}_l" data-like="{{ $like_status }}"
                            class="ti-heart like btn {{ $like_status }}" style="">
                        <i aria-hidden="true"></i>
                    </button>
                    @endguest
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4>{{ $sex_post->title }}</h4>
                  </a>
                  <a href="{{ route('category.show', ['id' => $sex_post->category->id]) }}" class="d-block">
                    <h6>{{ $sex_post->category->name }}</h6>
                  </a>
                  <div class="mt-3">
                    <span class="mr-4">{{ $sex_post->price }} $</span>
                    @if($sex_post->offer > 0 )
                    <del>{{ $sex_post->offer }}</del>
                    @else
                    <del>No Offer</del>
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="img-fluid w-100" src="/upload/{{ $seven_post->photo }}" alt="" />
                  <div class="p_icon">
                    <a href="/homepage/{{ $seven_post->id }}">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="{{ route('product.addToCart', ['id' => $seven_post->id]) }}">
                      <i class="ti-shopping-cart"></i>
                    </a>
                    @guest
                    <a href="{{ route('login') }}" class="icons">
                        <i class="ti-heart" aria-hidden="true"></i>
                    </a>
                    @else
                    @php
                        $like_count = 0;

                        $like_status = "btn-secondry";
                    @endphp

                    @foreach ($seven_post->likes as $like)
                        @php
                            if ($like->like == 1) {
                                $like_count++;
                            }
                            if (Auth::check()) {
                                if ($like->like == 1 && $like->user_id == Auth::user()->id) {
                                    $like_status = "btn-success";
                                }
                            }
                        @endphp
                    @endforeach
                    <button type="button" data-productid="{{ $seven_post->id }}_l" data-like="{{ $like_status }}"
                            class="ti-heart like btn {{ $like_status }}" style="">
                        <i aria-hidden="true"></i>
                    </button>
                    @endguest
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4>{{ $seven_post->title }}</h4>
                  </a>
                  <a href="{{ route('category.show', ['id' => $seven_post->category->id]) }}" class="d-block">
                    <h6>{{ $seven_post->category->name }}</h6>
                  </a>
                  <div class="mt-3">
                    <span class="mr-4">{{ $seven_post->price }} $</span>
                    @if($seven_post->offer > 0 )
                    <del>{{ $seven_post->offer }}</del>
                    @else
                    <del>No Offer</del>
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="img-fluid w-100" src="/upload/{{ $eight_post->photo }}" alt="" />
                  <div class="p_icon">
                    <a href="/homepage/{{ $eight_post->id }}">
                      <i class="ti-eye"></i>
                    </a>
                    <a href="{{ route('product.addToCart', ['id' => $eight_post->id]) }}">
                      <i class="ti-shopping-cart"></i>
                    </a>
                    @guest
                    <a href="{{ route('login') }}" class="icons">
                        <i class="ti-heart" aria-hidden="true"></i>
                    </a>
                    @else
                    @php
                        $like_count = 0;
                        $like_status = "btn-secondry";
                    @endphp
                    @foreach ($eight_post->likes as $like)
                        @php
                            if ($like->like == 1) {
                                $like_count++;
                            }
                            if (Auth::check()) {
                                if ($like->like == 1 && $like->user_id == Auth::user()->id) {
                                    $like_status = "btn-success";
                                }

                            }

                        @endphp
                    @endforeach
                    <button type="button" data-productid="{{ $eight_post->id }}_l" data-like="{{ $like_status }}"
                            class="ti-heart like btn {{ $like_status }}" style="">
                        <i aria-hidden="true"></i>
                    </button>
                    @endguest
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4>{{ $eight_post->title }}</h4>
                  </a>
                  <a href="{{ route('category.show', ['id' => $eight_post->category->id]) }}" class="d-block">
                    <h6>{{ $eight_post->category->name }}</h6>
                  </a>
                  <div class="mt-3">
                    <span class="mr-4">{{ $eight_post->price }} $</span>
                    @if($eight_post->offer > 0 )
                    <del>{{ $eight_post->offer }}</del>
                    @else
                    <del>No Offer</del>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End New Product Area =================-->

  <!--================ Inspired Product Area =================-->
  <section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <a href="{{ route('category.show', ['id' => $category1->id]) }}"><h2><span>{{ $category1->name }}</span></h2></a>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">
       @foreach($category1->product()->orderBy('created_at', 'desc')->take(8)->get() as $product)
        <div class="col-lg-3 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="/upload/{{ $product->photo }}" alt="" />
              <div class="p_icon">
                <a href="/homepage/{{ $product->id }}">
                  <i class="ti-eye"></i>
                </a>
                <a href="{{ route('product.addToCart', ['id' => $product->id]) }}">
                  <i class="ti-shopping-cart"></i>
                </a>
                @guest
                <a href="{{ route('login') }}" class="icons">
                    <i class="ti-heart" aria-hidden="true"></i>
                </a>
                @else
                @php
                    $like_count = 0;
                    $like_status = "btn-secondry";
                @endphp
                @foreach ($product->likes as $like)
                    @php
                        if ($like->like == 1) {
                            $like_count++;
                        }
                        if (Auth::check()) {

                            if ($like->like == 1 && $like->user_id == Auth::user()->id) {
                                $like_status = "btn-success";
                            }
                        }
                    @endphp
                @endforeach
                <button type="button" data-productid="{{ $product->id }}_l" data-like="{{ $like_status }}"
                        class="ti-heart like btn {{ $like_status }}" style="">
                    <i aria-hidden="true"></i>
                </button>
                @endguest
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
              </a>
              <div class="mt-3">
              </div>
            </div>
          </div>
        </div>
        @endforeach
        </div>

      </div>
    </div>
  </section>
  <!--================ End Inspired Product Area =================-->

  <!--================ Inspired Product Area 2 =================-->
  <section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <a href="{{ route('category.show', ['id' => $category2->id]) }}"><h2><span>{{ $category2->name }}</span></h2></a>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">
       @foreach($category2->product()->orderBy('created_at', 'desc')->take(8)->get() as $product2)
        <div class="col-lg-3 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="/upload/{{ $product2->photo }}" alt="" />
              <div class="p_icon">
                <a href="/homepage/{{ $product2->id }}">
                  <i class="ti-eye"></i>
                </a>
                <a href="{{ route('product.addToCart', ['id' => $product2->id]) }}">
                  <i class="ti-shopping-cart"></i>
                </a>
                @guest
                <a href="{{ route('login') }}" class="icons">
                    <i class="ti-heart" aria-hidden="true"></i>
                </a>
                @else
                @php
                    $like_count = 0;
                    $like_status = "btn-secondry";
                @endphp
                @foreach ($product2->likes as $like)
                    @php
                        if ($like->like == 1) {
                            $like_count++;
                        }
                        if (Auth::check()) {
                            if ($like->like == 1 && $like->user_id == Auth::user()->id) {
                                $like_status = "btn-success";
                            }
                        }
                    @endphp
                @endforeach
                <button type="button" data-productid="{{ $product2->id }}_l" data-like="{{ $like_status }}"
                        class="ti-heart like btn {{ $like_status }}" style="">
                    <i aria-hidden="true"></i>
                </button>
                @endguest
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
              </a>
              <div class="mt-3">
              </div>
            </div>
          </div>
        </div>
        @endforeach
        </div>

      </div>
    </div>
  </section>
  <!--================ End Inspired Product Area 2 =================-->


  <!--================ Inspired Product Area 3 =================-->
  <section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <a href="{{ route('category.show', ['id' => $category3->id]) }}"><h2><span>{{ $category3->name }}</span></h2></a>
            <p>Bring called seed first of third give itself now ment</p>
          </div>
        </div>
      </div>

      <div class="row">
       @foreach($category3->product()->orderBy('created_at', 'desc')->take(8)->get() as $product3)
        <div class="col-lg-3 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img class="img-fluid w-100" src="/upload/{{ $product3->photo }}" alt="" />
              <div class="p_icon">
                <a href="/homepage/{{ $product3->id }}">
                  <i class="ti-eye"></i>
                </a>
                <a href="{{ route('product.addToCart', ['id' => $product3->id]) }}">
                  <i class="ti-shopping-cart"></i>
                </a>
                @guest
                <a href="{{ route('login') }}" class="icons">
                    <i class="ti-heart" aria-hidden="true"></i>
                </a>
                @else
                @php
                    $like_count = 0;
                    $like_status = "btn-secondry";
                @endphp
                @foreach ($product3->likes as $like)
                    @php
                        if ($like->like == 1) {
                            $like_count++;
                        }
                        if (Auth::check()) {
                            if ($like->like == 1 && $like->user_id == Auth::user()->id) {
                                $like_status = "btn-success";
                            }
                        }
                    @endphp
                @endforeach
                <button type="button" data-productid="{{ $product3->id }}_l" data-like="{{ $like_status }}"
                        class="ti-heart like btn {{ $like_status }}" style="">
                    <i aria-hidden="true"></i>
                </button>
                @endguest
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
              </a>
              <div class="mt-3">
              </div>
            </div>
          </div>
        </div>
        @endforeach
        </div>

      </div>
    </div>
  </section>
  <!--================ End Inspired Product Area 3 =================-->


@include('include.footer')