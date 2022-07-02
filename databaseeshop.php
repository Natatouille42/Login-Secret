<?php

$utilisateurs=array(
  "lionel"=>array(
      "pass"=>"verrin",
      "reduction"=>array(
          "legumes"=>0.5,
          "fruits"=>1,
          "cremerie"=>1,
          "epicerie"=>0.85,
      ),
  ),
  "natacha"=>array(
      "pass"=>"crémant",
      "reduction"=>array(
          "legumes"=>1,
          "fruits"=>0.75,
          "cremerie"=>1,
          "epicerie"=>0.95,
      ),
  ),
  "jeanne"=>array(
      "pass"=>"magnolia",
      "reduction"=>array(
          "legumes"=>1,
          "fruits"=>1,
          "cremerie"=>0.6,
          "epicerie"=>0.8,
      ),
  ),
  "louis"=>array(
      "pass"=>"avion",
      "reduction"=>array(
          "legumes"=>0.5,
          "fruits"=>0.9,
          "cremerie"=>1,
          "epicerie"=>1,
      ),
  ),
);

$page=array(
  'index'=> array(
    "nom_lien"=>"accueil",
    "contenu"=>array(
        "titre"=>"<h4>Vous êtes sur la page accueil</h4>",
        "description"=>"Cliquez sur les rayons pour choisir des produits",
  )
  ),

  'legumes'=> array(
      "nom_lien"=>"légumes",
      "contenu"=> array(
          "titre"=>"<h4>Vous êtes au rayon légumes</h4>",
          "description"=>"Cliquez sur un article pour l'ajouter au panier<br><br>",
          "articles"=> array(
              "concombre",
              "avocat",
              "chou blanc",
          )
      )
  ),

    'fruits'=> array(
        "nom_lien"=>"fruits",
        "contenu"=> array(
            "titre"=>"<h4>Vous êtes au rayon fruits</h4>",
            "description"=>"Cliquez sur un article pour l'ajouter au panier<br><br>",
            "articles"=> array(
                "melon",
                "ananas",
                "grenade",
            )
        )
    ),

    'cremerie'=> array(
        "nom_lien"=>"crémerie",
        "contenu"=> array(
            "titre"=>"<h4>Vous êtes au rayon crémerie</h4>",
            "description"=>"Cliquez sur un article pour l'ajouter au panier<br><br>",
            "articles"=> array(
                "lait",
                "beurre",
                "fromage blanc",
            )
        )
    ),

    'epicerie'=> array(
        "nom_lien"=>"épicerie",
        "contenu"=> array(
            "titre"=>"<h4>Vous êtes au rayon épicerie</h4>",
            "description"=>"Cliquez sur un article pour l'ajouter au panier<br><br>",
            "articles"=> array(
                "pâtes",
                "huile",
                "moutarde",
                "sel",
            )
        )
    )
);

$tarif=array(
    "concombre"=>1,
    "avocat"=>1.2,
    "chou blanc"=>3,
    "melon"=>2.5,
    "ananas"=>3.5,
    "grenade"=>1,
    "lait"=>1,
    "beurre"=>2.5,
    "fromage blanc"=>3,
    "pâtes"=>1.5,
    "huile"=>5,
    "moutarde"=>3.5,
    "sel"=>0.8
);