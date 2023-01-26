<?php
//importar la ruta del phpexcel
require "excel.php";

$archivos = "maiaa.xlsx";

// cargar nuestra hoja de excel
$excel = PHPExcel_IOFactory::load($archivos);
 // cargar lla hoja de calculos 
$excel->setActiveSheetIndex(0);
/* $numfila-> */
?>