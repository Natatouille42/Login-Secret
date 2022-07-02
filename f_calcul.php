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
        foreach ($produits as $produit => $quantite) {
            $prix = $tarif[$produit];
            $resultat[$produit] = $prix * $quantite * $utilisateurs[$_SESSION["login"]]["reduction"];
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