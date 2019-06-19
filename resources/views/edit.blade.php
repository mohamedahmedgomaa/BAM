@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Page</div>
                    <div class="panel-body">

                        {!! Form::open(['url'=>aurl('products/'.$products->id), 'method'=>'put', 'files'=>true]) !!}
                        <div class="form-group">
                            {!! Form::label('title', trans('admin.title')) !!}
                            {!! Form::text('title', $products->title, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', trans('admin.content')) !!}
                            {!! Form::textarea('content', $products->content, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('photo', trans('admin.photo')) !!}
                            {!! Form::file('photo', ['class'=>'form-control']) !!}
                            @if(!empty($products->photo))
                                <img src="/upload/{{ $products->photo }}" style="width:50px;height: 50px;">
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('price', trans('admin.price')) !!}
                            {!! Form::text('price', $products->price, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('offer', trans('admin.offer')) !!}
                            {!! Form::text('offer', $products->offer, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('department_id', trans('admin.department_id')) !!}
                            {!! Form::select('department_id', App\Departments::pluck('name', 'id') , $products->department_id, ['class'=>'form-control', 'placeholder' => '..............']) !!}
                        </div>

                        {!! Form::submit(trans('admin.save'), ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
