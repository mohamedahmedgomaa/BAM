@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard
                    @if (auth()->user()->hasRole('admin_shop'))
                        - <a class="btn btn-success" href="createProduct">Create Product</a>
                    @endif
                    </div>

                    <div class="panel-body">
                        

                        @foreach($topTenProductByLikes as $product)
                            <h2>
                                <a href="/homepage/{{ $product->id }}">{{ $product->title }}</a>
                            </h2>

                            <P><span class="fa fa-stopwatch"></span>
                                Produced on {{ $product->created_at->toDayDateTimeString() }}
                            </P>
                            <p><a href="profile/{{ $product->user->id }}">{{ $product->user->name }}</a></p>
                            <a href="{{ route('product.addToCart', ['id' => $product->id]) }}">
                                <i class="fas fa-shopping-cart"></i> Shopping Cart
                            </a>
                            <p>
                                <img src="/uploads/avatars/{{ $product->user->avatar }}"
                                     style="width: 32px;height: 32px;left: 0px;border-radius: 50%;">
                            </p>
                            <p>{{ $product->content }}</p>
                            @if($product->photo)
                                <p><img src="upload/{{ $product->photo }}" style="width: 150px;height: 150px;"></p>
                            @endif
                            <p>{{ $product->price }}</p>
                            <a class="btn btn-info" href="/homepage/{{ $product->id }}">Read More <span
                                        class="fas fa-chevron-right"></span></a>

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
                                    class="like btn {{ $like_status }}">
                                <i class="fas fa-thumbs-up"></i>
                                <b>
                                    <span class="like_count">{{ $like_count }}</span>
                                </b>
                            </button>
                            <hr>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
