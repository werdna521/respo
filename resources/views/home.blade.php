<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Respo | Home</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/uikit.min.css') }}"/>
    <script src="{{ asset('/js/uikit.min.js') }}"></script>
    <script src="{{ asset('/js/uikit-icons.min.js') }}"></script>
</head>
<body style="height: 100vh;">

    <div class="uk-width-1-5@l uk-width-1-4@m uk-background uk-border-right uk-height-1-1 main-border-right">
        <div class="uk-flex uk-flex-row uk-flex-middle uk-padding-small main-border-bottom">
            <img class="main-logo" alt="respo" src="{{ asset('/img/logo.png') }}"/>
            <a class="uk-logo main-text-logo uk-margin-small-left" href="/home">
                Respo
            </a>
        </div>
        <div class="main-height-nav-sp uk-width-1-1 uk-padding-small uk-padding-remove-bottom">
            <ul class="uk-nav-default uk-nav-parent-icon uk-margin-small-bottom" uk-nav="multiple: true">
                <li class="uk-nav-header uk-text-bold">Recipes</li>
                <li class="uk-parent">
                    <a href="#">Chickens</a>
                    <ul class="uk-nav-sub">
                        <li><a href="#">Rendang Ayam</a></li>
                        <li><a href="#">Ayam Goreng Kalasan</a></li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#">Snacks</a>
                    <ul class="uk-nav-sub">
                        <li><a href="#">Uyen</a></li>
                        <li><a href="#">Kentang Goreng Krispi</a></li>
                        <li><a href="#">Stik Kentang</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</body>
</html>
