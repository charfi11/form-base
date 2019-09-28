<?php 

session_start();

include('crud/bdd.php');

setcookie('id', $_SESSION['id_user'], time()+3600, null, null, false, true);

if (isset($_SESSION['id_user']) && isset($_SESSION['name'])) {


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://bootswatch.com/4/litera/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6fb900568b.js" crossorigin="anonymous"></script>
    <link href='css/style.css' rel='stylesheet'>
    <title>Home</title>
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
      <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
    </ul>
    <div>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="">My space</a> </li>
        <li class="nav-item"><a class="nav-link" href="security/logout.php"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
      </ul>
    </div>
    </div>
  </div>
  </div>
    <h1>Bienvenue <?php echo $_SESSION['name'] ?></h1>
    <?php
    if(isset($_COOKIE['id'])){
                echo 'Votre ID de session est le ' .$_COOKIE['id'];
    }
?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/nav.js"></script>
  </body>
</html>

<?php

 }
  else{
  header('location: user/accesslogin.php');
}

?>