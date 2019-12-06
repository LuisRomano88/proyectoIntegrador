<?php
$archivoArrayUsuarios = file_get_contents("json/usuarios.json");
$arrayUsuarios = json_decode($archivoArrayUsuarios, true);

$usuarioEncontrado = [];
$name = $lastname = $dni = $phone = $city = $country = $username = $email = $imgProfileUser = NULL;
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/stylePerfilUsuario.css">
  <link rel="stylesheet" href="css/styleHome.css">
  <link rel="stylesheet" href="css/styleRegistration.css">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,700,800&display=swap" rel="stylesheet">
  <title> Majestic User Profile - Online Store</title>
</head>
<body>

  <!-- NOTE: Inicia header -->
  <header>
    <?php require_once("header.php"); ?>
  </header>
  <!-- NOTE: fin header -->

  <?php
  if($_GET){
    foreach ($arrayUsuarios as $usuario) {
      if($usuario["id"] == $_GET["id"]){
        $usuarioEncontrado = $usuario;
        $name = $usuarioEncontrado["name"];
        $lastname = $usuarioEncontrado["lastname"];
        $dni = $usuarioEncontrado["dni"];
        $phone = $usuarioEncontrado["phone"];
        $city = $usuarioEncontrado["city"];
        $country = $usuarioEncontrado["country"];
        $username = $usuarioEncontrado["username"];
        $email = $usuarioEncontrado["email"];
        $imgProfileUser = $usuarioEncontrado["imgProfileFileName"];
      }
    }
  } else {

  if($_SESSION){
    foreach ($arrayUsuarios as $usuario) {
      if($usuario["email"] == $_SESSION["email"]){
        $usuarioEncontrado = $usuario;
        $name = $usuarioEncontrado["name"];
        $lastname = $usuarioEncontrado["lastname"];
        $dni = $usuarioEncontrado["dni"];
        $phone = $usuarioEncontrado["phone"];
        $city = $usuarioEncontrado["city"];
        $country = $usuarioEncontrado["country"];
        $username = $usuarioEncontrado["username"];
        $email = $usuarioEncontrado["email"];
        $imgProfileUser = $usuarioEncontrado["imgProfileFileName"];
      }
    }
  }
  }
   ?>


  <div class="container" >
    <div class="signup-form-container">

      <!-- NOTE: Inicia registracion -->
      <form role="form" id="register-form" autocomplete="off" action="perfilUsuario.php" method="post" enctype="multipart/form-data">
        <div class="form-header">

          <?php
          if (isset($imgProfileUser)) :?>
          <div class="container mb-5">
            <div class="jumbotron">
              <div class="title-info">
                <h1>Welcome <?= $name . " " . $lastname . "!" ?></h1>
                <p>Has logrado registrarte exitosamente!!!</p>
              </div>
              <div class="image-Profile">
                <img class= "img-thumbnail" id="imgProfileUser" src="imgPerfiles/<?= $imgProfileUser ?>" class="rounded float-right" alt="imagen perfil">
              </div>
              <?php // NOTE: <p><a class="btn btn-secondary btn-md" href="registration.php" role="button">Edit Profile</a></p> ?>
            </div>
          </div>
        <?php else:?>
          <h2 class="form-title mt-4 mb-4"><i class="fa fa-user"> </i>  My Profile</h2>
        <?php endif;?>

      </div>
      <div class="form-body">
        <div class="row" >
          <div class="form-group col-lg-6">
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
              <input name="name" id="name" type="text" class="form-control" placeholder="Name" value="<?= $name ?>" >
            </div>
            <span class="help-block" id="error"></span>
          </div>
          <div class="form-group col-lg-6">
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
              <input name="lastname" type="text" class="form-control" placeholder="Lastname" value="<?= $lastname ?>">
            </div>
            <span class="help-block" id="error"></span>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
              <input name="dni" id="dni" type="text" class="form-control" placeholder="DNI" value="<?= $dni ?>">
            </div>
            <span class="help-block" id="error"></span>
          </div>
          <div class="form-group col-lg-6">
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
              <input name="phone" type="text" class="form-control" placeholder="Phone" value="<?= $phone ?>">
            </div>
            <span class="help-block" id="error"></span>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
              <input name="city" id="city" type="text" class="form-control" placeholder="City" value="<?= $city ?>">
            </div>
            <span class="help-block" id="error"></span>
          </div>
          <div class="form-group col-lg-6">
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
              <input name="country" type="text" class="form-control" placeholder="Country" value="<?= $country ?>">
            </div>
            <span class="help-block" id="error"></span>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
            <input name="username" type="text" class="form-control" placeholder="Username" value="<?= $username ?>">
          </div>
          <span class="help-block" id="error"></span>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
            <input name="email" type="text" class="form-control" placeholder="Email" value="<?= $email ?>">
          </div>
          <span class="help-block" id="error"></span>
        </div>
        <div class="row">
          <div class="form-group col-lg-6">
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
              <input name="password" id="password" type="password" class="form-control" placeholder="Password">
            </div>
            <span class="help-block" id="error"></span>
          </div>
          <div class="form-group col-lg-6">
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
              <input name="repassword" type="password" class="form-control" placeholder="Retype Password">
            </div>
            <span class="help-block" id="error"></span>
          </div>
        </div>
      </div>
      <div class="form-footer">
        <button type="submit" class="btn btn-info">
          <span class="glyphicon glyphicon-log-in">Edit Profile</span>
        </button>
      </div>
    </form>
  </div>
</div>

<!-- NOTE: inicia footer -->
<footer id="footer" class="mt-3 p-4">
  <?php require_once("footer.php"); ?>
</footer>
<!-- NOTE: fin footer -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
