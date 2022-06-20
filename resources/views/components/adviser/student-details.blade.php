@extends('layouts.adviser-layout')


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
   Students
@endsection

@section('pathname')
    <h5><b>Students</b></h5>
@endsection

@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Junior High</li>
            <li class="breadcrumb-item active" aria-current="page">Student Details</li>

        </ol>
    </nav>
@endsection

@section('content')
    @foreach ($students as $student)
        <div class="container p-4" style="overflow-x: hidden; overflow-y:auto;height:470px">
            {{-- <form action="{{route('edit.studentInfo', ['id'=>$student->id, 'schoolyear'=>$student->school_year])}}" method="PUT">
                @csrf --}}
                <div class="shadow">
                    <div class="d-flex bd-highlight mb-4">
                        <div class="p-2 flex-fill bd-highlight">
                            <a href="/adviser-studentlist/{{$schoolyear}}"><i class="bi bi-arrow-left-circle-fill"
                                    style="font-size: 19px; color:green"></i></a>
                        </div>
                        <div class="p-2 flex-fill bd-highlight" style="width: 70%">
                            <h5 class="text-center">
                                <b>{{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}</b>
                            </h5>
                        </div>
                        <div class="p-2 flex-fill bd-highlight" style="width: 1%;">
                            <div class="text-end">
                                <a href="{{route('edit.adviserStudent', ['LRN'=>$student->LRN, 'schoolyear'=>$student->school_year]) }}" type="button" style="cursor:pointer;color:green"><i
                                        class="bi bi-pencil-fill" style="font-size: 18px"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="row mx-2 mb-3">
                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="text" name="LRN" id="LRN" value="{{ $student->LRN }}" class="form__field"
                                    disabled>
                                <label class="form__label"><b>Learner's Reference No.:</b></label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px" hidden>
                                <input type="text" class="form__field" name="average" id="average"
                                    value="{{ $student->average }}" readonly>
                                <label class="form__label"><b>Average:</b> </label>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="text" name="PSA_num" id="PSA" value=" {{ $student->PSA_num }}"
                                    class="form__field" disabled>
                                <label class="form__label"><b>PSA No.:</b></label>
                            </div>
                        </div>



                    </div>

                    <div class="row mx-2 mb-3">
                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="text" name="lastname" value="{{ $student->lastname }}" id="lastname"
                                    class="form__field" disabled>
                                <label class="form__label"><b>Last Name:</b> </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="text" name="firstname" id="firstname" value="{{ $student->firstname }}"
                                    class="form__field" disabled>
                                <label class="form__label"><b>First Name:</b> </label>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="text" name="middlename" id="middlename" value=" {{ $student->middlename }}"
                                    class="form__field" readonly>
                                <label class="form__label"><b>Middle Name:</b></label>
                            </div>
                        </div>
                    </div>

                    <div class="row mx-2 ">
                        <div class="col mb-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="text" name="date_of_birth" id="dateofbirth" class="form__field"
                                    value="{{ $student->date_of_birth }}" disabled>
                                <label class="form__label"><b>Date of Birth:</b> </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__group field" style=" width: 300px">
                                <input type="text" name="age" id="age" class="form__field" value="{{ $student->age }}"
                                    disabled>
                                <label class="form__label"><b>Age:</b> </label>
                            </div>
                        </div>

                        <div class="col">
                            <div style="margin-top:25px">
                                <input type="checkbox" class="gender" name="gender"
                                    {{ $student->gender == 'Male' ? 'Checked' : '' }} value="Male" aria-label="Male"
                                    disabled>&nbsp;Male
                                &nbsp; &nbsp; &nbsp;
                                <input type="checkbox" class="gender" name="gender"
                                    {{ $student->gender == 'Female' ? 'Checked' : '' }} value="Female" disabled>
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
                                        {{ $student->IPC == 'YES' ? 'Checked' : '' }} value="YES" aria-label="Male"
                                        disabled>&nbsp;
                                    Yes
                                    &nbsp; &nbsp; &nbsp;

                                    <input class="indigenous" type="checkbox" name="IPC"
                                        {{ $student->IPC == 'NO' ? 'Checked' : '' }} value="NO" aria-label="..." disabled>
                                    &nbsp; No
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mx-2 ">
                        <div class="col mb-5">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field" name="motherTongue"
                                    id="motherTongue" value="{{ $student->motherTongue }}" disabled>
                                <label class="form__label"> <b>Mother Tongue:</b> </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field" name="contact"
                                    id="contactnumber" value="{{ $student->contact_number }}" disabled>
                                <label class="form__label"> <b>Contact Number:</b> </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field" name="address"
                                    id="address" value="{{ $student->address }}" disabled>
                                <label class="form__label"> <b>Address:</b> </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="number" class="form__field" name="zipcode"
                                    id="zipcode" value="{{ $student->zipcode }}" disabled>
                                <label class="form__label"><b>Zipcode:</b> </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mx-2 mb-4">
                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field" name="father_name"
                                    id="father_name" value="{{ $student->father_name }}" disabled>
                                <label class="form__label"><b>Father's Full Name:</b> </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field" name="mother_name"
                                    id="mother_name" value="{{ $student->mother_name }}" disabled>
                                <label class="form__label"><b>Mother's Maiden Name:</b> </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field" name="guardian"
                                    id="guardian" value="{{ $student->guardian }}" disabled>
                                <label class="form__label"><b>Guardian Name:</b> </label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form__group field" style=" width: 200px">
                                <input style="max-width:290px;" type="text" class="form__field" id="guardianContactNo"
                                    name="guardian_contact_number" value="{{ $student->guardian_contact_number }}"
                                    disabled>
                                <label class="form__label"> <b>Guardian Contact No.:</b>
                                </label>
                            </div>
                        </div>
                    </div>

                        <div class="row mx-2">
                            <div class="col  mb-5">
                                <div class="form__group field" style=" width: 200px">
                                    <input type="text" class="form__field" name="gradeLevel" id="gradeLevel"
                                        value="{{ $student->gradeLevel }}" disabled>
                                    <label class="form__label"><b>Grade Level:</b> </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form__group field" style=" width: 200px">
                                    <input type="text" class="form__field" id="section" name="section"
                                        value="{{ $section_name}}" disabled>
                                    <label class="form__label"><b>Section:</b> </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form__group field" style=" width: 200px">
                                    <input type="text" class="form__field" id="status" name="status"
                                        value="{{ $student->status }}" disabled>
                                    <label class="form__label"> <b>Status:</b> </label>
                                </div>
                            </div>
                        </div>
                </div>
        </div>
    @endforeach
@endsection

@section('script')
    <script>
        // For editing student.................
        // var updatebtn = document.getElementById("updateStudent");
        // if (updatebtn){
        //     updatebtn.addEventListener("click", enableStudentEditing);
        // }

        // function enableStudentEditing() {
        //     document.getElementById("guardian").disabled = false;
        //     document.getElementById("guardianContactNo").disabled = false;
        //     document.getElementById("address").disabled = false;
        //     document.getElementById("contactnumber").disabled = false;
        //     document.getElementById("lastname").disabled = false;
        //     document.getElementById("firstname").disabled = false;
        //     document.getElementById("middlename").disabled = false;
        //     document.getElementById("dateofbirth").disabled = false;
        //     document.getElementById("age").disabled = false;
        //     document.getElementById("motherTongue").disabled = false;
        //     document.getElementById("father_name").disabled = false;
        //     document.getElementById("mother_name").disabled = false;
        //     document.getElementById("zipcode").disabled = false;
        //     document.getElementById("LRN").disabled = false;
        //     document.getElementById("PSA").disabled = false;
        //     document.getElementById("average").disabled = false;
        //     document.getElementById("status").disabled = false;
        //     document.getElementById("updateDetails").hidden = false;
        // }
    </script>
@endsection
