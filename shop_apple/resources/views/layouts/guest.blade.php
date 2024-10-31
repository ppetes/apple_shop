<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'KIWIStore') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
        .myLink {display: none}
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased" style="background-color:#f8f3ee;">
        
    <!--รูปด้านซ้าย-->
    <div class="w3-content" style="max-width: 100%; height: 100vh; padding: 0;">
    <div class="w3-row w3-padding-64" id="about" style="display: flex; justify-content: space-between; align-items: center; height: 100vh; flex-wrap: nowrap; ">
            <div class="w3-col w3-padding-xxlarge" style="flex: 1; display: flex; justify-content: right; align-items: right; height: 120%;">
                <img class="w3-image shadow-[0_4px_25px_rgba(0,0,0,0.7)]" src="https://www.vivandtimhome.com/wp-content/uploads/2020/06/Modern-Desk-Setup-Work-Station-1.jpg" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="800" height="750">
            </div>
    <!--กล่องลงทะเบียนด้านขวา-->
        <div class="w3-col w3-padding-xxlarge" style="flex: 1; display: flex; justify-content: left; align-items: center; height: 100%;">
        <div class="w3-right min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 bg-white-50 dark:bg-white-900"  style="width: 150%; height: 100%; margin-top: -40px;">
            <div>
                <a href="/">
                    <img class="w3-image" src="/webim/Logo.png" style="width: 300px; display: block; margin: 0 auto;">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-grey dark:bg-black-1000 shadow-[0_4px_15px_rgba(0,0,0,0.5)] transition-shadow duration-300 overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>


        </div>
        </div>
        </div>
        </div>

    </body>
</html>
