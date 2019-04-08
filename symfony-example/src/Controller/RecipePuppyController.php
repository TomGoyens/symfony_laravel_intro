<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class RecipePuppyController extends AbstractController{
  /**
  * @Route("/recipes/", name="recipes_show")
  */
  public function indexAction(Request $request){
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
      return $this->render('apis/recipePuppy.html.twig', [
          'title' => 'Recipe not found',
          'url' => $url,
          'results' => "",
          'queries' => ""
      ]);
    }

    $obj = json_decode(file_get_contents($url), true);

    return $this->render('apis/recipePuppy.html.twig', [
        'title' => $obj['title'],
        'url' => $url,
        'results' => $obj['results'],
        'queries' => $searchqueries,
    ]);
  }
}
