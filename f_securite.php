<?php

function LogIn($login, $pass, $utilisateurs){
    if (isset($utilisateurs[$login])){
        if ($pass==$utilisateurs[$login]["pass"]){
            $_SESSION["login"]=$login;
        }else{
            Redirect("Mot de passe invalide");
        }
    }else{
        Redirect("Nom d'utilisateur inconnu");
    }
}

function LogOut(){
    session_destroy();
    unset($_SESSION);
    Redirect("Vous avez bien été déconnecté");
}

function Redirect($message){
    header('Location: index.php?message='.$message);
}