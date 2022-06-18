<?php

###Fonction de vérification des identifiants: ouvre la session ou redirige vers le formulaire de connexion###
function LogIn($login, $pass, $utilisateurs){
    if (isset($utilisateurs[$_POST["login"]])){
        if ($pass==($utilisateurs[$login])){
            $_SESSION["login"]=[$login];
            }else{
            Redirect("Mot de passe invalide");
        }
    }else{
        Redirect("Ce nom d'utilisateur n'existe pas");
    }
}

###Fonction de déconnexion. Détruit la session, efface les données recueillies et redirige vers le formulaire de connexion###
function LogOut(){
    session_destroy();
    unset($_SESSION);
    Redirect("Vous avez bien été déconnecté");
}

###Fonction de redirection vers le formulaire de connexion###
function Redirect($message){
    header("location:index.php?message=".$message);
}