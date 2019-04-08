<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PokemonController extends AbstractController{
  /**
  * @Route("/pokemon/", name="pokemon_show")
  */
  public function indexAction(Request $request){
    if (!empty($_GET['q'])){
      $pokemon = strtolower($_GET['q']);
      $url = 'https://pokeapi.co/api/v2/pokemon/'.$pokemon.'/';

      if (@file_get_contents($url) === false) {
        return $this->render('apis/pokedex.html.twig', [
          'alt' => "No pokemon found",
          'title' => 'Pokémon not found',
          'sprite' => "",
          'name' => "/",
          'height' => "/",
          'weight' => "/",
          'id' => "/",
          'flavor' => "/",
          'genus' => "/",
        ]);
      }
      $obj = json_decode(file_get_contents($url), true);
      $url2 = $obj['species']['url'];
      $obj2 = json_decode(file_get_contents($url2), true);
      $lang = "";
      $genus = explode(" ", $obj2['genera'][2]['genus'])[0];
      $luck = random_int(0, 9);
      $sex = random_int(0,1);
      if($luck == 0){
        if ($sex == 1 && $obj['sprites']['front_shiny_female'] != NULL){
          $sprite = $obj['sprites']['front_shiny_female'];
        } else{
          $sprite = $obj['sprites']['front_shiny'];
        }
      } else if ($sex == 1 && $obj['sprites']['front_female'] != NULL){
        $sprite = $obj['sprites']['front_female'];
      } else {
        $sprite = $obj['sprites']['front_default'];
      }

      while ($lang != "en"){
        $number = random_int(0, count($obj2['flavor_text_entries'])-1);
        $lang = $obj2['flavor_text_entries'][$number]['language']['name'];
      }

      return $this->render('apis/pokedex.html.twig', [
        'alt' => "No pokemon found",
        'title' => 'It\'s a '.ucfirst ($obj['name']).'!',
        'sprite' => $sprite,
        'name' => strtoupper($obj['name']),
        'height' => $obj['height']/10,
        'weight' => $obj['weight']/10,
        'id' => $obj['id'],
        'flavor' => $obj2['flavor_text_entries'][$number]['flavor_text'],
        'genus' => strtoupper($genus),
      ]);
    } else{
      return $this->render('apis/pokedex.html.twig', [
        'alt' => "No pokemon found",
        'title' => 'Pokémon not found',
        'sprite' => "",
        'name' => "/",
        'height' => "/",
        'weight' => "/",
        'id' => "/",
        'flavor' => "/",
        'genus' => "/",
      ]);
    }
  }
}
