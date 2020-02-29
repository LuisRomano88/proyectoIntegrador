<?php
declare(strict_types=1);
require_once("conexionBD.php");
require_once("funciones.php");

$nombre_producto = $precio_producto = $errores_producto = $errores_marca = $errores_categoria = null;
$nombre_marca = $nombre_categoria = null;
//VALIDO QUE VENGA ALGO POR POST!
if ($_POST) {
  $flag=true;
  //VALIDO QUE SE HAYA CLICKEADO EL BOTON DE "ALTA MARCA"!
  if (isset($_POST["alta_marca"])) {
    $nombre_marca=$_POST["nombre_marca"];
    //LLAMO A LA FUNCION validarMarca()
    $errores_marca = validarMarca();
    if(is_array($errores_marca)){ //SI NO ES UN ARRAY (con errores) devuelve false pero significa ok!
      $flag=false;
    } else {
      insertarMarca($db, $nombre_marca);
    }
  } elseif(isset($_POST["baja_marca"])){//VALIDO QUE SE HAYA CLICKEADO EL BOTON DE "BAJA MARCA"!
    if ($_POST["id_marca"]) {
      eliminarMarca($db, $_POST["id_marca"]);
    } else {
      $flag=false;
      $errores_producto["id_categoria_vacio"] = "No se ha seleccionado ninguna categoría!";
    }
  }

  //VALIDO QUE SE HAYA CLICKEADO EL BOTON DE "ALTA CATEGORIA"!
  if (isset($_POST["alta_categoria"])){
    $nombre_categoria=$_POST["nombre_categoria"];
    //VALIDACION CATEGORIA
    $errores_categoria=validarCategoria();
    if (is_array($errores_categoria)) {
      $flag=false;
    } else {
      insertarCategoria($db, $nombre_categoria);
    }
  }

  //VALIDO QUE SUBMIT SE CLICKEO EL BOTON DE "Alta Producto"!
  if (isset($_POST["alta_producto"]) && isset($_FILES["img_producto"])){
    $nombre_producto=$_POST["nombre_producto"];
    $precio_producto=$_POST["precio_producto"];
    //VALIDACION PRODUCTO
    $errores_producto = validarProducto();
    if(is_array($errores_producto)){
      $flag=false;
    }

    if($flag){
      $id_producto = insertarProducto($db, $nombre_producto, $precio_producto, $_FILES['img_producto']['name']);
      header("location: vistaProducto.php?id_producto=".$id_producto);exit;
    }

  } elseif (isset($_POST["baja_producto"])) {
    if ($_POST["id_producto"]) {
      eliminarProducto($db, $_POST["id_producto"]);
    } else {
      $flag=false;
      $errores_producto["id_producto_vacio"] = "No se ha seleccionado ningun producto!";
    }

  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Hassen - Formulario de Producto</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">

    <h1 class="text-center mt-4 mb-4">Gestión de Productos</h1>
    <!-- FORMULARIO GESTION PRODUCTOS -->
    <form class="alta_producto" action="formProductos.php" method="POST" enctype="multipart/form-data">

      <!-- MARCA -->
      <div class="form-group">
        <h2> Marca:</h2>
        <label class="mt-3" for="exampleFormControlSelect1"><i>Seleccione una marca ya cargada para el producto:</i> </label>
        <select class="form-control" id="exampleFormControlSelect1" name="id_marca" >
          <option value="">Seleccione una marca...</option>
          <?php
          // Si existe la 'TABLA MARCAS' Me traigo las marcas de la BD
          $arrayMarcas=traerMarcas($db);
          var_dump($arrayMarcas);
          if (!empty($arrayMarcas) || $arrayMarcas!=false): //Pregunto si hay marcas en la BD
            //las recorro y las imprimo en un select
            foreach ($arrayMarcas as $marca): ?>
            <option value= "<?php echo $marca["id"] ?>"> <?php echo $marca["nombre"] ?> </option>
          <?php endforeach;
        else: ?>
        <option value="" selected> <?php echo "No hay marcas cargadas en el sistema!" ?> </option>
      <?php endif ?>
    </select>
    <span style="color: red;"class="help-block" id="error"><i>
      <?php
      if (isset($errores_producto["id_marca_vacio"])){
        echo $errores_producto["id_marca_vacio"] . "<br>";
      }
      ?>
    </i></span>
  </div>

  <div class="form-group">
    <p><i> Si el nombre de la marca no se encuentra entre las opciones del menu desplegable <b>realice los pasos a continuación: </b></i></p>
    <p><i><b>1°)</b> Ingrese un nombre.</i></p>
    <p><i><b>2°)</b> Haga click en el botón "Dar de Alta Marca".</i></p>
    <p><i><b>3°)</b> Seleccione la marca en el menu desplegable.</i></p>
    <label for="exampleFormControlInput1">Ingrese una marca a cargar en el sistema: </label>
    <input name="nombre_marca" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre de la marca..." value="<?= (isset($errores_marca)) ? $nombre_marca : null ?>">
    <span style="color: red;"class="help-block" id="error"><i>
      <?php
      if (isset($errores_marca["nombre_vacio"])){
        echo $errores_marca["nombre_vacio"] . "<br>";
      }
      if (isset($errores_marca["nombre_numerico"])){
        echo $errores_marca["nombre_numerico"] . "<br>";
      }
      ?>
    </i></span>
  </div>
  <button type="submit" name="alta_marca" class="btn btn-dark mb-3">Dar de Alta Marca</button>
  <button type="submit" name="baja_marca" class="btn btn-dark mb-3">Dar de Baja Marca</button>
  <button type="button" name="actualizar_marca" class="btn btn-dark mb-3">Actualizar Marca</button>

  <!-- FIN MARCA -->

  <!-- CATEGORIA -->
  <div class="form-group">
    <h2 class="mt-4"> Categoría: </h2>
    <label class="mt-3" for="exampleFormControlSelect1"><i>Seleccione una categoría para el producto: </i></label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_categoria" >
      <option value="">Seleccione una categoría...</option>
      <?php
      // Me traigo las categorias de la BD
      $arrayCategorias=traerCategorias($db);
      if (!empty($arrayCategorias)): //Pregunto si hay marcas en la BD
        //las recorro y las imprimo en un select
        foreach ($arrayCategorias as $categoria): ?>
        <option value= "<?php echo $categoria["id"] ?>"> <?php echo $categoria["nombre"] ?> </option>
      <?php endforeach;
    else: ?>
    <i> <b><option value= "" selected> <?= "No hay categorías cargadas en el sistema!" ?> </option>
  <?php endif ?>
