<?php
$contenidoJson = file_get_contents("json/usuarios.json");
$arrayDeUsuarios = json_decode($contenidoJson, true);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <ul>

      <?php foreach ($arrayDeUsuarios as $usuario) : ?>
        <li><a href="perfilUsuario.php?id=<?= $usuario['id']?>"> <?= $usuario["username"] ?> </a></li>
      <?php endforeach; ?>

    </ul>
  </body>
</html>
