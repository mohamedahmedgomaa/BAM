@extends('home')
@section('content')
    <div class="container">

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <span class="help-block">
                    <strong>{{ $error }}</strong>
                </span>
            </div>
        @endforeach

        <form class="" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <br>
            <div class="form-group">
                <h3 style="color: #71cd14" for="name">Name Category:</h3>
                <input name="name" style="color: #71cd14" class="form-control form-control-lg" id="name" type="text"
                       placeholder="Name Category">
            </div>

            <button type="submit" style="margin-top: 10px; margin-left: 30px" class="button3D">
                <span>Save</span>
                <span></span>
                <span></span>
                <span>Save</span>
            </button>
        </form>
    </div>

    <br><br><br><br><br><br>
@endsection
