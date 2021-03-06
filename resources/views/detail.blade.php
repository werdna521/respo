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

<nav class="main-nav desktop">
</nav>

<div class="uk-flex uk-flex-row desktop">

    <div class="main-fly uk-position-fixed uk-width-medium uk-background uk-height-1-1 desktop">
        <div class="uk-flex uk-flex-row uk-flex-middle uk-padding-small">
            <a class="uk-logo main-text-logo uk-margin-small-left" href="/home">
                Respo
            </a>
        </div>
        <div class="main-height-nav-sp uk-width-1-1 uk-padding-small uk-padding-remove-bottom">
            <form method="get" action="{{ action('WebController@search') }}" class="uk-search uk-search-default uk-margin-right">
                @csrf
                <a uk-search-icon></a>
                <input class="uk-search-input" name="search_query" type="search" placeholder="Search Recipe" />
            </form>
            <ul class="uk-nav-default uk-nav-parent-icon uk-margin-small-bottom" uk-nav="multiple: true">
                <li class="uk-nav-header uk-text-bold">Recipes</li>
                @foreach($data as $d)
                    <li class="uk-parent {{ $d->id == $detail->category->id ? 'uk-open' : '' }}">
                        <a href="#">{{ $d->category_name }}</a>
                        <ul class="uk-nav-sub">
                            @foreach($d->recipe->sortBy('recipe_name') as $r)
                                @if($r->recipe_name == $detail->recipe_name)
                                    <li class="uk-active"><a class="main-active" href="#">{{ $r->recipe_name }}</a></li>
                                @else
                                    <li><a href="/recipe/{{ $r->id }}">{{ $r->recipe_name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="main-left-margin-content uk-padding-large uk-width-expand main-top-margin-content desktop">
        <div class="uk-card uk-card-default uk-width-expand">
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <img class="uk-border-circle" alt="logo" width="40" height="40" src="{{ asset('/img/logo.png') }}" />
                    </div>
                    <div class="uk-width-expand">
                        <div class="uk-card-badge uk-badge uk-padding-small uk-padding-remove-vertical">{{ $detail->category->category_name }}</div>
                        <div class="uk-card-title uk-margin-remove-bottom uk-h3">{{ $detail->recipe_name }}</div>
                        <div class="uk-text-meta uk-margin-remove-top">Created at {{ explode(' ', $detail->created_at)[0] }}</div>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-margin-small-top uk-margin-remove uk-h2 uk-text-bold main-text-primary">Bahan:</div>
                <div class="main-h4 uk-margin-remove-top main-text-content">{!! nl2br(e($detail->recipe_ingredients)) !!}</div>
                <div class="uk-margin-small-top uk-margin-medium-top uk-h2 uk-text-bold main-text-primary">Cara Pembuatan:</div>
                <div class="main-h4 uk-margin-remove-top main-text-content">{!! nl2br(e($detail->recipe_procedure)) !!}</div>
            </div>
        </div>
    </div>

</div>

<img class="main-bg-1" src="{{ asset('/img/bg-1.png') }}" alt="bg" />

<nav class="main-nav uk-flex uk-flex-row uk-flex-between mobile">
    <a class="uk-logo uk-margin-small-left main-text-logo" href="/home">
        Respo
    </a>
    <a class="main-hamburger uk-margin-small-right mobile" href="#off-canvas" uk-toggle><img src="{{ asset('/img/menu-outline.svg') }}" /></a>
</nav>

<div class="mobile uk-dark" id="off-canvas" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar main-blue mobile">
        <ul class="uk-nav-default uk-nav-parent-icon uk-margin-small-bottom" uk-nav="multiple: true">
            <li class="uk-nav-header uk-text-bold">Recipes</li>
            @foreach($data as $d)
                <li class="uk-parent">
                    <a href="#">{{ $d->category_name }}</a>
                    <ul class="uk-nav-sub">
                        @foreach($d->recipe->sortBy('recipe_name') as $r)
                            <li><a href="/recipe/{{ $r->id }}">{{ $r->recipe_name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="amazingly-must uk-flex uk-flex-column uk-flex-middle uk-margin-xlarge-top">
    <form method="get" action="{{ action('WebController@search') }}" class="mobile uk-margin-small-top uk-width-1-1@s uk-search uk-search-default">
        @csrf
        <a class="mobile" uk-search-icon></a>
        <input class="uk-search-input mobile" name="search_query" type="search" placeholder="Search Recipe" />
    </form>
    <div class="uk-margin-small-top uk-card uk-card-default uk-width-expand mobile">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-auto">
                    <img class="uk-border-circle" alt="logo" width="40" height="40" src="{{ asset('/img/logo.png') }}" />
                </div>
                <div class="uk-width-expand">
                    <div class="uk-card-title uk-margin-remove-bottom uk-h3">{{ $detail->recipe_name }}</div>
                    <div class="uk-text-meta uk-margin-remove-top">Created at {{ explode(' ', $detail->created_at)[0] }}</div>
                </div>
            </div>
        </div>
        <div class="uk-card-body">
            <div class="uk-badge uk-margin-small-bottom uk-padding-small uk-padding-remove-vertical">{{ $detail->category->category_name }}</div>
            <div class="uk-margin-small-top uk-margin-remove uk-h2 uk-text-bold main-text-primary">Bahan:</div>
            <div class="main-h4 uk-margin-remove-top main-text-content">{!! nl2br(e($detail->recipe_ingredients)) !!}</div>
            <div class="uk-margin-small-top uk-margin-medium-top uk-h2 uk-text-bold main-text-primary">Cara Pembuatan:</div>
            <div class="main-h4 uk-margin-remove-top main-text-content">{!! nl2br(e($detail->recipe_procedure)) !!}</div>
        </div>
    </div>
</div>

</body>
</html>
