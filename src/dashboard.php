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
  <section class="admin">
    <div class="ancho d-flex justify-content-center">
      <div class="card w-50">
        <h5 class="card-header">Importar excel o csv</h5>
        <div class="card-body">
          <div class="row">
            <form action="" enctype="multipart/form-data">
              <div class="col-lg-10-">
                <input type="file" id="txt_archivo" class="form-control" accept=".csv,.xlsx,.xls">
              </div>
              &nbsp; &nbsp; &nbsp;
              <div class="col-lg-4">
                <button class="btn btn-primary" onclick="Cargarexcel()">cargar excel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php  ?>
  </section>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="../Scrip/Scrip.js"></script>


</body>

</html>