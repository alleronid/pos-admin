<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ isset($general_settings->favicon->file) && $general_settings->favicon->file ? $general_settings->favicon->file : asset('/logo/small_logo.png') }}" />
    
    <!-- Title -->
    <title>{{ isset($general_settings->site_title) && $general_settings->site_title ? $general_settings->site_title : 'Ready POS' }} - @yield('title')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    
    <!-- Custom Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    @yield('content')
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    @stack('scripts')
</body>
</html>
