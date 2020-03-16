<?php

    session_start();
    include('bdd.php');

    if(isset($_SESSION['login'])){

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
    </head>

    <body>

        <header>
            <?php include('header.php'); ?>
        </header>

        <section>

        </section>

        <footer>

        </footer>

    </body>

</html>




<br /><a href="logout.php">Se déconnecter</a>

<?php

}
else{
    header('Location: index.php');
}

?>