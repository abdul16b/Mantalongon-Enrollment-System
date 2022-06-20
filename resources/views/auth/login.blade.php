<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Login</title>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container">
        <div class="row justify-content-center">
            <div style="width: 40%;margin-top: 60px;">
                @if (Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
                <div class="card shadow"
                    style="background-image: linear-gradient(#d9f3ea 100%, #a2f7d6 75%, #b9fcea 25%);">
                    <div class="card"> </div>
                    <a href="{{ url('/') }}" type="button" class="btn-close" style="margin-left: 403px;"> </a>
                    <img src="{{ URL('images/desktop.png') }}" class="rounded mx-auto d-block mb-3"
                        style="width: 60%;hieght: 50px;" alt="...">
                    <h5 class="text-center" style="margin-top: -38px"> <b>MNHS ENROLLMENT SYSTEM</b> </h5>
                    <div class="card-body">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6" style="width:320px;margin-left:46px">
                                    <div class="input-group flex-nowrap" style="width: 303px;">
                                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person-fill"
                                                style="font-size: 18px"></i></span>
                                        <input id="username" type="username" class="form-control"
                                            placeholder="Username" aria-describedby="addon-wrapping" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6" style="width:320px;margin-left:46px">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key-fill"
                                                style="font-size: 18px"></i></span>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" name="password" required
                                            autocomplete="current-password" style="z-index:0">
                                        <i class="bi bi-eye-slash" id="togglePassword"
                                            style="margin-left: -20px; cursor:pointer; margin-top: 10px; z-index:1"></i>

                                    </div>


                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    @error('username')
                                        <span style="font-size:13px; color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col">
                                    <button type="submit" class="btn btn-success" style="width:300px;margin-left:46px">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                            </div>

                            <a href="forgotpassword" style="margin-left:45px">
                                {{ __('Forgot Your Password?') }}
                            </a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });
    </script>

</body>


</html>
