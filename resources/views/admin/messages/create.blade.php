@extends('admin.index')
@section('content')


<div class="box">
    <div class="box-header">
      <h3 class="box-title">{{ $title }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    		{!! Form::open(['url'=>aurl('messages')]) !!}
          
          <div class="form-group">
            {!! Form::label('text', trans('admin.text')) !!}
            {!! Form::textarea('text', old('text'), ['class'=>'form-control']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('from', trans('admin.from')) !!}
            {!! Form::select('from',App\User::pluck('name', 'id') , old('from'), ['class'=>'form-control', 'placeholder' => '..............']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('to', trans('admin.to')) !!}
            {!! Form::select('to',App\User::pluck('name', 'id') , old('to'), ['class'=>'form-control', 'placeholder' => '..............']) !!}       
          </div>
          
          {!! Form::submit(trans('admin.add'), ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.box-body -->
  </div>





@endsection