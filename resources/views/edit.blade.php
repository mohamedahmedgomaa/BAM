@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Page</div>    
                <div class="panel-body">
                    <form class="" action="/homepage/update/{{ $products->id }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <br>
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $products->title }}">
                      </div>
                      <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" class="form-control">
                            {{ $products->content }}
                        </textarea>
                      </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="price" value="{{ $products->price }}">
                      </div>
                      <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" class="form-control" id="photo">    
                      </div>
                      
                      <button type="submit" class="btn btn-info">Update Product</button>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>
@endsection
