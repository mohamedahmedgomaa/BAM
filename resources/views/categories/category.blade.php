@include('include.header')
<br><br>

<!--================ Feature Product Area =================-->
<br><br>
<section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>Category - {{ $category->name }}</span></h2>
                    <p>Bring to you the highest three products on sales</p>
                    <p>{{ $category->created_at->toFormattedDateString() }}</p>
                </div>
            </div>
        </div>
        <div class="row">

            @if($category->product->count() > 0)
                @foreach($category->product as $products)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                <img class="img-fluid w-100" src="/upload/{{ $products->photo }}" alt=""/>
                                <div class="p_icon">
                                    <a href="/homepage/{{ $products->id }}">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="{{ route('product.addToCart', ['id' => $products->id]) }}">
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

                                    @foreach ($products->likes as $like)
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
                                    <button type="button" data-productid="{{ $products->id }}_l" data-like="{{ $like_status }}"
                                            class="ti-heart like btn {{ $like_status }}" style="">
                                        <i aria-hidden="true"></i>
                                    </button>
                                    @endguest
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="#" class="d-block">
                                    <h4>Title: {{ $products->title }}</h4>
                                </a>
                                <div class="mt-3">
                                    <span class="mr-4">{{ $products->price }} $</span>
                                    @if($products->offer > 0 )
                                    <del>{{ $products->offer }}</del>
                                    @else
                                    <del>No Offer</del>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2 class="alert alert-danger">
                    No Found Product In Category -> !! {{ $category->name }} !!
                </h2>
            @endif
        </div>
        <hr>
        <br>
        
        {{-- @if($prev)
            <a href="{{ route('category.show', ['id' => $prev->id]) }}">
                <button type="button" class="btn btn-danger"><span class="fa fa-chevron-left"></span> Prev
                    => {{ $prev->name }} </button>
            </a>
        @endif
        <a href="/homepage">
            <button type="button" class="btn btn-info">Back HomePage</button>
        </a>

        @if($next)
            <a href="{{ route('category.show', ['id' => $next->id]) }}">
                <button type="button" class="btn btn-danger">Next => {{ $next->name }} <span
                            class="fa fa-chevron-right"></span></button>
            </a>
        @endif --}}
    </div>
    <div class="buttonstyles">
        @if($prev)
            <a class="link1" href="{{ route('category.show', ['id' => $prev->id]) }}">Prev: {{ $prev->name }} </a>
        @endif
        <a class="link2" href="/">Home</a>
        @if($next)
            <a class="link3" href="{{ route('category.show', ['id' => $next->id]) }}">Next: {{ $next->name }} </a>
        @endif
    </div>
</section>
<!--================ End Feature Product Area =================-->


<br><br>
@include('include.footer')
