<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Se Connecter - Animalerie de Madagascar </title>
	</head>
	<body>
    <?php
$erreur = '';
if(isset($_POST["connection"]))
{
    if(isset($_POST["user"]))
    {
        if(isset($_POST["password"]))
        {
          
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
                        header('Location: Succee.php');    
                    }
                    else
                    {
                        echo '<span id="Erreur_connection">Mot de passe incorrecte</span>';
                    }
                  
                }
                
            }
            if($user_correcte!=true)
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
		<style>
		body{
            background-color: rgb(186, 235, 186);
        }
        
			.conteneur1{
                background-color: lightblue;
				display:block;
                height:500px;
                width:500px;
                border-radius:50px;
                font-size:40px;
                position: absolute;
                cursor: pointer;
                left:120px;
                top:90px;
                box-shadow: 0 30px 38px 0 rgba(0, 0, 0, 0.1), 0 46px 60px 0 rgba(0, 0, 0, 0.5);
                 }
            .h1{
            	position:relative; margin-left:14%; margin-top:8%;
                font-family:"TeX Gyres Heros";
                font-size:50px;
                color:orange;
                opacity:1;
                display:block;
                }
             .h2{
                position:relative; margin-left:20%; margin-top:4%;
                font-family:"TeX Gyres Heros";
                font-size:17px;
                color:black;
                opacity:0.5;
                display:block;
                }
            .mail{
               position:relative; margin-left:20%; margin-top:0%;
               width:60%;
               height:35px;
               background-color:grey;
               border-radius:5px;
               color:black;
               border:none;
               opacity:0.3;
               transition-duration:0.3s;
               display:block;
               }
            .mail:hover{
                       opacity:0.5;
                       transition-duration:0.3s;
                       }
            .pass{
               position:relative; margin-left:20%; margin-top:0%;
               width:60%;
               height:35px;
               background-color:grey;
               border-radius:5px;
               color:black;
               border:none;
               opacity:0.3;
               transition-duration:0.3s;
               display:block;
               }
            .pass:hover{
                       opacity:0.5;
                       transition-duration:0.3s;
                       }
            
            .login{
                position:relative; margin-left:28%; margin-top:6%;
                color:white;
                background-color:orange;
                font-family:"TeX Gyres Heros";
                font-size:20px;
                border:none;
                width:44%;
                height:40px;
                opacity:0.9;
                border-radius:5px;
                display:block;
                transition-duration:0.3s;
                }
            .login:hover{
                position:relative; margin-left:28.1%; margin-top:7.1%;
                width:210px;
                height:50px;
                transition-duration:0.3s;
                }
            .lien1{
                position:fixed;
                left:170px;
                top:520px;
                font-family:sans-serif;
                font-size:18px;
                color: rgb(185, 196, 31);
                opacity:1;
                display: inline;
                margin-left : 4.6%;
                }
            #Erreur_connection{
                position: fixed;
                
                top:100px;
            }           
            .h4{
                position:fixed; left:170px; 
                top:500px;
                font-family:sans-serif;
                font-size:15px;
                color:black;
                opacity:0.7;
                }
            .lien2{
            	position:fixed;
                left:170px;
                top:560px;
                font-family:sans-serif;
                font-size:18px;
                color:#ff0066;
                opacity:1;
                display: inline;
            }
            .conteneur2{
                background-color: lightblue;
				overflow:hidden;
                display:block;
                height:500px;
                width:500px;
                border-radius:50px;
                font-size: 40px;
                opacity:1;
                position:fixed; left:650px; 
                top:90px;
                box-shadow: 0 30px 38px 0 rgba(0, 0, 0, 0.1), 0 46px 60px 0 rgba(0, 0, 0, 0.5);
                }
            
            
            .pass1{
               position:relative; margin-left:20%; margin-top:0%;
               width:60%;
               height:35px;
               background-color:grey;
               border-radius:5px;
               color:black;
               border:none;
               opacity:0.3;
               transition-duration:0.3s;
               display:block;
            }
            .pass:hover{
                opacity:0.5;
                transition-duration:0.3s;
                }
            .login1{
            	position:relative; margin-left:28%; margin-top:6%;
                color:white;
                background-color:orange;
                font-family:"TeX Gyres Heros";
                font-size:20px;
                border:none;
                width:44%;
                height:40px;
                opacity:0.9;
                border-radius:5px;
                display:block;
                transition-duration:0.3s;
            }
            .login:hover{
                        position:relative; margin-left:28.1%; ;
                        width:210px;
                        height:50px;
                        transition-duration:0.3s;
                        }
            
            #oublie {
                margin-left:4.6%;
            }

             
		</style>
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
                  
            </button></div>
         
        <div class="conteneur2">
         		<div class="h1"><strong>S'incrire</strong></div>
         		<form action='index.php' method='post'> 
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