<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}"
    data-base-url="{{ url('/') }}" data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | Library Book Borrowing and Returning System </title>
    <meta name="description"
        content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
    <meta name="keywords"
        content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Canonical SEO -->
    <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />


    <!-- Include Styles -->
    @include('layouts/sections/styles')

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> --}}
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables/dataTables.dataTables.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10"> --}}
    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('layouts/sections/scriptsIncludes')
</head>

<body>


    <!-- Layout Content -->
    @yield('layoutContent')
    <!--/ Layout Content -->



    @include('layouts/sections/scripts')

    <!-- Include Datatables -->
    <script src="{{ asset('assets/js/datatables-plugin/dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/datatables-plugin/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('assets/js/datatables-plugin/data.js') }}"></script>


    <!-- Include Scripts -->
    <script src="{{ asset('assets/js/book-update-delete.js') }}"></script>
    <script src="{{ asset('assets/js/update-user.js') }}"></script>
    <script src="{{ asset('assets/js/delete-user.js') }}"></script>
    <script src="{{ asset('assets/js/update-delete-user.js') }}"></script>
    <script src="{{ asset('assets/js/login.js') }}"></script>
    <script src="{{ asset('assets/js/register.js') }}"></script>
    <script src="{{ asset('assets/js/register-user.js') }}"></script>
    <script src="{{ asset('assets/js/register-book.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/google.js') }}"></script>


    <!-- Include SweetAlert library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}

</body>

</html>
