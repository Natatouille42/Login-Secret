<?php

function Routage($utilisateurs, $page, $tarif){

    ###TRAITEMENT###

    if (isset ($_POST["login"]) and !isset ($_SESSION["login"])) {
        LogIn($_POST["login"], $_POST["pass"], $utilisateurs);
    }
    if (isset($_GET["logout"]) and ($_GET["logout"])=="true") {
        LogOut();
    }
    if (isset($_SESSION["login"])){
        Panier();
    }
    if (isset($_GET["page"]) and ($_GET["page"])=='index'){
        $Checkout=CalculPrix($tarif);
        $total=CalculTotal($Checkout);
    }



    ###AFFICHAGE###

    if (isset($_SESSION["login"])){
        AfficheMenu($page);
        AfficheLien($page, $tarif);
        if (isset($_GET["page"]) and $_GET["page"]=='index'){
            AffichePanier($Checkout, $total);
        }
    }else{
        if (isset($_GET["page"])){
            Redirect("Veuillez vous connecter pour accéder au lien");
        }
    }
    if (!isset($_SESSION["login"])) {
        AfficheFormulaire();
    }

}

function AfficheMenu($pages){
    foreach ($pages as $key => $value){
        echo "<a href='index.php?page=".$key."'>".$value['nom_lien']."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    echo "<br><br>";
    echo "<a href='index.php?logout=true'>Me déconnecter</a>";
}

function AfficheLien($pages, $tarif){
    if (isset($_GET["page"])){
        echo $pages[$_GET["page"]]["contenu"]["titre"]."<br><br>";
        echo $pages[$_GET["page"]]["contenu"]["description"]."<br><br>";
        if ($_GET["page"]!=='index'){
            foreach ($pages[$_GET["page"]]["contenu"]["articles"] as $key){
                echo "<a href='index.php?page=".$_GET["page"]."&article=".$key."'>".$key."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                echo $tarif[$key]."€<br>";
            }
        }
    }
}

function AfficheFormulaire(){
    if (isset($_GET["message"])){
        echo $_GET["message"];
    }
    echo"
    <form method='post' action='index.php'>
    <input type='text' name='login' placeholder='Entrez votre login'>
    <input type='password' name='pass' placeholder='Entrez votre mot de passe'>
    <input type='submit' value='Me connecter'>
    </form>
    ";
}

function AffichePanier($Checkout, $total){
    foreach ($Checkout as $produit => $value){
        echo $value["quantité"]." x ".$produit." = ".$value["somme"]."€<br>";
    }
    echo "<hr>";
    echo "total: ".$total." €";
}