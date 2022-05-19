<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Needy Telegram Translator</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('images/favicons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('images/favicons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/favicons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/favicons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/favicons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/favicons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('images/favicons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/favicons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/favicons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('images/favicons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/favicons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('images/favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('images/favicons/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: black;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .centered-page {
            width: 100%;
            height: 100%;
            float: left;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .page-content {
            text-align: center;
        }

        .page-content .logo img {
            width: 400px;
            height: auto;
            margin: auto;
        }
        .page-content .title {
            color: #228f91;
            font-size: 32px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="centered-page">
    <div class="page-content">
        <div class="logo"><img src="{{asset('images/needy-bot-api-logo.png')}}"></div>
        <div class="title">Needy Telegram Translator API</div>
    </div>
</div>
</body>
</html>
