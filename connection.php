<?php
if(isset($_POST["connection"]))
{
    if(isset($_POST["mail"]))
    {
        if(isset($_POST["password"]))
        {
            try
            {
                $bdd = new PDO('mysql:localhost;dbname=gestion_staock', 'sserver', 'sserver');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
            
        }
        else
        {
            echo'Remplir le mot de passe';
        }
    }
    else
    {
        echo'Remplir le mail';
    }
}
?>