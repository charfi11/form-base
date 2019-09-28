<?php 

include('bdd.php');

//select tout dans user
$req = $bdd->prepare('SELECT * FROM user');
$req->execute();

//requête pour l'admin, deleter user par rapport au rôles
$reqdelete = $bdd->prepare('SELECT * FROM user WHERE id_roles = 0');
$reqdelete->execute();

//par défault le role_user est donné à l'inscription
$reqroles = $bdd->prepare('SELECT * FROM roles WHERE id_roles = 0');
$reqroles->execute();

//donné le rôle à l'admin
$reqrolesadmin = $bdd->prepare('SELECT * FROM roles WHERE id_roles = 1');
$reqrolesadmin->execute();

?>