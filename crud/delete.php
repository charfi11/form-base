<?php 

include('bdd.php');

if(isset($_GET['delete'])){
	
	$id = $_GET['delete'];

$req = $bdd->prepare('DELETE FROM user WHERE id_user =' .$id);

$req->execute();

$message = urldecode('user delete !');

header('Location: ../admin/admin.php?message='.$message);

}

?>