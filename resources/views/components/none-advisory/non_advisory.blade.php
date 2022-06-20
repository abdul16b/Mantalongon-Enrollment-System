@extends('layouts.non-advisory-layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard.css') }}" />
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
            <li class="breadcrumb-item active" aria-current="page">Subject</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container p-5" style="overflow-x: hidden; overflow-y:auto;height:455px">

        <div class="row">
            @foreach ($sections as $section)
                <div class="col-4">
                    <div class="card shadow " style="width: 18rem;">
                        <div class="card-body">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">
                                    <h3 class="text-center">{{ $section->subject }}</h3>
                                    <h6 class="text-center">Grade {{ $section->gradeLevel }}</h6>
                                    <h6 class="text-center">Section: <b>{{ $section->section }}</b> </h6>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('noneadviserStudent.list', ['gradelevel' => $section->gradeLevel, 'section' => $section->section, 'subject' => $section->subject, 'schoolyear' => $schoolyear]) }}"
                            class="btn btn-success openButton " style="width: 100%"><i class="bi bi-arrow-bar-right" style="font-size: 15px">Open</i> </a>
                    </div>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
@endsection
