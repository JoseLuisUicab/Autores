<?php
//header("Content-Type: text/html;charset=utf-8");
$mysqli = new mysqli("localhost","root","","maiaa");
if ($mysqli->connect_errno){
  echo "Connect error: " . $mysqli ->connect_error;
  die();
}
?>