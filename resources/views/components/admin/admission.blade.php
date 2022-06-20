@extends('layouts.admin-layout')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}" />
@endsection


@section('title')
    Admission
@endsection

@section('pathname')
    <h5><b>Admission</b></h5>
@endsection

@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Admission</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container scroll" style="overflow-x: hidden; overflow-y:auto;height:470px">

        <p class="note">Fill out the information below and SUBMIT. <br>
            Fields with <b style="color: red"> * </b> indicates required fields.
        </p>

        <h6 class="text-center"><b>STUDENT INFORMATION </b></h6>
        <hr style="margin-top:-8px">
        @if (Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
        <!-- Fields for form -->
        <form action="{{ route('admission.store') }}" method="POST">
            @csrf
            <div class="row mx-2">
                <input type="text" name="status" id="status" value="continue" hidden>
                <div class="col-md-4 mb-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" type="text" class="form__field @error('LRN') is-invalid @enderror"
                            name="LRN" id="LRN" value="{{ old('LRN') }}">
                        <label class="form__label"> <b style="color: red">*</b><b> Learner Reference No.(LRN):</b>
                        </label>
                    </div>
                    @error('LRN')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>
                {{-- @if ($errors->all())
                    @dd($errors->all())
                @endif --}}
                <div class="col-md-4" >
                    <div class="form__group field" style=" width: 300px" hidden>
                        <input style="max-width:290px;" type="text"
                            class="form__field @error('average') is-invalid @enderror" name="average"
                            value="{{ old('average') }}">
                        <label class="form__label"><b style="color: red">*</b> <b>Average:</b> </label>
                    </div>
                    @error('average')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" type="text"
                            class="form__field  @error('PSA_num') is-invalid @enderror" name="PSA_num"
                            value="{{ old('PSA_num') }}">
                        <label class="form__label"><b>PSA No.:</b> </label>
                    </div>
                    @error('PSA_num')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror

                </div>



            </div>

            <div class="row mx-2">
                <div class="col-md-4 mb-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" type="text"
                            class="form__field @error('lastname') is-invalid @enderror" name="lastname"
                            value="{{ old('lastname') }}">
                        <label class="form__label"> <b style="color: red">*</b> <b>Last Name:</b> </label>
                    </div>
                    @error('lastname')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>

                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" type="text"
                            class="form__field @error('firstname') is-invalid @enderror" name="firstname"
                            value="{{ old('firstname') }}">
                        <label class="form__label"><b style="color: red">*</b> <b>First Name:</b> </label>
                    </div>
                    @error('firstname')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>

                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" type="text"
                            class="form__field @error('middlename') is-invalid @enderror" name="middlename"
                            value="{{ old('middlename') }}">
                        <label class="form__label"><b style="color: red">*</b> <b>Middle Name:</b> </label>
                    </div>
                    @error('middlename')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>
            </div>


            <div class="row mx-2">
                <div class="col-md-4 mb-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" type="date"
                            class="form__field @error('date_of_birth') is-invalid @enderror" name="date_of_birth" id="date_of_birth"
                            value="{{ old('date_of_birth') }}">
                        <label class="form__label"><b style="color: red">*</b> <b>Date of Birth:</b> </label>
                    </div>
                    @error('date_of_birth')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>

                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <input style="max-width:290px;" type="text" class="form__field @error('age') is-invalid @enderror"
                            name="age" id="age" value="{{ old('age') }}">
                        <label class="form__label"><b style="color: red">*</b> <b>Age:</b> </label>
                    </div>
                    @error('age')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>

                <div class="col-md-4 mt-4">

                    <input type="checkbox" class="gender" name="gender" value="Male" aria-label="Male">&nbsp;Male
                    &nbsp; &nbsp; &nbsp;
                    <input type="checkbox" class="gender" name="gender" value="Female">
                    &nbsp;Female
                </div>

            </div>

            <div class="row mx-2">
                <div class="col-md-8 mt-4 mb-4">
                    <p> <b style="color: red">*</b> Belonging to any Indigenous People (IP) Community/Indigenous Cultural
                        Community?</p>
                </div>
                <div class="col-md-4 mt-4">
                    <input class="indigenous" type="checkbox" name="IPC" value="YES" aria-label="Male">&nbsp; Yes
                    &nbsp; &nbsp; &nbsp;

                    <input class="indigenous" type="checkbox" name="IPC" value="NO" aria-label="...">
                    &nbsp; No
                </div>
            </div>

            <div class="row mx-2 ">
                <div class="col mb-5">
                    <div class="form__group field" style=" width: 200px">
                        <input style="max-width:290px;" type="text"
                            class="form__field  @error('motherTongue') is-invalid @enderror" name="motherTongue"
                            value="{{ old('motherTongue') }}">
                        <label class="form__label"><b style="color: red">*</b> <b>Mother Tongue:</b> </label>
                    </div>
                    @error('motherTongue')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="col">
                    <div class="form__group field" style=" width: 200px">
                        <input style="max-width:290px;" type="text"
                            class="form__field @error('contact_number') is-invalid @enderror" name="contact_number"
                            value="{{ old('contact_number') }}">
                        <label class="form__label"><b style="color: red">*</b> <b>Contact Number:</b> </label>
                    </div>
                    @error('contact_number')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="col">
                    <div class="form__group field" style=" width: 200px">
                        <input style="max-width:290px;" type="text"
                            class="form__field  @error('address') is-invalid @enderror" name="address"
                            value="{{ old('address') }}">
                        <label class="form__label"><b style="color: red">*</b> <b>Address:</b> </label>
                    </div>
                    @error('address')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>

                <div class="col">
                    <div class="form__group field" style=" width: 200px">
                        <input style="max-width:290px;" type="number"
                            class="form__field  @error('zipcode') is-invalid @enderror" name="zipcode"
                            value="{{ old('zipcode') }}">
                        <label class="form__label"><b style="color: red">*</b> <b>Zipcode:</b> </label>
                    </div>
                    @error('zipcode')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>
            </div>

            <h6 class="text-center "><b>PARENT/GUARDIAN INFORMATION </b></h6>
            <hr style="margin-top:-8px">

            <div class="row mx-2 mb-5">
                <div class="col">
                    <div class="form__group field" style=" width: 200px">
                        <input style="max-width:290px;" type="text"
                            class="form__field  @error('father_name') is-invalid @enderror" name="father_name"
                            value="{{ old('father_name') }}">
                        <label class="form__label"><b>Father's Full Name:</b> </label>
                    </div>
                    @error('father_name')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="col">
                    <div class="form__group field" style=" width: 200px">
                        <input style="max-width:290px;" type="text"
                            class="form__field @error('mother_name') is-invalid @enderror" name="mother_name"
                            value="{{ old('mother_name') }}">
                        <label class="form__label"><b>Mother's Maiden Name:</b> </label>
                    </div>
                    @error('mother_name')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="col">
                    <div class="form__group field" style=" width: 200px">
                        <input style="max-width:290px;" type="text"
                            class="form__field @error('guardian') is-invalid @enderror" name="guardian"
                            value="{{ old('guardian') }}">
                        <label class="form__label"><b style="color: red">*</b> <b>Guardian Name:</b> </label>
                    </div>
                    @error('guardian')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>

                <div class="col">
                    <div class="form__group field" style=" width: 200px">
                        <input style="max-width:290px;" type="text"
                            class="form__field @error('guardian_contact_number') is-invalid @enderror"
                            name="guardian_contact_number" value="{{ old('guardian_contact_number') }}">
                        <label class="form__label"><b style="color: red">*</b> <b>Guardian Contact No.:</b> </label>
                    </div>
                    @error('guardian_contact_number')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>
            </div>

            <div class="container" style="margin-bottom: 27px">
                <input class="form-check-input" name="type" value="" hidden>
                <div class="row">
                    <div class="col">
                        <div>
                            <input class="form-check-input" type="checkbox" id="irregular" name="type" value="">
                            <label class="form-check-label" for="inlineCheckbox1">Applying as Irregular</label>
                        </div>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" id="balik-students" value="option2">
                        <label class="form-check-label" for="inlineCheckbox1"
                            style="margin-left:25px;margin-top:-23px">Applying
                            as Transferee or Balik Aral? (If you
                            are a continuing student, please disregard)</label>
                    </div>
                </div>
            </div>
            {{-- <input class="form-check-input" id="irregular" name="type" value="regular" hidden> --}}

            <div class="row mx-2">

                <div class="col-md-4 mb-5">
                    <div class="form__group field" style=" width: 200px">
                        <select class="form__field @error('school_year') is-invalid @enderror" name="school_year"
                            id="school_year" value="{{ old('school_year') }}" style="max-width:290px;">
                            <option disabled selected>--select school year--
                            </option>
                            @foreach ($schoolyears as $year)
                                <option value="{{ $year->schoolyear }}">
                                    {{ $year->schoolyear }} </option>
                            @endforeach
                        </select>
                        <label class="form__label"><b style="color: red">*</b><b>School Year:</b>
                        </label>
                        @error('school_year')
                            <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form__group field" style=" width: 300px">
                        <select class="form__field gradelevels @error('gradeLevel') is-invalid @enderror"
                            name="gradeLevel" id="gradelevel" value="{{ old('gradeLevel') }}">
                            <option selected disabled value="0">--select grade level--</option>
                            <option value="7">Grade 7</option>
                            <option value="8">Grade 8</option>
                            <option value="9">Grade 9</option>
                            <option value="10">Grade 10</option>

                        </select>
                        <label class="form__label"> <b style="color: red">*</b> <b>Grade Level:</b> </label>
                    </div>
                    @error('gradeLevel')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>

                <div class="col-md-4" id="sectionSelect">
                    <div class="form__group field" style=" width: 300px">
                        <select class="form__field sections @error('section') is-invalid @enderror" id="section"
                            name="section" value="{{ old('section') }}">
                            <option selected disabled value="0">--select section--</option>
                        </select>
                        <label class="form__label"> <b style="color: red">*</b><b>Section:</b></label>
                    </div>
                    @error('section')
                        <h6 class="mt-2" style="color: red">{{ $message }}</h6>
                    @enderror
                </div>
            </div>


            {{-- For Irregular students --}}
            <div class="container p-3" id="irregular_learners">
                <h6 class="text-center "><b>FOR IRREGULAR LEARNERS </b></h6>

                <p class="text-center" disabled>Choose a subject to enroll</p>
                <div class="d-flex bd-highlight text-center">

                    <div class="p-2 flex-fill bd-highlight">
                        {{-- @dd($subjects) --}}
                        @foreach ($subjects as $subject)
                            <div class="grade7 form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="subjects[]"
                                    value="{{ $subject->subjectname }}">
                                <label class="form-check-label"
                                    for="inlineCheckbox1">{{ $subject->subjectname }}</label>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            {{-- For transferee students --}}
            <div class="container" id="balik-aral_learners">
                <h6 class="text-center "><b>FOR RETURNING LEARNERS (BALIK-ARAL) </b></h6>
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="form__group field" style=" width: 450px">
                            <select class="form__field">
                                <option selected disabled>
                                    --last grade level completed--
                                </option>
                                <option value="1">Grade 7</option>
                                <option value="2">Grade 8</option>
                                <option value="2">Grade 9</option>
                                <option value="2">Grade 10</option>
                            </select>
                            <label class="form__label"><b style="color: red">*</b> <b>Grade Level Completed:</b>
                            </label>
                        </div>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="form__group field" style=" width: 450px">
                            <input type="text" class="form__field" name="last_school_year" id="last_school_year"
                                value="{{ old('last_school_year') }}">
                            <label class="form__label"><b style="color: red">*</b> <b>Last School Year Attended:</b>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="mb-3">
                            <div class="form__group field" style=" width: 450px">
                                <input type="text" class="form__field" name="last_schoolname_attended"
                                    id="last_schoolname_attended" value="{{ old('last_schoolname_attended') }}">
                                <label class="form__label"><b style="color: red">*</b> <b>Last School Name Attended:</b>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <div class="mb-3">
                            <div class="form__group field" style=" width: 450px">
                                <input type="text" class="form__field" name="last_school_address"
                                    id="last_school_address" value="{{ old('last_school_address') }}">
                                <label class="form__label"><b style="color: red">*</b> <b> Last School Address
                                        Attended:</b> </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <h6 style="font-size: 15px"><b>Exclusive for Grade 9 and 10 only!</b> </h6>
            </div>
            <div class="row mx-2 justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="form__group field" style=" width: 400px">
                        <input type="text" class="form__field" name="specialization" id="specialization"
                            value="{{ old('specialization') }}">
                        <label class="form__label"> <b>Specialization:</b> </label>
                    </div>
                </div>
            </div>


            <div class="container" style="margin-bottom: 100px">
                <button class="btn btn-success float-end" type="submit" float="right">Submit</button>
            </div>
        </form>

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/clickableRow.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {

            //gradelevel change
            $('#gradelevel').change(function() {
                let gradelvl = $(this).val();
                let schoolyear = $('#school_year').val();
                console.log(schoolyear);
                if (gradelvl) {
                    // console.log(gradelvl);
                    $.ajax({
                        type: "GET",
                        url: "getSection/" + gradelvl + "/" + schoolyear,
                        success: function(res) {
                            if (res) {
                                console.log();
                                $("#section").empty();
                                $("#section").append('<option>Select section</option>');
                                $.each(res, function(key, value) {
                                    $("#section").append('<option value="' + key +
                                        '">' + value +
                                        '</option>');
                                    console.log(value);
                                });
                            } else {
                                $("#section").empty();
                            }
                        }
                    });
                } else {

                    $("#section").empty();
                }
            });


        });
    </script>
@endsection
