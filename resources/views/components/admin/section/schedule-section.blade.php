@extends('layouts.admin-layout')
@section('style')
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
            max-height: 320px;
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
            <li class="breadcrumb-item active" aria-current="page">{{ $section->section_name }} </li>
            <li class="breadcrumb-item active" aria-current="page">Schedule</li>
        </ol>
    </nav>
@endsection



@section('content')
    <div class="d-flex justify-content-center">
        <h3>{{ $section->section_name }}</h3>
        @foreach ($teachers as $teacher)
            <h6>Adviser: <b>{{ $teacher->firstname . ' ' . $teacher->lastname }}</b></h6>
        @endforeach
    </div>

    <div class="container p-4" style="margin-top: -24px">
        {{-- /teachers/{{ $section->id }}/details --}}
        {{-- /teachers/{{ $section->id }}/student-list --}}
        <a href="{{ URL::previous() }}" type="button" class="btn btn-outline-success"
            style="text-decoration: none;">Back</a>
        {{-- <a href="{{ URL('/components.admin.section.schedule_convert_pdf') }}" target="_blank"
            class="form-control rounded m-3 mt-1 btn btn-success"
            style="width: 150px; float: right; color: white; text-decoration: none;"> Print Schedule</a> --}}
            {{-- <a href="'/prnpriview'" target="_blank"
            class="form-control rounded m-3 mt-1 btn btn-success"
            style="width: 150px; float: right; color: white; text-decoration: none;"> Print Schedule</a> --}}

    </div>
    <div class="container" style="margin-top: -15px">


        <table class="table table-striped shadow" id="myTable">
            <thead class="text-center">

                <tr>
                    <th class="text-center">Subjects</th>
                    <th class="text-center">Teachers</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">Days</th>
                    <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody class="text-center">

                @foreach ($subjectSched as $data)
                    <tr>
                        <td class="text-center">{{ $data->subject }}</td>

                        <td class="text-center">
                            <input type="text" class="form-control text-center" value="{{ $data->teacher }}" disabled>
                        </td>
                        <td class="text-center"><input type="text" class="form-control text-center"
                                value="{{ $data->startTime }} - {{ $data->endTime }}" disabled></td>
                        <td class="text-center"><input type="text" class="form-control text-center"
                                value="{{ preg_replace('/[^a-zA-Z0-9_ -]/s', ' ', $data->days) }}" disabled>
                        </td>
                        <td class="text-center">
                            <a type="button"
                                href="{{ route('schedule.edit', ['id' => $data->id, 'gradeLevel' => $data->gradeLevel, 'subject' => $data->subject, 'schoolyear'=>$schoolyear]) }}">
                                <i class=" btn bi bi-pencil-fill " style="color: green">
                                </i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
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
