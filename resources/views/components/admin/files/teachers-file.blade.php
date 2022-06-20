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
        max-height: 290px;

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
    Files
@endsection

@section('pathname')
    <h5> <b>Files</b></h5>
@endsection

@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin-dashboard"><i class="bi bi-house-fill"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Files</li>
        </ol>
    </nav>
@endsection
@section('content')

    <div class="container p-4" style="margin-rigth:80px;width:90%; margin-right: ">
        <div class="row">

            <div class="col">
               <a href="file" class="btn btn-success text-decoration-none"
                        id="button1">Back</a>
            </div>
            <div class="col">
                <div class="ms-auto p-2 bd-highlight" style=" width: 60%">
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                        placeholder="Search for names..">
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5 " style="width: 87%">
        <table class="table table-striped shadow" id="myTable">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>

                    <tr>
                        <td class="clickable "
                        onclick="window.location='file'"> July</td>


                    </tr>

            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/tablesearch.js') }}"></script>
    <script src="{{ asset('js/clickableRow.js') }}"></script>
@endsection
