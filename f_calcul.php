<?php

function AjoutPanier(){
    if (isset ($_GET["produit"])){
        $produit=$_GET["produit"];
        $categorie=$_GET["page"];
        if (!isset ($_SESSION["panier"][$categorie][$produit])){
            $_SESSION["panier"][$categorie][$produit]=1;
        }else{
            $_SESSION["panier"][$categorie][$produit]++;
        }
    }
}

function CalculArticle($tarif, $utilisateurs){
    foreach ($_SESSION["panier"] as $categorie => $produits){
        $reduction[$categorie]=$utilisateurs[$_SESSION["login"]]["reduction"][$categorie];
        foreach ($produits as $produit => $quantite) {
            $prix = $tarif[$produit];
            $resultat[$produit] = $prix * $quantite * $reduction[$categorie];
        }
    }
    return $resultat;
}

function CalculTotal($panier){
    $total=0;
    foreach ($panier as $item => $soustotal){
        $total=$total+$soustotal;
    }return $total;
}