<?php

function Routage($page, $tarif, $utilisateurs){

    ###Traitement###
    #Anonyme
    if (!isset($_SESSION["login"]) and isset ($_POST["login"])){
        LogIn($_POST["login"], $_POST["pass"], $utilisateurs);
    #Sécurisé
    }elseif (isset($_GET["logout"])){
        LogOut();
        }else{
        AjoutPanier();
    }
    ###Affichage###
    #Sécurisé
    if (isset($_SESSION["login"])){
        AfficheMenu($page);
        AffichePage($page, $tarif);
    #Anonyme
    }else{
    #Redirection spéciale hacker
        if (isset($_GET["page"])){
            Redirect("Veuillez vous connecter pour accéder au lien");
        }else{
            AfficheFormulaire();
        }
    }
}

function AfficheFormulaire(){
    echo "<div class='menu'>";
    if (isset($_GET["message"])){
        echo ($_GET["message"])."<br>";
    }
    echo "
    <form class='login' method='post' action='index.php'>
    <input type='text' name='login' placeholder='login'><br>
    <input type='password' name='pass' placeholder='pass'><br>
    <input type='submit' value='Me connecter'>
    </form>
    </div>
    ";
}

function AfficheMenu($pages){
    echo "<div class='menu'>";
    foreach ($pages as $key => $value){
        if ($key !== "index"){
            echo "<a href='index.php?page=".$key."'>".$value["nom_lien"]."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }else{
            echo "<a href='index.php'>".$value["nom_lien"]."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
    }echo "<br><a href='index.php?logout=true'>Me déconnecter</a><br><br>";
    echo "</div>";
}

function AffichePage($pages, $tarif){
    echo "<div class='row g-0' id='myrow'>";
    echo "<div class='page col-lg-9'>";
    if (isset ($_GET["page"])){
        echo $pages[$_GET["page"]]["contenu"]["titre"]."<br>";
        echo $pages[$_GET["page"]]["contenu"]["description"]."<br><br>";
        foreach ($pages[$_GET["page"]]["contenu"]["articles"] as $key){
            echo "<a href='index.php?page=".$_GET["page"]."&produit=".$key."'>".$key."</a><br>";
        }
    }else{
        echo $pages["index"]["contenu"]["titre"]."<br><br><br>";
        echo $pages["index"]["contenu"]["description"]."<br><br><br>";
    }
    echo "</div>";
    echo "<div class='panier col-lg-3'>";
    AffichePanier($tarif, $pages);
    echo "</div>";
    echo "</div>";
}

function AffichePanier($tarif, $page){
    echo "Bonjour, ".$_SESSION["login"]."!<br><br>";
    echo "Votre panier :<br>";
    if (isset($_SESSION["panier"])) {
        $resultat = CalculArticle($tarif);
        $total = CalculTotal($resultat);
        foreach ($_SESSION["panier"] as $categorie => $donnee){
            echo "<h5><br>".$page[$categorie]["nom_lien"]."</h5>";
            foreach ($donnee as $produit => $quantite){
                echo $produit." x ".$quantite." = ".$resultat[$produit]." €<br>";
            }
        }
        echo "<hr>";
        echo "Total : " . $total . "€";
    } else {
        echo "Votre panier est vide";
    }
}


?>