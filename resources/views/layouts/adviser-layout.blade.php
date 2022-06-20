<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adminSidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('style')
</head>
<title>@yield('title')</title>
<link rel="icon" href="{!! asset('images/mantalongon_logo.png') !!}"/>

<body>
@auth
    @include('sweetalert::alert')
    <div class="wrapper">
        <!-- Sidebar  -->

        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="{{ URL('images/mantalongon_logo.png') }}" width="60px" alt="Logo">
                <h5><b>TEACHER</b></h5>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="/adviser_dashboard/{{$schoolyear}}" class="active text {{ $nav == 'adviser_dashboard' ? 'active-nav' : '' }}">
                        <i class="bi bi-windows"></i>
                        &nbsp; Dashboard</a>
                </li>
                <li>
                    <a href="/adviser-admission/{{$schoolyear}}" class="text {{ $nav == 'teacher-admission' ? 'active-nav' : '' }}"><i
                            class="bi bi-person-plus-fill"></i>
                        &nbsp; Admission</a>
                </li>

                <li>
                    <a href="/adviser-studentlist/{{$schoolyear}}" class="text {{ $nav == 'students' ? 'active-nav' : '' }}"><i
                            class="bi bi-people-fill"></i>
                        &nbsp; Students</a>
                </li>

                <li>
                    <a href="/adviser-subjects/{{$schoolyear}}" class="text {{ $nav == 'teacher-subjects' ? 'active-nav' : '' }}"><i class="bi bi-journal-bookmark"></i>
                           &nbsp; Subjects</a>
                </li>

                <li>
                    <a href="/adviser-schedule/{{$schoolyear}}" class="text {{ $nav == 'teacher-schedule' ? 'active-nav' : '' }}"><i class="bi bi-card-checklist"></i>&nbsp; Schedule</a>
                </li>

                <li>
                    <a href="/teacher-files/{{$schoolyear}}" class="text {{ $nav == 'teacher-files' ? 'active-nav' : '' }}"><i
                            class="bi bi-card-text"></i> &nbsp; My Files</a>
                </li>

            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg header ">
                <div class="container-fluid test-class">
                    <span id="sidebarCollapse" style="cursor: pointer;">&#9776;</span>

                    <div class="navbar-collapse " id="navbarSupportedContent">
                        <ul class="nav navbar-nav">
                            <li class="nav-item active">
                                <h5 style="color: white; margin-left:20px" class="mt-2">MANTALONGON NATIONAL
                                    HIGH SCHOOL</h5>

                            </li>
                        </ul>
                        <div class="justify-content-end">
                            <ul style="margin-top: 14px; float: right;">

                                <a id="profile1" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                    style="color:white;">
                                    {{ Auth::user()->firstname }}
                                </a>

                                <ul class="collapse list-unstyled" id="profile-content"
                                    style="margin-top: -5px;margin-left: -50px">
                                    <li>
                                        <a href="{{ url('/adviser/profile') }}" class="text"
                                            style="font-size:16px"> Profile Settings</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/adviser') }}" class="text"
                                            style="font-size:16px"> Change SY Settings</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();"
                                            style="font-size: 15px">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div>
                <div class="dashboard-content">
                    <nav class="navbar navbar-expand-lg navbar-light  forpath">
                        <div class="container-fluid">
                            @yield('pathname')
                            <div class="float-end">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#burger" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="burger">
                                        @yield('path')
                                    </div>

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="details">
                    @yield('content')
                </div>

            </div>
        </div>

    </div>
    @endauth
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');

            });

            $("#section-dropdown").click(() => {
                $('#sections').toggle();
            })

            $("#profile1").click(() => {
                $("#profile-content").toggle();
            })
        });


    </script>
    @yield('script')
</body>

</html>
