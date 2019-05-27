<!DOCTYPE html>
<html>
<head>
    <script scr="js/jquery-1.3.2.js"></script>
    <script scr="bootstrap/dist/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <title>Test</title>
</head>
<body>
<?php
require_once('conf.php');
//echo $hn;
try {
$bdd = new PDO("mysql:host=$hn;dbname=$db", $un, $pw);
} 
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
//*
$recupere_bdd = $bdd -> query('SELECT user_name, email, mdp from utilisateur');
echo "<h1>Voici la liste des utilisateurs inscrits</h1>\n<table border='1'>\n<tr><th>Username</th><th>email</th><th>Password</th></tr>";
while($lignes = $recupere_bdd->fetch()){
    echo "<tr><td>$lignes[0]</td><td>$lignes[1]</td><td>$lignes[2]</td></tr>";
}
echo "</table>";
//*/
?>
</body>
</html>