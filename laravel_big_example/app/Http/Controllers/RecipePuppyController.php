<?php

namespace App\Http\Controllers;


class RecipePuppyController extends Controller{
  public function index(){
    $url = 'http://www.recipepuppy.com/api/?';
    $searchqueries = [];
    if (!empty($_GET['ingredients'])){
      $url = $url.'&i='.$_GET['ingredients'][0];
      array_push($searchqueries, $_GET['ingredients'][0]);
      if (count($_GET['ingredients']) > 1){
        for($i = 1; $i < count($_GET['ingredients']); $i++){
          $url = $url.','.$_GET['ingredients'][$i];
          array_push($searchqueries, $_GET['ingredients'][$i]);
        }
      }
    }
    if (!empty($_GET['dish'])){
      $url = $url.'&q='.$_GET['dish'];
      array_push($searchqueries, $_GET['dish']);
    }
    if (!empty($_GET['page'])){
      $url = $url.'&p='.$_GET['page'];
      array_push($searchqueries,$_GET['page']);
    }

    if (@file_get_contents($url) === false) {
      return view('recipePuppy', [
          'title' => 'Recipe not found',
          'url' => $url,
          'results' => "",
          'queries' => ""
      ]);
    }

    $obj = json_decode(file_get_contents($url), true);
    return view('recipePuppy', [
        'title' => $obj['title'],
        'url' => $url,
        'results' => $obj['results'],
        'queries' => $searchqueries,
    ]);
  }
}
