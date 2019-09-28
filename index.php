<?php 

include('crud/bdd.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://bootswatch.com/4/litera/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6fb900568b.js" crossorigin="anonymous"></script>
    <title>Inscription</title>
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
      <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
    </ul>
    <div>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Sign up</a> </li>
        <li class="nav-item"><a class="nav-link" href="user/loginuser.php">Sign in</a></li>
      </ul>
    </div>
    </div>
  </div>
  </div>
  <form action="crud/insert.php" method="POST">
  <h2 class="mb-5">Sign up</h2>
  <?php
  if(isset($_GET['messagerroruser'])){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$_GET['messagerroruser'].
  ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
   }
   ?>
  <label>
    <p class="label-txt">Enter your name</p>
    <input type="text" class="input" name="name" required>
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">Enter your password</p>
    <input type="password" class="input" name="mdp" required>
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">Enter your mail</p>
    <input type="email" class="input" name="mail" required>
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <?php
  include('crud/select.php');
  while($donnees = $reqroles->fetch()){
  ?>
   <input type="hidden" name="roles" value="<?php echo $donnees['id_roles'] ?>">
  <?php 
  }
  ?>
  <button type="submit" class="buttonform">submit</button>
</form>
    <script src="js/alert.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/form.js"></script>
    <script src="js/nav.js"></script>
  </body>
</html>