@extends('layouts.adviser-layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/teacher-dashboard.css') }}" />
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
        </ol>
    </nav>
@endsection


@section('content')
    <div class="container p-5" style="overflow-x: hidden; overflow-y:auto;height:455px">

        <div class="row">

            @foreach ($subjects as $subject)
                <div class="col-lg" style="margin-left:100px">
                    <div class="card shadow "
                        style="width: 22rem;  background-image: linear-gradient(#046644 100%, #067658 75%, #05684e 25%)">
                        <h3 class="text-center" style="color:white">{{ $subject->subject }}</h3>
                        <div class="card-body" style="background-color: white;">
                            <h3 class="card-title text-center"> <b>Section: {{ $subject->section }} </b></h3>
                            <hr style="width:100%;text-align:left;margin-left:0">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center ">
                                        <h1>Grade Level: {{ $subject->gradeLevel }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/students-list/{{ $subject->section_id }}" class="btn btn-success"> <i
                                class="bi bi-arrow-bar-right" style="font-size: 15px">Open</a>
                    </div>
                </div>
            @endforeach





        </div>
    </div>
@endsection
