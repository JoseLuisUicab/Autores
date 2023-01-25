<?php 
if (is_array($_FILES["archivoexcel"]) && count($_FILES["archivoexcel"])>0){
  require_once"PHPExcel/Clases/PHPExcel.php";
}  
?>