</select>
<span style="color: red;"class="help-block" id="error"><i>
  <?php
  if (isset($errores_producto["id_categoria_vacio"])){
    echo $errores_producto["id_categoria_vacio"] . "<br>";
  }
  ?>
</i></span>

</div>


<div class="form-group">
  <p ><i> Si el nombre de la categoría no se encuentra entre las opciones del menu desplegable <b>realice los pasos a continuación: </b></i></p>
  <p><i><b>1°)</b> Ingrese un nombre.</i></p>
  <p><i><b>2°)</b> Haga click en el botón "Dar de Alta Categoría".</i></p>
  <p><i><b>3°)</b> Seleccione la Categoría en el menu desplegable.</i></p>
</div>

<div class="form-group">
  <label for="exampleFormControlInput1">Ingrese una Categoría a cargar en el sistema: </label>
  <input name="nombre_categoria" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre de Categoría..." value="<?= (isset($errores_categoria)) ? $nombre_categoria : null ;?>">
  <span style="color: red;"class="help-block" id="error">
    <?php
    if (isset($errores_categoria["nombre_vacio"])){
      echo $errores_categoria["nombre_vacio"] . "<br>";
    }
    if (isset($errores_categoria["nombre_numerico"])){
      echo $errores_categoria["nombre_numerico"] . "<br>";
    }
    ?>
  </span>
</div>
<button type="submit" name="alta_categoria" class="btn btn-dark mb-3">Dar de Alta Categoría</button>
<button type="submit" name="baja_categoria" class="btn btn-dark mb-3">Dar de Baja Categoría</button>
<button type="button" name="actualizar_categoria" class="btn btn-dark mb-3">Actualizar Categoría</button>

