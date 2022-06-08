<?php

function LogIn($login, $pass, $utilisateurs){
    if ((isset($login)) and (!isset($_SESSION["login"]))){
        if (!isset($utilisateurs[$login])){
            Redirect("Ce nom d'utilisateur n'existe pas.");
        }else{
            if ($pass==$utilisateurs[$login]){
                $_SESSION["login"]=$login;
                $message="Bienvenue, ".$login."!";
            }else{
                Redirect("Mot de passe incorrect");
            }
        }
    }
}

function LogOut(){
    if ((isset($_GET["session"])) and (($_GET["session"])=='out')){
        session_destroy();
        unset($_SESSION);
        Redirect("Vous avez bien été déconnecté.");
    }
}
