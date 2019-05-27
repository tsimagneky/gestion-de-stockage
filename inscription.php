<?php
    require_once('conf.php');
    $uname="";
    try
    {
        $bdd = new PDO("mysql:host=$hn;dbname=$db", $un, $pw);
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    
    if (isset($_POST["login"]))
    {
        if ((isset($_POST["username"])) && (isset($_POST["mail"])) && (isset($_POST["pass"])) && (isset($_POST["confirm-pass"])))
        {
            if($_POST["pass"]==$_POST["confirm-pass"])
            {
                $insertion = $bdd->prepare("INSERT INTO utilisateur(user_name, email, mdp) VALUES(?,?,?)");
                $insertion->execute(array($_POST["username"], $_POST["mail"], hash("sha512", $_POST["pass"])));
                $insertion->closeCursor();
                echo "<script>alert('Inscription reussi avec succes!!!');</script>";
                header('Location: index.php');
                $uname = $_POST["username"]
            }
            else
            {
                echo "<script>alert('Le mot de passe de confirmation est incorrecte');</script>";
                header('Location: inscr.php');
                $uname="";
            }
        }
        else
        {
            echo'Remplir bien tous les champs';
        }
    }
?>