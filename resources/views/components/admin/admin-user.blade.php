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
            max-height: 300px;

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
    Admin User
@endsection

@section('pathname')
    <h5> <b>Admin User</b></h5>
@endsection

@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Admin User</li>
        </ol>
    </nav>
@endsection

@section('content')
<script>
    @if (count($errors) > 0)
    $('#addNewAdmin').modal('show');
@endif
</script>
    {{-- <div class="d-flex bd-highlight p-3">
        <div class="p-2 flex-grow-1 bd-highlight"></div>
        <div class="p-2 bd-highlight">
            <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search for names..">
        </div>
        <div class="p-2 bd-highlight">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewAdmin">ADD NEW</button>
        </div>
    </div> --}}

    <div class="container justify-content-center" style="width: 80%">

        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                    placeholder="Search for names..">
            </div>
            <div class="p-2 bd-highlight">
                <button class="btn btn-outline-success shadow" data-bs-toggle="modal" data-bs-target="#addNewAdmin">ADD
                    NEW</button>
            </div>
        </div>

        <table class="table table-striped shadow " id="myTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Role</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td> {{ $admin->firstname }} {{ $admin->middlename }}. {{ $admin->lastname }}  </td>
                        <td class="text-center">{{ $admin->status }}</td>
                        <td class="text-center">{{ $admin->role }}</td>
                        <td><a href="/admin-information/{{ $admin->id }}" class="btn btn-success">View</a></td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>


    <!-- Modal for ADD Admin -->
    <div class="modal fade" id="addNewAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b>ADD NEW ADMIN</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form action="{{ route('addAdmin') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mx-2">
                            <div class="col-md-4 mb-4">
                                <div class="form__group field" style=" width: 130px">
                                    <input style="max-width:290px;" type="text"
                                        class="form__field @error('lastname') is-invalid @enderror" name="lastname"
                                        id="lastname" required>
                                    <label class="form__label"> <b style="color: red">*</b> <b>Last Name:</b> </label>
                                </div>
                                @error('lastname')
                                    <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form__group field" style=" width: 130px">
                                    <input style="max-width:290px;" type="text"
                                        class="form__field @error('firstname') is-invalid @enderror" name="firstname"
                                        id="firstname" required>
                                    <label class="form__label"><b style="color: red">*</b> <b>First Name:</b> </label>
                                </div>
                                @error('firstname')
                                    <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form__group field" style=" width: 130px">
                                    <input style="max-width:290px;" type="text"
                                        class="form__field @error('middlename') is-invalid @enderror" name="middlename"
                                        required>
                                    <label class="form__label"><b style="color: red">*</b> <b>Middle Name:</b> </label>
                                </div>
                                @error('middlename')
                                    <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form__group field" style=" width: 450px">
                                <input type="text" class="form__field  @error('contact') is-invalid @enderror"
                                    style="margin-top: -12px" name="contact" required value="{{ old('contact') }}">
                                <label class="form__label"><b style="color: red">*</b> <b>Contact No.:</b> </label>
                            </div>
                            <span class="help-block" style="color: red">{{ $errors->first('contact', ':message') }}</span>
                            {{-- @error('middlename')
                                <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                            @enderror --}}
                        </div>

                        <div class="mb-3">
                            <div class="form__group field" style=" width: 450px">
                                <input type="text" class="form__field" style="margin-top: -12px" id="username"
                                    name="username">
                                <label class="form__label"> <b>Username:</b> </label>
                            </div>

                            <div class="mb-3">
                                <div class="form__group field" style=" width: 450px">
                                    <input type="text" class="form__field" style="margin-top: -12px" id="password"
                                        name="password">
                                    <label class="form__label"> <b>Password:</b> </label>
                                </div>
                                <input type="text" value="admin" name="role" hidden>
                                <input type="text" value="1" name="status" hidden>
                            </div>
                            {{-- <input type="text" id="school_year" name="school_year" value="{{$}}" hidden> --}}
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
<script src="{{ asset('js/tablesearch.js') }}"></script>
    <script>
        $('#firstname, #lastname').on('change', function(event) {

            var lastname = $('#lastname').val().toLowerCase();
            var firstname = $('#firstname').val().toLowerCase();

            if (lastname && firstname) {
                let password = `${lastname}${firstname.substring(0, 2)}`

                $('#password, #username').val(password);
            }

        });


    </script>
@endsection
