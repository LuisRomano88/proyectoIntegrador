<?php
$cadena = "agus";
$bandera = false;
for ($i=0; $i < strlen($cadena); $i++) {
  if(is_numeric(substr($cadena,$i,1))){
    $bandera=true;
  }
}
if(!$bandera){
  echo "debe tener al menos un numero";
} else {
  echo "correcto!";
}

 ?>
