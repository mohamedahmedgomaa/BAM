<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="{{ asset('') }}css/profileStyless.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('') }}css/3Dfild.css">
    <link rel="stylesheet" href="{{ asset('') }}css/buttonAnimation.css">
    <link rel="stylesheet" href="{{ asset('css/button3D.css') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Cardo&display=swap" rel="stylesheet">

</head>
<body style="background: #fff">
    <a class="button3D" style="position: absolute;
    top: -25px;left: 570px" href="{{ route('index') }}">
        <span>Home</span>
        <span></span>
        <span></span>
        <span>Home</span>
    </a>
    <a class="button3D" style="position: absolute;
    top: -25px;left: 800px" href="{{ route('logout') }}">
        <span>Logout</span>
        <span></span>
        <span></span>
        <span>Logout</span>
    </a>
    <div class="backImg">

        <div class="profile">
            <img src="/uploads/avatars/{{ $user->avatar }}" alt="">
            <!-- Latest compiled and minified Bootstrap CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

            <style>
            body {
            padding-bottom: 1em;
            }   
            </style> 
            <div class="container-fluid">
             @if($user->id == auth()->id())
            <form enctype="multipart/form-data" action="/profile/{{ $user->id }}" method="POST" accept-charset="utf-8">
                <div class="custom-file" style="width: 250px">
                  <input type="file" class="custom-file-input" required name="avatar" id="customFile">
                    @if ($errors->has('avatar'))
                        <span class="alert alert-danger help-block">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                    @endif
                  <label class="custom-file-label" for="customFile" style="margin-top: -20px;background: none;color: #fff;">Upload Photo</label>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value="Save" class="btn btn-warning" style="margin-top: -35px">
            </form>
            @endif
            </div>
                    
            <!-- jQuery library -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

            <!-- Popper -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

            <!-- Latest compiled and minified Bootstrap JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

            <!-- Initialize Bootstrap functionality -->
            <script>
            // Initialize tooltip component
            $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            })

            // Initialize popover component
            $(function () {
              $('[data-toggle="popover"]').popover()
            })
            </script>
            <div class="profileText">
                <h2>{{ $user->name }}</h2>
                <h3>{{ $user->address }}, {{ $user->mobile }}</h3>
                <p>{{ $user->created_at->diffForHumans() }} | {{ $user->updated_at->diffForHumans() }}</p>
            </div>
            @if($user->id == auth()->id())
            <div class="profileFonts">
                <a href="/profile/edit/{{ $user->id }}" class="btn btn-warning" style="width: 85%"><i class="fa fa-edit fa-2x"></i></a>
            </div>
            @endif
            @if(auth()->id() != $user->id)
            <a href="{{ route('profile.send.message',['id'=>$user->id]) }}" class="btn btn-warning" style="width: 85%;color: #fff;font-size: 32px"><i class="fa fa-send "></i> Send Message</a>
            @endif
        </div>
    </div>

    {{-- .............................................. --}}

    @if($user->id == auth()->id())
    @if($orders->count() > 0)
    <h2 style="text-align: center;margin-top: 80px;color: #ffc107">
         All Order  
     </h2>
    <hr style="position: relative;left: 650px;width: 200px; height: 3px;color: #000">
    <div class="container">
        <table style="background: #ffc107; color: #fff; font-family: 'Arial Black', arial-black; font-size: 18px" class="table table-bordered table-success">
            <thead>
                <tr style="background: #fff; color: #ffc107">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total</th>
                    <th scope="col">Product Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <th scope="row">{{ $order->name }}</th>
                    <th scope="row">{{ $order->address }}</th>
                    <th scope="row">{{ $order->total }}</th>
                    <th scope="row">{{ $order->totalqty }}</th>
                </tr>
            @endforeach
          </tbody>
        </table>
        </div>
    @endif
    @endif
{{-- 00000000000000000000000000000000000000000000000 --}}
    @if($product->count() > 0)
    <h2 style="text-align: center;margin-top: 80px;margin-bottom: -60px;color: #37295d"> All Product on the Shop </h2>
    <hr style="position: relative; bottom: -70px;left: 559px;width: 400px; color: #000">
    <div class="container">
    @foreach ($product as $products)
        <div class="card">
            <div class="imgBox">
                <img src="../upload/{{ $products->photo }}" alt="">
            </div>
            <div class="details">
                <h2>{{ $products->title }}</h2>
                <p>{{ $products->content }}</p>

                <a class="buttonAnimation" href="/homepage/{{ $products->id }}">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Read More
                </a>

            </div>
        </div>
    @endforeach
                    
    </div>
    @endif
    {{-- .............................................. --}}

</body>
</html>