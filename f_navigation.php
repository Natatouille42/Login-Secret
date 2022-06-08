<?php

function AfficheFormulaire(){
    if(isset($_GET["message"])){
        echo $_GET["message"];
    }
    if (!isset($_SESSION["login"])){
        echo "
        <form method='post' action='index.php'>
        <input type='text' name='login' placeholder='username'><br>
        <input type='password' name='pass' placeholder='password'><br>
        <input type='submit' value='Me connecter'>        
        ";
    }
}

function AffichePage($page){
    if (isset($_SESSION["login"])){
        foreach ($page as $key => $value){
            echo "<a href='index.php?page=".$key."'>".$value["nom_lien"]."</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }echo "<hr>";
    }
}


function AfficheLien($page){
    if(isset($_GET["page"])){
        if (isset($_SESSION["login"])) {
            echo $page[$_GET["page"]]["contenu"];
        }else{
            Redirect("Veuillez vous connecter pour accéder au lien.");
        }
    }
}

function AfficheOut(){
    if (isset($_SESSION["login"])) {
        echo "<a href='index.php?session=out'>Me déconnecter</><br><br>";
        echo "<hr>";
    }
}

function Redirect($message){
    sleep(1);
    header("Location: index.php?message=".$message."");
}

function Routage(){

}