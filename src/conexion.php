<?php

class Conexion{
  
  private $host="localhost";
  private $usua="root";
  private $pass="";
  private $nombre="maiaa";

  public  function connect(){
    $conn = new PDO("mysql:host=".$this->host.";dbname=".$this->nombre,$this->usua,$this->pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,);
    return $conn;
  }
}

?>