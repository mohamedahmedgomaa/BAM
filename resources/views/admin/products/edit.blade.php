@extends('admin.index')
@section('content')


<div class="box">
    <div class="box-header">
      <h3 class="box-title">{{ $title }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    		{!! Form::open(['url'=>aurl('products/'.$product->id), 'method'=>'put', 'files'=>true]) !!} 
          <div class="form-group">
            {!! Form::label('title', trans('admin.title')) !!}
            {!! Form::text('title', $product->title, ['class'=>'form-control']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('content', trans('admin.content')) !!}
            {!! Form::textarea('content', $product->content, ['class'=>'form-control']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('photo', trans('admin.photo')) !!}
            {!! Form::file('photo', ['class'=>'form-control']) !!}       
            @if(!empty($product->photo))
              <img src="{{ Storage::url($product->photo) }}" style="width:50px;height: 50px;">
            @endif
          </div>
          <div class="form-group">
            {!! Form::label('size', trans('admin.size')) !!}
            {!! Form::text('size', $product->size, ['class'=>'form-control']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('price', trans('admin.price')) !!}
            {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('weight', trans('admin.weight')) !!}
            {!! Form::text('weight', $product->weight, ['class'=>'form-control']) !!}       
          </div>

          <div class="form-group">
            {!! Form::label('color', trans('admin.color')) !!}
            {!! Form::color('color', $product->color, ['class'=>'form-control']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('user_id', trans('admin.user_id')) !!}
            {!! Form::select('user_id', App\User::pluck('name', 'id') , $product->user_id, ['class'=>'form-control', 'placeholder' => '..............']) !!}       
          </div>

          {!! Form::submit(trans('admin.save'), ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.box-body -->
  </div>





@endsection