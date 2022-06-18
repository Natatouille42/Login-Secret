<?php


###Comptabilise les articles ajoutés au panier et crée un tableau stocké dans la variable $_SESSION###
function Panier(){
    if (isset($_GET["article"])) {
        $article = $_GET["article"];
        if (!isset($_SESSION[$article])) {
            $_SESSION[$article] = 1;
        } else {
            $_SESSION[$article]++;
        }
    }
}

###Récupère les données stockées dans la variable $_SESSION avec la fonction panier et calcule le tarif par type d'article###
function CalculPrix($tarif){
    foreach ($tarif as $legume => $prix){
        if (isset ($_SESSION[$legume])){
            $prix=round ($prix,2);
            $article=($_SESSION[$legume]);
            $resultat[$legume]["quantité"]=$article;        //Compabilise la quantité de chaque article pour calcul et affichage (tableau)
            $resultat[$legume]["somme"]=$article*$prix;     //Crée un tableau en résultat pour calcul du total et affichage
        }
    }return $resultat;
}

###Récupère le tableau de prix fourni par la fonction calculprix et additionne pour obtenir le total pour affichage###
function CalculTotal($Checkout){
    $total=0;
    foreach ($Checkout as $key =>$value){
        $total=$total+$value["somme"];
    }return $total;
}