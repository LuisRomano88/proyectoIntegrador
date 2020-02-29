<?php
declare(strict_types=1);
$dsn="mysql:dbname=e-commerce-hassen;host=127.0.0.1;port=3306";
$user="root";
$pass="";

try {
  $db=new PDO($dsn, $user, $pass);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Exception $e) {
  var_dump($e->getMessage());
  echo "Hubo un error!(en PHP)";exit;
}

function insertarMarca(PDO $db, string $nombre_marca){
  $query=$db->prepare("INSERT INTO marcas VALUES (default, :nombre_marca)");
  $query->bindValue(":nombre_marca", $nombre_marca);
  $query->execute();
}

function insertarCategoria(PDO $db, string $nombre_categoria){
  $query=$db->prepare("INSERT INTO categorias VALUES (default, :nombre_categoria)");
  $query->bindValue(":nombre_categoria", $nombre_categoria);
  $query->execute();
}

function insertarEnMarcaCategoria(PDO $db, string $id_categoria, string $id_marca){
  $query=$db->prepare("SELECT * FROM categoria_marca");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  // if ($result['marca_id'] == $id_marca && $result['marca_id'] == $id_marca) {
  //   echo "La marca y categoria ya estan cargadas";
  //   return;
  // }

  try {
    // $query=$db->prepare("INSERT INTO categoria_marca VALUES (default, $id_categoria, $id_marca)"); PREGUNTAR: ESTA LINEA ERA PARA FK SIMPLE
    $query=$db->prepare("INSERT INTO categoria_marca VALUES ($id_categoria, $id_marca)");
    $query->execute();
    // $id_categoria_marca = $db->lastInsertID(); PREGUNTAR: ESTA LINEA ERA PARA FK SIMPLE
    // return $id_categoria_marca;
  } catch (\Exception $e) {
    echo "Error insertando en Tabla categoria-marca:" . $e->getMessage();
  }
}

function insertarProducto(PDO $db, string $nombre, string $precio, string $foto){
  // $categoria_marca_id = insertarEnMarcaCategoria($db, $_POST["id_categoria"], $_POST["id_marca"]);
  insertarEnMarcaCategoria($db, $_POST["id_categoria"], $_POST["id_marca"]);

  $query=$db->prepare("INSERT INTO productos VALUES (default, :categoria_id, :marca_id, :nombre, :precio, :foto)");
  $query->bindValue(":categoria_id", $_POST["id_categoria"]);
  $query->bindValue(":marca_id", $_POST["id_marca"]);
  $query->bindValue(":nombre", $nombre);
  $query->bindValue(":precio", $precio);
  $query->bindValue(":foto", $foto);
  $query->execute();
  $ultimo_producto = $db->lastInsertID();
  return $ultimo_producto;
}

function traerMarcas(PDO $db){
  $arrayMarcas=false;
  try {
    $query=$db->prepare("SELECT * FROM marcas");
    $query->execute();
    $arrayMarcas=$query->fetchAll(PDO::FETCH_ASSOC);
    return $arrayMarcas;
  } catch (\Exception $e) {
    echo "No existe la tabla de --MARCAS--";
    return $arrayMarcas;
  }

}

function traerCategorias(PDO $db){
  $arrayCategorias=false;
  try {
    $query=$db->prepare("SELECT * FROM categorias");
    $query->execute();
    $arrayCategorias=$query->fetchAll(PDO::FETCH_ASSOC);
    return $arrayCategorias;
  } catch (\Exception $e) {
    echo "No existe la tabla de --CATEGORIAS--";
    return $arrayCategorias;
  }
}

function traerProductos(PDO $db){
  $arrayProductos=false;
  try {
    $query=$db->prepare("SELECT * FROM productos");
    $query->execute();
    $arrayProductos=$query->fetchAll(PDO::FETCH_ASSOC);
    return $arrayProductos;
  } catch (\Exception $e) {
    echo "No existe la tabla de --PRODUCTOS--";
    return $arrayProductos;
  }
}

function traerDetalleProducto(PDO $db, string $id_producto){

  $query=$db->prepare("SELECT * FROM productos WHERE id=$id_producto");
  $query->execute();
  $producto=$query->fetch(PDO::FETCH_ASSOC);
  // var_dump($producto); PREGUNTAR: ESTA LINEA ERA PARA FK SIMPLE
  // $query=$db->prepare("SELECT marcas.nombre AS marca, categorias.nombre AS categoria
  //   FROM categorias
  //   INNER JOIN categoria_marca ON categorias.id = categoria_marca.categoria_id
  //   INNER JOIN marcas ON categoria_marca.marca_id=marcas.id
  //   WHERE categoria_marca.id=".$id_producto);
  $query=$db->prepare("SELECT categorias.nombre AS categoria, marcas.nombre AS marca
    FROM categorias
    INNER JOIN productos ON productos.categoria_id = categorias.id
    INNER JOIN marcas ON productos.marca_id = marcas.id
    INNER JOIN categoria_marca ON categoria_marca.marca_id=marcas.id
    AND categoria_marca.categoria_id = categorias.id
    WHERE productos.id=".$id_producto);
    $query->execute();
    $marcaYcategoria=$query->fetch(PDO::FETCH_ASSOC);
    // var_dump($marcaYcategoria);
    $producto["categoria"] = $marcaYcategoria["categoria"];
    $producto["marca"] = $marcaYcategoria["marca"];
    return $producto;
  }

  function eliminarProducto(PDO $db, string $id_producto){
    try {
      $query = $db->prepare('SELECT productos.id FROM productos WHERE id='.$id_producto);
      $query->execute();
    } catch (\Exception $e) {

    }

    try {
      $query = $db->prepare('DELETE FROM productos WHERE id='.$id_producto);
      $query->execute();
    } catch (\Exception $e) {
      echo "No fue posible eliminar el producto!" . $e->getMessage();
    }

  }

  function eliminarMarca(PDO $db, string $id_marca){

    try {
      $query = $db->prepare('DELETE FROM productos WHERE id='.$id_marca);
      $query->execute();
    } catch (\Exception $e) {
      echo "Error al eliminar productos asociados a la marca seleccionada. ". $e->getMessage();
      return false;
    }

    try {
      $query = $db->prepare('DELETE FROM marcas WHERE id='.$id_marca);
      $query->execute();
      return true;
    } catch (\Exception $e) {
      echo "Error al eliminar la marca seleccionada. ". $e->getMessage();
      return false;
    }
  }

  ?>
