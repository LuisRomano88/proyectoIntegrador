<?php

$archivoArrayUsuarios = file_get_contents("json/usuarios.json");
$arrayUsuarios = json_decode($archivoArrayUsuarios, true);

$usuarioEncontrado = [];
$name = $lastname = $dni = $phone = $city = $country = $username = $email = NULL;

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
    }
  }
}

//VALIDACION DE IMAGEN:
$errorImgLoad = $errorImgFormat = null;
if($_FILES){
  if ($_FILES["imagen"]["error"] != 0) {
    $errorImgLoad = "Error loading Profile image!";
  }
  else {
    $ext = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
    if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
      $errorImgFormat = "The accepted format is jpg, jpeg or png!";
    } else {
      $nombreArchivo = $_FILES["imagen"]["name"];
      $usuarioEncontrado["imgPerfil"] = $nombreArchivo;
      move_uploaded_file($_FILES["imagen"]["tmp_name"], "imgPerfiles/" . $nombreArchivo);
    }
  }
}

?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
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

  <!-- NOTE: Inicia registracion -->
  <div class="container" >
    <div class="signup-form-container">
      <form role="form" id="register-form" autocomplete="off" action="perfilUsuario.php" method="post" enctype="multipart/form-data">

        <div class="form-header">
          <h1 class="form-title mt-4 mb-4"><i class="fa fa-user"> </i>  My Profile</h1>
          <img src="imgPerfiles/" class="rounded float-right" alt="...">
        </div>
        <div class="form-body">

          <div class="row" >
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="name" id="name" type="text" class="form-control" placeholder="Name" value="<?= $name ?>">
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
                <input name="password" id="password" type="password" class="form-control" placeholder="Password" <?php // NOTE: value="<?= $usuarioEncontrado["password"]" ?>>
              </div>
              <span class="help-block" id="error"></span>
            </div>
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="repassword" type="password" class="form-control" placeholder="Retype Password" <?php // NOTE: value="<?= $usuarioEncontrado["repassword"]" ?>>
              </div>
              <span class="help-block" id="error"></span>
            </div>
          </div>
        </div>
        <div class="form-footer">

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
              <input name="imagen" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>

            <span class="help-block" id="error">
              <?php if(isset($errorImgLoad)){
                echo $errorImgLoad . "<br>";
              }
              if(isset($errorImgFormat)){
                echo $errorImgFormat . "<br>";
              }
              ?>
            </span>
          </div>

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
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
</body>
</html>
