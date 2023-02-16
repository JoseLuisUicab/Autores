<?php
/*en este archivo tenemos las funciones a ajecutar en la tablaal eliminar o modificar los datos  */
require_once "conexion.php";
header('Content-Type: application/json');
$conn = new Conexion();
$pdo = $conn->connect();
switch ($_GET['accion']) {
   case 'listar':
    /* lista los  registro en la tabla */
  $sql = $pdo->prepare("select id,nombre,apellido,correo,redes,puesto,descripcion from  integrantes");
  $sql->execute();
  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($resultado);/* id,nombre,apellido,correo,redes,puesto,descripcion */
  break;
  case 'borrar':
    /* elimina solo un registro */
    $sql = $pdo->prepare("delete from integrantes where id=:id");
    $resultado = $sql->execute(
      array(
        "id" => $_GET['id']
      )
    );
    echo json_encode($resultado);
    break;
  
  case 'elimina':
    /* elimina todos los registros */
    try {
      $sql = $pdo->prepare("DELETE FROM integrantes");
      $sql->execute();
      echo "Record deleted successfully";
      header("Location:dashboard.php");
      }
  catch(PDOException $e){
      echo $sql . "<br>" . $e->getMessage();
      }
      $conn = null;
      break;

  case 'consultar':
     /* consulta los datos y los trae de vuelta */
    $sql = $pdo->prepare("select id,nombre,apellido,correo,redes,puesto,descripcion from integrantes where id=:id");
    $sql->execute(array("id" => $_GET['id']));
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
    break;

  case 'modificar':
      /* modifica los datos y los devuelve mostrando en la tabla */
    $sql = $pdo->prepare("update integrantes set
                                  nombre=:nombre,
                                  apellido=:apellido,
                                  correo=:correo,
                                  redes=:redes,
                                  puesto=:puesto,
                                  descripcion=:descripcion
                              
                                  
                                where id=:id");
    $resultado = $sql->execute(array(
        "nombre" => $_POST['nombre'],
        "apellido" => $_POST['apellido'],
        "correo" => $_POST['correo'],
        "redes" => $_POST['redes'],
        "puesto" => $_POST['puesto'],
        "descripcion" => $_POST['descripcion'],
        
        "id" => $_GET['id']
      )
    );
    echo json_encode($resultado);
    
    break;
}  

?>