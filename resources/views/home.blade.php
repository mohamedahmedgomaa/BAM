@include("include.header")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        {{--        @include("include.message")--}}
        @yield('content')

    </section>
    <!-- /.content -->
</div>

@include("include.footer")
