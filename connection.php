<?php


	// On importe le fichier contenant les informations de connexion à la base de données
    include('bdd.php');


	// On vérifie que le visiteur a correctement saisi puis envoyé le formulaire
    if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') 
    {
    	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pwd']) && !empty($_POST['pwd']))) 
	    {

			$username = htmlspecialchars($_POST['login']);
	    	$password = ($_POST['pwd']);

	    	$sql = "SELECT * FROM users WHERE username = '$username' ";
	    	$result = $bdd->prepare($sql);
	    	$result->execute();

	    	if($result->rowCount() > 0)
	    	{
	    		$data = $result->fetchAll();
	    		if (password_verify($password, $data[0]["password"]))
	    		{
					session_start();
					$_SESSION['login'] = $username;
					header('Location: IndexConnected.php');
					
				}
				else
				{
					/* Récupération de la question secrète via l'username du membre */
					$sth = $bdd->prepare("SELECT question FROM users WHERE username = '$username'");
					$sth->execute();

					/* Stockage de la question secrète dans un tableau */
					$result = $sth->fetchAll(PDO::FETCH_ASSOC);

					/* Conversion du tableau $result en chaine de caractère */
					$comma_separated = implode($result[0]);
					session_start();
					$_SESSION["username"] = $username;
					$_SESSION["secretQuestion"] = $comma_separated;
					echo 'Répondez à la	question suivante afin de pouvoir changer votre mot de passe : ' .$comma_separated;?>

					<form action="passwordChanger.php" method="post">
						<input type="text" placeholder="Votre réponse" name="answer" value="">
						<button type="submit" name="submit_answer" value="Ok">Envoyer</button>
					</form>

					<?php
				}
			}

			else

			{
				echo 'Indentifiants invalides.';?><br />
				<a href="index.php">Cliquez ici pour réessayer.</a>

				<?php

			}
		}
		else

			{
				echo 'Veuillez indiquer vos identifiants de connexion.';?><br />
				<a href="index.php">Cliquez ici pour réessayer.</a>

				<?php
			}
		
    }


?>
