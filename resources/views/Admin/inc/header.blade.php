<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!--- Tailwind CDN -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{asset('Admin/css/style.css')}}">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    @yield('styles')

</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="{{asset('Admin/img/logo.png')}}" alt="">
            </div>

            <span class="logo_name">EductionLab</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="{{route('admin.category.index')}}">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Categories</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="{{route('admin.trainer.index')}}">
                    <i class="uil uil-book-reader"></i>
                    <span class="link-name">Trainers</span>
                </a></li>
                <li><a href="{{route('admin.courses.index')}}">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Courses</span>
                </a></li>
                <li><a href="{{route('admin.students.index')}}">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Students</span>
                </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="{{route('admin.logout')}}">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>
