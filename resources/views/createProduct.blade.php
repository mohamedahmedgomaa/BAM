@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard - 
                    	<a class="btn btn-danger" href="/homepage">back</a>
                    </div>

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

						    @foreach ($errors->all() as $error)
						<div class="alert alert-danger">						        
						    <strong>{{ $error }}</strong>
						</div>
						    @endforeach
						<hr>

						@if (auth()->user()->hasRole('admin_shop'))

						    <form action="/homepage/store" method="POST" enctype="multipart/form-data">
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
						            <input type="text" name="title" required="required" class="form-control" id="title"
						                   placeholder="Tilte Post">
						        </div>
						        <div class="form-group">
						            <label for="content">Content</label>
						            <textarea name="content" required="required" id="content" class="form-control"
						                      placeholder="Content Post"></textarea>
						        </div>
						        <div class="form-group">
						            <label for="price">Price</label>
						            <input type="text" name="price" required="required" class="form-control" id="price"
						                   placeholder="Input Price by $">
						        </div>
						        <div class="form-group">
						            <label for="photo">Photo</label>
						            <input type="file" name="photo" required="required" class="form-control" id="photo">
						        </div>

						        <button type="submit" class="btn btn-info">Add Product</button>
						    </form>

						@endif

						
					</div>
                </div>
            </div>
        </div>
    </div>
@endsection
