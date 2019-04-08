@extends('layouts.app')

@section('stylesheets')
@parent
  <link href="{{ asset('css/recipes.css') }}" rel="stylesheet">
@endsection

@section('javascripts')
{{-- @parent --}}
  <script src="{{ asset('js/recipes.js') }}" type="text/javascript"></script>
@endsection

@section('title')
  {{ $title }}
@endsection


@section('content')
<div class="recipeContainer">
  <div class="recipeSearchBox">
    <form class="recipeSearch" action="{{ Route::currentRouteName() }}" method="get">
      <div class="searchInput" id="ingredientSearch"
        ><div class="ingredientLabel">
          <button type="button" name="remove" id="removeIngredient">-</button>
          <label for="ingredients">Ingredient:</label>
          <button type="button" name="add" id="addIngredient">+</button>
        </div
        ><input type="text" name="ingredients[]" value="" placeholder="ingredient"
      ></div>
      <div class="searchInput">
        <label for="dish">Dish:</label>
        <input type="text" name="dish" value="" placeholder="dish">
      </div>
      <div class="searchInput">
        <label for="page">Page:</label>
        <input type="number" name="page" value="" placeholder="page">
      </div>
      <input type="submit" name="search" value="Search">
    </form>
  </div>
  <div class="recipeDisplayBox">
    <h4 class="recipeDisplayTitle">Results for:
      @foreach ($queries as $querie)
        @if ($loop->last)
          {{$querie}}.
        @else
          {{$querie}},
        @endif
      @endforeach
    </h4>
    <ul class="recipeList">
        @foreach ($results as $recipe)
            <li>
              <a href="{{ $recipe['href'] }}"/>
                <div class="thumbnail"><img src="{{ $recipe['thumbnail'] }}"></div>
                <div class="recipe">
                  <div class="recipeTitle">{{ $recipe['title'] }}</div>
                  <div class="recipeIngredients">{{ $recipe['ingredients'] }}</div>
                </div>
              </a>
            </li>
        @endforeach
    </ul>
  </div>
</div>
@endsection
