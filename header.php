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
          <li class="nav-item active">
            <a class="nav-link" href="myPurchase.php"> <i class="fas fa-cart-plus"></i> My purchase <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="perfilUsuario.php">Perfil</a>
              <a class="dropdown-item" href="#">[....]</a>
              <a class="dropdown-item" href="#">[....]</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registration.php">Registration</a>
          </li>
          <!-- NOTE: modal de Login -->
          <li class="nav-item">

            <a class="nav-link active" href="#" data-toggle="modal" data-target="#modalLogin">Login</a>
            <div class="modal" id="modalLogin" tabindex="-1" role="dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleDropdownFormEmail2">Email address</label>
                    <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleDropdownFormPassword2">Password</label>
                    <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password">
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Log in</button>
                </div>
              </div>
            </div>

          </li>
          <!-- NOTE: termina modal de login -->
          <li class="nav-item">
            <a class="nav-link" href="faq.php">F.A.Q.</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- NOTE: Fin nav -->
