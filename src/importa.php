<?php
/* require_once "../src/datoscontroller.php";
require_once "../src/datosmodelo.php";

require_once "vendor/autoload.php";
require_once "conexion.php";

class ajaxDatos{
  public $filedate = "";

  public function cargarExcel($res){
    $res = DatosController::ctrcargarExcel($this->filedate);
    echo json_encode($res);
    
  }
  
}
if (isset($_FILES)) {
  $archivo_excel_datos = new ajaxDatos();
  $archivo_excel_datos ->filedate = $_FILES['filedate'];
  $archivo_excel_datos->cargarExcel(); 
} */
require_once "vendor/autoload.php";
require_once "conexion.php";
class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{
  public function readCell($column, $row, $worksheetName = '')
  {
    if ($row > 1) {
      return true;
    }
    return false;
  }
}

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();

$inputFileName = $_FILES['excel']['tmp_name']; 

/**  Identify the type of $inputFileName  */
$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
/* Create a new Reader of the type that has been identified  */
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
$reader->setReadFilter(new MyReadFilter());
/* // Load $inputFileName to a Spreadsheet Object   */
$spreadsheet = $reader->load($inputFileName);
$cantidad = $spreadsheet->getActiveSheet()->toArray();
foreach ($cantidad as $row){
  if($row[0]!=''){
    $conn = new Conexion();
     $sql = "INSERT INTO integrantes VALUES(:id,:nombre,:apellido,:correo,:redes,:puesto,:descripcion)";
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