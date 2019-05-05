@extends('admin.index')
@section('content')
    <style type="text/css">
            table {
                    background-color: #fff;
                }
    </style>
    <div class="container">
        <div>
            <form action="{{ route('role.add') }}" method="POST">
                {{ csrf_field() }}
                <table class="table table-bordered table-dark table-striped">

                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User</th>
                        <th>Admin Shop</th>
                    </tr>
                    <tr>
                        @foreach($users as $user)


                            <input type="hidden" name="email[]" value="{{ $user->email }}">

                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <input type="checkbox"
                                       name="role_user[{{ $user->email }}][]" {{ $user->hasRole('user') ? 'checked' : ''  }}>
                            </td>
                            <td>
                                <input type="checkbox"
                                       name="role_admin_shop[{{ $user->email }}][]" {{ $user->hasRole('admin_shop') ? 'checked' : ''  }}>
                            </td>

                    </tr>
                    @endforeach

                </table>
                <button type="submit" class="btn btn-primary">Update Permissions</button>

            </form>

        </div>
    </div>
@endsection
