<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/Destock.css">
  <link rel="stylesheet" href="../style.css">
  <link href="../DataTables/datatables.min.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    <div class="text-center container-fluid">
      <!-- <form action="elimina.php"> -->
      <div class="d-flex justify-content-between align-items-end">
        <button class="btn btn-secondary text-primary fw-bold fs-5" id="borrar_b">Limpiar Tabla</button>
      </div>
      <!--  </form> -->

      <h1 class=" fw-bold fs-2 p-3">Lista de Integrantes</h1>
      <table class="table table-striped table-bordered table-responsive  " id="table_admin">
        <thead class="">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">redes</th>
            <th scope="col">Puesto</th>
            <th scope="col" width="17%">Descripcion</th>
            <th scope="col" width="2%">foto</th>
            <th scope="col" width="5%">Modificar</th>
            <th scope="col" width="5%">Borrar</th>
          </tr>
        </thead>
        <tbody class="text-break overflow-hidden align-middle">

        </tbody>
      </table>
    </div>



    <!-- MODAL PARA MODIFICAR -->
    <div class=" modal fade" id="FormularioArticulo" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">

            <button type="button" class="btn-close" data-bs-dismiss="modal">
              <span aria-hidden="true" class="bg-primary"></span>
            </button>
          </div>
          <div class="modal-body" style="  border:1px solid blue;">
            <input type="hidden" id="ID">
            <!-- Nombre -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Nombre:</label>
                <input type="text" id="Nombre" name="nombre" class="form-control" placeholder="">
              </div>
            </div>
            <!--FIN Nombre -->

            <!-- Apellido -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Apellido:</label>
                <input type="text" id="Apellido" name="apellido" class="form-control" placeholder="">
              </div>
            </div>
            <!--Fin APellido  -->

            <!-- Correo -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Correo:</label>
                <input type="text" id="Correo" name="correo" class="form-control" placeholder="">
              </div>
            </div>
            <!--FIn correo  -->

            <!-- Redes -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Redes:</label>
                <input type="text" id="Redes" name="redes" class="form-control" placeholder="">
              </div>
            </div>
            <!--Fin Redes  -->

            <!-- puesto -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Puesto:</label>
                <input type="text" id="Puesto" name="puesto" class="form-control" placeholder="">
              </div>
            </div>
            <!--Fin puesto  -->

            <!-- Descripcion -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Descripcion:</label>
                <textarea class=" form-control" name="descripcion" id="Descripcion" rows="3"></textarea>
              </div>
            </div>
            <!--Fin Descripcion  -->

            <div class="modal-footer">
              <button type="button" id="ConfirmarModificar" class="btn btn-primary">Modificar</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                aria-label="Close">Cancelar</button>

              <div class="w-100">
                <label class="p-1 fw-bold">Seleccionar foto del participante</label>
                <input type="file" name="user_image" id="user_image" class="form-control">
                <span id="user_uploaded_image"></span>
              </div>
            </div>


          </div>
        </div>
      </div>

      <!--FIN MODAL MODIFICAR  -->
  </section>

  <?php   require("Footer.php");  ?>


  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="../DataTables/datatables.min.js"></script>
  <script src="../Scrip/Scrip.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="https://kit.fontawesome.com/59df0bc859.js" crossorigin="anonymous"></script>
  <script>
  document.addEventListener("DOMContentLoaded", function() {

    let tabla1 = $("#table_admin").DataTable({
      responsive: true,
      ordering: false,
      "ajax": {
        url: "datos.php?accion=listar",
        dataSrc: ""
      },
      "columns": [{
          "data": "id",
          "className": "text-center"

        },
        {
          "data": "nombre"
        },
        {
          "data": "apellido"
        },
        {
          "data": "correo"
        },
        {
          "data": "redes"
        },
        {
          "data": "puesto"
        },
        {
          "data": "descripcion"
        },
        {
          "data": "foto"
        },

        {
          "data": null,
          "orderable": false
        },
        {
          "data": null,
          "orderable": false
        },


      ],

      "columnDefs": [{
        targets: 7,
        "defaultContent": "<button class='btn btn-secondary botonfoto'><i class='fa-solid fa-camera'></i></button>",
        sortable: false,
        data: null
      }, {
        targets: 8,
        "defaultContent": "<button class='btn  btn-primary botonmodificar'><i class='fa-solid fa-pen-to-square'></i></button>",
        data: null
      }, {
        targets: 9,
        "defaultContent": "<button class='btn btn-secondary botonborrar'><i class='fa-solid fa-trash-can'></i></button>",
        data: null
      }],

      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
      },
    });
    $('#borrar_b').click(function() {
      /*     $("#FormularioArticulo").modal('hide'); */
      let registro = recuperarDatosFormulario();
      borrarReg(registro);
    });

    $('#ConfirmarModificar').click(function() {
      $("#FormularioArticulo").modal('hide');
      let registro = recuperarDatosFormulario();
      modificarRegistro(registro);
    });

    $('#table_admin tbody').on('click', 'button.botonmodificar', function() {
      $('#ConfirmarAgregar').hide();
      $('#ConfirmarModificar').show();
      let registro = tabla1.row($(this).parents('tr')).data();
      recuperarRegistro(registro.id);
    });

    $('#table_admin tbody').on('click', 'button.botonfoto', function() {
      /* $('#ConfirmarAgregar').hide(); */
      $('#ConfirmarModificar').show();
      let registro = tabla1.row($(this).parents('tr')).data();
      recuperarRegistro(registro.id);
    });


    $('#table_admin tbody').on('click', 'button.botonborrar', function() {
      Swal.fire({
        title: 'Borrar',
        text: "seguro que deseas elimnarlo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#740101',
        cancelButtonColor: '#DFBA49',
        confirmButtonText: 'Si borrar!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'registro borrado exitosamente',
            showConfirmButton: false,
            timer: 1500
          })
          let registro = tabla1.row($(this).parents('tr')).data();
          borrarRegistro(registro.id)
        }
      })

      /* if (confirm("¿Realmente quiere borrar el registro?")) {
        let registro = tabla1.row($(this).parents('tr')).data();
        borrarRegistro(registro.id);
      } */
    });

    /*============ === === === === */
    /*   function limpiarFormulario() {
        $('#id').val('');
        $('#nombre').val('');
        $('#apellido').val('');
        $('#correo').val('');
        .
        $('#redes').val('');
        $('#puesto').val('');
        $('#descripcion').val('');

      } */

    function recuperarDatosFormulario() {
      let registro = {
        id: $('#ID').val(),
        nombre: $('#Nombre').val(),
        apellido: $('#Apellido').val(),
        correo: $('#Correo').val(),
        redes: $('#Redes').val(),
        puesto: $('#Puesto').val(),
        descripcion: $('#Descripcion').val()

      };
      return registro;
    }


    /* Borarr registro */
    function borrarRegistro(id) {
      $.ajax({
        type: 'GET',
        url: 'datos.php?accion=borrar&id=' + id,
        data: '',
        success: function(msg) {
          tabla1.ajax.reload();
        },
        error: function() {
          alert("Hay un problema");
        }
      });
    }

    function borrarReg() {
      $.ajax({
        type: 'GET',
        url: 'datos.php?accion=elimina',
        data: '',
        success: function(msg) {
          tabla1.ajax.reload();
        },
        error: function() {
          alert("Hay un problema");
        }
      });
    }

    function recuperarRegistro(id) {
      $.ajax({
        type: 'GET',
        url: 'datos.php?accion=consultar&id=' + id,
        data: '',
        success: function(datos) {
          $('#ID').val(datos[0].id);
          $('#Nombre').val(datos[0].nombre);
          $('#Apellido').val(datos[0].apellido);
          $('#Correo').val(datos[0].correo);
          $('#Redes').val(datos[0].redes);
          $('#Puesto').val(datos[0].puesto);
          $('#Descripcion').val(datos[0].descripcion);
          $("#FormularioArticulo").modal('show');
        },
        error: function() {
          alert("Hay un problema");
        }
      });
    }

    function modificarRegistro(registro) {
      $.ajax({
        type: 'POST',
        url: 'datos.php?accion=modificar&id=' + registro.id,
        data: registro,
        success: function(msg) {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Registro Mdificado',
            showConfirmButton: false,
            timer: 1500
          })
          tabla1.ajax.reload();
        },
        error: function() {
          alert("Hay un problema");
          print_r("mod", modificarRegistro());

        }
      });

    }
  });
  </script>
</body>

</html>
<!-- composer require phpoffice/phpspreadsheet --ignore-platform-req=ext-gd -->