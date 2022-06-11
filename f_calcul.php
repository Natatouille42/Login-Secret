<?php

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

function CalculPrix($tarif){
    foreach ($tarif as $legume => $prix){
        if (isset ($_SESSION[$legume])){
            $prix=round ($prix,2);
            $article=($_SESSION[$legume]);
            $resultat[$legume]["quantité"]=$article;
            $resultat[$legume]["somme"]=$article*$prix;
        }
    }return $resultat;
}

function CalculTotal($Checkout){
    $total=0;
    foreach ($Checkout as $key =>$value){
        $total=$total+$value["somme"];
    }return $total;
}