@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>

                <div class="panel-body">                  

                  @if (auth()->user()->hasRole('admin_shop'))

                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($departments as $department)
                        <tr>
                          <th scope="row">{{ $department->id }}</th>
                          <th scope="row">{{ $department->name }}</th>
                          
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
@endsection
