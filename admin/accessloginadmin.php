<?php 

include('../crud/bdd.php');

$name = isset($_POST['name1']) ? $_POST['name1'] : NULL;
$mdp = isset($_POST['mdp1']) ? $_POST['mdp1'] : NULL;
$roles = isset($_POST['roles1']) ? $_POST['roles1'] :NULL;

$req = $bdd->prepare("SELECT * FROM user WHERE name = :name");
$req->execute(array(
  'name' => $name,
));
$res = $req->fetch();

$ispasswordcorrect = password_verify($_POST['mdp1'], $res['mdp']);

$verifroles = $res['id_roles'];

$verifname = $res['name'];

if($verifname !== $name){
	$messageerror = urlencode('mauvais identifiants');
	header('location: loginadmin.php?messageerror='.$messageerror);
}
else{
if(!$res){
	header('location: loginadmin.php');
}
else{
	if($ispasswordcorrect){
		if($roles == $verifroles){
		session_start();
		$_SESSION['id_roles'] = $res['id_roles'];
		$_SESSION['id_user'] = $res['id_user'];
		$_SESSION['name'] = $name;
		header('location: admin.php');
		}
		else{
			echo '<html>

			<head>
			<link href="../css/error.css" rel="stylesheet">
			</head>
			
			<body>
			<div class="site">
				<div class="sketch">
					<div class="bee-sketch red"></div>
					<div class="bee-sketch blue"></div>
				</div>
			
			<h1>404:
				<small>Players Not Found</small></h1>
			</div>
			</body>
			
			</html>';
		}
	}
	else{
		$messageerror = urlencode('mauvais mot de passe');
		header('location: loginadmin.php?messageerror='.$messageerror);
	}
}
} 
?>