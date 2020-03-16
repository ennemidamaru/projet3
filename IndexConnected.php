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

            <form action="comment.php" method="post">  
                <label for="Formation&co">Formation&co</label>             
				<input type="text" placeholder="Ecrivez ici votre commentaire..." name="comment" value="">
				<button type="submit" name="submit_comment" value="OkFormation">Envoyer</button>
			</form> 

            <form action="comment.php" method="post">
                <label for="Protectpeople">Protectpeople</label>               
				<input type="text" placeholder="Ecrivez ici votre commentaire..." name="comment" value="">
				<button type="submit" name="submit_comment" value="OkProtect">Envoyer</button>
			</form> 

            <form action="comment.php" method="post">  
                <label for="DSAFrance">DSAFrance</label>             
				<input type="text" placeholder="Ecrivez ici votre commentaire..." name="comment" value="">
				<button type="submit" name="submit_comment" value="OkDSA">Envoyer</button>
			</form> 

            <form action="comment.php" method="post">  
                <label for="CDE">CDE</label>             
				<input type="text" placeholder="Ecrivez ici votre commentaire..." name="comment" value="">
				<button type="submit" name="submit_comment" value="OkCDE">Envoyer</button>
			</form>          

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