<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .password {
            /* This bit sets up the horizontal layout */
            display: flex;
            flex-direction: row;

            /* This bit draws the box around it */
            /* border: 1px solid grey; */

            /* I've used padding so you can see the edges of the elements. */
            /* padding: 2px; */
        }

        input {
            /* Tell the input to use all the available space */
            flex-grow: 2;
            /* And hide the input's outline, so the form looks like the outline */
            border: none;
        }

        input:focus {
            /* removing the input focus blue box. Put this on the form if you like. */
            outline: none;
        }

        #changePassword {
            border: 1px solid rgb(13, 145, 72);
            background-image: linear-gradient(#046644 100%, #067658 75%, #05684e 25%);
            color: white;
        }

        #changePassword:hover {
            font-weight: bold
        }

    </style>

    <title>Profile</title>
    <link rel="icon" href="{!! asset('images/mantalongon_logo.png') !!}" />
</head>

<body>

    @include('sweetalert::alert')

    <div class="d-flex justify-content-center" style="margin-top: 120px">

        <div class="card shadow " style="width: 400px">
            @if (Session::has('error'))
                <p class="alert alert-info text-center">{{ Session::get('error') }}</p>
            @endif
            @if (Session::has('errorMessage'))
                <p class="alert alert-info text-center">{{ Session::get('errorMessage') }}</p>
            @endif
            @if (Session::has('message'))
                <p class="alert alert-info text-center">{{ Session::get('errorMessage') }}</p>
            @endif
            <div class="text-center">
                <div class="card-header">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-fill bd-highlight rounded"
                            style="margin-top:-40px;width:13%; background-image: linear-gradient(#046644 100%, #067658 75%, #05684e 25%);color:white ">
                            <i class="bi bi-person" style="font-size:50px"></i>
                        </div>
                        <div class="p-2 flex-fill bd-highlight">
                            <h4 style="color:green"> <b>TEACHER PROFILE</b> </h4>
                        </div>
                        {{-- need to update --}}
                        <div class="p-2 flex-fill bd-highlight"><a href="/adviser_dashboard/{{$schoolyear}}"
                                type="button" class="btn-close justify-content-center" aria-label="Close"></a></div>
                    </div>
                </div>
                <div class="card-header">
                    <h5>Mantalongon National High School</h5>
                    <h6 style="margin-top:-10px">Mantalongon, Dalaguete, Cebu </h6>
                </div>
            </div>
            <div class="card-body ">


                <div class="mb-3">
                    <div class="form__group field" style=" width: 355px">
                        <input type="text" class="form__field" id="name"
                            value=" {{ $firstName . ' ' . $middleName . '. ' . $lastName }}" disabled>
                        <label class="form__label"><b>Name:</b> </label>
                    </div>

                    <div class="mb-3">
                        <div class="form__group field" style=" width: 355px">
                            <input type="text" class="form__field" id="username" value="{{ $username }}"
                                disabled>
                            <label class="form__label"><b>Username:</b> </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form__group field" style=" width: 355px">
                            <input type="number" class="form__field" id="Mobile Number" value="{{ $contactnum }}"
                                disabled>
                            <label class="form__label"><b>Mobile Number:</b> </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form__group field" style=" width: 355px">
                            <div class="password">
                                <input type="password" class="form__field" id="password" placeholder="" disabled>
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    id="changePassword">Change</button>
                                <label class="form__label"><b>Password:</b> </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- modal for change password --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Change your password</b> </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('components.adviser.profile.change') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="container">
                                <div class="mb-3">
                                    <div class="form__group field" style=" width: 445px">
                                        <input type="password" class="form__field" id="currentpassword"
                                            name="current" required>

                                        <label class="form__label"><b>Current Password:</b> <i
                                                class="bi bi-eye-slash" id="toggleCurrentPassword"
                                                style="cursor: pointer;"></i> </label>
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <div class="form__group field" style=" width: 445px">
                                        <input type="password" class="form__field" id="newpassword" name="new" required>
                                        <label class="form__label"><b>New Password:</b> <i class="bi bi-eye-slash"
                                                id="toggleNewPassword" style="cursor: pointer;"></i> </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form__group field" style=" width: 445px">
                                        <input type="password" class="form__field" id="confirmpassword"
                                            name="confirm" required>
                                        <label class="form__label"><b>Password:</b> <i class="bi bi-eye-slash"
                                                id="togglePassword" style="cursor: pointer;"></i></label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            //Current password..............
            const toggleCurrentPassword = document.querySelector("#toggleCurrentPassword");
            const password = document.querySelector("#currentpassword");

            toggleCurrentPassword.addEventListener("click", function() {
                // toggle the type attribute
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);

                // toggle the icon
                this.classList.toggle("bi-eye");
            });


            //New Password...................................
            const toggleNewPassword = document.querySelector("#toggleNewPassword");
            const newpassword = document.querySelector("#newpassword");

            toggleNewPassword.addEventListener("click", function() {
                // toggle the type attribute
                const typePass = newpassword.getAttribute("type") === "password" ? "text" : "password";
                newpassword.setAttribute("type", typePass);

                // toggle the icon
                this.classList.toggle("bi-eye");
            });

            //Confirm Password.................................
            const toggleConfirmPassword = document.querySelector("#togglePassword");
            const confirmpassword = document.querySelector("#confirmpassword");

            toggleConfirmPassword.addEventListener("click", function() {
                // toggle the type attribute
                const typeConfirm = confirmpassword.getAttribute("type") === "password" ? "text" : "password";
                confirmpassword.setAttribute("type", typeConfirm);

                // toggle the icon
                this.classList.toggle("bi-eye");
            });
        </script>
</body>

</html>
