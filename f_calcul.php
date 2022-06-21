<?php

function AjoutProduit(){
    if (isset($_GET["article"])) {
        $article = $_GET["article"];
        if (!isset($_SESSION["panier"][$article])) {
            $_SESSION["panier"][$article] = 1;
        } else {
            $_SESSION["panier"][$article]++;
        }
    }
}

function CalculPrix($tarif){
    if (isset ($_SESSION["panier"])){
        foreach (($_SESSION["panier"]) as $legume => $quantite){
            $prix=round ($tarif[$legume],2);
            $article=($_SESSION["panier"][$legume]);
            $resultat[$legume]["quantite"]=$article;
            $resultat[$legume]["somme"]=$article*$prix;
        }return $resultat;
    }else{
        return false;
    }
}

function CalculTotal($Checkout){
    $total=0;
    foreach ($Checkout as $key =>$value){
        $total=$total+$value["somme"];
    }return $total;
}