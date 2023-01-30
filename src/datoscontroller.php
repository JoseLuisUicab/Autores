<?php 

class DatosController{
  static public function ctrcargarExcel($filedate){
return $res = DatosModelo::mdlcargarExcel($filedate);

  }
}