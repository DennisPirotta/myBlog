<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body class="bg-info bg-gradient bg-opacity-50">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<div class="container shadow rounded-5 mx-auto my-4 p-5 bg-white">
    <div class="row">
        <div class="col-md-6 col-sm-12 p-5 d-flex flex-column justify-content-center text-center">
            <form action="/users/auth" method="post">
                @csrf
                <div class="mx-auto">
                    <img src="{{asset("images/auth/user_icon.svg")}}" loading="lazy" class="w-50 rounded-circle" alt="">
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email</label>
                    @error('email')
                    <script>
                        $("#email").addClass("is-invalid")
                    </script>
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')
                    <script>
                        $("#password").addClass("is-invalid")
                    </script>
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 form-check text-start">
                    <input type="checkbox" class="form-check-input" id="accept" name="accept" required>
                    <label class="form-check-label" for="check">Accetto i termini e le condizioni</label>
                    @error('accept')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
        <div class="col-md-6 col-sm-12 d-flex flex-column justify-content-center text-center" id="image">
            <img src="{{asset("images/auth/illustration.svg")}}" alt="" class="w-100 clearfix">
        </div>
    </div>
</div>
</body>
</html>
