@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="page-header">
                    Statistics 
                        <small>Website statistics</small>
                </h1>
                <div>
                    <table class="table table-hover">
                            <tr>
                                <th>All Users</th>
                                <td>{{ $statistics['users'] }}</td>
                            </tr>
                            <tr>
                                <th>All Products</th>
                                <td>{{ $statistics['products'] }}</td>
                            </tr>
                            <tr>
                                <th>All Comments</th>
                                <td>{{ $statistics['comments'] }}</td>
                            </tr>
                            <tr>
                                <th>Most active user</th>
                                <td><b>{{ $statistics['active_user'] }}</b>, Likes({{ $statistics['active_user_likes'] }}) - Comments({{ $statistics['active_user_comments'] }})</td>
                            </tr>
                            <tr>
                                <th>Most active product</th>
                                <td><b>{{ $statistics['active_product'] }}</b>, Likes({{ $statistics['active_product_likes'] }}) - Comments({{ $statistics['active_product_comments'] }})</td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
