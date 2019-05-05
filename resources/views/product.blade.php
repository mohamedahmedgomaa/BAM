@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Product Page - {{ $product->title }}  
                    @guest
                    
                    @else
                    @if(auth()->user()->hasRole('admin_shop') && $product->user_id == auth()->id())
                    -
                    <a href="/homepage/delete/{{ $product->id }}">
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </a>

                    <a href="/homepage/edit/{{ $product->id }}" class="btn btn-info">
                        <i class="fa fa-edit"></i>
                    </a>
                    @endif
                    @endguest
                </div>
                    
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <h2>
                            <a href="{{url('homepage')}}">{{ $product->title }}</a>
                        </h2>
                        <h4>Category : 
                            <a href="{{ route('category.show', ['id' => $product->category->id]) }}">
                                {{ $product->category->name }}
                            </a>
                        </h4>
                        <p>Name : <a href="/profile/{{ $product->user->id }}">{{ $product->user->name }}</a></p>
                        <p>
                            <img alt="image avatar" src="/uploads/avatars/{{ $product->user->avatar }}" style="width: 32px;height: 32px;left: 0px;border-radius: 50%;">
                        </p>
                        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}">
                            <i class="fas fa-shopping-cart"></i> Shopping Cart
                        </a>
                        @if($product->photo)
                            <p><img alt="Photo" src="../upload/{{ $product->photo }}" style="width: 150px;height: 150px;"></p>
                        @endif
                        <p>{{ $product->price }} $</p> 
                        <p>{{ $product->content }}</p>
                        @php
                            $like_count = 0;
                            $dislike_count = 0;

                            $like_status = "btn-secondry";
                            $dislike_status = "btn-secondry";
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
                        <button type="button" data-productid="{{ $product->id }}_l" data-like="{{ $like_status }}" class="like btn {{ $like_status }}">
                                  <i class="fas fa-thumbs-up"></i> 
                            <b>
                                <span class="like_count">{{ $like_count }}</span>
                            </b>
                        </button>
                        <hr>
                        @if($prev)
                        <a href="/homepage/{{ $prev->id }}"><button type="button" class="btn btn-warning"><span class="fas fa-chevron-left"></span> Prev => {{ $prev->title }} </button></a>
                        @endif
                        <a href="/homepage"><button type="button" class="btn btn-success">Back HomePage</button></a>

                        @if($next)
                        <a href="/homepage/{{ $next->id }}"><button type="button" class="btn btn-danger">Next => {{ $next->title }} <span class="fas fa-chevron-right"></span>  </button></a>
                        @endif<hr>

                        <form action="/homepage/{{ $product->id }}/store" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            {{-- <div class="form-group">
                                <label for="comment">Write Something ...</label>
                                <textarea name="comment" id="comment" class="form-control"></textarea>
                            </div> --}}
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
                        <div class="comments">
                            @foreach ($product->comments as $comment)
                                <p class="comment">
                                    <img src="/uploads/avatars/{{ $comment->user->avatar }}" style="width: 32px;height: 32px;left: 0px;border-radius: 50%;">
                                    {{ $comment->user->name }} -- 
                                    {{ $comment->comment }}
                                    
                                </p>
                            @endforeach
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
