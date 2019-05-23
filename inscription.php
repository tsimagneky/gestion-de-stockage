<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=gestion_staock', 'sserver', 'sserver');
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
                $insertion->execute(array($_POST["username"], $_POST["mail"], $_POST["pass"]));
                $insertion->closeCursor();
                
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