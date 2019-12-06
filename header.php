<?php
session_start();
$user=null;

if(isset($_SESSION["email"])) {
  $user = $_SESSION["email"];
  // var_dump($_SESSION);
}
if (isset($_COOKIE["userName"])) {
  $user = $_COOKIE["userName"];
}

?>

<!-- NOTE: Inicia header -->
<script src="https://kit.fontawesome.com/46027ca747.js" crossorigin="anonymous"></script>
<!-- NOTE: Nav sacado de bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-darkblack">
  <a class="navbar-brand" href="home.php"> <img src="img/leon_logo.png" class="logo" alt="logo Majestic"> <span class="ml-3 pt-2">MAJESTIC</span> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php"> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="catalog.php"> Catalog <span class="sr-only">(current)</span></a>
      </li>
      <?php if (!isset($_SESSION["email"]) || !isset($_COOKIE["userName"])) : ?>
        <li class="nav-item active">
          <a class="nav-link" href="registration.php">Registration</a>
        </li>
      <?php endif;  ?>
      <li class="nav-item active">
        <a class="nav-link" href="myPurchase.php"> <i class="fas fa-cart-plus"></i> My purchase <span class="sr-only">(current)</span></a>
      </li>
      <?php if (!isset($_SESSION["email"]) || !isset($_COOKIE["userName"])) : ?>
        <li class="nav-item active">
          <a class="nav-link" href="login.php"> Login <span class="sr-only">(current)</span></a>
        </li>
      <?php endif;  ?>
      <li class="nav-item active">
        <a class="nav-link" href="faq.php">F.A.Q.</a>
      </li>

      <?php if (isset($_SESSION["email"]) || isset($_COOKIE["userName"])) :?>
        <li class="nav-item dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $user ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color:grey; width: 240px;">
            <a class="dropdown-item" href="perfilUsuario.php" style="color: white;font-weight: bolder;">Profile</a>
            <a class="dropdown-item" href="logout.php" style="color: white;font-weight: bolder;">Sign Out</a>
          </div>
        </li>
      <?php endif; ?>


    </ul>
  </div>
</nav>
<!-- NOTE: Fin nav -->
