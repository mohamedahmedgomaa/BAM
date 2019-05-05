@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Page</div>    
                <div class="panel-body">
                    <form action="/profile/update/{{ $users->id }}" method="POST">
                        {{ csrf_field() }}
                    <br>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $users->name }}">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $users->email }}">
                      </div>
                      <div class="form-group">
                        <label for="password">password</label>
                        <input type="text" name="password" class="form-control" id="password">
                      </div>
                      <div class="form-group">
                        <label for="mobile">mobile</label>
                        <input type="text" name="mobile" class="form-control" id="mobile" value="{{ $users->mobile }}">
                      </div>
                      <div class="form-group">
                        <label for="address">address</label>
                        <input type="text" name="address" class="form-control" id="address" value="{{ $users->address }}">
                      </div>
                     
                      
                      <button type="submit" class="btn btn-info">Update Product</button>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>
@endsection
