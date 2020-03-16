<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Inscription</title>
    </head>
    <body>      
        <div>Inscription</div>
        <form action="register.php" method="post">
            <input type="text" placeholder="Nom d'utilisateur" name="username" value="">
            <input type="password" placeholder="Mot de passe" name="password" value="">
            <input type="password" placeholder="Confirmer le mot de passe" name="password2">

            <input type="text" placeholder="Votre nom" name="lastname" value="">    
            <input type="text" placeholder="Votre prénom" name="firstname" value="">
   
            <input type="text" placeholder="Question Secrète" name="question" value="">
            <input type="text" placeholder="Réponse" name="answer" value="">           
            <button type="submit" name="register">Envoyer</button>
        </form>
    </body>
</html>