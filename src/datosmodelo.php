<?php 
use PhpOffice\PhpSpreadsheet\IOFactory;
require_once "conexion.php";


class DatosModelo{
  static public function mdlcargarExcel($filedate){
    $nombrearchivo = $filedate['tmp_name'];
    $documento = IOFactory::load($nombrearchivo);
  }
}
?>