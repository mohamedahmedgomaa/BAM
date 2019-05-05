@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">                  

                  
                    <form class="" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <br>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Tilte Post">
                      </div>
                      
                      <button type="submit" class="btn btn-info">Save</button>
                    </form>
                    
        
                    
                    <div>
                        @foreach ($errors->all() as $error)
                                    <span class="help-block">
                                        <strong>{{ $error }}</strong>
                                    </span>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
