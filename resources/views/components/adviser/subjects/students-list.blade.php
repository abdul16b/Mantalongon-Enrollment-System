@extends('layouts.adviser-layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/teacher-dashboard.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/scrollableTable.css') }}" />
@endsection

@section('title')
    Student's List
@endsection

@section('pathname')
    <h5> <b>Subjects</b></h5>
@endsection


@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Subjects</li>
            <li class="breadcrumb-item active" aria-current="page">Grade {{ $gradelevel }}</li>
            <li class="breadcrumb-item active" aria-current="page">{{ $section }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    @include('sweetalert::alert')
    <div class="container p-2">
        <x-admin.header>
            @foreach ($schedules as $sched)
                <h4 style="font-weight: bold;">Grade {{ $gradelevel . ' - ' . $section }}</h4>
                <h5 style="font-size: 17px;">{{$subject}}</h5>
                <h6> <b>Schedule: </b>
                    {{ implode(' ', $sched->days) . ' ' . $sched->startTime . ' - ' . $sched->endTime }}
                </h6>
            @endforeach
        </x-admin.header>

        <div class="d-flex bd-highlight p-4">
            <div class="p-2 flex-fill bd-highlight">
                <a href="/adviser-subjects/{{ $schoolyear }}" class="btn btn-success">Back</a>
            </div>

            <div class="d-flex justify-content-end " style="margin-right:10; width: 30%;">
                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                    placeholder="Search for names/lrn.." style="height:43px">

            </div>
        </div>

        <div class="container">
            <table class="table table-striped shadow" id="myTable" style="top:-50px">
                <thead class="text-center">
                    <tr>
                        <th>LRN</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->LRN }}</td>
                            <td>{{ $student->firstname . ' ' . $student->lastname }}</td>
                            @if ($student->type != 'irregular' || $student->type == '')
                                <td>regular</td>
                            @else
                                <td>{{ $student->type }}</td>
                            @endif

                            <td> <a href="{{ route('add.grade', ['studId' => $student->id, 'LRN' => $student->LRN, 'section' => $section, 'gradelevel' => $gradelevel, 'subject' => $subject, 'schoolyear' => $schoolyear]) }}"
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
