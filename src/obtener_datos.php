<?php 
 require_once "conexion.php";
class Obetener{
  public function getUser(){
    $conn = new Conexion();
    $stmt = $conn->connect()->prepare("SELECT * FROM integrantes");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo json_encode($stmt->fetchAll());
  }
}
$get = new Obetener();
return $get->getUser();
?>