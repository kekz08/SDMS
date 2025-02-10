<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <title inertia>{{ config('app.name', 'SDMS - Available Scholarships') }}</title>

        <!-- App Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/SDMS.ico') }}">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

        <!-- Font Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icofont/1.0.1/css/icofont.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- Plugin Stylesheets -->
        <link rel="stylesheet" href="{{ asset('assets/css/vendors.css') }}">

        <!-- App Style -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="assets/css/icofont.min.css">

        <!-- Additional Styles -->

        <!-- Laravel Breeze Scripts and Routes -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
            <!-- Bootstrap JavaScript and dependencies -->
    <!-- plugins -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/mychart.js"></script>
    <script src="assets/js/vendors.js"></script>
    <!-- custom app -->
    <script src="assets/js/app.js"></script>
    </body>
</html>
