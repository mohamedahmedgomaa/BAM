@include('include.header')

<!--================Home Banner Area =================-->
  <section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content row">
          <div class="col-lg-8">
            <form style="color: #fff;" class="form-horizontal" method="POST" action="{{ route('postcheckout') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        
                        <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}" required="required" placeholder="Name">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-md-4 control-label">Address</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="address" value="{{ auth()->user()->address }}" id="address" required="required" placeholder="Address">

                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-md-4 control-label">Total Price</label>

                    <div class="col-md-6">
{{--                        <input type="cancel" class="form-control" name="total" value="{{ $total }}" id="total" required="required" placeholder="Total Price">--}}
                            <div style="border: 3px solid #fff;padding: 5px;background: #fff;color: #000;">{{$total}} $</div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-md-4 control-label">Product Number</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="totalQty" value="{{ $totalQty }}" id="totalQty" required="required" placeholder="Total Price">
                    </div>
                </div>
               
              {{--   <div class="form-group{{ $errors->has('card-name') ? ' has-error' : '' }}">
                    <label for="card-name" class="col-md-4 control-label">Card Holder Name</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" id="card-name" required="required" name="card-name" placeholder="Card Holder Name">

                        @if ($errors->has('card-name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('card-name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('card-name') ? ' has-error' : '' }}">
                    <label for="card-name" class="col-md-4 control-label">Credit Card Number</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" id="card-name" required="required" name="card-name" placeholder="Card Holder Name">

                        @if ($errors->has('card-name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('card-name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('card-number') ? ' has-error' : '' }}">
                    <label for="card-expiry-month" class="col-md-4 control-label">Expiration Month</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" id="card-expiry-month" required="required" placeholder="Credit Card Number">

                        @if ($errors->has('card-expiry-month'))
                            <span class="help-block">
                                <strong>{{ $errors->first('card-expiry-month') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('card-number') ? ' has-error' : '' }}">
                    <label for="card-expiry-year" class="col-md-4 control-label">Expiration Year</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" id="card-expiry-year" required="required" placeholder="Credit Card Number">

                        @if ($errors->has('card-expiry-year'))
                            <span class="help-block">
                                <strong>{{ $errors->first('card-expiry-year') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('card-number') ? ' has-error' : '' }}">
                    <label for="card-cvc" class="col-md-4 control-label">CVC</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" id="card-cvc" required="required" placeholder="CVC">

                        @if ($errors->has('card-cvc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('card-cvc') }}</strong>
                            </span>
                        @endif
                    </div>
                </div> --}}

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

<script src="https://js.stripe.com/v3/"></script>
<script src="{{ URL::to('src/js/checkout.js') }}"></script>
@include('include.footer')
