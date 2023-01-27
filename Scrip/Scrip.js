/* script validacion excel para la subida de archivo */
/* $('input[type="file"]').on('change', function () {
  var ext = $(this).val().split('.').pop();
  if ($(this).val() != '') {
    if (ext == "xls" || ext == "xlsx" || ext == "csv") {
    }
    else {
      $(this).val('');
      Swal.fire("Mensaje De Error", "Extensión no permitida: " + ext + "", "error");
    }
  }
}); */
/* fin code  */
document.getElementById("txt_archivo").addEventListener("change", () => {
  var filename = document.getElementById("txt_archivo").value;
  var idxDot = filename.indexOf(".") + 1;
  var extFile = filename.substring(idxDot, filename.length).toLowerCase();
  if (extFile == "xlsx" || extFile == "csv") {
    return;
  } else {
    Swal.fire("Mensaje De Error", "Extensión no permitida: " + ext + "", "error");
  }

});

function Cargarexcel() {
  let archivo = document.getElementById("txt_archivo").value;
  if (archivo.length ==0) { 
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
    success: function (resp) {
      $("#div_tabla").html(resp);
    }
  });
  return false;
  

 /*  let excel = $("txt_archivo").val()
  if (excel === "") {
    Swal.fire("Mensaje de Advertencia", "Seleccionar un rachivo excel" + extFile + "warning");
    document.getElementById("txt_archivo").value = "";
    return;
  }
   */
}