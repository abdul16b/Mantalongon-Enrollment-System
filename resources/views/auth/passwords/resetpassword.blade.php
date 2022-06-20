<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Reset Password</title>
</head>

<body>


    <div class="container">

        <div class="justify-content-center" style="margin-top: 170px ">
            <center>
                <div class="card shadow" style="width: 22rem;">
                    <i class="bi bi-lock" style="font-size: 60px"></i>
                    <div class="card-body">

                        <form action="{{route('reset-password')}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}

                            <div class="mb-3">
                                <label style="float:left">Password</label>
                                <div class="input-group flex-nowrap">
                                    <input type="password" id="password" class="form-control" name="password" required
                                        autocomplete="current-password" style="z-index:0">
                                    <i class="bi bi-eye-slash" id="togglePassword"
                                        style="margin-left: -20px; cursor:pointer; margin-top: 10px; z-index:1"></i>
                                </div>
                            </div>
                            <input type="text" name="contact" value="{{ $number }}" hidden>
                            <div class="mb-3">
                                <label style="float:left">Confirm Password</label>
                                <div class="input-group flex-nowrap">
                                    <input id="confirmpassword" type="password" class="form-control" name="cpassword"
                                        required autocomplete="current-password" style="z-index:0">
                                    <i class="bi bi-eye-slash" id="passwordToggle"
                                        style="margin-left: -20px; cursor:pointer; margin-top: 10px; z-index:1"></i>
                                </div>
                            </div>

                            @if(Session::has('errorMessage'))
                            <p class="text-danger">{{ Session::get('errorMessage') }}</p>
                            @endif

                            <div class="d-flex justify-content-start">
                                Return to &nbsp; <a href="{{ route('login') }}">Login</a>
                            </div>

                    </div>
                    <button  type="submit" class="btn btn-success">Reset Password</button>
                </form>
                </div>
            </center>
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

        const passwordToggle = document.querySelector("#passwordToggle");
        const confirmpassword = document.querySelector("#confirmpassword");

        passwordToggle.addEventListener("click", function() {
            // toggle the type attribute
            const inputType = confirmpassword.getAttribute("type") === "password" ? "text" : "password";
            confirmpassword.setAttribute("type", inputType);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });
    </script>

</body>

</html>
