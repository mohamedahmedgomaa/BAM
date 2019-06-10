@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                
                <img src="/uploads/avatars/{{ $user->avatar }}"
                     style="width: 150px;height: 150px;float: left;border-radius: 50%;margin-right: 25px;" alt="error">
                <h2>{{ $user->name.' Profile' }}</h2>
                
                @if($user->id == auth()->id())
                        <form enctype="multipart/form-data" action="/profile/{{ $user->id }}" method="POST">
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="Save" class="pull-right btn btn-sm btn-primary">
                        </form>

                    </div>


                    <a href="/profile/edit/{{ $user->id }}" class="btn btn-info">
                        <i class="fa fa-edit"> Edit User {{ $user->name }}</i>
                    </a>
                    {{-- @foreach($orders as $order)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <ul class="list-group">
                                    @foreach($order->cart->items as $item)
                                    <li class="list-group-item">
                                        <span class="badge">{{ $item['price'] }} $</span>
                                        {{ $item['item']['title'] }} | {{ $item['qty'] }} Units
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <strong>Total Price: {{ $order->cart->totalPrice }} $</strong>
                            </div>
                        </div>
                    @endforeach --}}
                @endif
                @if(auth()->id() != $user->id)
                <a href="{{ route('profile.send.message',['id'=>$user->id]) }}" class="btn btn-info">
                    <i class="fa fa-edit"> Send Message {{ $user->name }}</i>
                </a>
                @endif

        </div>
        <div>
            @foreach ($product as $products)
                <h2>
                    <a href="/homepage/{{ $products->id }}">{{ $products->title }}</a>
                </h2>

                <P><span class="fa fa-stopwatch"></span>
                    Producted on {{ $products->created_at->diffForHumans() }} {{-- ->toDayDateTimeString() --}}
                </P>
                <p>{{ $products->user->name }}</p>
                <p>
                    <img src="/uploads/avatars/{{ $products->user->avatar }}" style="width: 32px;height: 32px;left: 0px;border-radius: 50%;">
                </p>
                <a href="{{ route('product.addToCart', ['id' => $products->id]) }}">
                            <i class="fas fa-shopping-cart"></i> Shopping Cart
                        </a>
                <p>{{ $products->content }}</p>
                @if($products->photo)
                    <p><img src="../upload/{{ $products->photo }}" style="width: 150px;height: 150px;"></p>
                @endif
                <p>{{ $products->price }}</p>

                <a class="btn btn-info" href="/homepage/{{ $products->id }}">Read More <span
                            class="fas fa-chevron-right"></span></a>
                @php
                            $like_count = 0;
                            $dislike_count = 0;

                            $like_status = "btn-secondry";
                            $dislike_status = "btn-secondry";
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
                <button type="button" data-productid="{{ $products->id }}_l" data-like="{{ $like_status }}" class="like btn {{ $like_status }}">
                          <i class="fas fa-thumbs-up"></i> 
                    <b>
                        <span class="like_count">{{ $like_count }}</span>
                    </b>
                </button>
                <hr> 
            @endforeach
        </div>
    </div>
@endsection
