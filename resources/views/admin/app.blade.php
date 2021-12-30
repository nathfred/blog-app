<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Admin</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">

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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ url('admin') }}" class="navbar-brand">CMS BLOG</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a href="{{ url('admin') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/category') }}" class="nav-link">Category</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/slider') }}" class="nav-link">Slider</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/post') }}" class="nav-link">Post</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/mainmenu') }}" class="nav-link">Menu</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/message') }}" class="nav-link">Message</a>
                </li>
            </ul>
            <div class="d-flex my-2 my-lg-0">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active">
                        <a href="{{ url('admin/profile/' . session('admin_id')) }}" id="profilebutton" class="link-menu">Profile</a>
                    </label>
                    <label class="btn btn-secondary">
                        <a href="{{ url('logout') }}" id="logoutbutton" class="link-menu">Log Out</a>
                    </label>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-3">
        <div class="jumbotron"> 
            @yield('content')
        </div>
    </div>

    <footer class="footer navbar fixed-bottom bg-dark">
        <div class="container">
            <span class="text-muted">Copyright @ 2021 nathfred</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
    @yield('js')

</body>

{{-- FIX FOR FAILED NAVBAR REDIRECT (PROFILE & LOGOUT BUTTON) (JQUERY JS PROBLEM) --}}
<script>
    document.getElementById("profilebutton").onclick = function () {
        location.href = "{{ url('admin/profile/' . session('admin_id')) }}";
    };
    document.getElementById("logoutbutton").onclick = function () {
        location.href = "{{ url('logout') }}";
    };
</script>

</html>