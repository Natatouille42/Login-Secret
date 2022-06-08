<!DOCTYPE html>
<?php
session_start();

include "allinclude.php";
?>
<html>

<head>
    <title>Titre affiché dans la barre de titre du navigateur</title>
</head>

<body>
<?php
if (isset($_POST["login"])) {
    LogIn($_POST["login"], $_POST["pass"], $utilisateurs);
}
LogOut();

AfficheFormulaire();
AfficheOut();

AffichePage($page);
AfficheLien($page);

?>
</body>

</html>
