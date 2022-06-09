<!DOCTYPE html>
<html>
<?php
session_start();
include "allinclude.php";
?>
<head>
    <title>Titre affiché dans la barre de titre du navigateur</title>
</head>

<body>

<?php
Routage($utilisateurs, $page);
?>

</body>

</html>
