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

    <div class="main-left-margin-content uk-width-1-1@s uk-padding-large main-top-margin-content desktop">
        <div>
            @if ($search_result->count() != 0)
                <div class="main-text-primary uk-h3">Search Result For {{ $search_query }}</div>
            @else
                <div class="main-text-primary uk-h3">Oops! No recipe found</div>
            @endif
            <div class="uk-width-1-1@s uk-grid-column-medium uk-grid-row-medium" uk-grid>
                @foreach($search_result as $r)
                    <div>
                        <div class="uk-width-medium uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <img src="{{ asset('/img/logo.png') }}" alt="" />
                            </div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title uk-margin-remove-bottom">{{ $r->recipe_name }}</h3>
                                <div>Category: {{ $r->category->category_name }}</div>
                                <div>{{ explode(' ', $r->created_at)[0] }}</div>
                                <a href="{{ url('recipe/'.$r->id) }}" class="uk-margin-medium-top uk-width-1-1@s uk-button uk-button-primary">See Recipe</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>


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
        <a uk-search-icon></a>
        <input class="uk-search-input mobile" name="search_query" type="search" placeholder="Search Recipe" />
    </form>
    @if ($search_result->count() != 0)
        <div class="mobile main-text-primary uk-h3 uk-margin-small-top">Search Result For {{ $search_query }}</div>
    @else
        <div class="mobile main-text-primary uk-h3 uk-margin-small-top">Oops! No recipe found</div>
    @endif
    @foreach($search_result as $r)
        <div class="mobile uk-margin-medium-bottom">
            <div class="uk-width-medium uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <img src="{{ asset('/img/logo.png') }}" alt="" />
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title uk-margin-remove-bottom">{{ $r->recipe_name }}</h3>
                    <div>Category: {{ $r->category->category_name }}</div>
                    <div>{{ explode(' ', $r->created_at)[0] }}</div>
                    <a href="{{ url('recipe/'.$r->id) }}" class="uk-margin-medium-top uk-width-1-1@s uk-button uk-button-primary">See Recipe</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

</body>
</html>
