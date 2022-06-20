@extends('layouts.non-advisory-layout')

@section('style')
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
            max-height: 240px;

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
    Subjects
@endsection

@section('pathname')
    <h5> <b>{{ $subject }}</b></h5>
@endsection

@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Subjects</li>
            <li class="breadcrumb-item active" aria-current="page">Section</li>
        </ol>
    </nav>
@endsection


@section('content')
@include('sweetalert::alert')
    <div class="container p-2">
        <div class="text-center">
            @foreach ($schedules as $sched)
                <h4 style="font-weight: bold;">Grade {{ $gradelevel . ' - ' . $section }}</h4>
                <h5><b>{{ $subject }}</b></h5>
                <h6> <b>Schedule: </b>
                    {{ implode(' ', $sched->days) . ' (' . $sched->startTime . ' - ' . $sched->endTime . ')' }}
                </h6>
            @endforeach
        </div>


        <div class="d-flex bd-highlight p-4" style="margin-top: -15px">
            <div class="p-2 flex-fill bd-highlight">
                <a href="/none-advisory/{{$schoolyear}}" class="btn btn-success">Back</a>
            </div>

            <div class="d-flex justify-content-end " style="margin-right:10; width: 90%;">
                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                    placeholder="Search for names.." style="height:43px">
            </div>
        </div>

        <div class="container">
            <table class="table table-striped shadow" id="myTable" style="top:-50px">
                <thead class="text-center">
                    <tr>
                        <th class="text-start">LRN</th>
                        <th class="text-start">Name</th>
                        <th class="text-start">Type</th>
                        <th class="text-start">Action</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->LRN }}</td>
                            <td>{{$student->firstname.' '.$student->lastname}}</td>
                            @if ($student->type != 'irregular' || $student->type == '')
                                <td>Regular</td>
                            @else
                                <td>{{ $student->type }}</td>
                            @endif

                            <td> <a href="{{ route('nonadviseradd.grade', ['studentid'=>$student->id,'LRN' => $student->LRN, 'section' => $section, 'gradelevel' => $gradelevel, 'subject' => $subject, 'schoolyear' => $schoolyear]) }}"
                                    class="btn btn-success" style="font-size:12px">Add Grade </a></td>
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
