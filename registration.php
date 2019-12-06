<?php
require_once("funciones.php");

$errorNameEmpty = $errorNameNumeric = $errorLastnameEmpty = $errorLastnameText = $errorLastnameText = $errorDniNumeric = $errorPhoneNumeric = $errorCityNumeric = $errorCountryNumeric = $errorUsernameEmpty = $errorUsernameCharacters = $errorUsernameText = $errorEmailEmpty = $errorEmailFormat = $errorPasswordEmpty = $errorPasswordNumber = $errorPasswordCharacters = $errorRePasswordEmpty = $errorRePasswordMatch = NULL;
$name = $lastname = $dni = $phone = $city = $country = $username = $email = NULL;

if ($_POST) {
  $flag = true;
  // VALIDAR Name required
  if(isset($_POST["name"])){
    $name = $_POST["name"];
    if (empty(trim($_POST["name"]))) {
      $flag = false;
      $errorNameEmpty = "The Name cannot be empty!";
    }

    if (is_numeric($_POST["name"])) {
      $flag = false;
      $errorNameNumeric = "The Name must be text!";
    }
  }
  // VALIDAR Lastname required
  if(isset($_POST["lastname"])){
    $lastname = $_POST["lastname"];
    if (empty(trim($_POST["lastname"]))) {
      $flag = false;
      $errorLastnameEmpty = "The Lastname cannot be empty!";
    }

    if (is_numeric($_POST["lastname"])) {
      $flag = false;
      $errorLastnameText = "The Lastname must be text!";
    }
  }

  // VALIDAR dni
  if(isset($_POST["dni"])){
    $dni = $_POST["dni"];
    if (!is_numeric($_POST["dni"])) {
      $flag = false;
      $errorDniNumeric = "The DNI must be numeric!";
    }
  }
  // VALIDAR telefono
  if(isset($_POST["phone"])){
    $phone = $_POST["phone"];
    if (!is_numeric($_POST["phone"]) && $_POST["phone"] != NULL) {
      $flag = false;
      $errorPhoneNumeric = "The Phone must be numeric!";
    }
  }
  // VALIDAR City
  if(isset($_POST["city"])){
    $city = $_POST["city"];
    if(is_numeric($_POST["city"])){
      $flag = false;
      $errorCityNumeric = "The City must be text!";
    }
  }
  // VALIDAR Country
  if(isset($_POST["country"])){
    $country = $_POST["country"];
    if(is_numeric($_POST["country"])){
      $flag = false;
      $errorCountryNumeric = "The Country must be text!";
    }
  }
  //VALIDAR username
  if(isset($_POST["username"])){
    $username = $_POST["username"];
    if (empty(trim($_POST["username"]))) {
      $flag = false;
      $errorUsernameEmpty = "The Username cannot be empty!";
    }

    if (strlen($_POST["username"]) < 10) {
      $flag = false;
      $errorUsernameCharacters = "The Username cannot have less than 10 caracters!";
    }

    if (is_numeric($_POST["username"])) {
      $flag = false;
      $errorUsernameText = "The Username must be text!";
    }
  }
  // VALIDAR email required
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
        if(is_numeric(substr($_POST["password"],$i,1))){
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
  //VALIDAR Retype Password
  if(isset($_POST["repassword"])){
    if (empty(trim($_POST["repassword"]))) {
      $flag = false;
      $errorRePasswordEmpty = "The Retype Password can not be empty!";
    }

    if($_POST["repassword"] != $_POST["password"]){
      $flag = false;
      $errorRePasswordMatch = "The Retype Password does not match with Password!";
    }
  }

  // VALIDAR que no exista el usario (vía email)
  $emailExistence = null;
  $flag = validarUsuarioExistente();
  if(!$flag){
    $emailExistence = "The email you entered already exists!";
  }

  //REGISTRAR
  if($flag){
    $idUser = registrarUsuario();
    if (is_array($idUser)) {
      $arrayImgErrors = $idUser;
    } else {
      //REDIRECCIONAR
      header("location: perfilUsuario.php?id=$idUser");
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
  <link rel="stylesheet" href="css/styleRegistration.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styleHome.css">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,700,800&display=swap" rel="stylesheet">
  <title> Majestic Registration - Online Store</title>
</head>
<body>
  <!-- NOTE: Inicia header -->
  <header>
    <?php require_once("header.php"); ?>
  </header>
  <!-- NOTE: fin header -->

  <div class="container">
    <div class="signup-form-container">

      <!-- NOTE: Inicia registracion -->
      <form role="form" id="register-form" autocomplete="off" action="registration.php" method="post" enctype="multipart/form-data">
        <div class="form-header">
          <h1 class="form-title mt-4 mb-4"> <i class="fa fa-user"></i> Sign Up</h1>
        </div>
        <div class="form-body">
          <div class="row">
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="name" id="name" type="text" class="form-control" placeholder="Name" required value='<?= $name ?>'>
              </div>
              <span class="help-block" id="error">
                <?php
                if (isset($errorNameEmpty)){
                  echo $errorNameEmpty . "<br>";
                }
                if (isset($errorNameNumeric)) {
                  echo $errorNameNumeric . "<br>";
                }
                ?>
              </span>
            </div>
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="lastname" type="text" class="form-control" placeholder="Lastname" required value='<?= $lastname ?>'>
              </div>
              <span class="help-block" id="error">
                <?php
                if (isset($errorLastnameEmpty)){
                  echo $errorLastnameEmpty . "<br>";
                }
                if (isset($errorLastnameText)){
                  echo $errorLastnameText . "<br>";
                }
                ?>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="dni" id="dni" type="text" class="form-control" placeholder="DNI" value='<?= $dni ?>'>
              </div>
              <span class="help-block" id="error">
                <?php
                if (isset($errorDniNumeric)){
                  echo $errorDniNumeric . "<br>";
                }
                ?>
              </span>
            </div>
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="phone" type="text" class="form-control" placeholder="Phone" value='<?= $phone ?>'>
              </div>
              <span class="help-block" id="error">
                <?php
                if (isset($errorPhoneNumeric)){
                  echo $errorPhoneNumeric . "<br>";
                }
                ?>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="city" id="city" type="text" class="form-control" placeholder="City" value='<?= $city ?>'>
              </div>
              <span class="help-block" id="error">
                <?php
                if (isset($errorCityNumeric)){
                  echo $errorCityNumeric . "<br>";
                }
                ?>
              </span>
            </div>
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="country" type="text" class="form-control" placeholder="Country" value='<?= $country ?>'>
              </div>
              <span class="help-block" id="error">
                <?php
                if (isset($errorCountryNumeric)){
                  echo $errorCountryNumeric . "<br>";
                }
                ?>
              </span>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
              <input name="username" type="text" class="form-control" placeholder="Username" required value='<?= $username ?>'>
            </div>
            <span class="help-block" id="error">
              <?php
              if (isset($errorUsernameEmpty)){
                echo $errorUsernameEmpty . "<br>";
              }
              if (isset($errorUsernameCharacters)){
                echo $errorUsernameCharacters . "<br>";
              }
              if (isset($errorUsernameText)){
                echo $errorUsernameText . "<br>";
              }
              ?>
            </span>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
              <input name="email" type="text" class="form-control" placeholder="Email" required value='<?= $email ?>'>
            </div>
            <span class="help-block" id="error">
              <?php
              if (isset($errorEmailEmpty)){
                echo $errorEmailEmpty . "<br>";
              }
              if (isset($errorEmailFormat)){
                echo $errorEmailFormat . "<br>";
              }
              if (isset($emailExistence)){
                echo $emailExistence . "<br>";
              }
              ?>
            </span>
          </div>
          <div class="row">
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="password" id="password" type="password" class="form-control" placeholder="Password" required>
              </div>
              <span class="help-block" id="error">
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
                ?>
              </span>
            </div>
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="repassword" type="password" class="form-control" placeholder="Retype Password" required>
              </div>
              <span class="help-block" id="error">
                <?php
                if (isset($errorRePasswordEmpty)){
                  echo $errorRePasswordEmpty . "<br>";
                }
                if (isset($errorRePasswordMatch)){
                  echo $errorRePasswordMatch . "<br>";
                }
                ?>
              </span>
            </div>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>

            <div class="custom-file">
              <input name="imagen" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose profile picture</label>
            </div>

            <span class="help-block" id="error">
              <?php if(isset($arrayImgErrors["loadError"])){
                echo $arrayImgErrors["loadError"] . "<br>";
              }
              if(isset($arrayImgErrors["formatError"])){
                echo $arrayImgErrors["formatError"] . "<br>";
              }
              ?>
            </span>
          </div>
        </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-info">
            <span class="glyphicon glyphicon-log-in">Sign Me Up !</span>
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
