<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styleHome.css">
  <link rel="stylesheet" href="css/styleCatalog.css">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,700,800&display=swap" rel="stylesheet">
  <title> Hassen Catalog - Online Store</title>
</head>
<body>
  <!-- NOTE: Inicia header -->
  <header>
    <?php require_once("header.php"); ?>
  </header>
  <!-- NOTE: fin header -->
  <?php  /*
  <div class="container-fluid ">
  <!-- NOTE: catalogo con cards -->
  <div id="deck-contenedor" class="card-deck m-2">
  <h2>Collares</h2>
  <div id="collares" class="row"><?php // NOTE: en catalogo esta grilla funciona como: 12/el nro de "col-medida-n°. Ej.: col-md-6 --> 12/6=2 objetos por fila" ?>

  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
  <div class="card mt-4">
  <img src="img\HassenAccesorios\collar-1.jpg" class="card-img-top" alt="Collar1">
  <div class="text-center card-body mt-1">
  <h5 class="card-title">Collar 1</h5>
  <p class="card-text">Material: Fantasía</p>
  <p class="card-text">$300</p>
  <p class="card-text">Efectivo/Mercado Pago</p>
  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  <a href="vistaProducto.php" class="btn btn-primary">Description</a>
  </div>
  </div>
  </div>
  </div><!-- NOTE: fin div row-collares -->
  </div><!-- NOTE: fin card-deck Collares -->*/
  ?>
  <div class="container-fluid">

    <h2>Collares</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 m-2">
      <div class="col mb-4">
        <div class="card text-center">
          <a href="vistaProducto.php"> <img src="img\HassenAccesorios\collar-1.jpg" class="card-img-top" alt="..."> </a>
          <div class="card-body">
            <h5 class="card-title">Collar 1</h5>
            <p class="card-text">Material: Fantasía</p>
            <p class="card-text">$300</p>
            <p class="card-text">Efectivo/Mercado Pago</p>
          </div>
        </div>
      </div>

      <div class="col mb-4">
        <div class="card text-center">
          <a href="vistaProducto.php"> <img src="img\HassenAccesorios\collar-2.jpg" class="card-img-top" alt="..."> </a>
          <div class="card-body">
            <h5 class="card-title">Collar 2</h5>
            <p class="card-text">Material: Fantasía</p>
            <p class="card-text">$300</p>
            <p class="card-text">Efectivo/Mercado Pago</p>
          </div>
        </div>
      </div>

      <div class="col mb-4">
        <div class="card text-center">
          <a href="vistaProducto.php"> <img src="img\HassenAccesorios\collar-3.jpg" class="card-img-top" alt="..."> </a>
          <div class="card-body">
            <h5 class="card-title">Collar 3</h5>
            <p class="card-text">Material: Fantasía</p>
            <p class="card-text">$300</p>
            <p class="card-text">Efectivo/Mercado Pago</p>
          </div>
        </div>
      </div>

    </div><!-- NOTE: fin div-row-collares -->

    <h2>Pulseras</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 m-2">
      <div class="col mb-4">
        <div class="card text-center">
          <a href="vistaProducto.php"> <img src="img\HassenAccesorios\pulsera-1.jpg" class="card-img-top" alt="..."> </a>
          <div class="card-body">
            <h5 class="card-title">Pulsera 1</h5>
            <p class="card-text">Material: Fantasía</p>
            <p class="card-text">$300</p>
            <p class="card-text">Efectivo/Mercado Pago</p>
          </div>
        </div>
      </div>

      <div class="col mb-4">
        <div class="card text-center">
          <a href="vistaProducto.php"> <img src="img\HassenAccesorios\pulsera-2.jpg" class="card-img-top" alt="..."> </a>
          <div class="card-body">
            <h5 class="card-title">Pulsera 2</h5>
            <p class="card-text">Material: Fantasía</p>
            <p class="card-text">$300</p>
            <p class="card-text">Efectivo/Mercado Pago</p>
          </div>
        </div>
      </div>

      <div class="col mb-4">
        <div class="card text-center">
          <a href="vistaProducto.php"> <img src="img\HassenAccesorios\pulsera-1.jpg" class="card-img-top" alt="..."> </a>
          <div class="card-body">
            <h5 class="card-title">Pulsera 3</h5>
            <p class="card-text">Material: Fantasía</p>
            <p class="card-text">$300</p>
            <p class="card-text">Efectivo/Mercado Pago</p>
          </div>
        </div>
      </div>

      <div class="col mb-4">
        <div class="card text-center">
          <a href="vistaProducto.php"> <img src="img\HassenAccesorios\pulsera-2.jpg" class="card-img-top" alt="..."> </a>
          <div class="card-body">
            <h5 class="card-title">Pulsera 4</h5>
            <p class="card-text">Material: Fantasía</p>
            <p class="card-text">$300</p>
            <p class="card-text">Efectivo/Mercado Pago</p>
          </div>
        </div>
      </div>

    </div><!-- NOTE: fin div-row -->

  </div><!-- NOTE: fin container-fluid -->

  <!-- NOTE: inicia footer -->
  <footer id="footer" class="mt-3 p-4">
    <?php require_once("footer.php"); ?>
  </footer>
  <!-- NOTE: fin footer -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

</body>
</html>
