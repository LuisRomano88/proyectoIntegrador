<?php
declare(strict_types=1);

class UsuarioComun extends Usuario {
  private $carrito;
  private $arrayCompras;

  public function __construct($name, $lastName, $userName, $dni=null, $phone=null, $city=null, $country=null, $email, $password, $photo=null){
    $this->name=$name;
    $this->lastName=$lastName;
    $this->userName=$userName;
    $this->dni=$dni;
    $this->phone=$phone;
    $this->city=$city;
    $this->country=$country;
    $this->email=$email;
    $this->password=$password;
    $this->photo=$photo;
  }

  public function getCarrito(){
    return $this->carrito;
  }

  public function getArrayCompras(){
    return $this->arrayCompras;
  }

  public function setCarrito(Carrito $carrito){
    $this->carrito[]=$carrito;
  }

  public function setArrayCompras(Compra $compra){
    $this->arrayCompras[]=$compra;
  }

}
?>
