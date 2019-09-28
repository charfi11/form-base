<?php

session_start();

include('../crud/bdd.php');

if(isset($_SESSION['name']) && isset($_SESSION['id_user']) && isset($_SESSION['id_roles'])){

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://bootswatch.com/4/litera/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6fb900568b.js" crossorigin="anonymous"></script>
    <link href="../css/admin.css" rel="stylesheet">
    <title>Admin</title>
  </head>
  <body>
  <div class="backnav">
      <div class="backnavint"></div>
    </div>
    <div class="d-flex">
    <div class="menu">
    <i class="fas fa-ellipsis-h fa-2x mt-1 ml-3"></i>
  </div>
  <div class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="d-flex justify-content-between contentnav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="../home.php">Home</a></li>
    </ul>
    <div>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="loginout.php"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
      </ul>
    </div>
    </div>
  </div>
  </div>
  <main class='mt-4'>
    <h1>Admin</h1>
    <?php
    if(isset($_GET['message'])){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$_GET['message'].
      ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
?>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">UserName</th>
      <th scope="col">Email</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
    <?php 

include('../crud/select.php');

include('../crud/delete.php');

while($donnees = $reqdelete->fetch()){
	
	if (isset($_GET['id_user'])) { $id = $_GET['id_user']; }
	
	?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $donnees['name'] ?></th>
      <td><?php echo $donnees['mail'] ?></td>
      <td>modifier</td>
      <td><a href="../crud/delete.php?delete=<?php echo $donnees['id_user'];?>"><i class="fas fa-trash-alt fa-2x ml-4 text-danger"></i></a></td>
    </tr>
  </tbody>

<?php
	
}

?>
</table> 

<a href="logout.php" class="btn btn-danger">deconnexion</a>
</main>
    <script src="../js/form.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../js/nav.js"></script>
  </body>
  <?php
  }
  else{
  echo 'access denied';
  }
  ?>
</html>