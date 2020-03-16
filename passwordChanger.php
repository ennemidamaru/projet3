<?php

    session_start();
    include('bdd.php');
    
    if (isset($_POST['submit_answer']) && $_POST['submit_answer'] == 'Ok') {   
        $answer = $_POST["answer"];
        $question = $_SESSION["secretQuestion"];
        
        
        /* Récupération de la question réponse via l'username du membre */
		$sth2 = $bdd->prepare("SELECT answer FROM users WHERE question = '$question'");
		$sth2->execute();

		/* Stockage de la réponse secrète dans un tableau */
		$result = $sth2->fetchAll(PDO::FETCH_ASSOC);

		/* Conversion du tableau $result en chaine de caractère */
        $comma_separated2 = implode($result[0]);

        if ($comma_separated2 == $answer) {

            echo 'Bonne réponse. Veuillez choisir un nouveau mot de passe pour votre compte';?><br />

            <form action="passwordChanger2.php" method="post">
				<input type="password" placeholder="Votre nouveau mot de passe" name="newpassword" value="">
                <input type="password" placeholder="Répétez le mot de passe" name="repeatpassword" value="">
				<button type="submit" name="submit_password" value="Ok">Envoyer</button>
			</form>

            <?php
        }
        else
        {
            echo 'La réponse n\'est pas la bonne.';?><br />
            <a href="index.php">Retourner à la page de connexion</a>

            <?php
        }
    }






?>