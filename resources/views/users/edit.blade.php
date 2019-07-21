@extends('home')
@section('content')

  <!--================Home Banner Area =================-->
  <section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content row">
          <div class="col-lg-8">
            <form style="color: #fff" action="{{ route('profile.update',['id'=>$users->id]) }}" method="POST">
                        {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $users->name }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-8">
                        <input type="email" name="email" class="form-control" id="email" value="{{ $users->email }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-8">
                        <input type="text" name="password" class="form-control" id="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                    <label for="mobile" class="col-md-4 control-label">mobile</label>

                    <div class="col-md-8">
                        <input id="mobile" type="text" class="form-control" name="mobile" value="{{ $users->mobile }}" required autofocus>

                        @if ($errors->has('mobile'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-md-4 control-label">address</label>

                    <div class="col-md-8">
                        <input id="address" type="text" class="form-control" name="address" value="{{ $users->address }}" required autofocus>

                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="buttonstyle" style="margin-top: 50px;margin-left: 80px;">
                            Update
                        </button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

@endsection
{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Page</div>    
                <div class="panel-body">
                    <form action="{{ route('profile.update',['id'=>$users->id]) }}" method="POST">
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
 --}}