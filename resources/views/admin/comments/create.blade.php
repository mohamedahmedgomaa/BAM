@extends('admin.index')
@section('content')


<div class="box">
    <div class="box-header">
      <h3 class="box-title">{{ $title }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    		{!! Form::open(['url'=>aurl('comments')]) !!}
          
          <div class="form-group">
            {!! Form::label('comment', trans('admin.comment')) !!}
            {!! Form::textarea('comment', old('comment'), ['class'=>'form-control']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('user_id', trans('admin.user_id')) !!}
            {!! Form::select('user_id',App\User::pluck('name', 'id') , old('user_id'), ['class'=>'form-control', 'placeholder' => '..............']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('product_id', trans('admin.product_id')) !!}
            {!! Form::select('product_id',App\Model\Product::pluck('title', 'id') , old('product_id'), ['class'=>'form-control', 'placeholder' => '..............']) !!}       
          </div>
          
          {!! Form::submit(trans('admin.add'), ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.box-body -->
  </div>





@endsection