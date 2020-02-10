<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styleHome.css">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,700,800&display=swap" rel="stylesheet">
  <title> Hassen Home - Online Store</title>
</head>
<body>

  <!-- NOTE: Inicia header -->
  <header>
    <?php require_once("header.php"); ?>
  </header>
  <!-- NOTE: fin header -->

  <!-- NOTE: div jumbo PRESENTACION para describir quienes somos!-->
  <div class="container-fluid ">
    <div class="jumbotron jumbotron-fluid mt-4 pl-5 pr-5">
      <h1 class="display-4"> Hassen </h1>
      <p class="lead">Welcome to your online accessories store. We invite you to explore our unique designs, made by and for you!</p>
    </div>

    <!-- NOTE: fin jumbo PRESENTACION -->

    <!-- NOTE: Inicia carrusel -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/banner1.jpg" class="d-block w-100" alt="banner1">
        </div>
        <div class="carousel-item">
          <img src="img/banner2.jpg" class="d-block w-100" alt="banner2">
        </div>
        <div class="carousel-item">
          <img src="img/banner3.jpg" class="d-block w-100" alt="banner3">
        </div>
        <div class="carousel-item">
          <img src="img/banner4.jpg" class="d-block w-100" alt="banner4">
        </div>
        <div class="carousel-item">
          <img src="img/banner5.jpg" class="d-block w-100" alt="banner5">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- NOTE: Fin carrusel -->

    <!-- NOTE: catalogo con cards -->
    <?php // NOTE: en home la grilla funciona como: row-cols-md-3 --> 3 objetos por fila en pantallas con medida md. El numero indica literalmente cuantos productos entran por fila. Es mas mantenible que el de catalogo" ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 mt-2">

      <div class="col mb-4">
        <div class="card">
          <img src="img\HassenAccesorios\collar-1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
        </div>
      </div>

      <div class="col mb-4">
        <div class="card">
          <img src="img\HassenAccesorios\collar-2.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
        </div>
      </div>

      <div class="col mb-4">
        <div class="card">
          <img src="img\HassenAccesorios\collar-3.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
          </div>
        </div>
      </div>

      <div class="col mb-4">
        <div class="card">
          <img src="img\HassenAccesorios\collar-4.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
