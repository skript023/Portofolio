@extends('admin.template_helper.template_helper')
@section('title', 'Profile')
@section('breadcrumb', 'Profile')
@section('header', 'Profile')

@section('content')

<style>
    #profile-img{
        width: 512px;
        height: 512px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="dashboard/user/update/{{ $user->id_user }}">
                        @csrf
                        <div class="form-group">
                            <img src="{{ asset('profile') . '/' . $user->user_image }}" id="profile-img" alt="" class="img-fluid img-thumbnail mx-auto d-block rounded-circle">
                            <div class="col-md-3">
                                <input type="file" class="form-control" name="user_image">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="{{ $user->username }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Position User</label>
                            <input type="text" name="user_position" class="form-control" value="{{ $user->user_position }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Status User</label>
                            <input type="text" name="user_status" class="form-control" value="{{ $user->user_status }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Join Date</label>
                            <input type="text" name="user_date" class="form-control" value="{{ $user->user_date }}" readonly>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-danger btn-block" type="submit" name="update_profile">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection