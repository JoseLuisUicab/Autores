<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/Destock.css">
  <link rel="stylesheet" href="../src/style.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--   <meta http-equiv="refresh" content="2"> -->
  <title>Document</title>
</head>

<body>
  <section class="content">
    <h1 class="fw-bold text-center bg-primary p-2" style="color:#DFBA49;">Administrador</h1>
    <div class="container-fluid my-4">

      <!--  caja para subir -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Seleccionar archivo excel o CSV</h3>
              <div class="card-tools">
                <!--    <button type="button" class="btn btn-primary" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button> -->

              </div>
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data" id="cargar_datos" onsubmit="Cargarexcel(e)">
                <div class="row">
                  <div class="col-lg-10">
                    <input type="file" name="txt_archivo" id="txt_archivo" class="form-control"
                      accept=".csv,.xlsx,.xls">
                  </div>
                  <div class=" col-lg-2">
                    <!-- <input type="submit" value="Cargar Excel" class="btn btn-primary" id="btnCargar"> -->
                    <button type="submit" class="btn btn-primary">Importar excel</button>
                  </div>

                </div>
              </form>
            </div>

          </div>
        </div>
      </div>

    </div>
    <br><br><br><br>

    <div class="container-fluid">
      <table class="table" id="table_admin">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">Correo</th>
            <th scope="col">Puesto</th>
            <th scope="col">Descripcion</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>


  </section>

  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <!--   <script src="../Scrip/Scrip.js"></script> -->
  <script src="https://kit.fontawesome.com/59df0bc859.js" crossorigin="anonymous"></script>

  <script>
  $('input[type="file"]').on('change', function() {
    var ext = $(this).val().split('.').pop();
    if ($(this).val() != '') {
      if (ext == "xls" || ext == "xlsx" || ext == "csv") {} else {
        $(this).val('');
        Swal.fire("Mensaje De Error", "Extensión no permitida: " + ext + "", "error");
      }
    }
  });

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
  const Cargarexcel = async (e) => {
    e.prevenDefault();
    let archivo = document.getElementById("txt_archivo");
    let import_files = archivo.value;
    if (archivo.length == 0) {
      return Swal.fire("mensaje de advertencia", "seleccione un archivo", "warning");
    }
    let formdata = new FormData();
    let excel = archivo.files[0];
    formdata.append("excel", excel)
    const res = await $.ajax({
      type: "POST",
      url: importa.php,
      data: formdata,
      succes: function(data) {
        Swal.fire({
          icon: 'success',
          title: 'correct',
          text: 'archivo excel cargado correctamente',
        })
      },
      error: function(xhr, status) {

      }


    });
    return true;
  }
  /*  function Cargarexcel() {
     let archivo = document.getElementById("txt_archivo").value;
     if (archivo.length == 0) {
       return Swal.fire("mensaje de advertencia", "seleccione un archivo", "warning");
     }
     let formdata = new FormData();
     let excel = $("#txt_archivo")[0].files[0];
     formdata.append("archivoexcel", excel);
     $.ajax({
       url: "importa_excel_ajax.php",
       type: "POST",
       data: formdata,
       contentType: false,
       processData: false,
       success: function(resp) {
         $("#div_tabla").html(resp);
       }
     });
     return false;
   } */
  /*  let excel = $("txt_archivo").val()
   if (excel === "") {
     Swal.fire("Mensaje de Advertencia", "Seleccionar un rachivo excel" + extFile + "warning");
     document.getElementById("txt_archivo").value = "";
     return;
   } */
  </script>
  <!-- <script>
  $(document).ready(function() {
    $("#cargar_datos").on("submit", function(e) {
      e.preventDefault();

      /*       validar campo vacion */
      if ($("#filedatos").get(0).files.length == 0) {
        Swal.fire({
          position: "center",
          icon: "warning",
          title: "debe seleccionar un archivo antes de cargar",
          showConfirmButton: false,
          timer: 2500
        })
      } else {
        /* validar archivo qie sea el formatp */
        var validoex = [".xls", ".xlsx", ".csv"];
        var input_file_datos = $("#filedatos");
        var exp_reg = new RegExp("([a-zA-Z0-9\s_\\-.\:])+(" +
          validoex.join("|") + ")$");
        if (!exp_reg.test(input_file_datos.val().toLowerCase())) {
          Swal.fire({
            position: "center",
            icon: "warning",
            title: "debe seleccionar archivos con extension xls. xlsx, CSV",
            showConfirmButton: false,
            timer: 2500
          })
          return false;
        }
        var datos = new FormData($("#cargar_datos")[0]);
        /*  $("#btnCargar").prop("disabled", true); */
        $.ajax({
          url: "importa.php",
          type: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            console.log("RES: ", data);

          }
        });

      }
    })
  })
  </script> -->



</body>

</html>