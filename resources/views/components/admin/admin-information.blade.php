@extends('layouts.admin-layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard.css') }}" />
    <style>
        .password {
            /* This bit sets up the horizontal layout */
            display: flex;
            flex-direction: row;
            margin-right: 32px
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

        #edit:hover {
            font-weight: bold;
        }

    </style>
@endsection
@section('title', 'Teacher Infomation ' . $admin->lastname)

@section('pathname')
    <h5> <b>Admin User</b></h5>
@endsection


@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('teachers.display') }}">Admin User</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $admin->firstname . ' ' . $admin->middlename . '. ' . $admin->lastname }}</li>
        </ol>
    </nav>
@endsection

@section('content')
         <!-- Display message if data is update -->
         @if (session()->has('message'))
            <center>
                <div class="alert alert-success" role="alert">
                    {{ session()->get('message') }}
                </div>
            </center>
        @endif

    <!-- TEACHER REGISTRATION FORM FOR JUNIOR HIGH -->

    <div class="container p-4" style="margin-top: -14px">

        <form action="/admin-user/{{ $admin->id }}" method="POST" class="shadow" style="height: 398px">
            @method('PATCH')
            <div class="d-flex bd-highlight mb-4">
                <div class="p-2 flex-fill bd-highlight">
                    {{-- route('teachers.display') --}}
                    <a href="{{ URL::previous() }}"><i class="bi bi-arrow-left-circle-fill"
                            style="font-size: 19px; color:green"></i></a>
                </div>
                <div class="p-2 flex-fill bd-highlight" style="width: 70%">
                    <h5 class="text-center">
                        <b>{{ $admin->firstname . ' ' . $admin->middlename . '. ' . $admin->lastname }}'s
                            Information</b>
                    </h5>
                </div>
                <div class="p-2 flex-fill bd-highlight" style="width: 1%;">
                    {{-- <div class="text-end">
                        <a type="button" id="updateAdmin" style="cursor:pointer;color:green; font-size: 18px"
                            data-bs-toggle="tooltip" data-bs-placement="right"
                            title="You can only edit the 'Lastname, Address, Contact Number, Civil Status and Status' "><i
                                class="bi bi-pencil-fill"></i></a>
                    </div> --}}
                </div>
            </div>


            <div class="row mx-2 mb-3">
                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" name="lastname" id="lastname" value="{{ $admin->lastname }}"
                            type="text" class="form__field  @error('lastname') is-invalid @enderror" placeholder="Last Name"
                            >
                        <label for="name" class="form__label"><b>Last Name:</b> </label>
                    </div>
                    @error('lastname')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror

                </div>
                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" name="firstname" id="firstname" value="{{ $admin->firstname }}"
                            type="text" class="form__field" placeholder="First Name" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="You cannot edit the 'First Name' " readonly>
                        <label for="name" class="form__label"><b>First Name:</b> </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" name="middlename" value="{{ $admin->middlename }}" type="text"
                            class="form__field" placeholder="Middle Name" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="You cannot edit the 'Middle Name' " readonly>
                        <label for="name" class="form__label"><b>Middle Name:</b> </label>
                    </div>
                </div>
            </div>

            <div class="row mx-2 mb-3">
                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" name="contact" id="contactnumber"
                            value="{{ old('contact') ?? $admin->contact }}" type="text"
                            class="form__field  @error('contact') is-invalid @enderror"
                            >
                        <label for="name" class="form__label"><b>Contact Number:</b> </label>
                    </div>
                    @error('contact')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" type="text" name="role" class="form__field"
                            value="{{ $admin->role }}" readonly>
                        <label for="name" class="form__label"><b>Role:</b> </label>
                    </div>
                </div>

                <div class="col-md-4 mb-2">
                    <div class="form__group field" style=" width: 300px">

                        <select name="status" style="max-width:290px;" class="form__field" id="status" >

                            <option value="" disabled>Status</option>

                            @foreach ($admin->statusOptions() as $statusKey => $statusValue)
                                <option value="{{ $statusKey }}"
                                    {{ $admin->status == $statusValue ? 'selected' : '' }}>
                                    {{ $statusValue }}
                                </option>
                            @endforeach

                        </select>
                        <label for="name" class="form__label"><b>Status:</b> </label>
                    </div>
                </div>
            </div>

            <div class="row mx-2 mb-3">





                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" name="username" id="username"
                            value="{{ old('username') ?? $admin->username }}" type="text" class="form__field"
                            placeholder="Username" placeholder="First Name" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="You cannot edit the 'Username' " readonly>
                        <label for="name" class="form__label"><b>Username:</b> </label>
                    </div>
                </div>

                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight">

                        {{-- If password change successfully --}}
                        @if (session()->has('status'))
                            <center>
                                <div class="alert alert-success mx-4" role="alert">
                                    {{ session()->get('status') }}
                                </div>
                            </center>
                        @endif

                        {{-- Error in change password --}}
                        @if (session()->has('errorStatus'))
                            <center>
                                <div class="alert alert-danger mx-4 text-center" role="alert">
                                    {{ session()->get('errorStatus') }}
                                </div>
                            </center>
                        @endif



{{--
                        <button type="submit" class="btn btn-outline-success" id="update" style="width: 100%"
                            hidden>Update</button> --}}

                    </div>
                    <div class="p-2 bd-highlight">
                        <input type="text" id="password" class="form-control" name="password" value="{{ $admin->password }}"
                            placeholder="Password" readonly hidden>
                        {{-- <a href="/admin-user/{{ $admin->id }}" class="btn btn-success">Reset Password</a> --}}
                        <button type="submit" class="btn btn-success">Update Info</button>
                    </div>
                </div>

            </div>
    </div>
    @csrf
    </form>

    </div>

@endsection

@section('script')

    <script>
          $('#firstname, #lastname').on('change', function(event) {

            var lastname = $('#lastname').val().toLowerCase();
            var firstname = $('#firstname').val().toLowerCase();

            if (lastname && firstname) {
                let password = `${lastname}${firstname.substring(0, 2)}`

                $('#password, #username').val(password);
            }

            });


    </script>

@endsection
