
<?php
 /*Verificacionde boton */
 if(!empty($_POST["btniniciar"])){
        if (empty($_POST["usuario"]) and empty ($_POST["contrasena"])) {
            echo '<script language="javascript">alert("Porfavor de llenar los Datos");</script>';
        } else {
        $usuario=$_POST["usuario"];
        $contrasenia=$_POST["contrasena"];
        $sql=$conexion->query(" select * from login where Nombre='$usuario' and Contraseña='$contrasenia' ");
        if ($datos=$sql->fetch_object()) {
            header("Location:dashboard.php");
        } else {
            echo'<script language="javascript">alert("Los datos son Incorrectos");</script>';
        }
        
        }
 }
?>