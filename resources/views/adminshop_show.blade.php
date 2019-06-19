@extends('home')
@section('content')
<div class="container">
	<div class="row">
		@if($shopshow->count() > 0)
		    @foreach($shopshow as $shopshows)
		        <div class="col-lg-4 col-md-6">
		            <div class="single-product">
		                <div class="product-img">
		                    <img class="img-fluid w-100" src="/uploads/avatars/{{ $shopshows->avatar }}" alt=""/>
		                    <div class="p_icon">
		                        <a href="profile/{{ $shopshows->id }}">
		                            <i class="ti-eye"></i>
		                        </a>
		                    </div>
		                </div>
		                <div class="product-btm">
		                    <a href="profile/{{ $shopshows->id }}" class="d-block">
		                        <h4>Name: {{ $shopshows->name }}</h4>
		                    </a>
		                </div>
		            </div>
		        </div>
		    @endforeach
		@else
		    <h2 class="alert alert-danger">
		        <a style="color: #f54940" href="{{url('')}}">No Found Product In Products !!</a>
		    </h2>
		@endif
	</div>
</div>

@endsection