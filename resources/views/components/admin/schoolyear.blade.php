@extends('layouts.admin-layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}" />
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
            max-height: 230px;

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
   Sections
@endsection

@section('pathname')
    <h5> <b>Sections</b></h5>
@endsection



@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">School Year</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container">

        <div class=" container d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
            </div>
            <div class="p-2 bd-highlight">

                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addSchoolYear">Add School
                    Year</button>

            </div>
        </div>

        <div class="container p-3">
            @if (Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <table class="table table-striped shadow" id="myTable">
                <thead>
                    <tr>
                        <th>School Year</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($schoolyear as $val)
                        <tr>
                            <td>{{ $val->schoolyear }} </td>
                            <td class="text-end">
                                <a href="{{ route('show.sections', ['schoolyear' => $val->schoolyear]) }}"
                                    class=""><i class="bi bi-box-arrow-right" style="font-size: 25px"
                                        data-bs-toggle="tooltip" data-bs-placement="right" title="OPEN"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="modal fade" id="addSchoolYear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b>ADD SCHOOL YEAR</b> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ url('/school-year') }}" method="post">
                        @csrf
                        <select id="ddlYears" style="width: 100%" name="schoolyear" value='{{ old('school_year') }}'>
                        </select>

                        <button type="submit" class="btn btn-outline-success mt-4" style="float:right; font-size: 12px">
                            ADD</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        window.onload = function() {

            var ddlYears = document.getElementById("ddlYears");

            var year = new Date().getFullYear();
            var lastyear = new Date().getFullYear() - 1;
            var range = [];
            var lastrange = [];
            var academicYear = [];
            lastrange.push(lastyear);
            range.push(year);

            for (var i = 1; i < 100; i++) {
                lastrange.push(lastyear + i);
                range.push(year + i);
                academicYear.push(lastrange[i - 1] + "-" + (lastrange[i]));
            }

            console.log(academicYear);

            var myDate = academicYear.length

            for (var x = 0; x < myDate; x++) {
                var option = document.createElement("OPTION");
                option.value = academicYear[x];
                option.appendChild(document.createTextNode(academicYear[x]))
                ddlYears.appendChild(option);
            }


        };


        //Table search for school year................
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
