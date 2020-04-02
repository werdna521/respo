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
                @foreach($data as $d)
                    <li class="uk-parent">
                        <a href="#">{{ $d['category'] }}</a>
                        <ul class="uk-nav-sub">
                            @foreach($d['data'] as $food)
                                <li><a href="#">{{ $food['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</body>
</html>
