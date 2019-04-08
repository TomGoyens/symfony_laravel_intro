<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class JokeController extends AbstractController{
  /**
  * @Route("/joke/", name="jokes_show")
  */
  public function indexAction(Request $request){
    $url = 'https://official-joke-api.appspot.com/jokes/random';
    $obj = json_decode(file_get_contents($url), true);

    return $this->render('apis/jokes.html.twig', [
        'title' => $obj['type'],
        'setup' => $obj['setup'],
        'punchline' => $obj['punchline'],
    ]);
  }
}
