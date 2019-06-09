@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <p><strong>Send to :</strong> {{ $user->name }}</p>
            <form action="{{ route('profile.receive',['id'=>$user->id ]) }}" method="POST">
                {{ csrf_field() }}
                <textarea id="text" name="text" style="width: 600px;height: 200px;"></textarea>
                <br><input type="submit" value="Send Message">
            </form>
        </div>
    </div>
@endsection