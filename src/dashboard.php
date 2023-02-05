<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/Destock.css">
  <link rel="stylesheet" href="../src/style.css">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--   <meta http-equiv="refresh" content="2"> -->
  <title>Document</title>
</head>

<body>
  <section class="content">
    <h1 class="fw-bold text-center bg-primary p-2" style="color:#DFBA49;">Administrador</h1>
    <div class="container-fluid my-4">
      <div class="m-0 mb-2">
        <a class="btn btn-primary" href="login.php">Salir&nbsp;&nbsp;<i
            class="fa-solid fa-circle-xmark text-whit fs-5"></i></a>
      </div>
      <!-- caja para subir  -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Seleccionar archivo excel</h3>
              <div class="card-tools">

              </div>
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data" id="cargar_datos" onsubmit="Cargarexcel(event) ">
                <div class="row">
                  <div class="col-lg-10">
                    <input type="file" name="txt" id="txt_archivo" class="form-control" accept=".csv,.xlsx,.xls">
                  </div>
                  <div class=" col-lg-2">

                    <input type="submit" class="btn btn-primary" value="Importar excel">
                  </div>

                </div>
              </form>
            </div>

          </div>
        </div>
      </div>

    </div>
    <br><br>

    <div class="table-responsive text-center p-2">
      <h1 class=" fw-bold fs-2 p-3">Lista de Integrantes</h1>
      <table class="table table-bordered" id="table_admin">

        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">redes</th>
            <th scope="col">Puesto</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Modificar</th>
            <th scope="col">Borrar</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>



    <!-- MODAL PARA MODIFICAR -->
    <div class="modal fade" id="FormularioArticulo" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="id">
            <!-- Nombre -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Nombre:</label>
                <input type="text" id="nombre" class="form-control" placeholder="">
              </div>
            </div>
            <!--FIN Nombre -->

            <!-- Apellido -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Apellido:</label>
                <input type="text" id="apellido" class="form-control" placeholder="">
              </div>
            </div>
            <!--Fin APellido  -->

            <!-- Correo -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Correo:</label>
                <input type="text" id="correo" class="form-control" placeholder="">
              </div>
            </div>
            <!--FIn correo  -->

            <!-- Redes -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Redes:</label>
                <input type="text" id="redes" class="form-control" placeholder="">
              </div>
            </div>
            <!--Fin Redes  -->

            <!-- puesto -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Puesto:</label>
                <input type="text" id="puesto" class="form-control" placeholder="">
              </div>
            </div>
            <!--Fin puesto  -->

            <!-- Descripcion -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Descripcion:</label>
                <input type="text" id="descripcion" class="form-control" placeholder="">
              </div>
            </div>
            <!--Fin Descripcion  -->




            <div class="modal-footer">
              <!--    <button type="button" id="ConfirmarAgregar" class="btn btn-success">Agregar</button> -->
              <button type="button" id="ConfirmarModificar" class="btn btn-success">Modificar</button>
              <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>

      <!--FIN MODAL MODIFICAR  -->
  </section>

  <?php   require("Footer.php");  ?>


  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <!--   <script src="../Scrip/Scrip.js"></script> -->
  <script src="../Scrip/Scrip.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/59df0bc859.js" crossorigin="anonymous"></script>
</body>

</html>