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
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="#" class="d-block">
                                    <h4>Title: {{ $products->title }}</h4>
                                </a>
                                <div class="mt-3">
                                    <span class="mr-4">{{ $products->price }} $</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>
                    <a href="#">No Found Product In Category -> !! {{ $category->name }} !!</a>
                </h2>
            @endif
        </div>
        <hr>
        <br>
        @if($prev)
            <a href="{{ route('category.show', ['id' => $prev->id]) }}">
                <button type="button" class="btn btn-warning"><span class="fas fa-chevron-left"></span> Prev
                    => {{ $prev->name }} </button>
            </a>
        @endif
        <a href="/homepage">
            <button type="button" class="btn btn-success">Back HomePage</button>
        </a>

        @if($next)
            <a href="{{ route('category.show', ['id' => $next->id]) }}">
                <button type="button" class="btn btn-danger">Next => {{ $next->name }} <span
                            class="fas fa-chevron-right"></span></button>
            </a>
        @endif
    </div>
</section>
<!--================ End Feature Product Area =================-->


<br><br>
@include('include.footer')
