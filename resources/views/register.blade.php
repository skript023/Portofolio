@extends('front_end_helper.front_end')
@section('artikel')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Register</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action='/register' method="post">
                @csrf
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="first_name" required>
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="last_name" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required>
                    <p>
                        @error('email')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" required>
                    <p>
                        @error('username')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input required minlength="6" maxlength="15" required title="6 characters minimum" type="password" class="form-control" name="password">
                    <p>
                        @error('password')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block mb-5 mt-5" name="add_user" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection