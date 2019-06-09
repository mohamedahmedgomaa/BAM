@include('include.header')

  <section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Search results : {{ $query }}</span></h2>
          </div>
        </div>
      </div>
      <div class="row">
        @if($products->count() > 0) {{--  --}}
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6">
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
                        <h4>Title: {{ $product->title }}</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">{{ $product->price }} $</span>
                        <del>200.00 $</del>
                      </div>
                    </div>
                  </div>
                </div>
                
            @endforeach
        @else
            <h2 class="alert alert-danger">
                No Results Found !!
            </h2>
        @endif
        
        </div>
    </div>
</section>

@include('include.footer')