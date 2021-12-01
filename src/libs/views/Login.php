<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <title></title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
          <img src="assets/img/assembler_logo.jfif" width="30" height="30" class="d-inline-block align-top" alt="" />
        </a>
      </nav>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <button class="btn btn-outline-success my-2 my-sm-0">
            <a href="">Sign Up</a>
          </button>
        </form>
      </div>
    </nav>
  </header>

  <div class="container mt-5">
    <div class="d-flex justify-content-center h-100">
      <div class="card-header ml-5">
        <div class="justify-content-center">
          <h3>Sign In</h3>
        </div>
        <form action="../../../test.php" class="px-4 py-3" method="POST">
          <div class="form-group">
            <label for="exampleDropdownFormEmail1">Email address</label>
            <input name="loginMail" type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com" />
          </div>
          <div class="form-group">
            <label for="exampleDropdownFormPassword1">Password</label>
            <input name="loginPassword" type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" />
          </div>
          <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
        <div class="dropdown-divider"></div>
      </div>
    </div>
  </div>
  <?php

  echo $error_message;

  if (isset($_GET['error'])) {
    if ($_GET['error'] == "invaliAuth") {
      echo "<div class='alert alert-danger'> <h3> You don't have permission to enter the dashboard. Please Login.</h3></div>";
      unset($_GET['error']);
    }
  }
  if (isset($_GET['error'])) {
    if ($_GET['error'] == "autoLogout") {
      echo "<div class='alert alert-danger'> <h3> The session has expired due to user inactivity.</h3></div>";
      unset($_GET['error']);
    }
  }
  ?>
  <!-- <footer class="bg-dark text-center text-white fixed-bottom">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      ©
      <?= date("Y") ?>
      Copyright: Sergi and Andrecito
    </div>
  </footer> -->
</body>

</html>