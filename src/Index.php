<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/style.css">
  <link rel="stylesheet" href="../Css/Destock.css">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="../Scrip/Scrip2.js"></script>
  <script src='https://kit.fontawesome.com/2ee0245f3d.js' crossorigin='anonymous'></script>
  <title>Principal</title>
</head>

<body>

  <?php include "menu.php"?>

  <Section class="Inicio">
    <h2>Nuestros Colaboradores</h2>
  </Section>
  <h2 class="teamle" id="teamleader">TEAM LEADERS</h2>

  <Section class="Parte1">


    <article class="leader">


      <!--  <div class="persona">
        <figure><img src="../Imagenes/Billgates.jpg" alt=""></figure>
        <h3>Senior Front-End</h3>
        <br>
        <p>ING.William Gongora Bojorquez</p>
        <div class="aportaciones">
          <h3>Aportaciones</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, necessitatibus?dasdasfd
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          <div class="iconos">
            <i class="fa-brands fa-facebook"></i>
            <i class="fab fa-linkedin-in"></i>
            <i class="fas fa-envelope"></i>
          </div>
          </p>
        </div>
      </div>

      <div class="persona">
        <figure><img src="../Imagenes/Billgates.jpg" alt=""></figure>
        <h3>Senior Front-End</h3>
        <br>
        <p>ING.William Gongora Bojorquez</p>
        <div class="aportaciones">
          <h3>Aportaciones</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, necessitatibus?dasdasfd
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          <div class="iconos">
            <i class="fa-brands fa-facebook"></i>
            <i class="fab fa-linkedin-in"></i>
            <i class="fas fa-envelope"></i>
          </div>
          </p>
        </div>
      </div>

      <div class="persona">
        <figure><img src="../Imagenes/Billgates.jpg" alt=""></figure>
        <h3>Senior Front-End</h3>
        <br>
        <p>ING.William Gongora Bojorquez</p>
        <div class="aportaciones">
          <h3>Aportaciones</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, necessitatibus?dasdasfd
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          <div class="iconos">
            <i class="fa-brands fa-facebook"></i>
            <i class="fab fa-linkedin-in"></i>
            <i class="fas fa-envelope"></i>
          </div>
          </p>
        </div>
      </div>

      <div class="persona">
        <figure><img src="../Imagenes/Billgates.jpg" alt=""></figure>
        <h3>Senior Front-End</h3>
        <br>
        <p>ING.William Gongora Bojorquez</p>
        <div class="aportaciones">
          <h3>Aportaciones</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, necessitatibus?dasdasfd
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          <div class="iconos">
            <i class="fa-brands fa-facebook"></i>
            <i class="fab fa-linkedin-in"></i>
            <i class="fas fa-envelope"></i>
          </div>
          </p>
        </div>
      </div>

      <div class="persona">
        <figure><img src="../Imagenes/Billgates.jpg" alt=""></figure>
        <h3>Senior Front-End</h3>
        <br>
        <p>ING.William Gongora Bojorquez</p>
        <div class="aportaciones">
          <h3>Aportaciones</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, necessitatibus?dasdasfd
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          <div class="iconos">
            <i class="fa-brands fa-facebook"></i>
            <i class="fab fa-linkedin-in"></i>
            <i class="fas fa-envelope"></i>
          </div>
          </p>
        </div>
      </div>

      <div class="persona">
        <figure><img src="../Imagenes/Billgates.jpg" alt=""></figure>
        <h3>Senior Front-End</h3>
        <br>
        <p>ING.William Gongora Bojorquez</p>
        <div class="aportaciones">
          <h3>Aportaciones</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, necessitatibus?dasdasfd
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          <div class="iconos">
            <i class="fa-brands fa-facebook"></i>
            <i class="fab fa-linkedin-in"></i>
            <i class="fas fa-envelope"></i>
          </div>
          </p>
        </div>
      </div> -->


      <?php
    include "conexion_d.php";
     //asemos la consulta de todos los usuarios de la tabla uausrios
     $todos_productos= " SELECT * FROM integrantes where (puesto = 'senior') ORDER BY id ASC";
     $resultado= mysqli_query($conectar, $todos_productos);
     while($row = mysqli_fetch_assoc($resultado))
    { 
      ?>

      <!--------------------------------->

      <div class=" persona" style="background: #FFFFFF">
        <figure><img src="../Imagenes/Billgates.jpg" alt=""></figure>
        <h3><?php echo $row["puesto"];?></h3><!-- puesto -->
        <br>
        <p><?php echo $row["nombre"];?>,<?php echo $row["apellido"];?></p><!-- nombre y apellido -->
        <div class="aportaciones">
          <h3>Aportaciones</h3>
          <p><?php echo $row["descripcion"];?></p><!-- descripciones -->
          <div class="iconos">

            <a href="<?php echo $row["redes"];?>"> <i class="fa-brands fa-facebook"></i></a>
            <i class="fab fa-linkedin-in"></i>
            <a href="<?php echo $row["correo"];?>"> <i class="fas fa-envelope"></i></a>
          </div>

        </div>
      </div>





      <!-- <div class="divproductos  borde">
            <img src="<?php echo $row['ruta_foto']; ?>" alt="" class="imgwidth" >
            <p class="nombreproducto"><?php echo $row["producto"];?></p>
            <p class="preciopro">Precio: <span class="rojo">$ <?php echo $row["precio"]; ?></span> </p>
            <p class="descripcionpro"><span class="negritas">Descripcion:</span><br><?php echo $row['descripcion']; ?></p>
            
            </div> -->

      <?php
    }
    
        mysqli_free_result($resultado);// deja de buscar datos en la base de datos una ves mostrados todo de la tabla
     
        ?>
    </article>
  </Section>

  <!---------------------------------------------------------------->

  <h2 class="teamle" id="Desarrolladores">Desarrolladores</h2>
  <Section class="Parte2">
    <article class="leader2">

      <?php
    include "conexiontabla_integrantes.php";
     //asemos la consulta de todos los usuarios de la tabla uausrios
     $todos_productos= " SELECT * FROM integrantes where (puesto = 'junior') ORDER BY id ASC";
     $resultado= mysqli_query($conectar, $todos_productos);
     while($row = mysqli_fetch_assoc($resultado))
    { 
      ?>

      <!--------------------------------->

      <div class="persona">
        <figure><img src="../Imagenes/Billgates.jpg" alt=""></figure>
        <h3><?php echo $row["puesto"];?></h3><!-- puesto -->
        <br>
        <p><?php echo $row["nombre"];?>,<?php echo $row["apellido"];?></p><!-- nombre y apellido -->
        <div class="aportaciones">
          <h3>Aportaciones</h3>
          <p><?php echo $row["descripcion"];?></p><!-- descripciones -->
          <div class="iconos">

            <a href="<?php echo $row["correo"];?>"> <i class="fab fa-linkedin-in"></i></a>
            <!-- cambir al nombre del campo de latbla, quitar correo y poner linkedin -->

            <a href="<?php echo $row["redes"];?>"> <i class="fa-brands fa-github"></i></a>
            <!-- cambir al nombre del campo de latbla, quitar redes y poner github -->
          </div>

        </div>
      </div>

      <?php
    }
    
        mysqli_free_result($resultado);// deja de buscar datos en la base de datos una ves mostrados todo de la tabla
     
        ?>


    </article>

  </Section>
  <!--boton-->
  <div id="button-up">
    <i class="fas fa-sort-up"></i>
  </div>
  <!-- fin boton-->
  <?php include "Footer.php"?>
  <script src="../Scrip/Scrip2.js"></script>

</body>

</html>