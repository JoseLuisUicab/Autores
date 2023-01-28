<?php 

class DatosController{
  static public function ctrcargarExcel($filedate){
    $res = DatosModelo::mdlcargarExcel($filedate);
    return $res;
  }
}
?>