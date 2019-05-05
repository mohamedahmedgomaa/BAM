@include("layout.header")
{{-- @include("layout.navbar") --}}


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>BAM</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-BAM"></i> Home</a></li>
        <li class="active">BAM</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	@include("layout.message")
    	@yield('content')

    </section>
    <!-- /.content -->
  </div>	

@include("layout.footer")