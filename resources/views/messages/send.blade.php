@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <form action="{{ route('profile.receive',['id'=>$user->id ]) }}" method="POST">
                <h3 class="text-center"><strong>Send to :</strong> {{ $user->name }}</h3>
                    {{ csrf_field() }}
                    <br>
                    <textarea id="text" name="text" style="width: 600px;height: 200px;margin-left: 270PX;"></textarea>
                    <br><input style="margin-left: 270PX" class="btn btn-primary" type="submit" value="Send Message">
                </form>
                <br><br><br>
            </div>
        </div>
    </div>
@endsection