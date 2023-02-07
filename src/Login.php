<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/style.css">
  <link rel="stylesheet" href="../Css/Destock.css">
  <script src="../Scrip/Scrip2.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src='https://kit.fontawesome.com/2ee0245f3d.js' crossorigin='anonymous'></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Document</title>
</head>

<body>
  <section class="Login">
    <figure><img src="../Imagenes/maia.png" alt=""></figure>
    <div>
      <form method="post" class="Formulario" action="">
        <p>Administrador</p><br>
        <?php
           include ("conexion_d.php");
            include ("controller.php");
            ?>
        <label for="">Usuario:</label>
        <input type="text" name="usuario"><br>
        <label for="">Contraseña</label>
        <input type="text" name="contrasenia"><br>
        <input class="enviar" name="btniniciar" type="submit"></input><br>
        <a href="Index.php">Regresar</a>

      </form>
    </div>
  </section>
</body>

</html>