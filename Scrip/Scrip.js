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

  return true;;
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

let tabla1 = $("#table_admin").DataTable({
  "ajax": {
    url: "datos.php?accion=listar",
    dataSrc: ""
  },
  "columns": [{
    "data": "id"
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
    "data": null,
    "orderable": false
  },
  {
    "data": null,
    "orderable": false
  }
  ],
  "columnDefs": [{
    targets: 7,
    "defaultContent": "<button class='btn  btn-primary botonmodificar'>Modificar</button>",
    data: null
  }, {
  targets: 8,
    "defaultContent": "<button class='btn btn-secondary botonborrar'>Borrar</button>",
    data: null
    }],
  "language": {
    "url": "DataTables/spanish.json",
  },
});
$('#ConfirmarModificar').click(function () {
  $("#FormularioArticulo").modal('hide');
  let registro = recuperarDatosFormulario();
  modificarRegistro(registro);
});

$('#table_admin tbody').on('click', 'button.botonmodificar', function () {
  $('#ConfirmarModificar').show();
  let registro = tabla1.row($(this).parents('tr')).data();
  recuperarRegistro(registro.id);
});


$('#table_admin tbody').on('click', 'button.botonborrar', function () {
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
      Swal.fire(
        'Borrado!',
        'registro borrado.',
        'success'
      )
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
function limpiarFormulario() {
  $('#id').val('');
  $('#nombre').val('');
  $('#apellido').val('');
  $('#correo').val('');
  $('#redes').val('');
  $('#puesto').val('');
  $('#descripcion').val('');
  
}

function recuperarDatosFormulario() {
  let registro = {
    id: $('#id').val(),
    nombre:$('#nombre').val(),
    apellido: $('#apellido').val(),
    correo:$('#correo').val(),
    redes:$('#redes').val(),
    puesto:$('#puesto').val(),
    descripcion: $('#descripcion').val()
  };
  return registro;
}

function recuperarRegistro(id) {
  $.ajax({
    type: 'GET',
    url: 'datos.php?accion=consultar&id=' + id,
    data: '',
    success: function (datos) {
      $('#id').val(datos[0].id);
      $('#nombre').val(datos[0].nombre);
      $('#apellido').val(datos[0].apellido);
      $('#correo').val(datos[0].correo);
      $('#redes').val(datos[0].redes);
      $('#puesto').val(datos[0].puesto);
      $('#descripcion').val(datos[0].descripcion);
      $("#FormularioArticulo").modal('show');
    },
    error: function () {
      alert("Hay un problema");
    }
  });
}

function modificarRegistro(registro) {
  $.ajax({
    type: 'POST',
    url: 'datos.php?accion=modificar&id=' + registro.id,
    data: registro,
    success: function (msg) {
      tabla1.ajax.reload();
    },
    error: function () {
      alert("Hay un problema");
    }
  });
}


/*FIN ecuperar el registro*/

/* Borarr registro */
function borrarRegistro(id) {
  $.ajax({
    type: 'GET',
    url: 'datos.php?accion=borrar&id=' + id,
    data: '',
    success: function (msg) {
      tabla1.ajax.reload();
    },
    error: function () {
      alert("Hay un problema");
    }
  });
}
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













