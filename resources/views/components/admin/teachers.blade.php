@extends('layouts.admin-layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard.css') }}" />
    <style>
        table {
            width: 100%;
        }

        table,
        td {
            border-collapse: collapse;
            /* border: 1px solid #000; */
        }

        thead {
            display: table;
            /* to take the same width as tr */
            width: calc(100% - 10px);
            /* - 17px because of the scrollbar width */
        }

        tbody {
            display: block;
            /* to enable vertical scrolling */
            max-height: 230px;

            /* e.g. */
            overflow-y: scroll;
            /* keeps the scrollbar even if it doesn't need it; display purpose */
        }

        th,
        td {
            width: 10.33%;
            /* to enable "word-break: break-all" */
            padding: 5px;
            word-break: break-all;
            /* 4. */
        }

        tr {
            display: table;
            /* display purpose; th's border */
            width: 100%;
            box-sizing: border-box;
            /* because of the border (Chrome needs this line, but not FF) */
        }

        td {
            text-align: start;
            border-bottom: none;
            border-left: none;
        }

        .viewbtn:hover {
            font-weight: bold;
        }

    </style>
@endsection


@section('title')
    Teachers
@endsection

@section('pathname')
    <h5> <b>Teachers</b></h5>
@endsection


@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">School Year</li>
            <li class="breadcrumb-item active" aria-current="page">Teachers</li>
        </ol>
    </nav>
@endsection



