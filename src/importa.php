<?php
require "../vendor/autoload.php";
require "conexion.php";
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

$nombreArchivo = "../maiaa.xlsx";
$doc = IOFactory::load($nombreArchivo);

$thojas = $doc->getSheetCount();

/* for($indicehoja=0; $indicehoja<$thojas; $indicehoja++){ */
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
}
?>