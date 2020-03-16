 
<?php
include('bdd.php');
 
//On vérifie que l'utilisateur a bien envoyé les informations demandées 
if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"]) && isset($_POST["password2"]) && isset($_POST["password2"])){
	//On vérifie que password et password2 sont identiques
	if($_POST["password"] == $_POST["password2"]){
		//On utilise alors notre fonction password_hash :
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $lastname = $_POST["lastname"];
        $firstname = $_POST["firstname"];
        $question = $_POST["question"];
        $answer = $_POST["answer"];
		//Puis on stock le résultat dans la base de données :
		$query = $bdd->prepare('INSERT INTO users (lastname, firstname, username, password, question, answer) VALUES("'.$lastname.'", "'.$firstname.'", :username, :password, "'.$question.'", "'.$answer.'");');
		$query->bindParam(':username', $_POST["username"]);
		$query->bindParam(':password', $hash);
		$query->execute();
		header('Location: index.php');
		exit();
	}
}
 
?>