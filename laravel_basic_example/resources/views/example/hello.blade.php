@extends('layout')

@section('content')

  <ul>
    @foreach ($array as $value)
      <li>{{ $value }}</li>
    @endforeach
  </ul>

@endsection
