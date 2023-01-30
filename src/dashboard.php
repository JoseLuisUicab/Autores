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
    <div class="container-fluid">
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
              <form method="post" enctype="multipart/form-data" id="cargar_datos">
                <div class="row">
                  <div class="col-lg-10">
                    <input type="file" name="filedatos" id="filedatos" class="form-control" accept=".csv,.xlsx,.xls">
                  </div>
                  <div class=" col-lg-2">
                    <input type="submit" value="Cargar Excel" class="btn btn-primary" id="btnCargar">
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>

    </div>

  </section>

  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <!--   <script src="../Scrip/Scrip.js"></script> -->
  <script src="https://kit.fontawesome.com/59df0bc859.js" crossorigin="anonymous"></script>
  <script>
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
  </script>



</body>

</html>