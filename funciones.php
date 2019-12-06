<?php
function validarUsuarioExistente(){
  $contenidoJson = file_get_contents("json/usuarios.json");
  $arrayDeUsuarios = json_decode($contenidoJson, true);

  if($_POST["email"]) {
    foreach ($arrayDeUsuarios as $usuario) {
      if($_POST["email"] == $usuario["email"]){
        return false;
      }
    }
  }
  return true;
}

function registrarUsuario() {
  unset($_POST["repassword"]);
  $arrayUsuario = $_POST;
  $arrayUsuario ["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $contenidoJson = file_get_contents("json/usuarios.json");
  $arrayDeUsuarios = json_decode($contenidoJson, true);
  $contadorIdUsuario = count($arrayDeUsuarios) + 1;
  $arrayUsuario["id"] = $contadorIdUsuario;

  $arrayImgErrors = cargarValidarImagenUsuario();
  if (is_array($arrayImgErrors)) {
    return $arrayImgErrors;
  } else {
    $nombreArchivo = $_FILES["imagen"]["name"];
    $arrayUsuario["imgProfileFileName"] = $nombreArchivo;
    move_uploaded_file($_FILES["imagen"]["tmp_name"], "imgPerfiles/" . $nombreArchivo);

    $arrayDeUsuarios[] = $arrayUsuario;
    $arrayDeUsuariosEnJson = json_encode($arrayDeUsuarios);
    file_put_contents("json/usuarios.json", $arrayDeUsuariosEnJson);
    $idUser = $arrayUsuario["id"];
    return $idUser;
  }
}


function cargarValidarImagenUsuario() {
  //VALIDACION DE IMAGEN:
  $arrayImgErrors = null;
  if($_FILES){
    if ($_FILES["imagen"]["error"] != 0) {
      $arrayImgErrors ["loadError"] = "Error loading Profile image!";
    } else {
      $ext = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
      if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
        $arrayImgErrors ["formatError"] = "The accepted format is jpg, jpeg or png!";
      }
    }
    if(isset($arrayImgErrors)){
      return $arrayImgErrors;
    } else {
      return true;
    }
  }
}
?>
