<?php


###Comptabilise les articles ajoutés au panier et crée un tableau stocké dans la variable $_SESSION###
function AjouterArticlePanier($article){


        if (!isset($_SESSION["panier"][$article])) {
            $_SESSION["panier"][$article] = 1;
        } else {
            $_SESSION["panier"][$article]++;

        }

}

###Récupère les données stockées dans la variable $_SESSION avec la fonction panier et calcule le tarif par type d'article###
function CalculPrix($tarif){

    if(isset($_SESSION["panier"])){
      foreach ($_SESSION["panier"] as $nom_legume => $quantite){
        $prix=round($tarif[$nom_legume],2);
        $resultat[$nom_legume]["quantité"]=$quantite;
        $resultat[$nom_legume]["somme"]=$prix*$quantite;
      }
      return $resultat;
    }else{
      return false;
    }


}

###Récupère le tableau de prix fourni par la fonction calculprix et additionne pour obtenir le total pour affichage###
function CalculTotal($Checkout){
    $total=0;
    if($Checkout!=false){
      foreach ($Checkout as $key =>$value){
        $total=$total+$value["somme"];
      }return $total;
    }

}
