<?php

namespace App\Http\Controllers;


class JokeController extends Controller{

  public function index(){
    $url = 'https://official-joke-api.appspot.com/jokes/random';
    $obj = json_decode(file_get_contents($url), true);

    return view('jokes', [
        'title' => $obj['type'],
        'setup' => $obj['setup'],
        'punchline' => $obj['punchline'],
    ]);
  }
}
