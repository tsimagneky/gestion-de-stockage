<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-1.3.2.js"></script> <!-- Integration de Jquery!!! -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/home/style.css">
	<title> Bienvenue Chez MadaShop</title>
</head>
<body>
    <?php
    session_start();
    require_once('conf.php');
    try
    {
        $bdd = new PDO("mysql:host=$hn;dbname=$db", $un, $pw);
    }
    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    

    if((isset($_SESSION['user_name'])||isset($_SESSION['email']))&&(isset($_SESSION['mdp'])))
    {
        $info_user = $bdd->prepare("SELECT * from utilisateur WHERE user_name=?");
        $info_user->execute(array($_SESSION['user_name']));
        $exista = $info_user->rowCount();
        if($exista==1)
        {
            $info_user = $info_user->fetch();
            $_SESSION['id']=$info_user['id'];
        }
    }
    ?>
    <section>
        <!-- Ceci est la premiere section de la page -->
        <div class="section1">
            <img src="images/logo.png" class="logo">
            <div class="navigation">
                <img src="images/toogle.png" class="toogle">
                <a class="cgr">Categories</a>
            </div>
            <div>
                <a class="submenu">Armoires</a>
                <a class="submenu">Canapés</a>
                <a class="submenu">Chaises</a>
                <a class="submenu">Electroménagers</a>
                <a class="submenu">Lampes</a>
                <a class="submenu">Tables</a>
                <a class="submenu">Ustencils de cuisine</a>
                <a class="submenu">Ventillateurs</a>
            </div>
        </div>



        <!-- Ceci est la deuxieme section de la page -->
        <div class="section2">
            
                <?php
                if(isset($_SESSION['id']))
                {
                    echo $_SESSION['user_name'];
                    echo '<span class="no-tel1"><img src="images/appel.png" class="icon-appel">+261 32 98 681 22</span>';
                    echo "<a href='se_deconnecter.php' class='se_deconnecter'>Déconnexion</a>";
                }
                else
                {
                    echo "<a href='inscr.php' class='connect'>Se connecter/S inscrire</a>";
                    echo '<span class="no-tel"><img src="images/appel.png" class="icon-appel">+261 32 98 681 22</span>';
                }
                ?>

            <span class="chercher"><input type="text" placeholder="chercher" class="txtsrch"><button type="button" class="btnsrch">Chercher</button></span>
            
            

            <nav>
                <a class="menu-item">Acceuil</a>
                <a class="menu-item">Wishlist(0)</a>
                <a class="menu-item">Mon compte</a>
                <a class="menu-item">Carte de shopping</a>
                <a class="menu-item">Verifier</a>
                <a class="menu-item">Mes articles(0)</a>
            </nav>

            <div class="slider">
                <div class="slides">
                    <div class="slide">
                        <div class="slide1">
                            <img src="images/shaker.png" class="img1" />
                        </div>
                        <div class="slide1">
                            <img src="images/juggernaut.jpg" class="img2" />
                        </div>
                        <div class="slide1">
                            <img src="images/grx.jpg" class="img3" />
                        </div>
                    </div>
                    <div class="constant">
                        <h1>Canapé en cuir</h1>
                        <p>Le confort est très important de nos jours car c'est une condition de satisfaction!!!</p>
                        <a class="btnshopnow">Acheter Maintenant !</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Test --
    <script>
        alert("Ça marche!!!");
    </script>
    -->

    <script>
        //*
        var $slides = $('.slide');
        var $slide = $('.slide1');
        //*/
        var count = 1;
        //*
        $(document).ready(function () {

            setInterval(function () {
                $slides.animate({'margin-left': '-=67vw'}, 900, function () {
                    
                    count++;

                    if(count === 4) {
                        $slides.css("margin-left", 0);
                        count=1;
                    }
                });
            }, 4000);

        });
        //*/

    </script>


</body>
</html>