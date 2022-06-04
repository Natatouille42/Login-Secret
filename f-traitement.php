<?php

function LogIn($login,$pass,$utilisateurs){
    if (isset($login)){
        if ($pass==$utilisateurs[$login]["pass"]){
            $_SESSION["status"]="open";
            $_SESSION["message"]="Bienvenue, ".$utilisateurs[$login]." !";
            return $_SESSION;
        }else{
            Redirect("Mot de passe invalide");
        }
    }else{
        Redirect("Ce nom d'utilisateur n'existe pas");
    }
}

function LogOut(){
    session_destroy();
    unset($_SESSION);
    Redirect("Vous avez bien été déconnecté");
}