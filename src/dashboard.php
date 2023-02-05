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
    <div class="d-flex justify-content-between align-items-center bg-primary">
      <figure class="maia1">
        <img src="../Imagenes/maia.png" alt="">
      </figure>
      <h1 class="fw-bold  p-2" style="color:#DFBA49;">Administrador</h1>
    </div>


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
            <input type="hidden" id="Codigo">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Descripción:</label>
                <input type="text" id="Descripcion" class="form-control" placeholder="">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Precio:</label>
                <input type="number" id="Precio" class="form-control" placeholder="">
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" id="ConfirmarAgregar" class="btn btn-success">Agregar</button>
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
  <script src="https://kit.fontawesome.com/59df0bc859.js" crossorigin="anonymous"></script>




  <script>
  document.getElementById("txt_archivo").addEventListener("change", () => {
    var filename = document.getElementById("txt_archivo").value;
    var idxDot = filename.indexOf(".") + 1;
    var extFile = filename.substring(idxDot, filename.length).toLowerCase();
    if (extFile == "xlsx" || extFile == "csv") {
      return;
    } else {
      Swal.fire("Mensaje De Error", "Extensión no permitida: " + ext + "", "error");
      document.getElementById("txt_archivo").value = "";
      return false;
    }
  });
  const Cargarexcel = async (event) => {
    event.preventDefault();
    let archivo = document.getElementById("txt_archivo");
    let import_files = archivo.value;
    if (import_files.length == 0) {
      return Swal.fire("mensaje de advertencia", "seleccione un archivo", "warning");
    } else {
      let formdata = new FormData();
      let excel = archivo.files[0];
      formdata.append("excel", excel)
      const res = await $.ajax({
        type: "POST",
        url: "importa.php",
        data: formdata,
        processData: false,
        contentType: false,
        succes: function(data) {
          Swal.fire({
            icon: 'success',
            title: 'correct',
            text: 'archivo excel cargado correctamente',
          })
        },
        error: function(xhr, status) {
          Swal.fire({
            icon: 'error',
            title: 'error',
            text: 'archivo excel no cargado',
          })
        }


      });
    }
    window.location.reload();

    return true;;
  }

  const getUser = async () => {
    const res = await fetch("obtener_datos.php");
    const json = await res.json();
    let template = ''
    for (let i = 0; i < json.length; i++) {
      template += `
      <tr>
      <td>${json[i].id}</td>
      <td>${json[i].nombre}</td>
      <td>${json[i].apellido}</td>
      <td>${json[i].correo}</td>
      <td>${json[i].redes}</td>
      <td>${json[i].puesto}</td>
      <td>${json[i].descripcion}</td>
      <td><button class='btn btn-sm btn-primary botonmodificar'>Modificar</button></td>
      <td><button class='btn btn-sm btn-secondary botonborrar'>Borrar</button></td>
      </tr>
      `
    }
    document.querySelector("#table_admin tbody").innerHTML = template;
  }
  getUser();



  /* Recuperar el registro*/

  /*======================== */
  $('#ConfirmarModificar').click(function() {
    $("#FormularioArticulo").modal('hide');
    let registro = recuperarDatosFormulario();
    modificarRegistro(registro);
  });

  $('#table_admin tbody').on('click', 'button.botonmodificar', function() {
    $('#ConfirmarAgregar').hide();
    $('#ConfirmarModificar').show();
    let registro = tabla1.row($(this).parents('tr')).data();
    recuperarRegistro(registro.codigo);
  });

  /*============ === === === === */
  function limpiarFormulario() {
    $('#Codigo').val('');
    $('#Descripcion').val('');
    $('#Precio').val('');
  }

  function recuperarDatosFormulario() {
    let registro = {
      codigo: $('#Codigo').val(),
      descripcion: $('#Descripcion').val(),
      precio: $('#Precio').val()
    };
    return registro;
  }

  function recuperarRegistro(codigo) {
    $.ajax({
      type: 'GET',
      url: 'datos.php?accion=consultar&id=' + id,
      data: '',
      success: function(datos) {
        $('#Codigo').val(datos[0].codigo);
        $('#Descripcion').val(datos[0].descripcion);
        $('#Precio').val(datos[0].precio);
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
      url: 'datos.php?accion=modificar&codigo=' + registro.codigo,
      data: registro,
      success: function(msg) {
        tabla1.ajax.reload();
      },
      error: function() {
        alert("Hay un problema");
      }
    });
  }





  /*FIN ecuperar el registro*/
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/59df0bc859.js" crossorigin="anonymous"></script>
</body>

</html>