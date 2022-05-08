@extends('front_end_helper.front_end')
@section('artikel')

<div class="container">
    <div class="row">        
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Login</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="/login" method="post">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="username" class="form-control" placeholder="input username" required>
                </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="input password" required>                   
                </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection