<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .cardDetails {
            margin-top: -4px;
        }

        .headline {
            position: relative;
            top: -20px;
            margin-left: 80px;
            width: 230px;
        }

        .line {
            position: relative;
            top: -20px;
            margin-left: 80px;
            width: 200px;
        }

        .sexline {
            position: relative;
            top: -20px;
            margin-left: 90px;
            width: 200px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        .behaviorRating {
            width: 7%;
        }

        .nav {
            list-style-type: none;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .nav li {
            display: inline-block;
            font-size: 20px;
            padding: 20px;
        }

    </style>
    <title>Report Card</title>
    <link rel="icon" href="{!! asset('images/mantalongon_logo.png') !!}" />
</head>

<body>
    {{-- <div class="d-flex bd-highlight p-4">
            <div class="p-2 flex-grow-1 bd-highlight"></div>
            <div class="p-2 bd-highlight">
                <a href="{{ URL('/components.admin.section.reportcard') }}" target="_blank" class="btn btn-success">Export
                    to PDF</a>
            </div>

        </div> --}}

    <div class="d-flex bd-highlight mb-5">
        <div class="p-2 flex-fill bd-highlight w-50" style="background-color: white">

            <div class="container">
                <div class="d-flex justify-content-center" style="margin-top: 12px">
                    <h6> <b>Report on Attendance</b> </h6>
                </div>
                <div class="d-flex justify-content-center">

                    <table style="width: 100%; height: 200px">
                        <tr>
                            <td> </td>
                            <td> <b>Oct</b> </td>
                            <td> <b>Nov</b> </td>
                            <td><b>Dec </b> </td>
                            <td> <b>Jan </b></td>
                            <td> <b>Feb</b> </td>
                            <td> <b>March </b></td>
                            <td> <b>April</b> </td>
                            <td> <b>May </b></td>
                            <td> <b>June </b></td>
                            <td> <b>July </b></td>
                            <td> <b>Total </b></td>
                        </tr>
                        <tr>
                            <td>No. of School Days </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>

                        </tr>
                        <tr>
                            <td>No. of Days Present</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>

                        </tr>
                        <tr>
                            <td> No. of Days Absent</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>

                        </tr>
                    </table>
                </div>

                <div class="d-flex bd-highlight" style="margin-top: 40px;">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <div>
                            <div style="float: left; margin-top: -15px">Lacks Credit in: </div>
                            <div class="cardDetails">
                                <hr style="display: block; height: 1px;
                                border: 0; border-top: 1px solid rgb(0, 0, 0);
                                 padding: 0; ">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex bd-highlight" style="margin-top: 30px;">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <div>
                            <div style="float: left; margin-top: -15px">Promoted to: </div>
                            <div class="cardDetails">
                                <hr style="display: block; height: 1px;
                                border: 0; border-top: 1px solid rgb(0, 0, 0);
                                 padding: 0; ">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center" style="margin-top: 22px">
                    <h6><b>Parent's/Guardian Signature</b> </h6>
                </div>

                <div class="d-flex bd-highlight" style="margin-top: 18px;">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <div>
                            <div style="float: left; margin-top: -15px">1st Quarter: </div>
                            <div class="cardDetails">
                                <hr style="display: block; height: 1px;
                                border: 0; border-top: 1px solid rgb(0, 0, 0);
                                 padding: 0; ">
                                <hr style="display: block; height: 1px;
                                border: 0; border-top: 1px solid rgb(0, 0, 0);
                                 padding: 0; ">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex bd-highlight" style="margin-top: 18px;">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <div>
                            <div style="float: left; margin-top: -15px">2nd Quarter: </div>
                            <div class="cardDetails">
                                <hr style="display: block; height: 1px;
                                border: 0; border-top: 1px solid rgb(0, 0, 0);
                                 padding: 0; ">
                                <hr style="display: block; height: 1px;
                                border: 0; border-top: 1px solid rgb(0, 0, 0);
                                 padding: 0; ">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex bd-highlight" style="margin-top: 18px;">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <div>
                            <div style="float: left; margin-top: -15px">3rd Quarter: </div>
                            <div class="cardDetails">
                                <hr style="display: block; height: 1px;
                                border: 0; border-top: 1px solid rgb(0, 0, 0);
                                 padding: 0; ">
                                <hr style="display: block; height: 1px;
                                border: 0; border-top: 1px solid rgb(0, 0, 0);
                                 padding: 0; ">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex bd-highlight" style="margin-top: 18px;">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <div>
                            <div style="float: left; margin-top: -15px">4th Quarter: </div>
                            <div class="cardDetails">
                                <hr style="display: block; height: 1px;
                                border: 0; border-top: 1px solid rgb(0, 0, 0);
                                 padding: 0; ">
                                <hr style="display: block; height: 1px;
                                border: 0; border-top: 1px solid rgb(0, 0, 0);
                                 padding: 0; ">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="p-4"></div>

        {{-- For the Front of the Card --}}
        <div class="p-2 flex-fill bd-highlight w-50" style="height: 1180px; background-color: white; color:black">
            <div class="d-flex bd-highlight" style="margin-left: 8%">
                <div class="p-2 flex-grow-1 bd-highlight" style="margin-left:3%; width: 15%"> <img
                        src="{{ URL('images/MNHSofficial_logo.png') }}" height="100px"></div>

                <div class="p-2 bd-highlight" style="margin-top: 50px; width: 400px">
                    <h6 style="margin-left: 26%">Republic of Philippines</h6>
                    <h6 style="margin-left: 20%;font-size:13px;margin-top: -7px"><b> DEPARTMENT OF EDUCATION </b></h6>
                    <h6 style="margin-left: 23%; margin-top: -8px">Region VII, Central Visayas</h6>
                    <h6 style="margin-left: 22%; font-size:13px; margin-top: -7px"> <b> DIVISION OF CEBU PROVINCE </b>
                    </h6>


                    <div style="margin-top: 10px">
                        <div style="float: left;"><b> District: </b></div>
                        <div class="cardDetails" style="margin-top: 20px ">
                            <span style="margin-left: 25%;"> Dalaguete I
                            </span>
                            <hr class="line" style="display: block; height: 1px;
                            border: 0; border-top: 1px solid rgb(0, 0, 0);
                             padding: 0; ">
                        </div>
                    </div>
                    <div style="margin-top: -25px">
                        <div style="float: left;"><b> School: </b></div>
                        <div class="cardDetails" style="margin-top: 20px ">
                            <span style="margin-left: 10%;"> Mantalongon National High School
                            </span>
                            <hr class="headline" style="display: block; height: 1px;
                            border: 0; border-top: 1px solid rgb(0, 0, 0);
                             padding: 0;">
                        </div>
                    </div>

                    <h6 style="font-size:14px; margin-top: 25px; margin-left: 35%"> <b>REPORT CARD</b></h6>

                </div>

                <div class="p-2 bd-highlight" style="margin-right:11%; width: 15%"><img
                        src="{{ URL('images/DepEd-Logo.png') }}" height="100px" style="float: right"></div>
            </div>

            {{-- Left side --}}
            @foreach ($admissions as $admission)
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-fill bd-highlight">

                        <div style="float: left">LRN: </div>
                        <div class="cardDetails">
                            <span style="margin-left: 20%;"> <b>{{ $admission->LRN }}</b></span>
                            <hr class="line" style="display: block; height: 1px;
                            border: 0; border-top: 1px solid rgb(0, 0, 0);
                             padding: 0; ">
                        </div>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div style="float: left">Name: </div>
                        <div class="cardDetails" style="margin-left: 12px">
                            <span style="margin-left: 20%;"> <b>{{ $admission->firstname }}
                                    {{ $admission->middlename }}
                                    {{ $admission->lastname }}</b>
                            </span>
                            <hr class="line" style="display: block; height: 1px;
                        border: 0; border-top: 1px solid rgb(0, 0, 0);
                         padding: 0; ">
                        </div>
                    </div>
                </div>

                <div class="d-flex bd-highlight" style="margin-top: -38px">
                    <div class="p-2 flex-fill bd-highlight">
                        <div style="float: left">Age: </div>
                        <div class="cardDetails">
                            <span style="margin-left: 30%;"> <b>{{ $admission->age }}</b>

                            </span>
                            <hr class="line" style="display: block; height: 1px;
                            border: 0; border-top: 1px solid rgb(0, 0, 0);
                             padding: 0; ">
                        </div>
                    </div>
                    <div class="p-2 flex-fill bd-highlight" style="margin-right: 5px;">
                        <div style="margin-left:12px">
                            <div style="float: left; margin-right: 30%" style="margin-right: 30%">Sex: </div>
                            <div class="cardDetails">
                                <span style="margin-left: 7%;"> <b>{{ $admission->gender }}</b>

                                </span>
                                <hr class="sexline" style="display: block; height: 1px;
                            border: 0; border-top: 1px solid rgb(0, 0, 0);
                             padding: 0;">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="d-flex bd-highlight" style="margin-top: -38px">
                    <div class="p-2 flex-fill bd-highlight">
                        <div style="float: left">Grade: </div>
                        <div class="cardDetails">
                            <span style="margin-left: 27%;"> <b>{{ $admission->gradeLevel }}</b>
                                <hr class="line" style="witdh: 13px;display: block; height: 1px;
                                border: 0; border-top: 1px solid rgb(0, 0, 0);
                                 padding: 0;">
                        </div>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div style="float: left">Section: </div>
                        <div class="cardDetails" style="margin-left: 12px">
                            <span style="margin-left: 30%;"> <b>{{ $section_name }}</b>
                            </span>
                            <hr class="line" style="display: block; height: 1px;
                        border: 0; border-top: 1px solid rgb(0, 0, 0);
                         padding: 0; ">
                        </div>
                    </div>
                </div>

                <div class="d-flex bd-highlight" style="margin-top: -18px">
                    <div class="p-2 flex-fill bd-highlight" style="width: 20px">
                        <div style="margin-top: -9%;">
                            <div style="float: left; margin-top: 3px">School Year: </div>
                            <div class="cardDetails">
                                <span style="margin-left: 3%;"> <b>{{ $admission->school_year }}</b>
                                </span>
                                <hr class="line" style="display: block; height: 1px;
                                border: 0; border-top: 1px solid rgb(0, 0, 0);
                                 padding: 0; ">
                            </div>
                        </div>

                    </div>
                    <div class="p-2 flex-fill bd-highlight">

                    </div>
                </div>
            @endforeach
            <br>


            <div class="container" style="margin-top: -25px; margin-left: 5px;">
                <p>Dear Parents:</p> <br>
                <div class="container" style="margin-left: 13px; margin-top: -12px">
                    <p style="text-indent:5%;justify-content: center;">This report card shows the ability and progress
                        of your child in the different learning areas as
                        well as his/her core values. </p>
                    <p style="text-indent: 5%;">This school welcomes you desire to know more about your
                        child's progress.</p>
                </div>

                <div class="d-flex justify-content-end" style="margin-top: 30px">
                    <div>
                        <h6 style="margin-left: 40px;"> <b> {{ $teacher }} </b></h6>
                        <hr style="width: 200px;  margin-top: -9px; display: block; height: 1px;
                        border: 0; border-top: 1px solid rgb(0, 0, 0);
                         padding: 0; ">
                        <h6 style="margin-top: -12px; margin-left: 70px">Teacher</h6>
                    </div>
                </div>

                <div class="d-flex justify-content-start">
                    <div>
                        <h6 style="margin-left: 20px;"><b> ROBERTO R. ROSALES </b></h6>
                        <hr style="width: 200px;  margin-top: -9px; display: block; height: 1px;
                        border: 0; border-top: 1px solid rgb(0, 0, 0);
                         padding: 0; ">
                        <h6 style="margin-top: -12px; margin-left: 58px">Principal I</h6>
                    </div>
                </div>
                <br>

                <div class="d-flex justify-content-center">
                    <h6> <b> CERTIFICATE OF TRANSFER </b></h6>
                </div>
                <br>
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <div>
                            <div style="float: left; margin-top: -15px">Admitted to Transfer: </div>
                            <div class="cardDetails">
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="p-2 bd-highlight" style="width: 30%">
                        <div>
                            <div style="float: left; margin-top: 3px">Section: </div>
                            <div class="cardDetails">
                                <span style="margin-left: 30%;"> <b> </b>
                                </span>
                                <hr class="line" style="margin-left:50px; display: block; height: 1px;
                                border: 0; border-top: 1px solid rgb(0, 0, 0);
                                 padding: 0; ">
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" d-flex bd-highlight" style="margin-top:-40px">
                    <div class="p-2 flex-fill bd-highlight">
                        <div>
                            <div style="float: left; margin-top: -15px">Eligible to Admission to Grade:
                            </div>
                            <div class="cardDetails">
                                <hr style="display: block; height: 1px;
                                            border: 0; border-top: 1px solid rgb(0, 0, 0);
                                             padding: 0; ">
                            </div>
                        </div>
                    </div>
                </div> <br>

                <h6>Approved:</h6>

                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-fill bd-highlight">
                        <div>
                            <h6 style="margin-left: 20px;"><b> ROBERTO R. ROSALES </b></h6>
                            <hr style="width: 200px;  margin-top: -9px; display: block; height: 1px;
                            border: 0; border-top: 1px solid rgb(0, 0, 0);
                             padding: 0; ">
                            <h6 style="margin-top: -12px; margin-left: 58px">Principal I</h6>
                        </div>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div>
                            <h6 style="margin-left: 40px;"><b> {{ $teacher }}</b></h6>
                            <hr style="width: 200px;  margin-top: -9px">
                            <h6 style="margin-top: -12px; margin-left: 58px">Teacher</h6>
                        </div>
                    </div>
                </div> <br>

                <div class="d-flex justify-content-start" style="margin-top: 18px">
                    <h6>Cancellation of Elligibility to Transfer</h6>
                </div>

                <div class="d-flex bd-highlight" style="width: 80%">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <div>
                            <div style="float: left; margin-top: -15px">Admitted in: </div>
                            <div class="cardDetails">
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex bd-highlight" style="margin-top: -20px; width: 50%">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <div>
                            <div style="float: left; margin-top: -15px">Date: </div>
                            <div class="cardDetails">
                                <hr>
                            </div>
                        </div>
                    </div>
                </div> <br>

                <div class="d-flex justify-content-end" style="margin-top: 19px">
                    <div>
                        <h6 style="margin-left: 20px;"><b> </b></h6>
                        <hr style="width: 200px;  margin-top: -9px; display: block; height: 1px;
                        border: 0; border-top: 1px solid rgb(0, 0, 0);
                         padding: 0;">
                        <h6 style="margin-top: -12px; margin-left: 58px">Principal I</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Inside of the Report Card where grades display. --}}

    {{-- REPORT ON LEARNING PROGRESS AND ACHIEVEMENT --}}
    <div class="d-flex bd-highlight">
        <div class="p-2 flex-fill bd-highlight w-50" style="height: 1180px;background-color: white">
            <div class="d-flex justify-content-center" style="margin-top: 50px">
                <h6> <b>REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</b> </h6>
            </div>


            <div class="d-flex justify-content-center">
                <div class="container">
                    <table>

                        <tr>
                            <th rowspan="2" class="text-center" style="width: 55%;">Learning Areas</th>
                            <th colspan="4" class="text-center">Quarter</th>
                            <th rowspan="2" style="width:5%">Final Grade</th>
                            <th rowspan="2" style="width:7%">Remarks</th>
                        </tr>
                        <tr>
                            <td class="behaviorRating">
                                <h6 class="text-center" style="margin-top:12px"> <b>1</b> </h6>
                            </td>
                            <td class="behaviorRating">
                                <h6 class="text-center" style="margin-top:12px"> <b>2</b> </h6>
                            </td>
                            <td class="behaviorRating">
                                <h6 class="text-center" style="margin-top:12px"> <b>3</b> </h6>
                            </td>
                            <td class="behaviorRating">
                                <h6 class="text-center" style="margin-top:12px"> <b>4</b> </h6>
                            </td>

                        </tr>
                        <tr class="center">
                            @foreach ($grades as $grade)
                                @foreach ($admissions as $admission)
                                    @if ($admission->gradeLevel == '9' || $admission->gradeLevel == '10')
                                        @if ($grade->subjects == 'Technical and Livelihood Education (TLE)')
                                            <td>{{ $grade->subjects . ' - ' . $specialization }}</td>
                                        @else
                                            <td>{{ $grade->subjects }}</td>
                                        @endif
                                    @else
                                        <td>{{ $grade->subjects }}</td>
                                    @endif
                                @endforeach
                                @if ($grade->firstGrading != null && $grade->secondGrading != null && $grade->thirdGrading != null && $grade->fourthGrading != null)
                                    <td class="text-center">{{ $grade->firstGrading }} </td>
                                    <td class="text-center">{{ $grade->secondGrading }} </td>
                                    <td class="text-center"> {{ $grade->thirdGrading }}</td>
                                    <td class="text-center"> {{ $grade->fourthGrading }}</td>
                                    @if ($grade->finalGrade >= 75)
                                        <td class="text-center"> {{ $grade->finalGrade }}</td>
                                    @else
                                        <td style="color: red" class="text-center"> {{ $grade->finalGrade }}</td>
                                    @endif
                                    @if ($grade->finalGrade >= 75)
                                        <td class="text-center"> Passed </td>
                                    @else
                                        <td style="color: red" class="text-center">Failed </td>
                                    @endif
                                @else
                                    <td class="text-center">{{ $grade->firstGrading }} </td>
                                    <td class="text-center">{{ $grade->secondGrading }} </td>
                                    <td class="text-center"> {{ $grade->thirdGrading }}</td>
                                    <td class="text-center"> {{ $grade->fourthGrading }}</td>
                                    <td class="text-center"> </td>
                                    <td class="text-center"> </td>
                                @endif
                        </tr>
                        @endforeach



                        <tr style="height: 15px">
                            <td></td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td colspan="5" style="background-color: rgb(212, 209, 209)"> <b>General
                                    Average</b>
                            </td>
                            @if ($genave != 0)
                                <td>{{ $genave }}</td>
                                @if ($genave >= 75)
                                    <td>Passed </td>
                                @else
                                    <td style="color: red">Failed </td>
                                @endif
                            @else
                                <td></td>
                                <td></td>
                            @endif
                        </tr>

                    </table>

                    <div class="justify-content-center p-2">
                        <div class="container"
                            style="width: 80%;border-style: solid; border-width: thin; margin-top: 12px">
                            <ul class="nav">
                                <li>
                                    <h6> <b>Learning Modality </b> </h6>
                                </li>
                                <li>
                                    <h6> <b>Q1</b> </h6>
                                </li>
                                <li>
                                    <h6> <b>Q2</b> </h6>
                                </li>
                                <li>
                                    <h6> <b>Q3</b> </h6>
                                </li>
                                <li>
                                    <h6> <b>Q4</b> </h6>
                                </li>
                            </ul>
                            <ul class="nav" style="margin-top: -46px">
                                <li>
                                    <h6>Modular printed</h6>
                                </li>
                                <li style="margin-left: 12px">

                                    <input class="form-check-input" type="checkbox" value="" id="">

                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" value="" id="">
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" value="" id="">
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" value="" id="">
                                </li>
                            </ul>
                            <ul class="nav" style="margin-top: -46px;">
                                <li>
                                    <h6>Modular Digital</h6>
                                </li>
                                <li style="margin-left: 15px">
                                    <input class="form-check-input" type="checkbox" value="" id="">
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" value="" id="">
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" value="" id="">
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" value="" id="">
                                </li>
                            </ul>
                            <ul class="nav" style="margin-top: -46px">
                                <li>
                                    <h6 class="text-center">Online</h6>
                                </li>
                                <li style="margin-left: 73px">
                                    <input class="form-check-input" type="checkbox" >
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" >
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" >
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" >
                                </li>
                            </ul>
                        </div>

                    </div>


                    <ul class="nav">
                        <li>
                            <h6 style="font-size: 13px; margin-top: 12px"> <b>Remarks:</b> </h6>
                        </li>
                        <li style="margin-left:20px">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" >
                            <label style="font-size:15px">Promoted</label>
                        </li>
                        <li>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" >
                            <label style="font-size:15px">Retained</label>
                        </li>
                    </ul>

                    {{-- For description of the grading --}}
                    <div style="margin-top: -5px">
                        <ul class="nav">
                            <li>
                                <h6 style="font-size: 13px"> <b>DESCRIPTION</b> </h6>
                            </li>
                            <li style="margin-left:60px;">
                                <h6 style="font-size: 13px"><b>GRADING SCALE</b> </h6>
                            </li>
                            <li style="margin-left:50px">
                                <h6 style="font-size: 13px"><b>REMARKS</b> </h6>
                            </li>
                        </ul>
                        <ul class="nav" style="margin-top: -40px">
                            <li>
                                <h6>Outstanding</h6>
                            </li>
                            <li style="margin-left:80px">
                                <h6>90-100</h6>
                            </li>
                            <li style="margin-left: 96px">
                                <h6>Passed</h6>
                            </li>
                        </ul>
                        <ul class="nav" style="margin-top: -40px">
                            <li>
                                <h6>Very Satisfactory</h6>

                            </li>
                            <li style="margin-left:50px">
                                <h6>85-89</h6>
                            </li>
                            <li style="margin-left: 105px">
                                <h6>Passed</h6>
                            </li>
                        </ul>
                        <ul class="nav" style="margin-top: -40px">
                            <li>
                                <h6>Satisfactory</h6>
                            </li>
                            <li style="margin-left:84px">
                                <h6>80-84</h6>
                            </li>
                            <li style="margin-left: 105px">
                                <h6>Passed</h6>
                            </li>
                        </ul>
                        <ul class="nav" style="margin-top: -40px">
                            <li>
                                <h6>Fairy Satisfactory</h6>
                            </li>
                            <li style="margin-left:50px">
                                <h6>80-84</h6>
                            </li>
                            <li style="margin-left: 105px">
                                <h6>Passed</h6>
                            </li>
                        </ul>
                        <ul class="nav" style="margin-top: -40px">
                            <li>
                                <h6>Did not Meet Expectations</h6>
                            </li>
                            <li style="margin-left: -9px">
                                <h6>Below 75</h6>
                            </li>
                            <li style="margin-left: 85px">
                                <h6>Failed</h6>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>


        {{-- REPORT ON LEARNER'S OBSERVED VALUES --}}
        <div class="p-2 flex-fill bd-highlight"></div>

        <div class="p-2 flex-fill bd-highlight w-50" style="background-color: white">
            <div class="d-flex justify-content-center" style="margin-top: 50px">
                <h6> <b>REPORT ON LEARNER'S OBSERVED VALUES</b> </h6>
            </div>

            <div class="d-flex justify-content-center">
                <div class="container">
                    <table style="width:100%;height: 800px">
                        <tr>
                            <th rowspan="2" class="text-center" style="font-size: 16px;">Core Values</th>
                            <th rowspan="2" class="text-center" style="font-size: 16px;">Behavioral Statement</th>
                            <th colspan="4" class="text-center" style="font-size: 16px;">Quarter</th>
                        </tr>
                        <tr>
                            <td class="behaviorRating">
                                <h6 class="text-center" style="margin-top:12px"> <b>1</b> </h6>
                            </td>
                            <td class="behaviorRating">
                                <h6 class="text-center" style="margin-top:12px"> <b>2</b> </h6>
                            </td>
                            <td class="behaviorRating">
                                <h6 class="text-center" style="margin-top:12px"> <b>3</b> </h6>
                            </td>
                            <td class="behaviorRating">
                                <h6 class="text-center" style="margin-top:12px"> <b>4</b> </h6>
                            </td>

                        </tr>
                        <tr>
                            <td rowspan="2" style="width:25%">
                                <h6>1. MAKA-DIYOS</h6>
                            </td>
                            <td>
                                <div class="container">
                                    <p><i>Express one spiritual<br> beliefs while respecting<br> the spiritual beliefs
                                            of <br> others.
                                        </i>
                                    </p>
                                </div>
                            </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="container">
                                    <p><i>Shows adherence to <br> ethical principles by<br> upholding truth.</i></p>
                                </div>
                            </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>

                        <tr>
                            <td rowspan="2">
                                <h6>2. MAKA-TAO</h6>
                            </td>
                            <td>
                                <div class="container">
                                    <p><i>Is sensitive to individual,<br> social, and cultural <br> differences.</i></p>
                                </div>
                            </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="container">
                                    <p><i>Demonstrates <br> contributions towards <br> solidarity.</i></p>
                                </div>
                            </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>3. MAKA-LIKASAN</h6>
                            </td>
                            <td>
                                <div class="container">
                                    <p><i>Cares for environment <br> and utilizes resources <br> wisely, judiciously,
                                            and <br>
                                            economically.</i></p>
                                </div>
                            </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="width:25%">
                                <h6>4. MAKABANSA</h6>
                            </td>
                            <td>
                                <div class="container">
                                    <p> <i>Demonstrates pride in <br> being a Filipino; exercises <br> the rights
                                            and <br>responsibilities of a <br> Filipino citizen.</i></p>
                                </div>
                            </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="container">
                                    <div class="container">
                                        <p><i>Demonstrate appropriate <br> behavior in carrying out<br> activities in
                                                the school, <br> community and country.</i></p>
                                    </div>
                                </div>
                            </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>

                    </table>

                    <div class="container p-5">
                        <div class="d-flex justify-content-center">

                            <div class="container">
                                <div class="row">
                                    <div class="col" style="margin-left: 30px;">
                                        <h5> <b>Markings</b> </h5>
                                    </div>
                                    <div class="col">
                                        <h5> <b>Non-Numerical Ratings</b> </h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col" style="margin-left: 30px;">
                                        <h6 style="font-size:16px; margin-left:20px">AO</h6>
                                    </div>
                                    <div class="col">
                                        <h6 style="font-size:16px; margin-left:20px">Always Observed</h6>
                                    </div>
                                </div>
                                <div class="row" style="margin-left: 20px;">
                                    <div class="col">
                                        <h6 style="font-size:16px; margin-left:20px">SO</h6>
                                    </div>
                                    <div class="col">
                                        <h6 style="font-size:16px; margin-left:20px">Sometimes Observed</h6>
                                    </div>
                                </div>
                                <div class="row" style="margin-left: 20px;">
                                    <div class="col">
                                        <h6 style="font-size:16px; margin-left:20px">RO</h6>
                                    </div>
                                    <div class="col">
                                        <h6 style="font-size:16px; margin-left:20px">Rarely Observed</h6>
                                    </div>
                                </div>
                                <div class="row" style="margin-left: 20px;">
                                    <div class="col">
                                        <h6 style="font-size:16px; margin-left:20px">NO</h6>
                                    </div>
                                    <div class="col">
                                        <h6 style="font-size:16px; margin-left:20px">Not Observed</h6>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
{{-- <script>
    function PrintElem(elem) {
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');

        mywindow.document.write(elem);

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;
</script> --}}

</html>
