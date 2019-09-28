<?php

$user = 'root';

try {
	
    $bdd = new PDO('mysql:host=localhost;dbname=test', $user);
	
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>