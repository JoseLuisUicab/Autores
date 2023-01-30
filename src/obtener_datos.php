<?php 
require_once __DIR__ ."conexion.php";
class Obetener{
  public function getUser(){
    $conn = new Conexion();
    $stmt = $conn->connect()->prepare("SELECT * FROM integrantes");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo json_decode($stmt->fetchAll());
  }
  
}
$get = new Obetener();
$get->getUser()
?>