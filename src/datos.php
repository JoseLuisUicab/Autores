<?php
require_once "conexion.php";
header('Content-Type: application/json');
$conn = new Conexion();
$pdo = $conn->connect();
switch ($_GET['accion']) {
   case 'listar':
  $sql = $pdo->prepare("select id,nombre,apellido,correo,redes,puesto,descripcion,foto from  integrantes");
  $sql->execute();
  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($resultado);/* id,nombre,apellido,correo,redes,puesto,descripcion */
  break;
  case 'borrar':
    $sql = $pdo->prepare("delete from integrantes where id=:id");
    $resultado = $sql->execute(
      array(
        "id" => $_GET['id']
      )
    );
    echo json_encode($resultado);
    break;

  case 'consultar':
    $sql = $pdo->prepare("select id,nombre,apellido,correo,redes,puesto,descripcion,foto from integrantes where id=:id");
    $sql->execute(array("id" => $_GET['id']));
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
    break;

  case 'modificar':
    $sql = $pdo->prepare("update integrantes set
                                  nombre=:nombre,
                                  apellido=:apellido,
                                  correo=:correo,
                                  redes=:redes,
                                  puesto=:puesto,
                                  descripcion=:descripcion,
                                  foto=:foto
                                  
                                where id=:id");
    $resultado = $sql->execute(array(
        "nombre" => $_POST['nombre'],
        "apellido" => $_POST['apellido'],
        "correo" => $_POST['correo'],
        "redes" => $_POST['redes'],
        "puesto" => $_POST['puesto'],
        "descripcion" => $_POST['descripcion'],
        "foto"=>$_POST['foto'],
        "id" => $_GET['id']
      )
    );
    echo json_encode($resultado);
    
    break;
}  

?>