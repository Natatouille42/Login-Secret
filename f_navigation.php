<?php
print_r($_SESSION);

###Fonction globale de la page index, comprenant traitement et affichage###
function Routage($utilisateurs, $page, $tarif){

    ###TRAITEMENT###
    #Anonyme

    if (!isset ($_SESSION["login"])){
        if (isset ($_POST["login"])){
            LogIn($_POST["login"], $_POST["pass"], $utilisateurs);
    #Sécurisé
        }
    }else{
        AjoutProduit();
        if (isset($_GET["logout"])){
            LogOut();
        }
    }

    ###AFFICHAGE###

    if (isset($_SESSION["login"])){
        AfficheMenu($page);
        AfficheLien($page, $tarif);
        if (!isset($_GET["page"])){
            $Checkout=CalculPrix($tarif);
            $total=CalculTotal($Checkout);
            AffichePanier($Checkout, $total);
        }
    }else{
        if (isset($_GET["page"])){
            Redirect("Veuillez vous connecter pour accéder au lien");
        }
    }
    if (!isset($_SESSION["login"])) {       //Si l'utilisateur n'est pas connecté
        AfficheFormulaire();        //Affiche le formulaire de connexion
    }

}

###Affiche les liens vers les différentes pages, et le bouton de déconnexion###
function AfficheMenu($pages){
    foreach ($pages as $key => $value){
        if ($key!=="index"){
            echo "<a href='index.php?page=".$key."'>".$value['nom_lien']."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }else{
            echo "<a href='index.php'>".$value['nom_lien']."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
    }
    echo "<br><br>";
    echo "<a href='index.php?logout=true'>Me déconnecter</a>";
}


###Affiche le titre et la description des pages###
function AfficheLien($pages, $tarif){
    if (isset($_GET["page"])){      //pour chaque page, affiche le titre et la description
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

###Affichele formulaire de connexion, ainsi que le message adéquat en cas de redirection###
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

###Affiche le panier à l'aide des information fournies par les fonctions calculprix et calcultotal###
function AffichePanier($Checkout, $total){
    foreach ($Checkout as $produit => $value){
        echo $value["quantite"]." x ".$produit." = ".$value["somme"]."€<br>";
    }
    echo "<hr>";
    echo "total: ".$total." €";
}
