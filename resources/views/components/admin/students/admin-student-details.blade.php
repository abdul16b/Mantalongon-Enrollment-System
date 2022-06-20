@extends('layouts.admin-layout')


@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}" />
    <style>
        /* #Div2 {
                        display: none;
                    } */

    </style>
@endsection

@section('title')
    Sections
@endsection

@section('pathname')
    <h5><b>Sections</b></h5>
@endsection

@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Students</li>
            <li class="breadcrumb-item active" aria-current="page">Student Details</li>

        </ol>
    </nav>
@endsection

@section('content')

    @foreach ($students as $student)
        <div class="container p-4" style="overflow-x: hidden; overflow-y:auto;height:470px">
            <form action="{{ route('update.adminStudent', ['id' => $student->id, 'schoolyear' => $student->school_year]) }}"
                method="POST">
                @csrf
                @method('PATCH')
                <div class="shadow" >
                    <div class="d-flex bd-highlight mb-4" >
                        <div class="p-2 flex-fill bd-highlight">
                            <a href="/junior-high/student-details/{{$student->id}}/{{ $student->LRN }}/{{$student->school_year}}"><i
                                    class="bi bi-arrow-left-circle-fill" style="font-size: 19px; color:green"></i></a>
                        </div>
                        <div class="p-2 flex-fill bd-highlight" style="width: 70%">
                            <h5 class="text-center">
                                <b>{{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}</b>
                            </h5>
                        </div>
                    </div>


                    <div class="row mx-2 mb-3">
                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="text" name="LRN" id="LRN" value="{{ $student->LRN }}" class="form__field" >
                                <label class="form__label"><b>Learner's Reference No.:</b></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px" hidden>
                                <input type="text" class="form__field" name="average" id="average"
                                    value="{{ $student->average }}" >
                                <label class="form__label"><b>Average:</b> </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="text" name="PSA_num" id="PSA" value=" {{ $student->PSA_num }}"
                                    class="form__field" >
                                <label class="form__label"><b>PSA No.:</b></label>
                            </div>
                        </div>



                    </div>

                    <div class="row mx-2 mb-3">
                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="text" name="lastname" value="{{ $student->lastname }}" id="lastname"
                                    class="form__field @error('lastname') is-invalid @enderror">
                                <label class="form__label"><b>Last Name:</b> </label>
                            </div>
                            @error('lastname')
                                <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="text" name="firstname" id="firstname" value="{{ $student->firstname }}"
                                    class="form__field" >
                                <label class="form__label"><b>First Name:</b> </label>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="text" name="middlename" id="middlename" value=" {{ $student->middlename }}"
                                    class="form__field">
                                <label class="form__label"><b>Middle Name:</b></label>
                            </div>
                        </div>
                    </div>

                    <div class="row mx-2 ">
                        <div class="col mb-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="date" name="date_of_birth" id="dateofbirth" class="form__field"
                                    value="{{ $student->date_of_birth }}" >
                                <label class="form__label"><b>Date of Birth:</b> </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__group field" style=" width: 300px">
                                <input type="text" name="age" id="age" class="form__field"
                                    value="{{ $student->age }}" >
                                <label class="form__label"><b>Age:</b> </label>
                            </div>
                        </div>

                        <div class="col">
                            <div style="margin-top:25px">
                                <input type="checkbox" class="gender" name="gender"
                                    {{ $student->gender == 'Male' ? 'Checked' : '' }} value="Male"
                                    aria-label="Male" readonly>&nbsp;Male
                                &nbsp; &nbsp; &nbsp;
                                <input type="checkbox" class="gender" name="gender"
                                    {{ $student->gender == 'Female' ? 'Checked' : '' }} value="Female">
                                &nbsp;Female
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-fill bd-highlight">
                                <p>Belonging to any Indigenous People(IP) Community/Indigenous Cutltural Cummunity?</p>
                            </div>
                            <div class="p-2 flex-fill bd-highlight" style=" width: 35%">
                                <div style="float:left">
                                    <input class="indigenous" type="checkbox" name="IPC"
                                        {{ $student->IPC == 'YES' ? 'Checked' : '' }} value="YES"
                                        aria-label="Male">&nbsp;
                                    Yes
                                    &nbsp; &nbsp; &nbsp;

                                    <input class="indigenous" type="checkbox" name="IPC"
                                        {{ $student->IPC == 'NO' ? 'Checked' : '' }} value="NO" aria-label="..." >
                                    &nbsp; No
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mx-2 ">
                        <div class="col mb-5">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field" name="motherTongue"
                                    id="motherTongue" value="{{ $student->motherTongue }}" >
                                <label class="form__label"> <b>Mother Tongue:</b> </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field @error('contact_number') is-invalid @enderror" name="contact_number"
                                    id="contactnumber" value="{{ $student->contact_number }}">
                                <label class="form__label"> <b>Contact Number:</b> </label>
                            </div>
                            @error('contact_number')
                                <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field" name="address"
                                    id="address" value="{{ $student->address }}">
                                <label class="form__label"> <b>Address:</b> </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="number" class="form__field" name="zipcode"
                                    id="zipcode" value="{{ $student->zipcode }}" >
                                <label class="form__label"><b>Zipcode:</b> </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mx-2 mb-4">
                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field" name="father_name"
                                    id="father_name" value="{{ $student->father_name }}" >
                                <label class="form__label"><b>Father's Full Name:</b> </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field" name="mother_name"
                                    id="mother_name" value="{{ $student->mother_name }}">
                                <label class="form__label"><b>Mother's Maiden Name:</b> </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field @error('guardian') is-invalid @enderror" name="guardian"
                                    id="guardian" value="{{ $student->guardian }}">
                                <label class="form__label"><b>Guardian Name:</b> </label>
                            </div>
                            @error('guardian')
                                <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field @error('guardian_contact_number') is-invalid @enderror" id="guardianContactNo"
                                    name="guardian_contact_number" value="{{ $student->guardian_contact_number }}">
                                <label class="form__label"> <b>Guardian Contact No.:</b>
                                </label>
                            </div>
                            @error('guardian_contact_number')
                                <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                            @enderror
                        </div>
                    </div>


                    <div class="row mx-2">
                        <div class="col  mb-5">
                            <div class="form__group field" style=" width: 200px">
                                <input type="text" class="form__field" name="gradeLevel" id="gradeLevel"
                                    value="{{ $student->gradeLevel }}" readonly>
                                <label class="form__label" readonly><b>Grade Level:</b> </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input type="text" class="form__field" id="section" name="section"
                                    value="{{ $student->section }}" readonly>
                                <label class="form__label" readonly><b>Section:</b> </label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input type="text" class="form__field @error('status') is-invalid @enderror" id="status" name="status"
                                    value="{{ $student->status }}">
                                <label class="form__label"> <b>Status:</b> </label>
                            </div>
                            @error('status')
                                <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                            @enderror
                        </div>
                    </div>
                    {{-- <input type="text" name="subjects" id="subjects" value="{{preg_replace('/[^a-zA-Z0-9_ -]/s', ' ', $student->subjects ) }}" hidden> --}}
                    <input type="text" name="type" id="type" value="{{ $student->type }}" hidden>
                    <input type="text" name="specialization" id="specialization" value="{{ $student->specialization }}"
                        hidden>
                    <input type="text" name="school_year" id="school_year" value="{{ $student->school_year }}" hidden>
                    <input type="text" name="last_schoolname_attended" id="last_schoolname_attended"
                        value="{{ $student->last_schoolname_attended }}" hidden>
                    <input type="text" name="last_school_address" id="last_school_address"
                        value="{{ $student->last_school_address }}" hidden>

                    <div class="container text-center">
                        <button type="submit" class="btn btn-outline-success mb-4" style="width: 70%" id="updateDetails">
                            <b>Update</b>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
@endsection

