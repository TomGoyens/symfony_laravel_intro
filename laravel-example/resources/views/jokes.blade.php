@extends('layouts.app')

@section('title')
  {{ $title }}
@endsection

@section('stylesheets')
  @parent
  <link href="{{ asset('css/joke.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="jokeBox">
  <p>
    {{ $setup }}
    {{ $punchline }}
  </p>
</div>
@endsection
