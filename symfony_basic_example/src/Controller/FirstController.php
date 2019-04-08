<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    /**
     * @Route("/first/{slug}")
     */
    public function index($slug)
    {
      if($slug == 1){
        return $this->render('first/index.html.twig', [
            'controller_name' => 'First_article',
        ]);
      } else {
        return $this->render('first/index.html.twig', [
            'controller_name' => 'Not_First_article',
        ]);
      }
    }
}
