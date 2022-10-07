<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">List Users</h1>
        </div>
    </div>
        <div class="row">
            <table class="table table-row">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>User Position</th>
                        <th>User Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                        <td>{{ $user->first_name . " " . $user->last_name }}</td>
                        <td>{{ $user->user_position }}</td>
                        <td>{{ $user->user_status }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="user?delete=<{{$user->id_user}}">Delete User</a>
                                    <a class="dropdown-item" href="user?page=edit&u_id={{$user->id_user}}">Edit User</a>
                                    <a class="dropdown-item" href="#">Void</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <button class="btn btn-info">Void</button>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>