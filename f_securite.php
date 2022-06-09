<?php

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

function LogOut(){
    session_destroy();
    unset($_SESSION);
    Redirect("Vous avez bien été déconnecté");
}

function Redirect($message){
    sleep(1);
    header("location:index.php?message=".$message);
}