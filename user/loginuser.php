<?php 

include('../crud/bdd.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://bootswatch.com/4/litera/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6fb900568b.js" crossorigin="anonymous"></script>
    <title>Login</title>
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
        <li class="nav-item"><a class="nav-link" href="../index.php">Sign up</a> </li>
        <li class="nav-item"><a class="nav-link" href="loginuser.php">Sign in</a></li>
      </ul>
    </div>
    </div>
  </div>
  </div>
  <form action="accesslogin.php" method="POST">
  <h2 class="mb-5">Login User</h2>
  <?php
   if(isset($_GET['messageerror'])){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$_GET['messageerror'].
    ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
     }
elseif(isset($_GET['messageerrorid'])){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$_GET['messageerrorid'].
    ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}
elseif(isset($_GET['message'])){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'.$_GET['message'].
  ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
}
?>
  <label>
    <p class="label-txt">Enter your name</p>
    <input type="text" class="input" name="name1" required>
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">Enter your password</p>
    <input type="password" class="input" name="mdp1" required>
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <button type="submit" class="buttonform">submit</button>
</form>
 
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/form.js"></script>
    <script src="..js/alert.js"></script>
  </body>
</html>