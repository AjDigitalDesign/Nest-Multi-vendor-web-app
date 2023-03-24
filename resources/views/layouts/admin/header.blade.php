<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name',) }} @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/assets/imgs/theme/favicon.svg')}}" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />

    <script src="https://cdn.tiny.cloud/1/5fm9rp1cpi82ipw86bpl6o0fhhuvr47utgfavojohtagmkjz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- Template CSS -->
    <link href="{{asset('backend/assets/css/main.css?v=1.1')}}" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="screen-overlay"></div>

