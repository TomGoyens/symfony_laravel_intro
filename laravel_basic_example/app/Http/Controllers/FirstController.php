<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{

  function index() {
      $array=array('hello', 'it\'s', 'me');
      return view('example/hello', [
        'array' => $array,
        ]);
  }
}
