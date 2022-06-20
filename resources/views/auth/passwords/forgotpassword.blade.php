<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Forgot Password</title>

</head>

<body>

    <div class="container">
        <div class="justify-content-center" style="margin-top: 200px ">
            <center>
                <div class="card justify-content-between shadow" style="width: 22rem;">
                    
                    <i class="bi bi-lock" style="font-size: 60px"></i>

                    <div class="card-body mb-2">
                        <div class="mb-4" style="margin-top:-13px">
                            <h5> <b>Forgot Password?</b> </h5>
                            <h6>Enter your registered mobile number!</h6>
                        </div>

                        <form action="/forgotpassword/contactnumber" method="POST">
                            @csrf
                            @method('POST')
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-phone-fill"
                                        style="font-size: 15px"></i></span>
                                <input type="text" class="form-control" placeholder="Mobile Number"
                                    name="mobilenumber" aria-describedby="basic-addon1" required>
                            </div>
                            @if (session()->has('error'))
                                <p class="text-danger">{{ session()->get('error') }}</p>
                            @endif
                            <div class="d-flex justify-content-start">
                                Return to &nbsp; <a href="{{ route('login') }}">Login</a>
                            </div>

                    </div>
                    <button type="submit" class="btn btn-success">Next</button>
                    </form>
                </div>
            </center>
        </div>
    </div>



</body>

</html>
