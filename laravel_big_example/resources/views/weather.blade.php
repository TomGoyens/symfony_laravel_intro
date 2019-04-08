@extends('layouts.app')

@section('stylesheets')
@parent
  <link href="{{ asset('css/weather.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('javascripts')
@parent
  <script src="{{ asset('js/weather.js') }}" type="text/javascript"></script>
@endsection

@section('title')
  {{ $title }}
@endsection


@section('content')
<div class="weatherBox">
  <div class="images">
    <img src="{{ asset('images/weather') }}/{{ $weatherShort }}.png" alt="Weather image" class="weatherImage">
  </div>
  <div class="text">
    <p class="city">{{ $city }} </p>
    <p class="temp">{{ $temperature }}°C</p>
    <p class="wind"><span class="tag">Wind speed</span> {{ $wind_speed }}<span class="unit">m/s</span></p>
    <p class="humidity"><span class="tag">Humidity</span> {{ $humidity }}<span class="unit">%</span></p>
    <p class="weatherDesc"><img src="{{ $icon }}" alt=" " />{{ $weather }}</p>
  </div>
</div>
@endsection
