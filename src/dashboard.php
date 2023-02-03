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
  <!--  <nav class="navegacion">
    <figure class=logo><img src="../Imagenes/maia.png" alt=""></figure>

    <a href="#" id="menu" class="menu">
      <i class="icono fas fa-bars"></i>
    </a>
    <ul id="contenedormenu">
      <li><a href="#" class="btn_ancla">INICIO</a></li>
      <li><a href="#teamleader" class="btn_ancla">TEAM LEADER</a></li>
      <li><a href="#Desarrolladores" class="btn_ancla">DESARROLLADORES</a></li>
      <li><a href="Login.php" class="btn_ancla">ADMIN</a></li>
    </ul>
  </nav> -->

  <section class="content">
    <h1 class="fw-bold text-center bg-primary p-2" style="color:#DFBA49;">Administrador</h1>
    <div class="container-fluid my-4">

      <!-- caja para subir  -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Seleccionar archivo excel o CSV</h3>
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
            <th scope="col">Correo</th>
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
  </section>

  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <!--   <script src="../Scrip/Scrip.js"></script> -->
  <script src="https://kit.fontawesome.com/59df0bc859.js" crossorigin="anonymous"></script>




  <script>
  /*   $('input[type="file"]').on('change', function() {
    var ext = $(this).val().split('.').pop();
    if ($(this).val() != '') {
      if (ext == "xls" || ext == "xlsx" || ext == "csv") {} else {
        $(this).val('');
        Swal.fire("Mensaje De Error", "Extensión no permitida: " + ext + "", "error");
      }
    }
  });
 */

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

    /*  let excel = $("txt_archivo").val()
     if (excel === "") {
       Swal.fire("Mensaje de Advertencia", "Seleccionar un rachivo excel" + extFile + "warning");
       document.getElementById("txt_archivo").value = "";
       return;
     } */


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
      <td>${json[i
      ].id}</td>
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
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>

</html>