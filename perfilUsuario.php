<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styleHome.css">
  <link rel="stylesheet" href="css/styleRegistration.css">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,700,800&display=swap" rel="stylesheet">
  <title> Majestic User Profile - Online Store</title>
</head>
<body>

  <!-- NOTE: Inicia header -->
  <header>
    <?php require_once("header.php"); ?>
  </header>
  <!-- NOTE: fin header -->

  <!-- NOTE: Inicia registracion -->
  <div class="container" >
    <div class="signup-form-container">
      <form role="form" id="register-form" autocomplete="off" action="registration.php" method="post">

        <div class="form-header">
          <h1 class="form-title mt-4 mb-4"><i class="fa fa-user"></i>My Profile</h1>
        </div>
        <div class="form-body">

          <div class="row" >
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="name" id="name" type="text" class="form-control" placeholder="Name">
              </div>
              <span class="help-block" id="error"></span>
            </div>
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="lastname" type="text" class="form-control" placeholder="Lastname">
              </div>
              <span class="help-block" id="error"></span>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="dni" id="dni" type="text" class="form-control" placeholder="DNI">
              </div>
              <span class="help-block" id="error"></span>
            </div>
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="phone" type="text" class="form-control" placeholder="Phone">
              </div>
              <span class="help-block" id="error"></span>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="ciudad" id="ciudad" type="text" class="form-control" placeholder="City">
              </div>
              <span class="help-block" id="error"></span>
            </div>
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="country" type="text" class="form-control" placeholder="Country">
              </div>
              <span class="help-block" id="error"></span>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
              <input name="name" type="text" class="form-control" placeholder="Username">
            </div>
            <span class="help-block" id="error"></span>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
              <input name="email" type="text" class="form-control" placeholder="Email">
            </div>
            <span class="help-block" id="error"></span>
          </div>
          <div class="row">
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="password" id="password" type="password" class="form-control" placeholder="Password">
              </div>
              <span class="help-block" id="error"></span>
            </div>
            <div class="form-group col-lg-6">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="cpassword" type="password" class="form-control" placeholder="Retype Password">
              </div>
              <span class="help-block" id="error"></span>
            </div>
          </div>
        </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-info">
            <span class="glyphicon glyphicon-log-in"></span> Edit Profile
          </button>
        </div>
      </form>
    </div>
  </div>

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
