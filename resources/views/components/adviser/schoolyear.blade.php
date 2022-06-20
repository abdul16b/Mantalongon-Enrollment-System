<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adminSidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>School Year</title>
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

        #cont {}

    </style>
</head>

<body>
    @include('sweetalert::alert')
        <div class="container" style="padding: 20px;">

            <div class="container" id="cont">

                <div class="container p-3">
                    <h4>Please Select School Year</h4>
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
                                        <a href="{{ route('adviser.dashboard', ['schoolyear' => $val->schoolyear]) }}"
                                            class=""><i class="bi bi-box-arrow-right"
                                                style="font-size: 25px" data-bs-toggle="tooltip"
                                                data-bs-placement="right" title="OPEN"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

