<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script scr="js/jquery-1.3.2.js"></script> <!-- Integration de Jquery!!! -->
    <script scr="bootstrap/dist/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
	<title> Se Connecter - Animalerie de Madagascar </title>
</head>
<body>
<?php
require_once('conf.php');
$erreur = '';
if(isset($_POST["connection"]))
{
    if(isset($_POST["user"]))
    {
        if(isset($_POST["password"]))
        {
          
            try
            {
                $bdd = new PDO("mysql:host=$hn;dbname=$db", $un, $pw);
            }       
            catch (Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
            $recupere_bdd = $bdd -> query('SELECT user_name, email, mdp from utilisateur');
            while($ligne_bdd = $recupere_bdd->fetch())
            {
                if(($_POST["user"]==$ligne_bdd["user_name"])||($_POST["user"]==$ligne_bdd["emai"]))
                {
                    $user_correcte = true;
                    if( hash("sha512", $_POST["password"]) == $ligne_bdd["mdp"])
                    {
                        header('Location: home.php');    
                    }
                    else
                    {
                        /*
                        echo hash("sha512", $_POST["password"]) . "<br>";
                        echo $ligne_bdd["mdp"] . "<br>";
                        echo $_POST["password"] . " " . strlen($_POST["password"]). "<br>";
                        //*/
                        echo "<script>alert('Mot de passe incorrecte');</script>";
                    }
                  
                }
                
            }
            if($user_correcte!=true)
            {
                echo "<script>alert('Nom d\'utilisateur ou mail incorrecte');</script>";
            }
        }
        else
        {
            echo 'Remplir le mot de passe';
        }
    }
    else
    {
        echo'Remplir le nom d\'utilisateur ou mail';
    }
}
?>
		
		<div class="conteneur1">
                    <div class="h1"> <strong> Se connecter </strong>  </div>
                    <div class="h2">  Nom d'utilisateur ou adresse email </div>
                    <form action='index.php' method="post">
                        <input name="connect" type="hidden" value="1">
                        <input class="mail" type="text" name="user" required>
                        <div class="h2">  Mot de passe  </div>
                        <input class="pass" type="password" name="password" required>
                        <button class="login" type="submit" name="connection"> <b> Se connecter </b></button>
                        <div class="h4" id='oublie'> <strong> Mot de passe oublié ? </strong> </div>
                    </form>
                    <a class="lien1" href="Forgotpass.html"> <strong> Cliquez ici. </strong> </a>
        </div>
         
        <div class="conteneur2">
         		<div class="h1"><strong>S'incrire</strong></div>
         		<form action='inscription.php' method='post'> 
         		    <div class="h2"> Nom d'utilisateur</div>
                    <input class="mail" type="text" name="username" required>
                    <div class="h2"> Adresse email</div>
                    <input class="mail" type="email" name="mail" required>
                    <div class="h2">  Mot de passe  </div>
                    <input class="pass" type="password" name="pass" required>
                    <div class="h2">  Confirmer votre Mot de passe  </div>
                    <input class="pass" type="password" name="confirm-pass" required>
                    <input class="login" type="submit" name="login" value="S'inscrire">
                </form>
        </div>
	

</body></html>