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
  <title> Majestic Home - Online Store</title>
</head>
<body>

  <!-- NOTE: Inicia header -->

  <header>
    <?php require_once("header.php"); ?>
  </header>

  <!-- NOTE: fin header -->


  <!-- NOTE: div jumbo PRESENTACION para describir quienes somos!-->
  <div class="jumbotron jumbotron-fluid mt-4">
    <div class="container">
      <h1 class="display-4">Majestic</h1>
      <p class="lead">Welcome to your online fashion store. You can explore among accessories and clothes to define the style that you like the most!</p>
    </div>
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
  <div class="card-deck">
    <div class="card mt-4">
      <img src="img/remera1.jpg" class="card-img-top" alt="remera1">
      <div class="card-body">
        <h5 class="card-title">T-shirt</h5>
        <p class="card-text">$$$ Algodon/Cuero/Promociones</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
    <div class="card mt-4">
      <img src="img/pantalon1.jpg" class="card-img-top" alt="pantalon1">
      <div class="card-body">
        <h5 class="card-title">Jean</h5>
        <p class="card-text">$$$ Algodon/Cuero/Promociones</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
    <div class="card mt-4">
      <img src="img/zapato1.jpg" class="card-img-top" alt="zapato1">
      <div class="card-body">
        <h5 class="card-title">Shoes</h5>
        <p class="card-text">$$$ Algodon/Cuero/Promociones</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
  <div class="card-deck">
    <div class="card mt-4">
      <img src="img/seccionHombre.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Shoes</h5>
        <p class="card-text">$$$ Algodon/Cuero/Promociones</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
    <div class="card mt-4">
      <img src="img/seccionMujer.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Shoes</h5>
        <p class="card-text">$$$ Algodon/Cuero/Promociones</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
    <div class="card mt-4">
      <img src="img/pantalon1.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Shoes</h5>
        <p class="card-text">$$$ Algodon/Cuero/Promociones</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
  <!-- NOTE: fin catalogo -->

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
