<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MNHS</title>
    <link rel="icon" href="{!! asset('images/mantalongon_logo.png') !!}" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/landing.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="antialiased">

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <img src="{{ URL('images/mantalongon_logo.png') }}" width="60px" alt="Logo">
            <a class="navbar-brand" href="#">MNHS</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </div>
            <div>
                {{-- class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">


                class="relative items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">


                class="relative items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

                class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                    <div class=" fixed top-0 right-0 px-6 py-4 sm:block"> --}}

                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 btn btn-success">Log
                    in</a>
            </div>
        </div>
    </nav>
    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" height="100px">
            <div class="carousel-item active">
                <img src="{{ URL('images/mantalongon_staff.jpg') }}" class="d-block w-100" height="800px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ URL('images/students.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ URL('images/students_parents.jpg') }}" class="d-block w-100" height="600px" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

        <div>
        </div>
    </div>



    <!-- Mission,Vision and Core Values -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="outerWrap">
                    <div id="layer1">
                        <h3 class="text" style="margin-top: 15px">MISSION</h3>
                    </div>
                    <div id="layer2" style="color:black; font-size:12px">
                        <div class="container">
                            <br><br>
                            To protect and promote the right of every Filipino to quality, equitable,
                            culture-based, and complete basic education where: students learn in a child-friendly,
                            gender-sensitive, safe, and motivating environment; teachers facilitate learning and
                            constantly
                            nurture every learner; administrators and staff, as stewards of the institution, ensure an
                            enabling and supportive environment for effective learning to happen; family, community, and
                            other stakeholders are actively engaged and share responsibility for developing life-long
                            learners.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div id="outerWrap">
                    <div id="layer1">
                        <h3 class="text" style="margin-top: 15px">VISION</h3>
                    </div>
                    <div id="layer2">
                        <div class="container" style="color:black; font-size:12px">
                            <br><br>
                            We dream of Filipinos who passionately love their country and whose competencies
                            and values enable them to realize their full potential and contribute meaningfully to
                            building
                            the nation. We are a learner-centered public institution that continuously improves itself
                            to
                            pursue its mission.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div id="outerWrap">
                    <div id="layer1">
                        <div class="text">
                            <h3 style="margin-top: 15px">CORE VALUES</h3>
                        </div>

                    </div>
                    <div id="layer2">
                        <div class="container" style="color:black; font-size:12px">
                            <br><br><br>
                            <ul>
                                <li>Maka-Diyos</li>
                                <li>Makatao</li>
                                <li>Makakalikasan</li>
                                <li>Makabansa</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <footer class="page-footer ">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2022 - Mantalongon, Dalaguete, Cebu
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    <script src="{{ asset('js/app.js') }}"></script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #F1F8E9;
        }

        .navbar-brand {
            font-size: 30px;
        }

    </style>
</body>

</html>