<!-- FIN CATEGORIA -->
<!-- PRODUCTO -->
<div class="form-group">
  <h2 class="mt-4"> Producto: </h2>
  <label for="exampleFormControlInput1"><i> Ingrese el nombre: </i></label>
  <input name="nombre_producto" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre del producto..."  value="<?= $nombre_producto ?>">
  <span style="color: red;"class="help-block" id="error"><i>
    <?php
    if (isset($errores_producto["nombre_vacio"])){
      echo $errores_producto["nombre_vacio"] . "<br>";
    }
    if (isset($errores_producto["nombre_numerico"])){
      echo $errores_producto["nombre_numerico"] . "<br>";
    }
    ?>
  </i></span>
</div>

<div class="form-group">
  <label for="exampleFormControlInput1"><i> Ingrese el precio: </i></label>
  <input name="precio_producto" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Precio del producto..."  value="<?= $precio_producto ?>">
  <span style="color: red;" class="help-block" id="error"><i>
    <?php
    if (isset($errores_producto["precio_vacio"])){
      echo $errores_producto["precio_vacio"] . "<br>";
    }
    if (isset($errores_producto["precio_texto"])){
      echo $errores_producto["precio_texto"] . "<br>";
    }
    ?>
  </i></span>
</div>
<div class="form-group">
  <label for="exampleFormControlInput1"><i> Elija una imagen para el producto: </i></label>
  <!-- CARGAR IMAGEN -->
  <div class="input-group">
    <div class="custom-file">
      <input type="file" name="img_producto" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
      <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
    </div>
  </div>
  <span style="color: red;"class="help-block" id="error"><i><b>
    <?php
    if (isset($errores_producto["errores_validar_imagen"]["error_carga"])) {
      echo $errores_producto["errores_validar_imagen"]["error_carga"] . "<br>";
    }
    if (isset($errores_producto["errores_validar_imagen"]["error_formato"])) {
      echo $errores_producto["errores_validar_imagen"]["error_formato"] . "<br>";
    }
    if (isset($errores_producto["errores_validar_imagen"]["error_tamaño"])) {
      echo $errores_producto["errores_validar_imagen"]["error_tamaño"] . "<br>";
    }
    if (isset($errores_producto["errores_validar_imagen"]["error_subir_img"])) {
      echo $errores_producto["errores_validar_imagen"]["error_subir_img"] . "<br>";
    }
    if (isset($errores_producto["errores_validar_imagen"]["error_dir_img"])) {
      echo $errores_producto["errores_validar_imagen"]["error_dir_img"] . "<br>";
    }
    ?>
  </b></i></span>
</div>
<!-- FIN CARGAR IMAGEN -->

<div class="form-group">
  <label class="mt-3" for="exampleFormControlSelect1"><i>Seleccione un producto para eliminar o modificar: </i></label>
  <select class="form-control" id="exampleFormControlSelect1" name="id_producto" >
    <option value="">Seleccione un producto...</option>
    <?php
    // Me traigo las categorias de la BD
    $arrayProductos=traerProductos($db);
    var_dump($arrayProductos);
    if (!empty($arrayProductos)): //Pregunto si hay productos en la BD
      //las recorro y las imprimo en un select
      foreach ($arrayProductos as $producto): ?>
      <option value= "<?php echo $producto["id"] ?>"> <?php echo $producto["nombre"] ?> </option>
    <?php endforeach;
  else: ?>
  <i> <b><option value= "" selected> <?= "No hay productos cargados en el sistema!" ?> </option>
<?php endif ?>
</select>
<span style="color: red;"class="help-block" id="error"><i>
<?php
if (isset($errores_producto["id_producto_vacio"])){
  echo $errores_producto["id_producto_vacio"] . "<br>";
}
?>
</i></span>

</div>
<!-- FIN PRODUCTO -->
<div class="form-group text-center">
  <button type="submit" name="alta_producto" class="btn btn-danger btn-lg mt-4 mb-5">Dar de alta Producto</button>
  <button type="submit" name="baja_producto" class="btn btn-danger btn-lg mt-4 mb-5">Dar de baja Producto</button>
  <button type="reset" name="reiniciar" class="btn btn-outline-danger btn-lg mt-4 mb-5">Reiniciar Formulario</button>
</div>

</form>
<!-- FIN FORMULARIO GESTION PRODUCTO -->
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
