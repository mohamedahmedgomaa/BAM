@extends('admin.index')
@section('content')


<div class="box">
    <div class="box-header">
      <h3 class="box-title">{{ $title }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    		{!! Form::open(['url'=>aurl('messages/'.$message->id), 'method'=>'put']) !!} 
          <div class="form-group">
            {!! Form::label('text', trans('admin.text')) !!}
            {!! Form::textarea('text', $message->text, ['class'=>'form-control', 'required' => 'required']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('from', trans('admin.from')) !!}
            {!! Form::select('from', App\User::pluck('name', 'id') , $message->from, ['class'=>'form-control', 'placeholder' => '..............', 'required' => 'required']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('to', trans('admin.to')) !!}
            {!! Form::select('to', App\User::pluck('name', 'id') , $message->to, ['class'=>'form-control', 'placeholder' => '..............', 'required' => 'required']) !!}       
          </div>

          {!! Form::submit(trans('admin.save'), ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.box-body -->
  </div>





@endsection