<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>External View</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('vendor')}}/blog-home.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">External View</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end">
                        <li>
                            <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach($categories as $category)
                                        <a href="/categories/={{ $category->id_category }}" class="dropdown-item">
                                            {{ $category->category_name }}
                                        </a>
                                    @endforeach
                                    <a href="/categories" class="dropdown-item">
                                    List All Category
                                    </a>
                                </div>
                            </div>
                            </div>
                        </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="collapse navbar-collapse justify-content-sm-end px-1 mx-1" id="navbarResponsive">
                <li class="navbar-nav ml-auto nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->check() ? auth()->user()->username : 'Login' }}
                </a>
                <ul class="dropdown-menu  dropdown-menu-end">
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                            @if (!auth()->check())
                                <form class="navbar-form" method="post" action="/login">
                                    @csrf
                                    <div class="form-group">
                                        <label label for="ForUsername">Username</label>
                                        <input type="text" name="username" class="form-control mt-2 mb-3" placeholder="input username" id="ForUsername">
                                    
                                        <label for="ForPassword">Password</label>
                                        <input type="password" name="password" class="form-control mt-2 mb-3" placeholder="input password" id="ForPassword">
                                        
                                        <input type="checkbox" value="forever" id="rememberme" name="rememberme">
                                        <label class="custom-control-label" for="rememberme">Remember Me</label>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-block mt-5" name="login">Login</button>
                                    </div>
                                </form>
                                <a class="mt-5" href="forgot.php?forgot=<?php echo uniqid(true)?>">Lupa Password ?</a>
                                <br>
                                @if (!auth()->check())
                                <a class="mt-5" href="register.php">Register</a>
                                @endif
                            @else
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10">
                                            @if (!empty(auth()->user()->user_image))
                                                <img class="img-thumbnail rounded-circle mt-3 mb-5" src="{{ asset('profile') . '/' . auth()->user()->user_image }}">
                                            @else
                                                <img class="img-thumbnail rounded-circle mt-3 mb-5" src="https://ui-avatars.com/api/>name{{ auth()->user()->username }}">
                                            @endif
                                            <div class="d-grid gap-3 col-12 mx-auto">
                                                <a href="/dashboard/profile" class="btn btn-primary btn-block">Profile</a>
                                                <a href="/dashboard" class="btn btn-primary btn-block">Dashboard</a>
                                                <a href="/logout" class="btn btn-outline-danger btn-block"> Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </li>
                </ul>
            </li>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container mt-5">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="{{ request()->is('/') ? 'col-md-8' : 'col-md-12'}}">
            @yield('artikel')
        </div>

    <!-- Sidebar Widgets Column -->
        @if (request()->is('/') || request()->is('/home'))
        <div class="col-md-4">
            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>
        </div>
        @endif
    </div>
    <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark mt-5">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor')}}/jquery/jquery-3.6.0.min.js"></script>
    <script src="{{asset('vendor')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('vendor')}}/bootstrap/js/bootstrap.bundle.min5.js"></script>

</body>

</html>
