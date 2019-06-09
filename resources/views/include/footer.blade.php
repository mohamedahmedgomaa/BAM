<!--================ start footer Area  =================-->
  <footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Top Products</h4>
          <ul>
            @foreach($footerTopProduct as $topProduct)
            <li><a href="/homepage/{{ $topProduct->id }}">{{$topProduct->title}}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Pages</h4>
          <ul>
              <li>
                  <a href="{{ route('homepage') }}">Top Products</a>
              </li>
              <li>
                  <a href="{{ route('allusers') }}">All Users</a>
              </li>
              <li>
                  <a href="{{ route('shopshow') }}">All Shops</a>
              </li>
              <li>
                  <a href="{{ route('allProduct') }}">All Products</a>
              </li>
              <li>
                  <a href="{{ route('allOffer') }}">All Offer</a>
              </li>
          </ul>
        </div>
        {{-- @if(Auth::check()) --}}
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Categorys</h4>
          <ul>
            @foreach($categories as $category)

                  <li>
                    <a href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->name }}</a>
                  </li>

            @endforeach
          </ul>
        </div>
        {{-- @endif --}}
        
      </div>
      <div class="footer-bottom row align-items-center">
        <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="{{url('/')}}" \>BAM</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        <div class="col-lg-4 col-md-12 footer-social">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-dribbble"></i></a>
          <a href="#"><i class="fa fa-behance"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="/js/jquery-3.2.1.min.js"></script>
  <script src="/js/popper.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/stellar.js"></script>
  <script src="/vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="/vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="/vendors/isotope/imagesloaded.pkgd.min.js"></script>
  <script src="/vendors/isotope/isotope-min.js"></script>
  <script src="/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="/js/jquery.ajaxchimp.min.js"></script>
  <script src="/vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="/vendors/counter-up/jquery.counterup.js"></script>
  <script src="/js/mail-script.js"></script>
  <script src="/js/theme.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="{{ asset('js/likes.js') }}"></script>
  <script type="text/javascript">
      var url = "{{ route('like') }}";
      var url_dis = "{{ route('dislike') }}";
      var token = "{{ Session::token() }}";

  </script>

  @yield('scripts')
  </body>
</html>