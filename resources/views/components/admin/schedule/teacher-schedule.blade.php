@extends('layouts.admin-layout')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
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
            <li class="breadcrumb-item active" aria-current="page">Teacher's Schedule</li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="container d-flex bd-highlight p-4" style="width:87%">
        <div class="p-2 flex-fill bd-highlight justify-content-start">
            <div class="d-flex justify-content-start">
                <a href="/teachers/{{ $schoolyear }}/list" class="btn btn-outline-success text-decoration-none"
                    style="font-size: 11px">Back</a>
            </div>
        </div>
        <div class="p-2 flex-fill bd-highlight">
            <div class="d-flex justify-content-center">
                <h6 style="font-weight: bold;">{{ $name }}'s Schedule</h6>
            </div>

        </div>
        <div class="p-2 flex-fill bd-highlight">

        </div>
    </div>

    <div class="container p-4" style="margin-top: -20px">

        <div class="container mb-5 " style="width: 87%" id="datatable">
            <table class="table table-striped shadow-sm" id="myTable">
                <thead>
                    <tr>
                        <th>Grade Level</th>
                        <th>Section</th>
                        <th>Subject</th>
                        <th>Schedule</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $sched)
                        <tr>

                            <td>{{ $sched->gradeLevel }}</td>
                            <td>{{ $sched->section }}</td>
                            <td>{{ $sched->subject }}</td>
                            <td>{{ preg_replace('/[^a-zA-Z0-9_ -]/s', ' ', $sched->days).'( '.$sched->startTime . '-' . $sched->endTime.' )' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/tablesearch.js') }}"></script>
@endsection
