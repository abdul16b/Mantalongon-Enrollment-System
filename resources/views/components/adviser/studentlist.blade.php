@extends('layouts.adviser-layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/teacher-dashboard.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}" />
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
            max-height: 228px;
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
    Students
@endsection

@section('pathname')
    <h5> <b>Students</b></h5>
@endsection


@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard"><i class="bi bi-house-fill"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Students</li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="container p-5" style="margin-top: -30px">
        @foreach ($advisory as $advice)
            <h4 class="text-center" style="font-weight: bold;">Grade {{ $advice->grade_level }} -
                {{ $advice->section_name }}</h4>
            <h6 class="text-center">S.Y {{ $schoolyear }}</h6>
        @endforeach
        <div class="d-flex justify-content-end mb-4">
            <div class="col">
                <div class="ms-auto p-2 bd-highlight" style=" width: 30%">
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                        placeholder="Search for names..">
                </div>
            </div>
        </div>


        <table class="table table-striped shadow" id="myTable">
            <thead class="text-center">
                <tr>
                    <th>LRN</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Details</th>
                    <th>Report Card</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->LRN }}</td>
                        <td>{{ $student->firstname . ' ' . $student->lastname }}</td>
                        @if ($student->type != 'irregular' || $student->type == '')
                            <td>Regular</td>
                        @else
                            <td>{{ $student->type }}</td>
                        @endif

                        <td> <a href="{{ route('adviserStudent.details', ['id'=>$student->id,'LRN' => $student->LRN, 'schoolyear' => $schoolyear]) }}"
                                class="btn btn-success viewbtn" style="font-size:12px">View</a> </td>
                        @foreach ($teachers as $teacher)
                            <td> <a href="{{ route('student.reportcard', ['id'=>$student->id,'LRN' => $student->LRN, 'teacher' => $teacher->firstname . ' ' . $teacher->lastname]) }}"
                                    class="btn btn-success viewbtn" style="font-size:12px" target="_blank">View</a> </td>
                            <td>
                        @endforeach
                        <h6>{{ $student->status }}</h6>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>


        <!-- Modal For Students INFORMATION-->
        <div class="modal fade" id="viewDetails" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <div class="text-center" style="width:100%">

                            <h6 class="modal-title" class="text-center"> <b>STUDENT DETAILS</b> </h6>

                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row mx-2">
                            <div class="col-md-4 mb-4">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" name="lrn" id="LRN" value="" type="text"
                                        class="form__field" disabled>

                                    <label class="form__label"><b>Learners Reference No.:</b> </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" name="psa" id="psa" value="" type="text"
                                        class="form__field" disabled>
                                    <label class="form__label"><b>PSA No.:</b> </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" name="Date of Birth" value="" type="text"
                                        class="form__field" disabled>
                                    <label class="form__label"><b>Average:</b> </label>
                                </div>
                            </div>
                        </div>


                        <div class="row mx-2">
                            <div class="col-md-4 mb-4">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" name="lastname" id="lastname" value="" type="text"
                                        class="form__field" disabled>

                                    <label class="form__label"><b>Last Name:</b> </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" name="firstname" id="firstname" value="" type="text"
                                        class="form__field" disabled>
                                    <label for="name" class="form__label"><b>First Name:</b> </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form__group field" style=" width: 200px">
                                    <input style="max-width:290px;" name="middlename" value="" type="text"
                                        class="form__field" disabled>
                                    <label class="form__label"><b>Middle Name:</b> </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mx-2 ">
                            <div class="col mb-4">
                                <div class="form__group field" style=" width: 200px">
                                    <input name="lrn" id="LRN" value="" type="text" class="form__field" disabled>
                                    <label class="form__label"><b>Date of Birth:</b> </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form__group field" style=" width: 200px">
                                    <input name="psa" id="psa" value="" type="text" class="form__field" disabled>
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
                                    <p>Belonging to any Indigenous People(IP) Community/Indigenous Cutltural Cummunity?</p>
                                </div>
                                <div class="p-2 flex-fill bd-highlight">
                                    <div s>
                                        <input class="indigenous" type="checkbox" name="IPC" value="YES"
                                            aria-label="Male">&nbsp; Yes
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
                                <div class="form__group field" style=" width: 150px">
                                    <input style="max-width:290px;" type="text" class="form__field" name="motherTongue"
                                        value="{{ old('motherTongue') }}" disabled>
                                    <label class="form__label"> <b>Mother Tongue:</b> </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form__group field" style=" width: 150px">
                                    <input style="max-width:290px;" type="text" class="form__field" name="contact_number"
                                        value="{{ old('contact_number') }}" disabled>
                                    <label class="form__label"> <b>Contact Number:</b> </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form__group field" style=" width: 150px">
                                    <input style="max-width:290px;" type="text" class="form__field" name="address"
                                        value="{{ old('address') }}" disabled>
                                    <label class="form__label"> <b>Address:</b> </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form__group field" style=" width: 150px">
                                    <input style="max-width:290px;" type="number" class="form__field" name="zipcode"
                                        value="{{ old('zipcode') }}" disabled>
                                    <label class="form__label"><b>Zipcode:</b> </label>
                                </div>
                            </div>
                        </div>


                        <div class="row mx-2 mb-4">
                            <div class="col">
                                <div class="form__group field" style=" width: 150px">
                                    <input style="max-width:290px;" type="text" class="form__field" name="father_name"
                                        value="{{ old('father_name') }}">
                                    <label class="form__label"><b>Father's Full Name:</b> </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form__group field" style=" width: 150px">
                                    <input style="max-width:290px;" type="text" class="form__field" name="mother_name"
                                        value="{{ old('mother_name') }}">
                                    <label class="form__label"><b>Mother's Maiden Name:</b> </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form__group field" style=" width: 150px">
                                    <input style="max-width:290px;" type="text" class="form__field" name="guardian"
                                        value="{{ old('guardian') }}">
                                    <label class="form__label"><b>Guardian Name:</b> </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form__group field" style=" width: 150px">
                                    <input style="max-width:290px;" type="text" class="form__field"
                                        name="guardian_contact_number" value="{{ old('guardian_contact_number') }}">
                                    <label class="form__label"> <b>Guardian Contact No.:</b> </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-fill bd-highlight">
                                <div class="mb-3">
                                    <div class="form__group field" style=" width: 300px">
                                        <input type="text" class="form__field">
                                        <label class="form__label"><b>Grade Level:</b> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 flex-fill bd-highlight">
                                <div class="mb-3">
                                    <div class="form__group field" style=" width: 300px">
                                        <input type="text" class="form__field">
                                        <label class="form__label"><b>Section:</b> </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/tablesearch.js') }}"></script>
@endsection
