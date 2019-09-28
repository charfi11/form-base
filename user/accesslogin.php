<?php 

include('../crud/bdd.php');

$name = isset($_POST['name1']) ? $_POST['name1'] : NULL;
$mdp = isset($_POST['mdp1']) ? $_POST['mdp1'] : NULL;

$req = $bdd->prepare("SELECT * FROM user WHERE name = :name");
$req->execute(array(
  'name' => $name
));
$res = $req->fetch();

$verifname = $res['name'];

$ispasswordcorrect = password_verify($_POST['mdp1'], $res['mdp']);

if($verifname !== $name){
	$messageerrorid = urlencode('mauvais identifiants');
	header('location: loginuser.php?messageerrorid='.$messageerrorid);
}
else {
if(!$res){
       header('location: loginuser.php');
}
else{
	if($ispasswordcorrect){
		session_start();
		$_SESSION['id_user'] = $res['id_user'];
		$_SESSION['name'] = $name;
		header('location: ../home.php');
	}
	else{
		$messageerror = urlencode('mauvais mot de passe');
		header('location: loginuser.php?messageerror='.$messageerror);
	}
}
}
 
?>