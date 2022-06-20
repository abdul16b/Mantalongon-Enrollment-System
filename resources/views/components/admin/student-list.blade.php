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
    All Students
@endsection

@section('pathname')
    <h5> <b>Students List</b></h5>
@endsection


@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">School Year</li>
            <li class="breadcrumb-item active" aria-current="page">Students List</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container">
        <div class="text-center">
            <h4 style="font-weight: bold;">All Students</h4>
            <h6 style="font-weight: bold;">School Year: {{$schoolyear}}</h6>
        </div>
    </div>


    <div class="container p-5" style="margin-top:-53px">
        <div class="p-2 flex-grow-1 bd-highlight mb-2"> <input type="text" id="myInput" onkeyup="myFunction()"
            class="form-control" placeholder="Search for names/lrn.."></div>
        <table class="table table-striped shadow" id="myTable">
            <thead class="text-center">
                <tr>
                    <th class="text-center">LRN</th>
                    <th class="text-center">Name</th>
                    {{-- <th class="text-center">Grade Level</th> --}}
                    <th class="text-center">Details</th>
                    <th class="text-center">Report Card</th>
                    <th class="text-center">Status</th>


                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($students as $student)
                    <tr>
                        <td class="text-center">{{ $student->LRN }}</td>
                        <td class="text-center">{{ $student->firstname }} {{ $student->middlename }}
                            {{ $student->lastname }}</td>
                         {{-- <td class="text-center">{{ $student->gradelevel }}</td> --}}
                        <td class="text-center"> <a href="{{ route('student.details', ['id'=>$student->id,'LRN' => $student->LRN, 'schoolyear'=>$student->school_year]) }}"
                                class="btn btn-success viewbtn" style="font-size:12px">View</a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route("report.card", ['id'=>$student->id, 'LRN' => $student->LRN,  'schoolyear'=>$schoolyear]) }}"
                            class="btn btn-success viewbtn" style="font-size:12px" target="_blank">View</a>
                            {{-- <a href="/junior-high/report-card/{{$student->LRN}}/{{$schoolyear}}"
                                class="btn btn-success viewbtn" style="font-size:12px">View</a> --}}
                        </td>
                        <td class="text-center">
                            {{$student->status}}
                        </td>
                    </tr>

                    @endforeach
            </tbody>

        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/tablesearch.js') }}"></script>
@endsection
