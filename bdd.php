<?php 
   	$bdd_username = 'root';
    $bdd_password = '';
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projet3', $bdd_username, $bdd_password);
    } catch (PDOException $e) {
        echo 'could not connect to database : ' . $e->getMessage();
    }
    return $bdd;
