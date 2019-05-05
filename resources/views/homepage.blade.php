@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                           aria-haspopup="true" v-pre style="position: relative;padding-left: 50px;">
                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}"
                                 style="width: 32px;height: 32px; position: absolute; top: 0px;;left: 0px;border-radius: 50%;"></a>
                        {{ auth()->user()->name }}

                        @if (auth()->user()->hasRole('admin_shop'))

                            <form class="" action="/homepage/store" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <br>
                                <div class="form-group">
                                    <label for="department">Category</label>
                                    <select class="form-control" name="category_id" id="department">
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                           placeholder="Tilte Post">
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" id="content" class="form-control"
                                              placeholder="Content Post"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" class="form-control" id="price"
                                           placeholder="Input Price by $">
                                </div>
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" class="form-control" id="photo">
                                </div>

                                <button type="submit" class="btn btn-info">Add Product</button>
                            </form>

                        @endif

                        <div>
                            @foreach ($errors->all() as $error)
                                <span class="help-block">
                                        <strong>{{ $error }}</strong>
                                    </span>
                            @endforeach
                        </div>
                        <hr>

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
