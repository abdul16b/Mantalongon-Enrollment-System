@extends('layouts.admin-layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}" />
    <link rel="icon" href="{!! asset('images/mantalongon_logo.png') !!}" />
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
            max-height: 190px;

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
    Subject
@endsection

@section('pathname')
    <h5> <b>Subjects</b></h5>
@endsection

@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin-dashboard"><i class="bi bi-house-fill"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Subjects</li>
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

            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent" style="padding: 40px">
            <div class="tab-pane fade show active" id="nav-grade7" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="container mb-5 " style="width: 87%">
                    <div class="d-flex justify-content-end mb-3"> <a href="" class="btn btn-outline-success shadow"
                            data-bs-toggle="modal" data-bs-target="#addGrade7Subject"><i class="bi bi-plus-lg"></i> Add
                            Subject</a> </div>

                    <table class="table table-striped shadow" id="myTable">
                        <thead>
                            <tr>
                                <th>Subjects</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($subject as $val)
                                @if ($val->gradelevel == '7')
                                    <tr>

                                        <td>{{ $val->subjectname }}</td>
                                        <td class="text-end">
                                            {{-- <a href=""><i class="bi bi-pencil-fill"
                                                    style="color:green"></i></a> --}}
                                            <a href="subjects/delete/{{ $val->id }}"><i class="bi bi-trash-fill"
                                                    style="color: red"></i></a>
                                        </td>


                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>
            <div class="tab-pane fade" id="nav-grade8" role="tabpanel" aria-labelledby="nav-grade8-tab">

                <div class="container mb-5 " style="width: 87%">
                    <div class="d-flex justify-content-end mb-3"> <a href="" class="btn btn-outline-success shadow"
                            data-bs-toggle="modal" data-bs-target="#addGrade8Subject"><i class="bi bi-plus-lg"></i> Add
                            Subject</a> </div>

                    <table class="table table-striped shadow" id="myTable">
                        <thead>
                            <tr>
                                <th>Subjects</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subject as $val)
                                @if ($val->gradelevel == '8')
                                    <tr>

                                        <td>{{ $val->subjectname }}</td>
                                        <td class="text-end">
                                            {{-- <a href=""><i class="bi bi-pencil-fill"
                                                    style="color:green"></i></a> --}}
                                            <a href="subjects/delete/{{ $val->id }}"><i class="bi bi-trash-fill"
                                                    style="color: red"></i></a>
                                        </td>


                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="tab-pane fade" id="nav-grade9" role="tabpanel" aria-labelledby="nav-grade9-tab">

                <div class="container mb-5 " style="width: 87%">
                    <div class="d-flex justify-content-end mb-3"> <a href="" class="btn btn-outline-success shadow"
                            data-bs-toggle="modal" data-bs-target="#addGrade9Subject"><i class="bi bi-plus-lg"></i> Add
                            Subject</a> </div>
                    <table class="table table-striped shadow" id="myTable">
                        <thead>
                            <tr>
                                <th>Subjects</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subject as $val)
                                @if ($val->gradelevel == '9')
                                    <tr>

                                        <td>{{ $val->subjectname }}</td>
                                        <td class="text-end">
                                            {{-- <a href=""><i class="bi bi-pencil-fill"
                                                    style="color:green"></i></a> --}}
                                            <a href="subjects/delete/{{ $val->id }}"><i class="bi bi-trash-fill"
                                                    style="color: red"></i></a>
                                        </td>


                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="tab-pane fade" id="nav-grade10" role="tabpanel" aria-labelledby="nav-garde10-tab">

                <div class="container mb-5 " style="width: 87%">
                    <div class="d-flex justify-content-end mb-3"> <a href="" class="btn btn-outline-success shadow"
                            data-bs-toggle="modal" data-bs-target="#addGrade10Subject"><i class="bi bi-plus-lg"></i> Add
                            Subject</a> </div>
                    <table class="table table-striped shadow" id="myTable">
                        <thead>
                            <tr>
                                <th>Subjects</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subject as $val)
                                @if ($val->gradelevel == '10')
                                    <tr>

                                        <td>{{ $val->subjectname }}</td>
                                        <td class="text-end">
                                            {{-- <a href=""><i class="bi bi-pencil-fill"
                                                    style="color:green"></i></a> --}}
                                            <a href="subjects/delete/{{ $val->id }}"><i class="bi bi-trash-fill"
                                                    style="color: red"></i></a>
                                        </td>


                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- modal for add Grade 7 bsubject --}}
    <div class="modal fade" id="addGrade7Subject" tabindex="-1" aria-labelledby="addSubjectLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header mb-4">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Add Subject</b> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body ">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <form action="{{ url('subjects') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <div class="form__group field" style=" width: 450px">
                                        <input type="text" class="form__field @error('subjectname') is-invalid @enderror"
                                            name="subject" value="{{ old('subjectname') }}" required
                                            autocomplete="subjectname">
                                        <label class="form__label"><b>Subject Name:</b> </label>
                                    </div>
                                </div>

                                @error('subjectname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        <input type="text" hidden name="level" value="7">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal for add Grade 8 bsubject --}}
    <div class="modal fade" id="addGrade8Subject" tabindex="-1" aria-labelledby="addSubjectLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header mb-4">
                    <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body mb-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <form action="{{ url('subjects') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <div class="form__group field" style=" width: 450px">
                                        <input type="text" class="form__field @error('subjectname') is-invalid @enderror"
                                            name="subject" value="{{ old('subjectname') }}" required
                                            autocomplete="subjectname">
                                        <label class="form__label"><b>Subject Name:</b> </label>
                                    </div>
                                </div>

                                @error('subjectname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <input type="text" hidden name="level" value="8">

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal for add Grade 9 bsubject --}}
    <div class="modal fade" id="addGrade9Subject" tabindex="-1" aria-labelledby="addSubjectLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header mb-4">
                    <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body mb-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <form action="{{ url('subjects') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <div class="form__group field" style=" width: 450px">
                                        <input type="text" class="form__field @error('subjectname') is-invalid @enderror"
                                            name="subject" value="{{ old('subjectname') }}" required
                                            autocomplete="subjectname">
                                        <label class="form__label"><b>Subject Name:</b> </label>
                                    </div>
                                </div>

                                @error('subjectname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <input type="text" hidden name="level" value="9">

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    {{-- modal for add Grade 10 bsubject --}}
    <div class="modal fade" id="addGrade10Subject" tabindex="-1" aria-labelledby="addSubjectLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header mb-4">
                    <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body mb-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <form action="{{ url('subjects') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <div class="form__group field" style=" width: 450px">
                                        <input type="text" class="form__field @error('subjectname') is-invalid @enderror"
                                            name="subject" value="{{ old('subjectname') }}" required
                                            autocomplete="subjectname">
                                        <label class="form__label"><b>Subject Name:</b> </label>
                                    </div>
                                </div>

                                @error('subjectname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <input type="text" hidden name="level" value="10">

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Grade 11 --}}
    <div class="modal fade" id="addGrade11Subject" tabindex="-1" aria-labelledby="addSubjectLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header mb-4">
                    <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body mb-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <form action="{{ url('subjects') }}" method="post">
                                @csrf
                                <input type="text" id="subject"
                                    class="form-control @error('subjectname') is-invalid @enderror" name="subject"
                                    value="{{ old('subjectname') }}" required autocomplete="subjectname"
                                    placeholder="Subject" style="width: 400px; margin-top:-17px; margin-left: 26px">

                                @error('subjectname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="text" hidden name="level" value="11">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Grade 12 --}}
    <div class="modal fade" id="addGrade12Subject" tabindex="-1" aria-labelledby="addSubjectLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header mb-4">
                    <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body mb-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <form action="{{ url('subjects') }}" method="post">
                                @csrf
                                <input type="text" id="subject"
                                    class="form-control @error('subjectname') is-invalid @enderror" name="subject"
                                    value="{{ old('subjectname') }}" required autocomplete="subjectname"
                                    placeholder="Subject" style="width: 400px; margin-top:-10px; margin-left: 26px">

                                @error('subjectname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="text" hidden name="level" value="11">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/tablesearch.js') }}"></script>
@endsection
