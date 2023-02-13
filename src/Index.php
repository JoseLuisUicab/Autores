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
        <h3>Senior Front-End</h3>
        <br>
        <p>ING.William Gongora Bojorquez</p>
        <div class="aportaciones2">
          <h3>Aportaciones</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, necessitatibus?dasdasfd
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          <div class="iconos2">
            <i class="fa-brands fa-facebook"></i>
            <i class="fab fa-linkedin-in"></i>
            <i class="fas fa-envelope"></i>
          </div>
          </p>
        </div>
      </div>

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