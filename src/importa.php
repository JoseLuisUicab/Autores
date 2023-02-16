<?php
 require_once "../vendor/autoload.php"; /* cargamos la libreria */

require_once "conexion.php";/* llamar ala conexion */
/* implementamos una clase de la libreria para leer el archivo */
class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{
  public function readCell($column, $row, $worksheetName = '')
  {
    if ($row > 1) { /* si es mayor a 1 no metera el encabezado del excel asi evtimaos dupplicacion del encabezado */
      return true;
    }
    return false;
  }
}

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx(); /* leemos el formato excel */

$inputFileName = $_FILES['excel']['tmp_name'];
/* $inputFileName = basename($inputFileName); */
/*  Identify the type of $inputFileName   */
/*  $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName); 
/* Create a new Reader of the type that has been identified 
 $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileName);  */
$reader->setReadFilter(new MyReadFilter());
/* Load $inputFileName to a Spreadsheet Object   */ 
$spreadsheet = $reader->load($inputFileName);/* cargarmos el archivo */
$cantidad = $spreadsheet->getActiveSheet()->toArray(); /* funcion que permitira convertir en una matriz */
foreach ($cantidad as $row){ /* recorremos la matriz para ir acomodando los datos en la bse de datos */
  if($row[0]!=''){
    $conn = new Conexion();
    $sql = "INSERT INTO integrantes VALUES(:id,:nombre,:apellido,:correo,:redes,:puesto,:descripcion)";
    /* aqui se hace la inserccion en sus rescpectivas columnas */
    $stmt = $conn->connect()->prepare($sql);
    $stmt->bindValue(":id",$row[0]);
    $stmt->bindValue(":nombre",$row[1]);
    $stmt->bindValue(":apellido",$row[2]);
    $stmt->bindValue(":correo",$row[3]);
    $stmt->bindValue(":redes",$row[4]);
    $stmt->bindValue(":puesto",$row[5]);
    $stmt->bindValue(":descripcion",$row[6]);
    $stmt->execute();
  }
}  
?>