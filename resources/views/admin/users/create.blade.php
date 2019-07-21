@extends('admin.index')
@section('content')


<div class="box">
    <div class="box-header">
      <h3 class="box-title">{{ $title }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    		{!! Form::open(['url'=>aurl('users')]) !!} {{--  {!! Form::open(['route'=>'users.store']) !!} --}}
          <div class="form-group">
            {!! Form::label('name', trans('admin.name')) !!}
            {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('email', trans('admin.email')) !!}
            {!! Form::email('email', old('email'), ['class'=>'form-control']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('password', trans('admin.password')) !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('mobile', trans('admin.mobile')) !!}
            {!! Form::text('mobile', old('mobile'), ['class'=>'form-control']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('address', trans('admin.address')) !!}
            {!! Form::text('address', old('address'), ['class'=>'form-control']) !!}       
          </div>
          {{-- <div class="form-group">
            {!! Form::label('level', trans('admin.level')) !!}
            {!! Form::select('level',['user'=>trans('admin.user'), 'admin_shop'=>trans('admin.admin_shop')], old('level'), ['class'=>'form-control','placeholder'=>'.............']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('type', trans('admin.type')) !!}
            {!! Form::select('type',['clothes_for_men'=>trans('admin.clothes_for_men'), 'womens_clothing'=>trans('admin.womens_clothing'), 'children_clothes'=>trans('admin.children_clothes')], old('type'), ['class'=>'form-control','placeholder'=>'.............']) !!}       
          </div> --}}
          {!! Form::submit(trans('admin.add'), ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.box-body -->
  </div>





@endsection