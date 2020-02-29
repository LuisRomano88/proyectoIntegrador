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

function validarMarca(){
  $errores_marca=null;

  if (isset($_POST["nombre_marca"])){
    $nombre_marca=$_POST["nombre_marca"];
    if(empty(trim($nombre_marca))){
      $errores_marca["nombre_vacio"]="El nombre no puede estar vacío!";
    }
    if (is_numeric($nombre_marca)) {
      $errores_marca["nombre_numerico"]="El nombre debe ser texto!";
    }
  }
  return $errores_marca;
}

function validarCategoria(){
  $errores_categoria=null;
  if (isset($_POST["nombre_categoria"])){
    $nombre_categoria=$_POST["nombre_categoria"];
    if(empty(trim($nombre_categoria))){
      $errores_categoria["nombre_vacio"]="El nombre no puede estar vacío!";
    }
    if (is_numeric($nombre_categoria)) {
      $errores_categoria["nombre_numerico"]="El nombre debe ser texto!";
    }
  }
  return $errores_categoria;
}

function validarProducto(){
  $errores_producto=null;

  if (isset($_POST["nombre_producto"])) {
    $nombre_producto=$_POST["nombre_producto"];
    if(empty(trim($nombre_producto))){
      $flag=false;
      $errores_producto["nombre_vacio"]="El nombre no puede estar vacío!";
    }
    if (is_numeric($nombre_producto)) {
      $flag=false;
      $errores_producto["nombre_numerico"]="El nombre debe ser texto!";
    }
  }
  if (isset($_POST["precio_producto"])){
    $precio_producto=$_POST["precio_producto"];
    if(empty(trim($precio_producto))){
      $flag=false;
      $errores_producto["precio_vacio"]="El precio no puede estar vacío!";
    }
    if (!is_numeric($precio_producto)) {
      $flag=false;
      $errores_producto["precio_texto"]="El precio debe ser numérico!";
    }
  }
  if (isset($_POST["id_categoria"])) {
    if (empty($_POST["id_categoria"])) {
      $errores_producto["id_categoria_vacio"] = "No se ha seleccionado ninguna categoría!";
    }
  }
  if (isset($_POST["id_marca"])) {
    if (empty($_POST["id_marca"])) {
      $errores_producto["id_marca_vacio"] = "No se ha seleccionado ninguna marca!";
    }
  }

  if (isset($_FILES["img_producto"])) {
    if (is_array(validarImagenProducto())) {
      $errores_producto["errores_validar_imagen"]=validarImagenProducto();
    }
  }
  return $errores_producto;
}

function validarImagenProducto(){//Si todo esta ok, guardaremos la imagen tambien en este metodo
  $errores_validar_imagen = null;
  $limite_kb = 16384; //16MB
  $directorio_destino="img/imgProductos";
  $flag=true;

  if (!$_FILES["img_producto"]["error"] === UPLOAD_ERR_OK) {
    $flag=false;
    $errores_validar_imagen["error_carga"] = "Ocurrió un error en la carga de la imagen.";
  } else {
    // $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $ext = strtolower(pathinfo($_FILES['img_producto']['name'], PATHINFO_EXTENSION));
    if ($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
      $flag=false;
      $errores_validar_imagen['error_formato'] = "El formato de la imagen debe ser .jpg, .png o . jpeg";
    }

    if (!($_FILES['img_producto']['size'] <= $limite_kb * 1024)) {
      $flag=false;
      $errores_validar_imagen["error_tamaño"]="Excede el tamaño límite de $limite_kb Kbytes.";
    }

    if (!is_dir($directorio_destino)){
      $flag=false;
      $errores_validar_imagen['error_dir_img'] = "El directorio especificado no existe!";
    }

    if(!is_uploaded_file($_FILES['img_producto']['tmp_name'])){
      $flag=false;
      $errores_validar_imagen['error_subir_img'] = "No se a cargado un archivo para subir!";
    }

    // var_dump($errores_validar_imagen);
    if ($flag) {
      move_uploaded_file($_FILES['img_producto']['tmp_name'], $directorio_destino .'/'. $_FILES['img_producto']['name']);
    }
  }
  return $errores_validar_imagen;
}

?>
