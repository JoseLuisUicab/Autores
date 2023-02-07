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
      succes: function (data) {
        Swal.fire({
          icon: 'success',
          title: 'correct',
          text: 'archivo excel cargado correctamente',
        })
      },
      error: function (xhr, status) {
        Swal.fire({
          icon: 'error',
          title: 'error',
          text: 'archivo excel no cargado',
        })
      }


    });
  }
  window.location.reload();

  return true;
}

/* const getUser = async () => {
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
getUser(); */



/* Recuperar el registro*/

/*======================== */

/* FIn borar registro */





/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
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
 } 


/* 
  < !-- < script >
  $(document).ready(function () {
    $("#cargar_datos").on("submit", function (e) {
      e.preventDefault();

      /*       validar campo vacion 
      if ($("#filedatos").get(0).files.length == 0) {
        Swal.fire({
          position: "center",
          icon: "warning",
          title: "debe seleccionar un archivo antes de cargar",
          showConfirmButton: false,
          timer: 2500
        })
      } else {
        /* validar archivo qie sea el formatp 
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
        /*  $("#btnCargar").prop("disabled", true); 
        $.ajax({
          url: "importa.php",
          type: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          success: function (data) {
            console.log("RES: ", data);

          }
        });

      }
    })
  })
  */













