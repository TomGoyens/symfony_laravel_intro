@extends('layouts.app')

@section ('stylesheets')
@parent
  <link href="{{ asset('css/pokedex.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('title')
{{ $title }}
@endsection


@section('content')
<div class="bigBox">
  <div class="box">
    <div class="head1">
      <img src="{{ $sprite }}" alt="{{ $alt }}">
      <p><span class="no">No</span>. {{ $id }}</p>
    </div>
    <div class="head2">
      <p>{{ $name }}</p>
      <p>{{ $genus }}</p>
      <div class="stat"><span>HT</span> <span class="statNumber">{{ $height }} cm</span></div>
      <div class="stat"><span>WT</span> <span class="statNumber">{{ $weight }} kg</span></div>
    </div>
    <p class="flavor">{{ $flavor }}</p>
  </div>
</div>
@endsection
