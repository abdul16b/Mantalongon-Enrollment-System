@extends('layouts.admin-layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}" />
    <style>
        <style>table {
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
            max-height: 200px;

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
    Sections
@endsection

@section('pathname')
    <h5> <b>Sections</b></h5>
@endsection


@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">School Year</li>
            <li class="breadcrumb-item active" aria-current="page">Sections</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container p-4">

        <nav class="p-3" style="background-color:rgb(16, 90, 56); height: 55px; margin-top:-29px">
            <div class="nav nav-tabs justify-content-between" id="nav-tab" role="tablist">
                <button class="nav-link active subjects" id="nav-grade7-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-grade7" type="button" role="tab" aria-controls="nav-grade7" aria-selected="false"
                    style="background-color:rgb(16, 90, 56); margin-top: 7px;color:white">Grade 7</button>

                <button class="nav-link subjects" id="nav-grade8-tab" data-bs-toggle="tab" data-bs-target="#nav-grade8"
                    type="button" role="tab" aria-controls="nav-grade8" aria-selected="false"
                    style="background-color:rgb(16, 90, 56); margin-top: 7px;color:white">Grade 8</button>
                <button class="nav-link subjects" id="nav-grade9-tab" data-bs-toggle="tab" data-bs-target="#nav-grade9"
                    type="button" role="tab" aria-controls="nav-grade9" aria-selected="false"
                    style="background-color:rgb(16, 90, 56); margin-top: 7px;color:white">Grade 9</button>
                <button class="nav-link subjects" id="nav-grade10-tab" data-bs-toggle="tab" data-bs-target="#nav-grade10"
                    type="button" role="tab" aria-controls="nav-grade10" aria-selected="false"
                    style="background-color:rgb(16, 90, 56); margin-top: 7px;color:white">Grade 10</button>
                <button class="nav-link subjects" id="nav-grade10-tab" data-bs-toggle="tab" data-bs-target="#nav-Irregular"
                    type="button" role="tab" aria-controls="nav-grade10" aria-selected="false"
                    style="background-color:rgb(16, 90, 56); margin-top: 7px;color:white">Irregular</button>

            </div>
        </nav>


        <div class="tab-content" id="myTabContent">

            {{-- For Grade 7 TabPane --}}
            <div class="tab-pane fade show active" id="nav-grade7" role="tabpanel" aria-labelledby="grade7-tab">

                <div class="container p-3">
                    <div class="d-flex justify-content-end mb-4"> <a class="btn btn-outline-success shadow"
                            data-bs-toggle="modal" data-bs-target="#grade7Section">Add section</a></div>

                    <div style="overflow-x: hidden; overflow-y:auto;height:320px;">
                        {{-- Cards with data --}}
                        <div class="row">
                            @foreach ($sections as $section)
                                @if ($section->grade_level == '7')
                                    <div class="col-4">
                                        <div class="card shadow">
                                            <div class="d-flex justify-content-center">
                                                <h3 class="text-center" style="color:black">
                                                    {{ $section->section_name }}
                                                </h3>
                                            </div>

                                            <div class="card-body">
                                                <div class="d-flex justify-content-start">
                                                    <h6 class="card-title text-center" hidden> Capacity: <b>
                                                            {{ $section->capacity }}
                                                        </b></h6>
                                                </div>
                                                @foreach ($section->users as $teacher)
                                                    <div class="d-flex justify-content-start">
                                                        <h6 class="card-title text-center"> Adviser: <b>
                                                                {{ $teacher->firstname . ' ' . $teacher->middlename . '. ' . $teacher->lastname }}
                                                            </b></h6>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a href="{{ route('student.list', ['id' => $section->id, 'schoolyear' => $schoolyear]) }}"
                                                class="btn"
                                                style="width: 100%;background-color:rgb(19, 110, 68); color: white"> <i
                                                    class="bi bi-arrow-bar-right" style="font-size: 15px">Open</i> </a>
                                        </div>
                                        <br>

                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            {{-- End of Grade 7 Tab Pane --}}



            {{-- For Grade 8 Tab Pane --}}
            <div class="tab-pane fade" id="nav-grade8" role="tabpanel" aria-labelledby="grade8-tab">
                <div class="container p-3">
                    <div class="d-flex justify-content-end"> <a class="btn btn-outline-success shadow"
                            data-bs-toggle="modal" data-bs-target="#grade8Section">Add section</a></div> <br>

                    <div style="overflow-x: hidden; overflow-y:auto;height:320px;">
                        {{-- Cards with data --}}
                        <div class="row">
                            @foreach ($sections as $section)
                                @if ($section->grade_level == '8')
                                    <div class="col-4">
                                        <div class="card shadow" style="width: 18rem;">
                                            <div class="d-flex bd-highlight">
                                                <div class="p-2 flex-fill bd-highlight"></div>
                                                <div class="p-2 flex-fill bd-highlight">
                                                    <h3 style="color:black">
                                                        {{ $section->section_name }}
                                                    </h3>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="d-flex justify-content-start">
                                                    <h6 class="card-title text-center" hidden> Capacity: <b>
                                                            {{ $section->capacity }}
                                                        </b></h6>
                                                </div>
                                                @foreach ($section->users as $teacher)
                                                    <div class="d-flex justify-content-start">
                                                        <h6 class="card-title text-center"> Adviser: <b>
                                                                {{ $teacher->firstname . ' ' . $teacher->middlename . '. ' . $teacher->lastname }}
                                                            </b></h6>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <a href="{{ route('student.list', ['id' => $section->id, 'schoolyear' => $schoolyear]) }}"
                                                class="btn"
                                                style="width: 100%;background-color:rgb(19, 110, 68); color: white"> <i
                                                    class="bi bi-arrow-bar-right" style="font-size: 15px">Open</i> </a>
                                        </div>
                                        <br>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            {{-- End of Grade 8 tab pane --}}


            {{-- For Grade 9 Tabe Pane --}}
            <div class="tab-pane fade" id="nav-grade9" role="tabpanel" aria-labelledby="grade9-tab">
                <div class="container p-3">
                    <div class="d-flex justify-content-end"> <a class="btn btn-outline-success shadow"
                            data-bs-toggle="modal" data-bs-target="#grade9Section">Add section</a>
                    </div><br>

                    <div style="overflow-x: hidden; overflow-y:auto;height:320px;">
                        {{-- Cards with data --}}
                        <div class="row">
                            @foreach ($section->users as $teacher)
                                @foreach ($sections as $section)
                                    @if ($section->grade_level == '9')
                                        <div class="col-4">
                                            <div class="card shadow" style="width: 18rem;">
                                                <div class="d-flex bd-highlight">
                                                    <div class="p-2 flex-fill bd-highlight text-center" >
                                                        <h3 class="text-center" style="color:black">
                                                            {{ $section->section_name }}
                                                        </h3>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <div class="d-flex justify-content-start">
                                                        <h6 class="card-title text-center" hidden> Capacity: <b>
                                                                {{ $section->capacity }}
                                                            </b></h6>
                                                    </div>
                                                    @foreach ($section->users as $teacher)
                                                        <div class="d-flex justify-content-start">
                                                            <h6 class="card-title text-center"> Adviser: <b>
                                                                    {{ $teacher->firstname . ' ' . $teacher->middlename . '. ' . $teacher->lastname }}
                                                                </b></h6>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <a href="/teachers/{{ $section->id }}/student-list/{{ $schoolyear }}"
                                                    class="btn btn-success" style="width: 100%;"><i
                                                        class="bi bi-arrow-bar-right" style="font-size: 15px">Open</i> </a>
                                            </div>
                                            <br>
                                        </div>

                                        @endif
                                        @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- End of Grade 9 tab pane --}}

            {{-- For Grade 10 Tab Pane --}}
            <div class="tab-pane fade" id="nav-grade10" role="tabpanel" aria-labelledby="grade10-tab">
                <div class="container p-3">
                    <div class="d-flex justify-content-end"> <a class="btn btn-outline-success shadow"
                            data-bs-toggle="modal" data-bs-target="#grade10Section">Add section</a></div> <br>

                    <div style="overflow-x: hidden; overflow-y:auto;height:320px;">
                        {{-- Cards with data --}}
                        <div class="row">
                            @foreach ($sections as $section)
                                @if ($section->grade_level == '10')
                                    <div class="col-4">
                                        <div class="card shadow" style="width: 18rem;">
                                            <div class="d-flex bd-highlight">
                                                <div class="p-2 flex-fill bd-highlight text-center" >
                                                    <h3 class="text-center" style="color:black">
                                                        {{ $section->section_name }}
                                                    </h3>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="d-flex justify-content-start">
                                                    <h6 class="card-title text-center" hidden> Capacity: <b>
                                                            {{ $section->capacity }}
                                                        </b></h6>
                                                </div>
                                                @foreach ($section->users as $teacher)
                                                    {{-- @if ($section->teacher_id == $adviser->id) --}}
                                                    <div class="d-flex justify-content-start">
                                                        <h6 class="card-title text-center"> Adviser: <b>
                                                                {{ $teacher->firstname . ' ' . $teacher->middlename . '. ' . $teacher->lastname }}
                                                            </b></h6>
                                                    </div>
                                                    {{-- @endif --}}
                                                @endforeach
                                            </div>

                                            <a href="/teachers/{{ $section->id }}/student-list/{{ $schoolyear }}"
                                                class="btn btn-success" style="width: 100%;"><i
                                                    class="bi bi-arrow-bar-right" style="font-size: 15px">Open</i> </a>
                                        </div>
                                        <br>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- End of Grade 10 Tab pane --}}

            {{-- Tab pane for irregular students --}}
            <div class="tab-pane fade" id="nav-Irregular" role="tabpanel" aria-labelledby="irregular-tab">
                <div class="container p-3">
                    <div class="container p-2" style="margin-top:-12px">
                        <div class="d-flex bd-highlight">

                            <div class="p-2 flex-fill bd-highlight">
                                <div style="margin-top: 12px">
                                    <h6><b>Total Students:</b> {{ $irregulars->count() }} </h6>
                                </div>
                            </div>
                            <div class="p-2 flex-fill bd-highlight">
                                <input type="search" class="form-control rounded m-3 mt-1" placeholder="Search for names"
                                    id="myInput" onkeyup="myFunction()" aria-label="Search" aria-describedby="search-addon"
                                    style="width: 300px; float: right;" />
                            </div>

                        </div>

                        <table class="table table-striped shadow" id="myTable">
                            <thead >
                                <tr>
                                    <th>LRN</th>
                                    <th>Name</th>
                                    <th>Grade Level</th>
                                    <th>Subjects Taken</th>
                                    <th>Details</th>
                                    <th>Report Card</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($irregulars as $irregular)
                                    <tr>
                                        <td>{{ $irregular->LRN }}</td>
                                        <td>{{ $irregular->firstname . ' ' . $irregular->lastname }}</td>
                                        <td>{{ $irregular->gradeLevel }}</td>
                                        <td>{{implode(', ',$irregular->subjects)}}</td>
                                        <td> <a href="{{ route('irregularstudent.details', ['id'=>$irregular->id,'LRN' => $irregular->LRN, 'schoolyear'=>$irregular->school_year]) }}"
                                                class="btn btn-success viewbtn" style="font-size:12px">View</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('irregularstudent.reportcard', ['id'=>$irregular->id,'LRN' => $irregular->LRN, 'sectionid' => $irregular->section, 'schoolyear'=>$irregular->school_year]) }}"
                                                class="btn btn-success viewbtn" style="font-size:12px" target="blank">View</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>




    <!-- Modal for Add Grade 7 Section -->
    <div class="modal fade" id="grade7Section" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b> Add Section</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('create.section', ['schoolyear' => $schoolyear]) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="school_year" value="{{ $schoolyear }}" hidden>
                        <div class="mb-3">
                            <div class="form__group field" style=" width: 450px">
                                <input type="text" class="form__field" name="section_name" style="margin-top:-12px"
                                    required>
                                <label class="form__label"><b>Section Name:</b>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3" hidden>
                            <div class="form__group field" style=" width: 450px">
                                <input type="text" class="form__field" name="capacity" style="margin-top:-12px">
                                <label class="form__label" hidden><b>Capacity:</b>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form__group field" style=" width: 450px">
                                <select name="teacher_id" id="adviser" class="form__field" style="margin-top:-12px"
                                    required>
                                    <option value="" selected disabled>--select
                                        adviser--</option>

                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">
                                            {{ $teacher->lastname . ', ' . $teacher->firstname . ' ' . $teacher->middlename . '.' }}
                                        </option>
                                    @endforeach

                                </select>
                                <label class="form__label"><b>Adviser:</b>
                                </label>
                            </div>
                        </div>

                        <input type="text" name="grade_level" value="7" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

            </div>

            </form>
        </div>
    </div>


    <!-- Modal for Add Grade 8 Section -->
    <div class="modal fade" id="grade8Section" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b>Add Section</b> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('create.section', ['schoolyear' => $schoolyear]) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="school_year" value="{{ $schoolyear }}" hidden>
                        <div class="mb-3">
                            <div class="form__group field" style=" width: 450px">
                                <input type="text" class="form__field" name="section_name" style="margin-top:-12px"
                                    required>
                                <label class="form__label"><b>Section Name:</b>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3" hidden>
                            <div class="form__group field" style=" width: 450px">
                                <input type="text" class="form__field" name="capacity" style="margin-top:-12px">
                                <label class="form__label"><b>Capacity:</b>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form__group field" style=" width: 450px">
                                <select name="teacher_id" id="adviser" class="form__field" style="margin-top:-12px"
                                    required>
                                    <option value="" selected disabled>--select
                                        adviser--</option>

                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">
                                            {{ $teacher->lastname . ', ' . $teacher->firstname . ' ' . $teacher->middlename . '.' }}
                                        </option>
                                    @endforeach

                                </select>

                                @if ($errors->all())
                                    @dd($errors->all());
                                @endif
                                <label class="form__label"><b>Adviser:</b>
                                </label>
                            </div>
                        </div>

                        <input type="text" name="grade_level" value="8" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal for Add Grade 9 Section -->
    <div class="modal fade" id="grade9Section" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <b>Add Section</b> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('create.section', ['schoolyear' => $schoolyear]) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="school_year" value="{{ $schoolyear }}" hidden>
                        <div class="mb-3">
                            <div class="form__group field" style=" width: 450px">
                                <input type="text" class="form__field" name="section_name" style="margin-top:-12px"
                                    required>
                                <label class="form__label"><b>Section Name:</b>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3" hidden>
                            <div class="form__group field" style=" width: 450px">
                                <input type="text" class="form__field" name="capacity" style="margin-top:-12px">
                                <label class="form__label"><b>Capacity:</b>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form__group field" style=" width: 450px">
                                <select name="teacher_id" id="adviser" class="form__field" style="margin-top:-12px"
                                    required>
                                    <option value="" selected disabled>--select
                                        adviser--</option>

                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">
                                            {{ $teacher->lastname . ', ' . $teacher->firstname . ' ' . $teacher->middlename . '.' }}
                                        </option>
                                    @endforeach

                                </select>

                                @if ($errors->all())
                                    @dd($errors->all());
                                @endif
                                <label class="form__label"><b>Adviser:</b>
                                </label>
                            </div>
                        </div>

                        <input type="text" name="grade_level" value="9" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>


                <input type="text" name="grade_level" value="9" hidden>

            </div>
        </div>
    </div>

    <!-- Modal for Add Grade 10 Section -->
    <div class="modal fade" id="grade10Section" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b>Add Section</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('create.section', ['schoolyear' => $schoolyear]) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="school_year" value="{{ $schoolyear }}" hidden>
                        <div class="mb-3">
                            <div class="form__group field" style=" width: 450px">
                                <input type="text" class="form__field" name="section_name" style="margin-top:-12px"
                                    required>
                                <label class="form__label"><b>Section Name:</b>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3" hidden>
                            <div class="form__group field" style=" width: 450px">
                                <input type="text" class="form__field" name="capacity" style="margin-top:-12px">
                                <label class="form__label"><b>Capacity:</b>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form__group field" style=" width: 450px">
                                <select name="teacher_id" id="adviser" class="form__field" style="margin-top:-12px"
                                    required>
                                    <option value="" selected disabled>--select
                                        adviser--</option>

                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">
                                            {{ $teacher->lastname . ', ' . $teacher->firstname . ' ' . $teacher->middlename . '.' }}
                                        </option>
                                    @endforeach

                                </select>

                                @if ($errors->all())
                                    @dd($errors->all());
                                @endif
                                <label class="form__label"><b>Adviser:</b>
                                </label>
                            </div>
                        </div>

                        <input type="text" name="grade_level" value="10" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
    {{-- <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('js/tablesearch.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('a[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>
@endsection
