@extends('layouts.adviser-layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/teacher-dashboard.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <style>
        .card {
            background-color: #fff;
            border-radius: 10px;
            border: none;
            position: relative;
            margin-bottom: 30px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
        }

        .l-bg-cherry {
            background: linear-gradient(to right, #493240, #f09) !important;
            color: #fff;
        }

        .l-bg-blue-dark {
            background: linear-gradient(to right, #373b44, #4286f4) !important;
            color: #fff;
        }

        .l-bg-green-dark {
            background: linear-gradient(to right, #0a504a, #38ef7d) !important;
            color: #fff;
        }

        .l-bg-orange-dark {
            background: linear-gradient(to right, #a86008, #ffba56) !important;
            color: #fff;
        }

        .card .card-statistic-3 .card-icon-large .fas,
        .card .card-statistic-3 .card-icon-large .far,
        .card .card-statistic-3 .card-icon-large .fab,
        .card .card-statistic-3 .card-icon-large .fal {
            font-size: 110px;
        }

        .card .card-statistic-3 .card-icon {
            text-align: center;
            line-height: 50px;
            margin-left: 15px;
            color: #000;
            position: absolute;
            right: -5px;
            top: 20px;
            opacity: 0.1;
        }

        .l-bg-cyan {
            background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
            color: #fff;
        }

        .l-bg-green {
            background: linear-gradient(135deg, #096e6b 0%, #43e794 100%) !important;
            color: #fff;
        }

        .l-bg-orange {
            background: linear-gradient(to right, #f9900e, #ffba56) !important;
            color: #fff;
        }

        .l-bg-cyan {
            background: linear-gradient(135deg, #0a5691, #84c0ec) !important;
            color: #fff;
        }

    </style>
@endsection

@section('title')
    Dashboard
@endsection

@section('pathname')
    <h5> <b>Dashboard</b></h5>
@endsection


@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
@endsection



@section('content')
    @foreach ($advisory as $ads)
        <div class="container">
            <div class="d-flex justify-content-end" style="margin-right:11px">
                <h6> <b>Grade {{$ads->grade_level}} - {{$ads->section_name}} S.Y. {{$schoolyear}}</b> </h6>
            </div>
        </div>


        <div class="container scroll" style="overflow-x: hidden; overflow-y:auto;height:450px">

            <div class="p-3 justify-content-center" style="d">
                <div class="col-md-10">
                    <div class="row justify-content-center" style=" margin-left: 66px;width: 950px">
                        <div class="col-xl-3 col-lg-6" style="width: 30%">
                            <div class="card l-bg-cyan">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                {{$male}}
                                            </h2>
                                        </div>

                                    </div>
                                    <div class="p-2 bd-highlight justify-content-end" style="margin-top: -10px;">
                                        <div class="col-4 text-right">
                                            <span> <i class="fa fa-arrow-up"></i></span>
                                        </div>
                                        <h6>Total Male Students</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6" style="width: 30%">
                            <div class="card l-bg-cherry">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                {{$female}}
                                            </h2>
                                        </div>

                                    </div>
                                    <div class="p-2 bd-highlight justify-content-end" style="margin-top: -10px;">
                                        <div class="col-4 text-right">
                                            <span> <i class="fa fa-arrow-up"></i></span>
                                        </div>
                                        <h6>Total Female Students</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6" style="width: 50%">
                            <div class="card l-bg-green ">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                {{$regular}}
                                            </h2>
                                        </div>

                                    </div>
                                    <div class="p-2 bd-highlight justify-content-end" style="margin-top: -10px;">
                                        <div class="col-4 text-right">
                                            <span> <i class="fa fa-arrow-up"></i></span>
                                        </div>
                                        <h6>Total Regular Students</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6" style="width: 50%">
                            <div class="card l-bg-green ">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                {{$irregular}}
                                            </h2>
                                        </div>

                                    </div>
                                    <div class="p-2 bd-highlight justify-content-end" style="margin-top: -10px;">
                                        <div class="col-4 text-right">
                                            <span> <i class="fa fa-arrow-up"></i></span>
                                        </div>
                                        <h6>Total Irregular Students</h6>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    @endforeach
@endsection
