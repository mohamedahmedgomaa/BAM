@extends('home')
@section('content')
<div class="container">
	<div class="row">
			@if($allProducts->count() > 0)
		    @foreach($allProducts as $product)
                <div class="col-lg-4 col-md-6">
                    <div class="single-product">
                        <div class="product-img">
                            <img class="img-fluid w-100" src="/upload/{{ $product->photo }}" alt=""/>
                            <div class="p_icon">
                                <a href="/homepage/{{ $product->id }}">
                                    <i class="ti-eye"></i>
                                </a>
                                <a href="{{ route('product.addToCart', ['id' => $product->id]) }}">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-btm">
                            <a href="#" class="d-block">
                                <h4>Title: {{ $product->title }}</h4>
                            </a>
                            <div class="mt-3">
                                <span class="mr-4">{{ $product->price }} $</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
		@else
		    <h2 class="alert alert-danger">
		        <a style="color: #f54940" href="{{url('login')}}">No Found Product In Products !!</a>
		    </h2>
		@endif
	</div>
</div>

@endsection