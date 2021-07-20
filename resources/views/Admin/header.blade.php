<!doctype html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('assets/vendor/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome/css/solid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome/css/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/master.css') }}" rel="stylesheet">
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="active">
            <div class="sidebar-header py-3 d-flex">
                <h3 class="text-primary mb-0 p-0">Admin Panel</h3>
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="/"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#nav_employees" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-users"></i> Employees</a>
                    <ul class="collapse list-unstyled" id="nav_employees">
                        <li>
                            <a href="/employees"><i class="fas fa-angle-right"></i> List</a>
                        </li>
                        <li>
                            <a href="/employees/create"><i class="fas fa-angle-right"></i> Create an Employee</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#nav_departments" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-layer-group"></i> Departments</a>
                    <ul class="collapse list-unstyled" id="nav_departments">
                        <li>
                            <a href="/departments"><i class="fas fa-angle-right"></i> List</a>
                        </li>
                        <li>
                            <a href="/departments/create"><i class="fas fa-angle-right"></i> Create a Department</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light"><i class="fas fa-bars"></i><span></span></button>
            </nav>