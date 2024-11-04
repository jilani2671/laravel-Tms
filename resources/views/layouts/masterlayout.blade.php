<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Code Crafters</title>
    <link rel="icon" href="/img/cc.png" type="image/png">
    <style>
        body {
            background-color: #FCF6F5FF; /* Light gray background for the whole page */
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .navbar {
            background-color: #343a40; /* Dark background for navbar */
            transition: background-color 0.3s ease, height 0.3s ease;
            height: 70px; /* Default height */
        }
        .navbar.shrink {
            background-color: #23272b; /* Slightly darker background when scrolled */
            height: 50px; /* Reduced height on scroll */
        }
        .offcanvas {
            background-color: #212529; /* Darker background for offcanvas menu */
            transition: background-color 0.3s ease;
        }
        .offcanvas-header {
            border-bottom: 1px solid #89ABE3FF; /* Slightly lighter border for offcanvas header */
        }
        .light-theme .navbar {
            background-color: #f8f9fa; /* Light background for navbar in light theme */
        }
        .light-theme .offcanvas {
            background-color: #ffffff; /* Light background for offcanvas menu in light theme */
        }
        .light-theme body {
            background-color: #ffffff; /* White background for the whole page in light theme */
            color: #000000; /* Text color for light theme */
        }
        .fade-slide-in {
            animation: fadeSlideIn 1s ease-in-out;
        }
        @keyframes fadeSlideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        /* Smooth scrolling effect */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="light-theme">
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex flex-grow-1 justify-content-center">
                <a class="navbar-brand mx-auto" href="#">Code Crafters</a>
            </div>
            <form action="{{ route('admin.logout') }}"  method="POST" class="d-flex ms-auto">
                @csrf
                <button class="btn btn-outline-light" type="submit">Logout</button>
            </form>
            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h4 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Code Crafters</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('dashboard.show') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('registrations.index') }}">Enquiries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('confirmed.index') }}">Confirmed Admissions</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Courses
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="{{ route('registrations.clist') }}">C</a></li>
                                <li><a class="dropdown-item" href="{{ route('registrations.c++list') }}">C++</a></li>
                                <li><a class="dropdown-item" href="{{ route('registrations.phplist') }}">PHP</a></li>
                                <li><a class="dropdown-item" href="{{ route('registrations.Javalist') }}">Java</a></li>
                                <li><a class="dropdown-item" href="{{ route('registrations.Awslist') }}">AWS</a></li>
                                <li><a class="dropdown-item" href="{{ route('registrations.Angularlist') }}">Angular</a></li>
                                <li><a class="dropdown-item" href="{{ route('registrations.Spring-boot') }}">Spring Boot</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('user_regis.stores') }}">BA Registration</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('bi.projects') }}">Projects</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Projects Reports
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="{{ route('ongoing.projects') }}">Ongoing</a></li>
                                <li><a class="dropdown-item" href="{{ route('pending.projects') }}">Pending</a></li>
                                <li><a class="dropdown-item" href="{{ route('upcoming.projects') }}">Upcoming</a></li>
                                <li><a class="dropdown-item" href="{{ route('completed.projects') }}">Completed</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('enquiries.index') }}">Contact us report</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center fade-slide-in">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Change navbar height on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shrink');
            } else {
                navbar.classList.remove('shrink');
            }
        });
    </script>
</body>
</html>
