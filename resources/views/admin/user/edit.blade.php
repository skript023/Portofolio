<style>
    #profile_img{
        width: 520px;
        height: 520px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Form Edit User</h1>
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <form action="user/accept_user" method="post">
                        @if ($users[request()->u_id]->user_status === 'pending')
                            <button class="btn btn-outline-primary" type="submit" name="active">Verified User</button>
                        @else
                            <button class="btn btn-outline-danger" type="submit" name="pending">Unverified User</button>
                        @endif
                    </form>

                    <form action="user/update" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <img src="{{ $users[request()->u_id]->user_image }}" class="rounded-circle img-fluid img-thumbnail mx-auto d-block" id="profile-img" alt="">
                            <div class="col-md-3 m-auto">
                                <input type="file" class="form-control" name="user_image">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ $users[request()->u_id]->first_name }}">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ $users[request()->u_id]->last_name }}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $users[request()->u_id]->email }}">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" value="{{ $users[request()->u_id]->username }}">
                        </div>

                        <div class="form-group">
                            <label>User Status</label>
                            <input type="text" class="form-control" value="{{ $users[request()->u_id]->user_status }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Join Date</label>
                            <input type="text" class="form-control" value="{{ $users[request()->u_id]->user_date }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <button name="update_user" type="submit" class="btn btn-danger btn-block">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>