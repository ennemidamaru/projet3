<?php

    session_start();
    include('bdd.php');

    $newpassword = $_POST['newpassword'];
    $repeatpassword = $_POST['repeatpassword'];
    $username = $_SESSION['username'];

    if (isset($_POST['submit_password']) && $_POST['submit_password'] == 'Ok') { 
        if (isset($newpassword, $repeatpassword) && $newpassword == $repeatpassword && strlen($newpassword) > 5) {


            $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);

            $req = $bdd->prepare('UPDATE users SET password = :newpassword WHERE username = :username');
            $req->bindValue('newpassword',$newpassword);
            $req->bindValue('username',$username);

                if (!$req->execute()) {
                    echo 'ERROR!';
                } else {
                    echo 'Votre mot de passe a bien été modifié !';?><br />
                    <a href="index.php">Retourner à la page de connexion.</a>

                    <?php
    }

            ?>

                

            <?php

            echo 'hahahaha';



        }

        else 
        {
            echo 'Les deux mots de passe doivent être identiques et comporter au moins 6 caractères.';?><br />
            <a href="index.php">Retourner à la page de connexion</a>

            <?php
        }


    }
    else
    {
        header('Location: index.php');
    }



?>