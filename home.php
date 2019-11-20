<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>