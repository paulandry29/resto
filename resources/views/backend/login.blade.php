<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin | {{config('app.name')}}</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-4">
                <h1 class="text-center mb-5">Login Admin</h1>
                <form action="{{ url('admin/postlogin') }}" method="post" class="">
                    @csrf

                    @if(Session::has('pesan'))

                        <div class="alert alert-danger">
                            {{ Session::get('pesan') }}
                        </div>

                    @endif

                    <div class="form-group mt-2">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" value="{{ old('email') }}" type="email" name="email" id="email">
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" value="{{ old('password') }}" type="password" name="password" id="password">
                        <span class="text-danger">
                            @error('password')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-2">
                        <input class="btn btn-success mt-4" type="submit" name="submit" value="Login" id="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
