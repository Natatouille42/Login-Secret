<?php

function Redirect($message){
    sleep(2);
    header("location=index.php?message=".$message);
}

function AfficheMenu($page){
    foreach ($page as $key => $value){
        echo "<a href='index.php?page=".$key."'>".$value["nom_lien"]."</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    }echo "<hr>";
}

function AfficheLien($page){
    if (isset ($_GET["page"])){
        echo $page[$_GET["page"]]["contenu"];
    }
}

function AfficheFormulaire(){
    echo"
    <form method='post' action='index.php'>
        <input type='text' name='login' placeholder='login'><br>
        <input type='password' name='pass' placeholder='mot de passe'><br>
        <input type='submit' value='me connecter'>
    </form>
    ";
}