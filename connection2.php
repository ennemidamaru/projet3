<?php


	// on importe le fichier contenant les informations de connexion à la base de données
    include('bdd.php');


	// on vérifie que le visiteur a correctement saisi puis envoyé le formulaire
    if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') 
    {
    	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pwd']) && !empty($_POST['pwd']))) 
	    {

	    	$username = $_POST['login'];
	    	$password = $_POST['pwd'];

	    	$sql = "SELECT * FROM users WHERE username = '$username' ";
	    	$result = $bdd->prepare($sql);
	    	$result->execute();

	    	if($result->rowCount() > 0)
	    	{
	    		$data = $result->fetchAll();
	    		if (password_verify($password, $data[0]["password"]))
	    		{
	    			echo "Connexion réussie.";
	    			$_SESSION['login'] = $username;
	    		}
	    	}
	    }
    }






?>