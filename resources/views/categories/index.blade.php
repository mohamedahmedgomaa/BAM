@extends('home')
@section('content')
<div class="container">
    <div class="row">
        <div style="margin-left: 200px" class="col-md-8 col-md-offset-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h1 style="color: #71CD14">Categories</h1></div>

                <div class="panel-body">

                  @if (auth()->user()->hasRole('admin_shop'))

                  <table style="background: #71CD14; color: #fff; font-family: 'Arial Black', arial-black; font-size: 18px" class="table table-bordered table-striped table-success">
                      <thead>
                        <tr style="background: #fff; color: #71CD14">
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($departments as $department)
                        <tr>
                          <th scope="row">{{ $department->id }}</th>
                          <th scope="row"><a style="color: #fff" href="{{ route('category.show', ['id' => $department->id]) }}">{{ $department->name }}</a></th>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                  @endif

                </div>
            </div>
        </div>
    </div>
</div>
    <br><br><br>
@endsection
