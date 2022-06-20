@extends('layouts.non-advisory-layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard.css') }}" />
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

    </style>
@endsection


@section('title')
    Subjects
@endsection

@section('pathname')
    <h5> <b>Subjects</b></h5>
@endsection

@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Subjects</li>
            <li class="breadcrumb-item active" aria-current="page">Section</li>
            <li class="breadcrumb-item active" aria-current="page">Add Grade</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container p-5">

        <div class="d-flex bd-highlight p-4">
            <div class="p-2 flex-fill bd-highlight">
                <a href="/none-adviser-subjects/{{ $section }}/{{ $gradelevel }}/{{ $subject }}/{{ $schoolyear }}"
                    class="btn btn-success">Back</a>
            </div>
        </div>
        <form
            action="{{ route('noneadvisersave.grade', ['nonstudentid'=>$studentid,'LRN' => $LRN, 'gradelevel' => $gradelevel, 'section' => $section, 'subject' => $subject, 'schoolyear' => $schoolyear, 'id' => $id]) }}"
            method="POST">
            {{-- <form action="{{ route('save.grade', ['LRN' => $LRN]) }}" method="POST"> --}}
            @csrf
            <input type="text" id="LRN" name="LRN" value="{{ $LRN }}" hidden>
            <input type="text" id="subjects" name="subjects" value="{{ $subject }}" hidden>
            <input type="text" id="school_year" name="school_year" value="{{ $schoolyear }}" hidden>

            <table class="table table-striped shadow text-center" style="width:100%">
                <tr>
                    <th rowspan="2" class="p-5"> SUBJECT </th>
                    <th colspan="4">QUARTER</th>
                    <th rowspan="2" class="p-5">FINAL GRADE</th>
                    <th rowspan="2" class="p-5">REMARKS</th>
                </tr>
                <tr>
                    <td>
                        <h6 style="margin-top:20px"><b>1</b></h6>
                    </td>
                    <td>
                        <h6 style="margin-top:20px"><b>2</b></h6>
                    </td>
                    <td readonly>
                        <h6 style="margin-top:20px"><b>3</b></h6>
                    </td>
                    <td readonly>
                        <h6 style="margin-top:20px"><b>4</b></h6>
                    </td>
                </tr>

                <tr>
                    @foreach ($grades as $grade)
                        <td readonly>
                            <h6 id="subjectdata" readonly> <b>{{ $subject }}</h6>
                        </td>
                        @if ($grade->firstGrading != null && $grade->secondGrading != null && $grade->thirdGrading != null && $grade->fourthGrading != null)
                            <td> <input type="text" id="firstGrading" name="firstGrading"
                                    value="{{ $grade->firstGrading }}" style="width: 25px;"> </td>
                            <td> <input type="text" id="secondGrading" name="secondGrading"
                                    value="{{ $grade->secondGrading }}" style="width: 25px;"> </td>
                            <td> <input type="text" id="thirdGrading" name="thirdGrading"
                                    value="{{ $grade->thirdGrading }}" style="width: 25px;"> </td>
                            <td> <input type="text" id="fourthGrading" name="fourthGrading"
                                    value="{{ $grade->fourthGrading }}" style="width: 25px;"> </td>

                            <td>{{ $grade->finalGrade }}</td>
                            @if ($grade->finalGrade >= 75)
                                <td> Passed </td>
                            @else
                                <td style="color: red"> Failed</td>
                            @endif
                        @else
                            <td> <input type="text" id="firstGrading" name="firstGrading"
                                    value="{{ $grade->firstGrading }}" style="width: 25px;"> </td>
                            <td> <input type="text" id="secondGrading" name="secondGrading"
                                    value="{{ $grade->secondGrading }}" style="width: 25px;"> </td>
                            <td> <input type="text" id="thirdGrading" name="thirdGrading"
                                    value="{{ $grade->thirdGrading }}" style="width: 25px;"> </td>
                            <td> <input type="text" id="fourthGrading" name="fourthGrading"
                                    value="{{ $grade->fourthGrading }}" style="width: 25px;"> </td>

                            <td></td>
                            <td> </td>
                        @endif
                    @endforeach
                </tr>
            </table>

            <div class="container">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-success" style="width: 120px; height:40px">Save
                        Grade</button>
                </div>
            </div>
        </form>

    </div>
@endsection


@section('script')
@endsection
