@extends('layouts.admin-layout')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard.css') }}" />
    <style>
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
            max-height: 270px;
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
            text-align: center;
            border-bottom: none;
            border-left: none;
        }

        .viewbtn:hover {
            font-weight: bold;
        }

    </style>
@endsection

@section('title')
    @foreach ($sections as $section)
        {{ $section->section_name }}
    @endforeach
@endsection

@section('pathname')
    <h5> <b>Sections</b></h5>
@endsection

@section('path')
    @foreach ($sections as $section)
        <nav aria-label="breadcrumb" style="margin-top:5px">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">School Year</li>
                <li class="breadcrumb-item active" aria-current="page">Sections</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $section->section_name }}</li>
            </ol>
        </nav>
    @endforeach
@endsection

@section('content')
    <div class="rounded p-2" style="color:black;text-align:center;">
        <h4>{{ $section->section_name }}</h4>
        @foreach ($teachers as $teacher)
            <h6>Adviser: <b>{{ $teacher->firstname . ' ' . $teacher->lastname }}</b></h6>
        @endforeach
    </div>

    <div class="container p-2" style="margin-top:-12px">
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-fill bd-highlight" style="width:0;">
                <a href="/junior-high/{{ $year }}" type="button" class="btn btn-success"
                    style="text-decoration: none; color: white;">Back</a>
                <a href="/teachers/{{ $section->id }}/schedule/{{ $section->school_year }}"
                    class="btn btn-outline-success">View Sched</a>

            </div>

            <div class="p-2 flex-fill bd-highlight">
                <div style="margin-top: 12px">
                    <h6><b>Total Student/s:</b> {{ $count }} </h6>
                </div>
            </div>
            <div class="p-2 flex-fill bd-highlight">
                <input type="search" class="form-control rounded m-3 mt-1" id="myInput" onkeyup="myFunction()" placeholder="Search for names" id="myInput"
                    aria-label="Search" aria-describedby="search-addon" style="width: 300px; float: right;" />
            </div>

        </div>

        <table class="table table-striped shadow" id="myTable">
            <thead class="text-center">
                <tr>
                    <th>LRN</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Report Card</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($students as $student)
                    <tr>

                        <td>{{ $student->LRN }}</td>
                        <td>{{ $student->firstname }} {{ $student->middlename }}. {{ $student->lastname }}</td>

                        <td>
                            {{-- <a href="{{ route('view.sectionDetail', ['id'=>$student->id,'LRN' => $student->LRN, 'schoolyear' => $student->school_year]) }}"
                                class="btn btn-success viewbtn" style="font-size:12px">View</a> --}}
                            <a href="{{ route('irregularstudent.details', ['id'=>$student->id,'LRN' => $student->LRN, 'schoolyear'=>$student->school_year]) }}"
                                class="btn btn-success viewbtn" style="font-size:12px">View</a>
                        </td>
                        @foreach ($teachers as $teacher)
                            <td>
                                <a href="{{ route('student.reportcard', ['id' => $student->id, 'LRN' => $student->LRN, 'teacher' => $teacher->firstname . ' ' . $teacher->lastname]) }}"
                                    class="btn btn-success viewbtn" style="font-size:12px" target="_blank">View</a>
                            </td>
                        @endforeach
                        <td>
                            <h6>{{ $student->status }}</h6>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Student Details</b> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <div class="row mx-2 mb-3">
                            <div class="col-md-4">
                                <div class="form__group field" style=" width: 300px">
                                    <input type="text" name="lrn" value="" id="lrn"
                                        class="form__field" disabled>
                                    <label class="form__label"><b>Learner's Reference No.:</b></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form__group field" style=" width: 300px">
                                    <input type="text" name="psa" value=" "
                                        class="form__field" disabled>
                                    <label class="form__label"><b>PSA No.:</b></label>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form__group field" style=" width: 300px">
                                    <input type="text" class="form__field" name="average"
                                        value="" readonly>
                                    <label class="form__label"><b>Average:</b> </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mx-2 mb-3">
                            <div class="col-md-4">
                                <div class="form__group field" style=" width: 300px">
                                    <input type="text" name="lastname" value="" id="lastname"
                                        class="form__field" disabled>
                                    <label class="form__label"><b>Last Name:</b> </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form__group field" style=" width: 300px">
                                    <input type="text" name="Firstname" value=""
                                        class="form__field" disabled>
                                    <label class="form__label"><b>First Name:</b> </label>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form__group field" style=" width: 300px">
                                    <input type="text" class="form__field" name="middlename"
                                        value="" readonly>
                                    <label class="form__label"><b>Middle Name:</b></label>
                                </div>
                            </div>
                        </div>


                        <div class="row mx-2 ">
                            <div class="col mb-4">
                                <div class="form__group field" style=" width: 300px">
                                    <input type="text" name="dateofbirth" class="form__field"
                                        value="" disabled>
                                    <label class="form__label"><b>Date of Birth:</b> </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form__group field" style=" width: 300px">
                                    <input type="text" name="age" class="form__field" value=""
                                        disabled>
                                    <label class="form__label"><b>Age:</b> </label>
                                </div>
                            </div>

                            <div class="col">
                                <div style="margin-top:25px">
                                    <input type="checkbox" class="gender" name="gender" value="Male"
                                        aria-label="Male">&nbsp;Male
                                    &nbsp; &nbsp; &nbsp;
                                    <input type="checkbox" class="gender" name="gender" value="Female">
                                    &nbsp;Female
                                </div>

                            </div>
                        </div>


                        <div class="col">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">
                                    <p>Belonging to any Indigenous People(IP) Community/Indigenous Cutltural
                                        Cummunity?</p>
                                </div>
                                <div class="p-2 flex-fill bd-highlight" style=" width: 35%">
                                    <div style="float:left">
                                        <input class="indigenous" type="checkbox" name="IPC" value="YES"
                                            aria-label="Male">&nbsp;
                                        Yes
                                        &nbsp; &nbsp; &nbsp;

                                        <input class="indigenous" type="checkbox" name="IPC" value="NO"
                                            aria-label="...">
                                        &nbsp; No
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mx-2 ">
                            <div class="col mb-5">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" type="text" class="form__field" name="motherTongue"
                                        value="" disabled>
                                    <label class="form__label"> <b>Mother Tongue:</b> </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" type="text" class="form__field" name="contact"
                                        id="contactnumber" value="" disabled>
                                    <label class="form__label"> <b>Contact Number:</b> </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" type="text" class="form__field" name="address"
                                        id="address" value="" disabled>
                                    <label class="form__label"> <b>Address:</b> </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" type="number" class="form__field" name="zipcode"
                                        value="" disabled>
                                    <label class="form__label"><b>Zipcode:</b> </label>
                                </div>
                            </div>
                        </div>


                        <div class="row mx-2 mb-4">
                            <div class="col">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" type="text" class="form__field" name="father_name"
                                        value="" disabled>
                                    <label class="form__label"><b>Father's Full Name:</b> </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" type="text" class="form__field" name="mother_name"
                                        value="" disabled>
                                    <label class="form__label"><b>Mother's Maiden Name:</b> </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" type="text" class="form__field" name="guardian"
                                        id="guardian" value="" disabled>
                                    <label class="form__label"><b>Guardian Name:</b> </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" type="text" class="form__field"
                                        id="guardianContactNo" name="guardian_contact_number"
                                        value="" disabled>
                                    <label class="form__label"> <b>Guardian Contact No.:</b>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('script')
    <script src="{{ asset('js/tablesearch.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection
