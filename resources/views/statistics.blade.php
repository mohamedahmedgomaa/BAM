@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <h1 class="page-header" style="color: #71cd14">
                    Statistics: 
                        <small style="color: #000">Website statistics</small>
                </h1>
                <div style="margin-left: 200px">
                    <table class="table table-hover table-striped table-dark">
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
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
@endsection
