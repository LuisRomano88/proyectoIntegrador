<?php
declare(strict_types=1);

abstract class Usuario {
  protected $name; //required
  protected $lastName; //required
  protected $userName; //required
  protected $dni;
  protected $phone;
  protected $city;
  protected $country;
  protected $password; //required
  protected $email; //required
  protected $photo;

  public function login(string $userName, string $password){
    
  }

  public function registration(string $name, string $lastName, string $userName, string $dni, string $phone, string $city, string $country, string $password, string $email, string $photo){

  }

  public function getName(): string{
    return $this->name;
  }

  public function getlastName(): string{
    return $this->lastName;
  }

  public function getUserName(): string{
    return $this->userName;
  }

  public function getDni(): string{
    return $this->dni;
  }

  public function getPhone(): string{
    return $this->phone;
  }

  public function getCity(): string{
    return $this->city;
  }

  public function getCountry(): string{
    return $this->country;
  }

  public function getPassword(): string{
    return $this->password;
  }

  public function getEmail(): string{
    return $this->email;
  }

  public function getPhoto(): string{
    return $this->photo;
  }

  public function set(string $name){
    $this->name=$name;
  }
  public function set(string $lastName){
    $this->lastname=$lastName;
  }
  public function set(string $userName){
    $this->username=$userName;
  }
  public function set(string $dni){
    $this->dni=$dni;
  }
  public function set(string $phone){
    $this->phone=$phone;
  }
  public function set(string $city){
    $this->city=$city;
  }
  public function set(string $country){
    $this->country=$country;
  }
  public function set(string $password){
    $this->password=$password;
  }
  public function set(string $email){
    $this->email=$email;
  }
  public function set(string $photo){
    $this->photo=$photo;
  }


}


?>
