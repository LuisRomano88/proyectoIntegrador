<?php
function crearRegistrarUsuario() {
  unset($_POST["repassword"]);
  $arrayUsuario = $_POST;
  $hashPass= password_hash($_POST["password"], PASSWORD_DEFAULT);
  $arrayUsuario ["password"]= $hashPass;
  $contenidoJson = file_get_contents("json/usuarios.json");
  $arrayDeUsuarios = json_decode($contenidoJson, true);
  $contadorIdUsuario = count($arrayDeUsuarios) + 1;
  $arrayUsuario["id"] = $contadorIdUsuario;
  $arrayDeUsuarios[] = $arrayUsuario;
  $arrayDeUsuariosEnJson = json_encode($arrayDeUsuarios);
  file_put_contents("json/usuarios.json", $arrayDeUsuariosEnJson);
  return $arrayUsuario["id"];
}

?>
