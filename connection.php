<?php
if(isset($_POST["connection"]))
{
    if(isset($_POST["user"]))
    {
        if(isset($_POST["password"]))
        {
            echo'rempi';
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=gestion_staock', 'sserver', 'sserver');
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
                    if($_POST["password"]==$ligne_bdd["mdp"])
                    {
                        echo'Bienvenu';
                        $mdo_correcte = true;
                    }
                }
                
            }
            if($user_correcte==true)
            {
                if($mdo_correcte!= true)
                {
                    echo'Mot de passe incorrecte';
                }
            }
            else
            {
                echo'Nom d\'utilisateur ou mail incorrecte';
            }
        }
        else
        {
            echo'Remplir le mot de passe';
        }
    }
    else
    {
        echo'Remplir le nom d\'utilisateur ou mail';
    }
}
?>