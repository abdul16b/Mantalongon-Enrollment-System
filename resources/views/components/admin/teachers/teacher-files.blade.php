@extends('layouts.admin-layout')

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
            max-height: 350px;

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
    Teacher's File
@endsection

@section('pathname')
    <h5> <b>Teacher</b></h5>
@endsection


@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">School Year</li>
            <li class="breadcrumb-item active" aria-current="page">Teachers</li>
            {{-- <li class="breadcrumb-item"><a href="/teachers/{{ $schoolyear }}/list">Teachers</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Files</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container">

        <div class="p-4">
            <a type="button" href="/teachers/{{ $schoolyear }}/list" class="btn btn-outline-success"> Back</a>

            <div class="container mb-5 " style="width: 90%">
                <table class="table shadow" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-start">File Name</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($files as $file)
                            <tr>
                                <td>{{ $file->filename }}</td>
                                <td class="text-end">
                                    <a href="/teachers/{{ $file->id }}/viewTeacherFile/{{$id}}" target="blank"> <i class="bi bi-eye"
                                            style="font-size: 20px; color: green"></i></a>
                                </td>
                                {{-- /teachers/{file}/viewteacherFile --}}
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
