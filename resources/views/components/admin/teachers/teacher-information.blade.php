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
@section('title', 'Teacher Infomation ' . $teacher->lastname)

@section('pathname')
    <h5> <b>Teacher</b></h5>
@endsection


@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">School Year</li>
            {{-- <li class="breadcrumb-item"><a href="{{ route('teachers.display') }}">Teachers</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Teachers</li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $teacher->firstname . ' ' . $teacher->middlename . '. ' . $teacher->lastname }}</li>
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

        <form action="/teachers/{{ $teacher->id }}/teacher-information" method="POST" class="shadow"
            style="height: 398px">
            @method('PATCH')
            <div class="d-flex bd-highlight mb-4">
                <div class="p-2 flex-fill bd-highlight">
                    {{-- route('teachers.display') --}}
                    <a href="/teachers/{{$teacher->school_year}}/list"><i class="bi bi-arrow-left-circle-fill"
                            style="font-size: 19px; color:green"></i></a>
                </div>
                <div class="p-2 flex-fill bd-highlight" style="width: 70%">
                    <h5 class="text-center">
                        <b>{{ $teacher->firstname . ' ' . $teacher->middlename . '. ' . $teacher->lastname }}'s
                            Information</b>
                    </h5>
                </div>
                <div class="p-2 flex-fill bd-highlight" style="width: 1%;">
                    <div class="text-end">
                        <a type="button" style="cursor:pointer;color:green; font-size: 18px" data-bs-toggle="tooltip"
                            data-bs-placement="right"><i
                            class="bi bi-pencil-fill" id="updateTeacher"></i></a>
                    </div>
                </div>
            </div>


            <div class="row mx-2 mb-3">
                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" name="lastname" id="lastname" value="{{ $teacher->lastname }}"
                            type="text" class="form__field  @error('lastname') is-invalid @enderror" placeholder="Last Name" disabled>
                        <label for="name" class="form__label"><b>Last Name:</b> </label>
                    </div>
                    @error('lastname')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror

                </div>
                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" name="firstname" id="firstname" value="{{ $teacher->firstname }}"
                            type="text" class="form__field" placeholder="First Name" data-bs-toggle="tooltip"
                            data-bs-placement="right" disabled>
                        <label for="name" class="form__label"><b>First Name:</b> </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" name="middlename" value="{{ $teacher->middlename }}" type="text"
                            class="form__field" id="middlename" placeholder="First Name"
                            data-bs-toggle="tooltip" data-bs-placement="right"
                            disabled>
                        <label for="name" class="form__label"><b>Middle Name:</b> </label>
                    </div>
                </div>
            </div>

            <div class="row mx-2 mb-3">
                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" name="address" value="{{ $teacher->address }}" type="text"
                            id="address" class="form__field @error('address') is-invalid @enderror" disabled>
                        <label for="name" class="form__label"><b>Address:</b> </label>
                    </div>
                    @error('address')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>

                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" name="contact" id="contactnumber"
                            value="{{ old('contact') ?? $teacher->contact }}" type="text" class="form__field  @error('contact') is-invalid @enderror"
                            placeholder="Contact Number" disabled>
                        <label for="name" class="form__label"><b>Contact Number:</b> </label>
                    </div>
                    @error('contact')
                       <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>

                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" type="date" class="form__field" name="dateofbirth"
                            value="{{ $teacher->dateofbirth }}" id="birthdate" data-bs-toggle="tooltip"
                            data-bs-placement="right" disabled>
                        <label for="name" class="form__label"><b>Birth Date:</b> </label>
                    </div>
                </div>
            </div>

            <div class="row mx-2 mb-3">
                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <select style="max-width:290px; pointer-events: none;" name="sex" value="{{ old('sex') }}"
                            id="sex" class="form__field" class="form-control mt-4" placeholder="First Name"
                            data-bs-toggle="tooltip" data-bs-placement="right" title="You cannot edit the 'Sex Field' ">
                            <option value="" selected disabled>Sex</option>

                            @foreach ($teacher->sexOptions() as $sexKey => $sexValue)
                                <option value="{{ $sexKey }}" {{ $teacher->sex == $sexValue ? 'selected' : '' }}>
                                    {{ $sexValue }}</option>
                            @endforeach
                        </select>
                        <label for="name" class="form__label"><b>Sex:</b> </label>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <select style="max-width:290px;" name="civilstatus" value="{{ old('civilstatus') }}"
                            id="civilstatus" class="form__field" placeholder="civilstatus" class="form-control mt-4  @error('civilstatus') is-invalid @enderror"
                            disabled>
                            <option value="" selected disabled>Civil Status</option>

                            @foreach ($teacher->civilstatusOptions() as $civilstatusKey => $civilstatusValue)
                                <option value="{{ $civilstatusKey }}"
                                    {{ $teacher->civilstatus == $civilstatusValue ? 'selected' : '' }}>
                                    {{ $civilstatusValue }}</option>
                            @endforeach
                        </select>
                        <label for="name" class="form__label"><b>Civil Status:</b> </label>
                    </div>
                    @error('civilstatus')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" type="text" name="role" class="form__field"
                            value="{{ $teacher->role }}" readonly>
                        <label for="name" class="form__label"><b>Role:</b> </label>
                    </div>
                </div>

                <div class="col-md-4 ">
                    <div class="form__group field" style=" width: 300px">
                        @if ($teacher->section_id == '0' || $teacher->section_id == null)
                            <input style="max-width:290px;" name="assignedSection" value="N/A" type="text"
                                class="form__field" placeholder=" Assigned Section" readonly>
                            <label for="assignedSection" class="form__label"><b>Assigned Section</b> </label>
                        @elseif(!$teacher->section_id == '0')
                            <input style="max-width:290px;" name="assignedSection" value="{{ $teacher->section->section_name }}" type="text"
                                class="form__field" placeholder=" Assigned Section" readonly>
                            <label for="assignedSection" class="form__label"><b>Assigned Section</b> </label>
                        @endif
                    </div>
                </div>

                <div class="col-md-4 mb-2">
                    <div class="form__group field" style=" width: 300px">

                        <select name="status" style="max-width:290px;" class="form__field" id="status" disabled>

                            <option value="" disabled>Status</option>

                            @foreach ($teacher->statusOptions() as $statusKey => $statusValue)
                                <option value="{{ $statusKey }}"
                                    {{ $teacher->status == $statusValue ? 'selected' : '' }}>
                                    {{ $statusValue }}
                                </option>
                            @endforeach

                        </select>
                        <label for="name" class="form__label"><b>Status:</b> </label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" name="username" id="username"
                            value="{{ old('username') ?? $teacher->username }}" type="text" class="form__field"
                            placeholder="Username" placeholder="First Name" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="You cannot edit the 'Username' " readonly>
                        <label for="name" class="form__label"><b>Username:</b> </label>
                    </div>
                </div>
                <input type="text" name="school_year" value="{{$teacher->school_year}}" hidden>
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


                        <button type="submit" class="btn btn-outline-success" id="update" style="width: 100%;  display:none">Update</button>

                    </div>
                    <div class="p-2 bd-highlight">
                        <input type="text" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" value="{{ $teacher->password }}"
                            placeholder="Password" readonly hidden  >
                            @error('password')
                                <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                            @enderror
                        <div class="p-2 bd-highlight">

                            <a href="/teachers/{{ $teacher->id }}/resetpassword" type="button" class="btn btn-success" style="float:right;  display:none" id="resetPass">Reset
                                Password</a>
                        </div>
                </div>

            </div>

    </div>
    @csrf
    </form>

    </div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
            $('#firstname, #lastname').on('change', function(event) {
                var lastname = $('#lastname').val().toLowerCase();
                var firstname = $('#firstname').val().toLowerCase();
                if (lastname && firstname) {
                    let password = `${lastname}${firstname.substring(0, 2)}`
                    $('#username').val(password);
                }
                });

        // updateTeacher
        $(document).ready(function(){

        // function updatebtn(){
            $('#updateTeacher').on('click', function(){
                // console.log("test");
                $('#update').toggle();
                $('#resetPass').toggle();
                $('#civilstatus').prop("disabled", false );
                $('#contactnumber').prop("disabled", false );
                $('#guardianContactNo').prop("disabled", false );
                $('#address').prop("disabled", false );
                $('#status').prop("disabled", false );
                $('#lastname').prop("disabled", false );
                $('#firstname').prop("disabled", false );
                $('#middlename').prop("disabled", false );
                $('#birthdate').prop("disabled", false );
            });
        });


    </script>

@endsection