@section('content')


    <div class="container">
        <div class="text-center">
            <h4 style="font-weight: bold;">All Teachers</h4>
            <h6>S.Y. {{ $schoolyear }}</h6>
        </div>
    </div>


    <div class="container">
        <!-- Display message if data is update -->
        @if (session()->has('message'))
            <div class="alert alert-danger mx-2 mt-2" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="d-flex bd-highlight p-4" style="margin-left: 30px">
            <div class="p-2 flex-grow-1 bd-highlight">
                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                    placeholder="Search for names or section..">
            </div>
            <div class="p-2 bd-highlight">
                <button type="button" class="btn btn-outline-success shadow" data-bs-toggle="modal"
                    data-bs-target="#addTeacher" style="font-size: 11px"><i class="bi bi-plus-lg"></i>
                    <b> ADD TEACHER</b>
                </button>
            </div>
        </div>



        <div class="container mb-5 " style="width: 98%">

            <table class="table shadow" id="myTable">
                <thead>
                    <tr>

                        <th class="text-center">Name</th>
                        <th class="text-center">Assigned Section</th>
                        <th class="text-center">Schedules</th>
                        <th class="text-center">Details</th>
                        <th class="text-center">Files</th>
                        <th class="text-center">Status</th>

                    </tr>
                </thead>

                <tbody>

                    @foreach ($teachers as $teacher)
                        <tr>

                            <td class="text-start">
                                {{ $teacher->firstname . ' ' . $teacher->lastname }}
                            </td>

                            @if ($teacher->section_id == '0' || $teacher->section_id == null)
                                <td class="text-center">N/A</td>
                            @elseif(!$teacher->section_id == '0')
                                <td class="text-center">Gr. {{ $teacher->section->grade_level. ' - '.$teacher->section->section_name }}</td>
                            @endif
                            <td class="text-center">
                                <a type="button"
                                    href="{{ route('schedule.viewSched', ['id' => $teacher->id,'name' => $teacher->firstname . ' ' . $teacher->middlename . ' ' . $teacher->lastname,'schoolyear' => $schoolyear]) }}"
                                    class="btn btn-success open-sched">View</a>
                            </td>

                            <td class="text-center">
                                <a href="/teachers/{{ $teacher->id }}/teacher-information"
                                    class="btn btn-success open-sched">View</a>
                            </td>
                            {{-- /teacher-file/{id}/{schoolyear} --}}
                            <td class="text-center"><a href="/teacher-file/{{ $teacher->id }}/{{$schoolyear}}"
                                    class="btn btn-success open-sched">View</a>
                            </td>

                            <td class="text-center">{{ $teacher->status }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>


    {{-- Add Teacher --}}
    <div class="modal fade" id="addTeacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>ADD TEACHER</b> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="container">

                        <form action="{{ route('teacher.store', ['schoolyear' => $schoolyear]) }}" method="POST">
                            @csrf

                            <input type="text" id="school_year" name="school_year" value="{{ $schoolyear }}" hidden>
                            <div class="row mx-2">
                                <div class="col-md-4 mb-3">
                                    <div class="form__group field" style=" width: 200px">
                                        <input name="lastname" id="lastname" value="{{ old('lastname') }}" type="text"
                                            class="form__field" required>
                                        <label for="name" class="form__label"><b>Last Name:</b> </label>
                                        <div>{{ $errors->first('lastname') }}</div>

                                        {{-- <div class="alert alert-danger" role="alert">
                                        <h6>test</h6>
                                    </div> --}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form__group field" style=" width: 200px">
                                        <input name="firstname" id="firstname" value="{{ old('lastname') }}" type="text"
                                            class="form__field" required>
                                        <label for="name" class="form__label"><b>First Name:</b> </label>
                                        <div>{{ $errors->first('lastname') }}</div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form__group field" style=" width: 200px">
                                        <input name="middlename" id="middlename" value="{{ old('middlename') }}"
                                            type="text" class="form__field" required>
                                        <label for="middlename" class="form__label"><b>Middle Name:</b> </label>
                                        <div>{{ $errors->first('middlename') }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mx-2 mb-3">
                                <div class="col-md-4">
                                    <div class="form__group field" style=" width: 200px">
                                        <input name="address" id="address" value="{{ old('address') }}" type="text"
                                            class="form__field" required>
                                        <label for="address" class="form__label"><b>Address:</b> </label>
                                        <div>{{ $errors->first('address') }}</div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form__group field {{ $errors->has('contact') ? 'has-error' : '' }} " style=" width: 200px">
                                        <input name="contact" id="contact" value="{{ old('contact') }}" type="text"
                                            class="form__field  {{ $errors->has('contact') ? 'has-error' : '' }} @error('contact') is-invalid @enderror" required>
                                        <label for="contact" class="form__label"><b>Contact Number:</b> </label>
                                        {{-- <div>{{ $errors->first('contact') }}</div> --}}
                                    </div>

                                    <span class="help-block" style="color:red;">{{ $errors->first('contact', ':message') }}</span>
                                    {{-- @error('contact')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}

                                </div>



                                <div class="col-md-4">
                                    <div class="form__group field" style=" width: 200px">
                                        <select style="max-width:290px;" name="sex" value="{{ old('sex') }}" id="sex"
                                            placeholder="sex" class="form__field" required>
                                            <option value="" selected disabled>--select a value--</option>
                                            <option value="1">Male</option>
                                            <option value="0">Female</option>
                                        </select>
                                        <label for="contact" class="form__label"><b>Sex:</b> </label>
                                    </div>
                                </div>

                            </div>

                            <div class="row mx-2">
                                <div class="col-md-4 mb-3">
                                    <div class="form__group field" style=" width: 600px">
                                        <div class="col-md-4">
                                            <input class="form__field" style="max-width:400px;" type="date"
                                                name="dateofbirth" value="{{ old('dateofbirth') }}" type="text"
                                                class="form__field">
                                            <label for="dateofbirth" class="form__label"><b>Date of Birth:</b> </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form__group field" style=" width: 200px">
                                        <select style="max-width:290px;" name="civilstatus"
                                            value="{{ old('civilstatus') }}" class="form__field" required>
                                            <option value="" selected disabled>--select a value--</option>
                                            <option value="0">Married</option>
                                            <option value="1">Widowed</option>
                                            <option value="2">Separated</option>
                                            <option value="3">Divorce</option>
                                            <option value="4">Single</option>
                                        </select>
                                        <label for="civilstatus" class="form__label"><b>Civil Status:</b> </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form__group field" style=" width: 200px">
                                        <input style="max-width:290px;" name="username" id="username"
                                            value="{{ old('username') }}" type="text" class="form__field" readonly>
                                        <label for="username" class="form__label"><b>Username:</b> </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form__group field" style=" width: 200px">
                                        <input style="max-width:290px;" name="password" id="password"
                                            value="{{ old('password') }}" type="text" class="form__field" readonly>
                                        <label for="password" class="form__label"><b>Password:</b> </label>
                                    </div>
                                </div>

                                <div class="row mx-2">
                                    <div class="col-md-4">
                                        <input type="text" value="none-adviser" name="role" hidden>
                                    </div>
                                </div>
                                <div>
                                    <input type="text" value="1" name="status" hidden>
                                </div>
                                <input type="text" value="{{ $schoolyear }}" name="school_year" hidden>
                                <button type="submit" class="btn btn-outline-success mt-4"
                                    style="float:right;margin-right:25px;">SUBMIT</button>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/tablesearch.js') }}"></script>
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
