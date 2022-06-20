@extends('layouts.admin-layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard.css') }}" />
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
            background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
            color: #fff;
        }

        .l-bg-orange {
            background: linear-gradient(to right, #f9900e, #ffba56) !important;
            color: #fff;
        }

        .l-bg-cyan {
            background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
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
    <div class="container scroll" style="overflow-x: hidden; overflow-y:auto;height:475px">

        <div class="p-5 justify-content-center">

            {{-- for graph in male and female --}}
            <div style="margin-left: 70px; margin-top: -50px;">
                <div class="container mb-4" style="margin-left: 85px">
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row justify-content-center" style=" margin-left: 66px">
                        <div class="col-xl-3 col-lg-6" style="width: 20%">
                            <div class="card l-bg-green-dark">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">{{$males}}

                                            </h2>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight justify-content-end" style="margin-top: -10px;">
                                        <div class="col-4 text-right">
                                            <span> <i class="fa fa-arrow-up"></i></span>
                                        </div>
                                        <h6>Total number of Males </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6" style="width: 20%">
                            <div class="card l-bg-green-dark">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">{{$females}}

                                            </h2>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight justify-content-end" style="margin-top: -10px;">
                                        <div class="col-4 text-right">
                                            <span> <i class="fa fa-arrow-up"></i></span>
                                        </div>
                                        <h6>Total number of Females </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6" style="width: 20%">
                            <div class="card l-bg-green-dark">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">{{$regular}}

                                            </h2>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight justify-content-end" style="margin-top: -10px;">
                                        <div class="col-4 text-right">
                                            <span> <i class="fa fa-arrow-up"></i></span>
                                        </div>
                                        <h6>Total number of Regulars </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6" style="width: 20%">
                            <div class="card l-bg-green-dark">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">{{$irregular}}

                                            </h2>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight justify-content-end" style="margin-top: -10px;">
                                        <div class="col-4 text-right">
                                            <span> <i class="fa fa-arrow-up"></i></span>
                                        </div>
                                        <h6>Total number of Irregulars </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6" style="width: 20%">
                            <div class="card l-bg-green-dark">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">{{$adviser+$nonadviser}}

                                            </h2>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight justify-content-end" style="margin-top: -10px;">
                                        <div class="col-4 text-right">
                                            <span> <i class="fa fa-arrow-up"></i></span>
                                        </div>
                                        <h6>Total number of Teachers </h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://raw.githubusercontent.com/nnnick/Chart.js/master/dist/Chart.bundle.js"></script>
    <script>
        var schoolyears = <?php echo $schoolyear; ?>;
        var xValues = [];
        for (var i in schoolyears) {
            xValues.push(schoolyears[i].schoolyear);
        };
        console.log(xValues);

        var yValues = <?php echo $count; ?>;
        console.log(yValues);

        var barColors = ["red", "green", "blue", "orange", "brown", "yellow", "blue"];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Total Students Population"
                }
            }
        });
    </script>
@endsection
