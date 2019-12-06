<?php
$errorEmailEmpty = $errorEmailFormat = $errorPasswordEmpty = $errorPasswordNumber = $errorPasswordCharacters = null;
$email = null;
$fullNameUser = null;

// VALIDAR email required
if($_POST){
  $flag=true;
  if(isset($_POST["email"])){
    $email = $_POST["email"];
    if (empty(trim($_POST["email"]))) {
      $flag = false;
      $errorEmailEmpty = "The Email cannot be empty!";
    }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $flag = false;
      $errorEmailFormat = "The Email does not have the correct format!";
    }
  }
  // VALIDAR password
  if(isset($_POST["password"])){
    $password = $_POST["password"];
    if (empty(trim($_POST["password"]))) {
      $flag = false;
      $errorPasswordEmpty = "The Password cannot be empty!";
    }

    if(!empty(trim($_POST["password"]))){
      $bandera = false;
      for ($i=0; $i < strlen($_POST["password"]); $i++) {
        if(is_numeric(substr($_POST["password"], $i, 1))){
          $bandera=true;
        }
      }
      if(!$bandera){
        $flag = false;
        $errorPasswordNumber = "The Password must be at least 1 number!";
      }
    }

    if (strlen($_POST["password"]) < 10) {
      $flag = false;
      $errorPasswordCharacters = "The Password cannot have less than 10 characters!";
    }
  }

  // NOTE: traemos el contenido del Json
  $archivoArrayUsuarios = file_get_contents("json/usuarios.json");
  $arrayUsuarios = json_decode($archivoArrayUsuarios, true);
  $idUser = null;

  foreach ($arrayUsuarios as $usuario) {
    if($usuario["email"] == $_POST["email"]){
      if(password_verify($_POST["password"], $usuario["password"])){
        $idUser=$usuario["id"];
        $fullNameUser = $usuario["name"] . " " . $usuario["lastname"];
        $flag=true;
        break;
      } else {
        $flag=false;
      }
    } else {
      $flag=false;
    }
  }

  $datosIncorrectos=null;
  if (!$flag) {
    $datosIncorrectos = "The data entered is incorrect!";
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styleHome.css">
  <link rel="stylesheet" href="css/styleLogin.css">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,700,800&display=swap" rel="stylesheet">
  <title> Majestic Login - Online Store</title>
</head>
<body>

  <!-- NOTE: Inicia header -->
  <header>
    <?php require_once("header.php"); ?>
  </header>
  <!-- NOTE: fin header -->

  <?php

  if (isset($fullNameUser)) {
    $_SESSION["email"] = $_POST["email"];
    // $_SESSION["userName"] = $fullNameUser;

    if($_POST["checkbox"]){
      setcookie("userName", $fullNameUser, time() + 60);
    }
    header("location: perfilUsuario.php?id=$idUser");
  }

  ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>

            <form class="form-signin" role="form" id="register-form" autocomplete="off" action="login.php" method="post" enctype="multipart/form-data">
              <div class="form-label-group">
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus value="<?= $email ?>">
                <label for="inputEmail">Email address</label>
              </div>
              <span class="help-block" id="error">
                <?php
                if (isset($errorEmailEmpty)){
                  echo $errorEmailEmpty . "<br>";
                }
                if (isset($errorEmailFormat)){
                  echo $errorEmailFormat . "<br>";
                }
                ?>
              </span>

              <div class="form-label-group">
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <span style="color:red;" class="help-block" id="error" >
                <?php
                if (isset($errorPasswordEmpty)){
                  echo $errorPasswordEmpty . "<br>";
                }
                if (isset($errorPasswordNumber)){
                  echo $errorPasswordNumber . "<br>";
                }
                if (isset($errorPasswordCharacters)){
                  echo $errorPasswordCharacters . "<br>";
                }
                if(isset($datosIncorrectos)):
                  echo $datosIncorrectos;?>
                  <p><a style="font-size: 20px; text-decoration: none;" href="registration.php">Sign Up!</a></p>
                <?php endif;?>
              </span>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" name="checkbox" class="custom-control-input" id="customCheck1" checked>
                <label class="custom-control-label" for="customCheck1">Remember me!</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>


              <!-- Button trigger modal -->
              <button type="button" class="btn btn-secondary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter" style="font-size:14px;">
                  I forgot my password
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary btn-lg btn-block" >Send me an email</button>                      
                    </div>
                  </div>
                </div>
              </div>


                <p id="forgotPass" class="mt-2 mb-0"><a style="font-size: 13px; text-decoration: none;" href="#">I forgot my password</a></p>

              <p id="forgotPass" class="mt-0">Do you already have a user?<a style="font-size: 15px; text-decoration: none;" href="registration.php">  Log in</a></p>

              <hr class="my-3">
              <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- NOTE: Inicio footer -->
  <footer id="footer" class="mt-3 p-4">
    <?php require_once("footer.php"); ?>
  </footer>
  <!-- NOTE: Fin footer -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
