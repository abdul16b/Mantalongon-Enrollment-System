@extends('layouts.admin-layout')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}" />
@endsection

@section('title')
    Edit Schedule
@endsection

@section('pathname')
    <h5> <b>Junior High</b></h5>
@endsection


@section('path')
    <nav aria-label="breadcrumb" style="margin-top:5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin-dashboard"><i class="bi bi-house-fill"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Junior High</li>
        </ol>
    </nav>
@endsection

@section('content')
    <center>
        <h4 style="font-weight: bold;">Edit {{ $subject }} Schedule</h4>
        <h6>Grade {{ $gradeLevel }}</h6>
        {{-- @dd($teacherID); --}}
    </center>

    <div class="container">
        <div class="p-2 shadow">
            <a href="{{ url()->previous() }}"><i class="bi bi-arrow-left-circle-fill" style="font-size: 20px"></i></a>
            @foreach ($schedules as $schedule)
                <form action="{{ route('schedule.update', ['schedID' => $schedule->id, 'id' => $schedule->section_id]) }}"
                    method="POST" id="editSched">
                    @csrf
                    @method('PUT')

                    <div class="row mx-2">
                        <input type="text" name="school_year" value="{{ $schedule->school_year }}" hidden>
                        <div class="col-md-4 mb-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="hours" class="form__field" value="{{ $schedule->gradeLevel }}"
                                    name="gradeLevel" id="gradeLevel" readonly>
                                <label class="form__label"><b>Grade Level: </b>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="hours" class="form__field" value="{{ $schedule->section }}" name="section"
                                    id="section" readonly>
                                <label class="form__label"><b>Section: </b>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="hours" class="form__field" value="{{ $schedule->subject }}" name="subject"
                                    id="subject" readonly>
                                <label class="form__label"><b>Subject: </b>
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="row mx-2">

                        <div class="col-md-4 mb-4">
                            <div class="form__group field" style=" width: 300px">
                                <select name="teacher" id="teacher" class="form__field" required>
                                    <option name="teacher" id="teacher" value="{{ $schedule->teacher }}" disabled
                                        selected>--select a teacher--</option>
                                    @foreach ($teachers as $teacher)
                                        <option
                                            value="{{ $teacher->firstname }} {{ $teacher->middlename }} {{ $teacher->lastname }}">
                                            {{ $teacher->firstname . ' ' . $teacher->lastname }} </option>
                                    @endforeach
                                </select>
                                <label class="form__label"><b>Assigned Teacher: </b>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="time" class="timepicker form__field" value="{{ $schedule->startTime }}"
                                    name="startTime" id="startTime" placeholder="" required>
                                <label class="form__label"><b>Start Time: </b>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form__group field" style=" width: 300px">
                                <input type="time" class="timepicker form__field" value="{{ $schedule->endTime }}"
                                    name="endTime" id="endTime" placeholder="" required>
                                <label class="form__label"><b>End Time: </b>
                                </label>
                            </div>
                        </div>

                    </div>

                    <p class="text-center">Select for specific day(s)...</p>

                    <div class="text-center">
                        @if ($schedule->days == null)
                            <div class="form-check form-check-inline p-3" style="margin-left: 85px">
                                <input class="form-check-input" type="checkbox" name="days[]" id="inlineCheckbox1"
                                    value="M">
                                <label class="form-check-label" for="inlineCheckbox1">Monday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="days[]" id="inlineCheckbox2"
                                    value="T">
                                <label class="form-check-label" for="inlineCheckbox2">Tuesday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="days[]" id="inlineCheckbox3"
                                    value="W">
                                <label class="form-check-label" for="inlineCheckbox3">Wednesday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="days[]" id="inlineCheckbox3"
                                    value="Th">
                                <label class="form-check-label" for="inlineCheckbox3">Thursday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="days[]" id="inlineCheckbox3"
                                    value="F">
                                <label class="form-check-label" for="inlineCheckbox3">Friday</label>
                            </div>
                        @else
                            <div class="form-check form-check-inline p-3" style="margin-left: 85px">
                                <input class="form-check-input" type="checkbox" name="days[]"
                                    {{ in_array('M', json_decode($schedule->days, true)) ? 'Checked' : '' }}
                                    id="inlineCheckbox1" value="M">
                                <label class="form-check-label" for="inlineCheckbox1">Monday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="days[]"
                                    {{ in_array('T', json_decode($schedule->days, true)) ? 'Checked' : '' }}
                                    id="inlineCheckbox2" value="T">
                                <label class="form-check-label" for="inlineCheckbox2">Tuesday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="days[]"
                                    {{ in_array('W', json_decode($schedule->days, true)) ? 'Checked' : '' }}
                                    id="inlineCheckbox3" value="W">
                                <label class="form-check-label" for="inlineCheckbox3">Wednesday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="days[]"
                                    {{ in_array('Th', json_decode($schedule->days, true)) ? 'Checked' : '' }}
                                    id="inlineCheckbox3" value="Th">
                                <label class="form-check-label" for="inlineCheckbox3">Thursday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="days[]"
                                    {{ in_array('F', json_decode($schedule->days, true)) ? 'Checked' : '' }}
                                    id="inlineCheckbox3" value="F">
                                <label class="form-check-label" for="inlineCheckbox3">Friday</label>
                            </div>
                    </div>
            @endif
            <div class="modal-footer">
                <button type="submit" class=" edit btn btn-outline-success">Update</button>
            </div>

            </form>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript">
        $('.timepicker').datetimepicker({
            format: 'HH:mm:ss'
        });
    </script>
@endsection
