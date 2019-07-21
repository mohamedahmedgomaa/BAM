@extends('home')
@section('content')
<style type="text/css">
    .nice-select {
        width: 100%;
        line-height: 30px;
    }
    .list {
        width: 100%;
    }

</style>

    <!--================Home Banner Area =================-->
    <section class="home_banner_area mb-40">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-5">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach
                        <br>
                        @if (auth()->user()->hasRole('admin_shop'))
                            <form style="color: #fff;" class="form-horizontal" method="POST"
                                  action="{{ route('post.update',['id'=>$products->id]) }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="department">Category</label>
                                    <select class="form-control" name="category_id" id="department">
                                        @foreach($departments as $department)
                                            <option  value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br><br>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" required="required" value="{{$products->title}}" class="form-control" id="title"
                                       placeholder="Tilte Post">
                            </div>
                            <div class="form-group">
                                <label for="content">Description</label>
                                <textarea class="form-control" name="content" id="content" rows="8" cols="8">{{$products->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" required="required" value="{{$products->price}}" class="form-control" id="price"
                                       placeholder="Input Price by $">
                            </div>
                            <div class="form-group">
                                <label for="offer">Offer</label>
                                <input type="text" name="offer" class="form-control" value="{{$products->offer}}" id="offer"
                                       placeholder="Input Price by $">
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo" class="form-control" id="photo">
                            </div>
                            @if(!empty($products->photo))
                                <img src="/upload/{{ $products->photo }}" style="width:50px;height: 50px;">
                            @endif
                            <br><br>
                                <button type="submit" style="margin-top: 10px; margin-left: 100px" class="button3D">
                                    <span>Update</span>
                                    <span></span>
                                    <span></span>
                                    <span>Update</span>
                                </button>
                            </form>
                        @endif
                        <br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->


@endsection

