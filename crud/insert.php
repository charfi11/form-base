<?php 

include('bdd.php');

 $name = isset( $_POST['name']) ? $_POST['name'] : NULL;
 $mdp = isset( $_POST['mdp']) ? $_POST['mdp'] : NULL;
 $mail = isset( $_POST['mail']) ? $_POST['mail'] : NULL;
 $roles = isset( $_POST['roles']) ? $_POST['roles'] : NULL;
 $passhash = password_hash($mdp, PASSWORD_BCRYPT); //attention à la taille dans la bdd pour save le mdp crypté !

 $req = $bdd->prepare("SELECT * FROM user WHERE name = :name");
 $req->execute(array(
   'name' => $name
 ));
 $res = $req->fetch();

$reqverif = $bdd->prepare('SELECT COUNT(*) AS nombre, name FROM user
 GROUP BY name, mail HAVING COUNT(*) > 1');
$reqverif->execute();
$rowname = $reqverif->fetch();

$verifname = $res['name'];
var_dump($verifname);

if($verifname == $name){
$messagerroruser = urlencode('pseudo already exist !');
header('location: ../index.php?messagerroruser='.$messagerroruser);
}
else{
    $req = $bdd->prepare("INSERT INTO user (name, mdp, mail, id_roles) 
SELECT '" .$name. "', '" .$passhash. "', '" .$mail. "', '" .$roles. "'
FROM roles WHERE id_roles = 0");
$req->execute(array(
    $name,
    $passhash,
    $mail,
    $roles
));

$message = urlencode('vous êtes bien inscrit !');
header('location: ../user/loginuser.php?message='.$message);
}

//header('location: ../security/error.php');

// if($verifmail == $mail){

//     $reqverif = $bdd->prepare('SELECT COUNT(*) AS nombre, mail FROM user
//  GROUP BY mail HAVING COUNT(*) > 1');
// $reqverif->execute();

// echo 'existe mail';
// }

//utile pour vérifier précisément l'erreur de l'execute !
// echo "\nPDO::errorInfo():\n";
// print_r($req->errorInfo());


// $reqadmin = $bdd->prepare("INSERT INTO user (name, mdp, mail, id_roles) SELECT ?, ?, ?, ? 
// FROM roles WHERE id_roles = 1");
// $reqadmin->execute(array(
//     $_POST['name'],
//     $passhash = $_POST['mdp'],
//     $_POST['mail'],
//     $_POST['roles']
// ));

?>