<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Form Add User</h1>
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <form action="user/add" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <button name="add_user" type="submit" class="btn btn-primary btn-block">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>