<?php

function Routage($utilisateurs, $page){

    ###TRAITEMENT###

    if (isset ($_POST["login"]) and !isset ($_SESSION["login"])) {
        LogIn($_POST["login"], $_POST["pass"], $utilisateurs);
    }
    if (isset($_GET["logout"]) and ($_GET["logout"])=="true") {
        LogOut();
    }

    ###AFFICHAGE###

    if (isset($_SESSION["login"])){
        AfficheMenu($page);
        AfficheLien($page);
    }else{
        if (isset($_GET["page"])){
            Redirect("Veuillez vous connecter pour accéder au lien");
        }
    }
    AfficheFormulaire();

}

function AfficheMenu($pages){
    foreach ($pages as $key => $value){
        echo "<a href='index.php?page=".$key."'>".$value['nom_lien']."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    echo "<br><br>";
    echo "<a href='index.php?logout=true'>Me déconnecter</a>";
}

function AfficheLien($pages){
    if (isset($_GET["page"])){
        echo $pages[$_GET["page"]]["contenu"];
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