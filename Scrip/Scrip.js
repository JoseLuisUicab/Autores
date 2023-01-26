/* script validacion excel para la subida de archivo */
$('input[type="file"]').on('change', function () {
  var ext = $(this).val().split('.').pop();
  if ($(this).val() != '') {
    if (ext == "xls" || ext == "xlsx" || ext == "csv") {
    }
    else {
      $(this).val('');
      Swal.fire("Mensaje De Error", "Extensión no permitida: " + ext + "", "error");
    }
  }
});
/* fin code  */

function Cargarexcel() {
  var excel = $("txt_archivo").val()
  if (excel === "") {
    Swal.fire("Mensaje de Advertencia", "Seleccionar un rachivo excel", "warning")
    return;
  }
  var formdata = new FormData();
  var file = $("#txt_archivo")[0].file[0];
  formdata.append("archivoexcel", file);
  $.ajax({
    url: "importa_excel_ajax.php",
    type: "POST",
    data: formdata,
    contentType: false,
    processData: false,
    success: function (resp) {

    }



  })
}