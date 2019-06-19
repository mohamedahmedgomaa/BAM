@extends('home')
@section('content')

<div style="height: 1500px;overflow: hidden">
<div class="col-lg-12">         
 <div class="single-product">
    <div class="product-img" style="">
        @if($product->photo)
            <img class="img-fluid w-40" src="../upload/{{ $product->photo }}" style="margin-top: 50px;margin-left: -900px;" alt="" />
        @endif
      {{-- <div class="p_icon">
        <a href="#">
          <i class="ti-eye"></i>
        </a>
        <a href="#">
          <i class="ti-heart"></i>
        </a>
        <a href="#">
          <i class="ti-shopping-cart"></i>
        </a>
      </div> --}}
    </div>
    <div class="col-lg-10" style="position: absolute;top: 50px;left: 670px;">
        
        <img src="/uploads/avatars/{{ $product->user->avatar }}" style="width: 100px;height: 100px;
                border-radius: 50%;position: absolute;left: 7px;top: -50px;" alt="">
      
      <a href="/profile/{{ $product->user->id }}" class="d-block" style="position: absolute;left: 130px;top: -15px;">
        <h2 style="color: #71cd41;">{{ $product->user->name }}</h2>
      </a>
       @guest
                    
        @else
        @if(auth()->user()->hasRole('admin_shop') && $product->user_id == auth()->id())
        <a href="/homepage/delete/{{ $product->id }}" style="position: absolute;top: -10px;left: 470px;">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </a>

        <a href="/homepage/edit/{{ $product->id }}" class="btn btn-info"  style="position: absolute;top: -10px;left: 420px;">
            <i class="fa fa-edit"></i>
        </a>
        @endif
        @endguest

      <div class="product" style="position: absolute;top: 76px;left: 20px;text-align: left">
            <div class="" style="margin-bottom: 20px;margin-top: 30px">
                <span style="font-size: 100px;color: #ffbf00;margin-left: 70px" class="mr-4">$ {{ $product->price }}</span>
                @if($product->offer > 0 )
                    <del  style="font-size: 32px" >{{ $product->offer }}</del>
                @else
                    <del style="font-size: 24px">No Offer</del>
                @endif 
            </div>
            <h1 style="color: #000;"><span style="font-size: 64px;"> {{ $product->title }}</span></h1>
            
            <p style="margin-bottom: 50px;margin-top: 40px">{{ $product->content }}</p>
            

            {{-- <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" style="padding: 10px 10px" class="btn btn-warning">
                <i class="fa fa-shopping-cart"></i> Shopping Cart
            </a> --}}
            <div style="margin-bottom: 50px">
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
             @endforeach{{--  border: #71cd41 solid 3px; --}}
            <button type="button" style="margin-top: 1px;border-radius: 0;padding-left: 40px;padding-right: 40px;border-radius: 0;border: #000 " data-productid="{{ $product->id }}_l" data-like="{{ $like_status }}" class="like btn {{ $like_status }}">
                      <i class="fa fa-thumbs-up"></i> 
                <b>
                    <span class="like_count">{{ $like_count }}</span>
                </b>
            </button>
            <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" style="padding: 10px 10px;margin-left: 250px;" class="btn btn-warning">
                 Shopping Cart<i class="fa fa-shopping-cart"></i>
            </a>
            </div>
      </div>
    </div>    
  </div>

  <div class="buttonstyles" style="margin-top: 200px;margin-left: 200px;width: 1000px">
        @if($prev)
            <a class="link1" href="/homepage/{{ $prev->id }}">Prev: {{ $prev->title }} </a>
        @endif
        <a class="link2" href="/">Home</a>
        @if($next)
            <a class="link3" href="/homepage/{{ $next->id }}">Next: {{ $next->title }} </a>
        @endif
    </div>
</div>

      <hr style="margin-top: 100px;">
<div class="container" style="overflow: hidden;margin-bottom: 500px;margin-top: 50px">
    <div class="row">
    <div class="col-md-12">

        <form action="/homepage/{{ $product->id }}/store" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="comment">Write Something ...</label>
                <textarea name="comment" id="comment" class="form-control"></textarea>
              </div>
              @if ($errors->has('comment'))
                    <span class="help-block">
                        <strong>{{ $errors->first('comment') }}</strong>
                    </span>
                @endif
          
            <button type="submit" class="btn btn-info">Add Comment</button>
        </form>
        <hr>
        <h4>Comments :</h4>
        <div class="comments" style="height: 460px;overflow: scroll;">
            @foreach ($product->comments as $comment)
            <div style="border: 3px solid #000; margin-bottom: 5px;display: flex;">
                    <img src="/uploads/avatars/{{ $comment->user->avatar }}" style="width: 64px;height: 64px;left: 0px;border-radius: 0%;">
                <p class="comment" style="padding: 10px">
                    @guest
                    
                    @else
                    @if($comment->user_id == auth()->id())
                    <a href="/comment/delete/{{ $comment->id }}" style="">
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </a>

                   {{--  <a href="/comment/edit/{{ $comment->id }}" class="btn btn-info"  style="">
                        <i class="fa fa-edit"></i>
                    </a> --}}
                    @endif
                    @endguest
                    <span style="font-size: 24px; color: #71cd14">{{ $comment->user->name }}:</span>
                    <span style="">{{ $comment->comment }}</span>
                </p>
            </div>
            @endforeach
        </div>
    </div>
         {{-- @include('include.disqus') --}}
    </div>
</div>

</div>

@endsection