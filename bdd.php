<?php 


    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '');
        return $bdd;
    }

    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }    