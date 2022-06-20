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
            max-height: 240px;

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
    My Files
@endsection

@section('pathname')
    <h5><b>My Files</b></h5>
@endsection

@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">My Files</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container p-4" style="margin-rigth:80px;width:90%; margin-right: ">
        <div class="row">
            <div class="col">
                <div class="row row-cols-auto">
                    <div class="col"><button type="button" class="btn btn-outline-success shadow" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Upload</button></div>
                </div>

            </div>
            <div class="col">
                <div class="ms-auto p-2 bd-highlight" style=" width: 60%">
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                        placeholder="Search for file name..">
                </div>
            </div>
        </div>
    </div>


    <div class="container justify-content-center" style="width: 90%">
        <table class="table table-striped shadow" id="myTable">
            <thead>

                <tr>
                    <th>Filename</th>
                    <th class="text-end">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    @if (Auth::user()->id == $file->user_id)
                        <tr>
                            <td>{{ $file->filename }}</td>
                            <td class="text-end"><a href="/teachers/{{ $file->id }}/view" target="_blank"><i class="bi bi-eye-fill"
                                        style="font-size: 20px;color:green"></i></a>

                                <a href="/teachers/{{ $file->id }}/delete" class="deletebtn"><i
                                        class="bi bi-trash-fill" style="font-size: 20px;color:red"></i></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
            {{-- /teachers/{{ $file->id }}/delete --}}
        </table>
    </div>


    <!-- Modal for Upload-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form action="{{ route('myfiles.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" value="{{ Auth::user()->id }}" name="user_id" hidden>
                        <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" required>

                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End for Upload-->
@endsection

@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/tablesearch.js') }}"></script>
@endsection
