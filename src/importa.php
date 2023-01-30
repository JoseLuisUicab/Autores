<?php
require_once "../src/datoscontroller.php";
require_once "../src/datosmodelo.php";

require_once "vendor/autoload.php";
require_once "conexion.php";

class ajaxDatos{
  public $filedate;
  public function cargarExcel(){
    $res = DatosController::ctrcargarExcel($this->filedate);
    echo json_encode($res);
    
  }
  
}
if (isset($_FILES)) {
  $archivo_excel_datos = new ajaxDatos();
  $archivo_excel_datos ->filedate = $_FILES['filedate'];
  $archivo_excel_datos->cargarExcel(); 
}
/* class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
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

/**  Identify the type of $inputFileName  
$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
/**  Create a new Reader of the type that has been identified 
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
$reader->setReadFilter(new MyReadFilter());
/**  Load $inputFileName to a Spreadsheet Object  
$spreadsheet = $reader->load($inputFileName);
$cantidad = $spreadsheet->getActiveSheet()->toArray();
foreach ($cantidad as $row){
  if($row[0]!=''){
    
   /*  $sql = "INSERT INTO integrantes(id,nombre,apellido,correo,redes,puesto,descripcion) VALUE ('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]')"; 
    $result = $mysqli->query($sql);
  }
} */




/* require "vendor/autoload.php";
reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();

require "../vendor/autoload.php";
require "conexion.php";
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

$nombreArchivo = "../maiaa.xlsx";
$doc = IOFactory::load($nombreArchivo);

$thojas = $doc->getSheetCount();

/* for($indicehoja=0; $indicehoja<$thojas; $indicehoja++){ 
$hactual = $doc->getSheet(0);
$nfilas = $hactual->getHighestDataRow();
$letra = $hactual->getHighestColumn();

$numeroletra = Coordinate::columnIndexFromString($letra);

for($indicehoja=2; $indicehoja<$nfilas; $indicehoja++){
  $valorA = $hactual->getCellByColumnAndRow(1,$indicehoja);
  $valorB = $hactual->getCellByColumnAndRow(2,$indicehoja);
  $valorC = $hactual->getCellByColumnAndRow(3,$indicehoja);
  $valorD = $hactual->getCellByColumnAndRow(4,$indicehoja);
  $valorE = $hactual->getCellByColumnAndRow(5,$indicehoja);
  $valorF = $hactual->getCellByColumnAndRow(6,$indicehoja);
  $valorG = $hactual->getCellByColumnAndRow(7,$indicehoja);

  $sql = "INSERT INTO integrantes(id,nombre,apellido,correo,redes,puesto,descripcion) VALUE ('$valorA','$valorB','$valorC','$valorD','$valorE','$valorF','$valorG')";
   $mysqli->query($sql);
} */
?>