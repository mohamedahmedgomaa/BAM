@include('include.header')
<div class="container">
    @if(Session::has('cart'))

        <div class="row">
            <ul class="list-group">
                @foreach($products as $product)
                    <li class="list-group-item">
                        <strong>{{ $product['item']['title'] }}</strong>
                        <span class="label label-success">{{ $product['price'] }}</span>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Reduce
                                        by 1</a></li>
                                <li><a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}">Reduce
                                        All</a></li>
                            </ul>
                        </div>
                        <span class="badge">{{ $product['qty'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
                <strong>Total: {{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>
        <br>
    @else
        <h2 class="alert">
            <a class="alert alert-danger" style="color: #000" href="{{url('index')}}">No Item In Cart !!</a>
        </h2>
    @endif
</div>

@include('include.footer')



