@extends('layouts.adviser-layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/teacher-dashboard.css') }}" />
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
            max-height: 300px;
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
    Schedule
@endsection

@section('pathname')
    <h5> <b>Schedule</b></h5>
@endsection


@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Schedule</li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="container p-4">

        <div class="d-flex justify-content-center">
            <h5>My Schedules</h5>
        </div>

        <div class="container p-4">
            <table class="table table-striped shadow" id="myTable" style="top:-50px">
                <thead class="text-center">
                    <tr>
                        <th class="text-start">Subject</th>
                        <th class="text-center">Grade Level</th>
                        <th class="text-center">Section</th>
                        <th class="text-center">Schedule</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($schedules as $sched)
                        <tr>
                            <td class="text-start">{{ $sched->subject }}</td>
                            <td class="text-center">{{ $sched->gradeLevel }}</td>
                            <td class="text-center">{{$sched->section}}</td>
                            <td class="text-center">
                                {{ implode(' ', $sched->days) . ' ( ' . $sched->startTime . ' - ' . $sched->endTime.' )'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
