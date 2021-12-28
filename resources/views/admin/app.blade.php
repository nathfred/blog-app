<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Admin</title>

    <link rel="stylesheet" href="{{ asset('css/bootstap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/all.min.css') }}">

    @yield('css')
    <style>
        .link-menu {
            color: white;
        }
        .link-menu:hover {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ url('admin') }}" class="navbar-brand">CMS BLOG</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/category') }}">Category</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/slider') }}">Slider</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/post') }}">Post</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/mainmenu') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/message') }}">Message</a>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
                <div class="btn-group btn-group-toggle" data-toggle="button">
                    <label class="btn btn-secondary active">
                        <a href="{{ url('admin/profile/' . session('admin_id')) }}" class="link-menu">Profile</a>
                    </label>
                    <label class="btn btn-secondary">
                        <a href="{{ url('logout') }}" class="link-menu">Log Out</a>
                    </label>
                </div>
            </div>
        </div>
    </nav>

    <div class="container=fluid mt-3">
        <div class="jumbotron">
            @yield('content')
        </div>
    </div>

    <footer class="footer navbar fixed-bottom bg-dark">
        <div class="container">
            <span class="text-muted">Copyright @ 2021 nathfred</span>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>