<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style type="text/css">
        body {
            background: #c8e1f7;
        }
    </style>
</head>
<body>
    <div class="container mt-5 p5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">
                        <img src="{{ asset('images/admin-page.jpg') }}" class="card-img-top">
                    </div>

                    <div class="col-lg-5">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (Session::has('status'))
                            <div class="alert alert-warning" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                        <form action="{{ url('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h3>Form Register</h3>
                            <hr>
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                            
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">

                            <label>Password</label>
                            <input type="password" name="password" class="form-control">

                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <br>
                            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Register">
                            <a href="login" class="btn btn-warning">Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<link rel="stylesheet" href="{{ asset('js/bootstrap.min.js') }}">

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/fontawesome.min.js') }}"></script>

</html>