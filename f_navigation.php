<?php
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

###Fonction globale de la page index, comprenant traitement et affichage###
function Routage($utilisateurs, $page, $tarif){

    ###TRAITEMENT###


    #Traitement pour anonyme
    if (!isset($_SESSION["login"])){

      if (isset ($_POST["login"])) {      //Si le formulaire est rempli et qu'aucune session n'est ouverte
        LogIn($_POST["login"], $_POST["pass"], $utilisateurs);      //appelle la fonction login pour connexion et ouverture de session
      }

    #Traitement sécurisé
    }else{
      if (isset($_GET["logout"])) {     //Si le bouton de déconnexion est cliqué
        LogOut();       //appelle la fonction logout pour écraser la session et effacer les données collectées
      }elseif( isset($_GET["article"])) {
        AjouterArticlePanier($_GET["article"]);

      }
    }






    ###AFFICHAGE###
    #Sécurisé
    if (isset($_SESSION["login"])){     //Si la session est ouverte (utilisateur logué)
        AfficheMenu($page);     //Affiche le menu avec les liens vers les différentes pages et le bouton de déconnexion
        AfficheLien($page, $tarif);     //Et affiche le contenu des liens cliqués (articles disponibles et leur tarif)
    #Redirection special Hacker
    }else{
        if (isset($_GET["page"])){      //Si essai d'accéder un lien mais sans etre connecté
            Redirect("Veuillez vous connecter pour accéder au lien");       //Redirige vers le formulaire de connexion
        }
    }
    #Anonyme
    if (!isset($_SESSION["login"])) {       //Si l'utilisateur n'est pas connecté
        AfficheFormulaire();        //Affiche le formulaire de connexion
    }

}

###Affiche les liens vers les différentes pages, et le bouton de déconnexion###
function AfficheMenu($pages){
    foreach ($pages as $key => $value){
        if($key!=="index"){
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
        if ($_GET["page"]!=='index'){       //Affiche les liens produits, sauf sur la page d'accueil

            foreach ($pages[$_GET["page"]]["contenu"]["articles"] as $key){
                echo "<a href='index.php?page=".$_GET["page"]."&article=".$key."'>".$key."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                echo $tarif[$key]."€<br>";
            }
        }
    }else{
      $Checkout=CalculPrix($tarif);       //calcule le prix de chaque article selon la quantité
      $total=CalculTotal($Checkout);      //Et calcule le montanttotal des articles sélectionnés
      AffichePanier($Checkout, $total);       //Affichele prix par type d'article et le prix total
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
    if($Checkout!=false){
      foreach ($Checkout as $produit => $value){
        echo $value["quantité"]." x ".$produit." = ".$value["somme"]."€<br>";
      }
      echo "<hr>";
      echo "total: ".$total." €";
    }else{
      echo "Le panier est vide";
    }

}
