<?php

// setcookie("idioma" , "ES", time() + 15);
// setcookie("modena", "AR", time() + 30);
// echo "Se guardaron las cookies!";
session_start();
$_SESSION["contador"]=0;
if ($_POST) {
  if(isset($_POST["reinicio"])){
    $_SESSION["contador"]=0;
  } else {
    $_SESSION["contador"] = $_POST["contador"] + 1;
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <form class="form" action="modificar.php" method="post">
    <input type="numeric" name="contador" value="<?= $_SESSION["contador"] ?>">
    <input type="submit" name="reinicio" value="Reiniciar">
    <input type="submit" name="incremento" value="Incrementar">

  </form>
</body>
</html>
