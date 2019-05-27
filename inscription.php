<?php
    require_once('conf.php');
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
                echo "Inscription reussi avec succes!!!";
                //header('Location: index.html');
            }
            else
            {
                echo'Le mot de passe de confirmation est incorrecte';
            }
        }
        else
        {
            echo'Remplir bien tous les champs';
        }
    }
?>