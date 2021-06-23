<?php
    session_start();
    require '../koneksi/koneksi.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Signin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/boxicons.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="" method="post">
    <span class="h3">
        <i class="bx bxs-t-shirt bx-border bx-tada-hover"></i>
        eClothing
    </span>
    <h1 class="h4 my-3 fw-normal">Sign in</h1>
    <?php
      if (isset($_GET['pesan'])) {
        echo "<div class='alert alert-danger'>".$_GET['pesan']."</div>";
      }
    ?>
    <div class="form-floating">
      <input type="text" class="form-control" name="username" placeholder="admin">
      <label>Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" placeholder="Password">
      <label>Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember" value="remember-me"> Remember me
      </label>
    </div>
    <input class="w-100 btn btn-lg btn-primary" type="submit" name="submit" value="Sign in">
    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
  </form>
</main>
    <?php
        if (isset($_POST['submit'])) {

            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $result = mysqli_query($conn, "SELECT * FROM login WHERE username='$username' AND password='$password'");
            $cek = mysqli_num_rows($result);
            if ($cek > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['login'] = TRUE;
                if (isset($_POST['remember'])) {
                    $time = time();
                    setcookie("login", $username, time()+3600);
                }
                header('Location: index.php');
                exit();
            } else {
              header('Location: login.php?pesan=Username atau password salah');
            }
        }
    ?>
  </body>
</html>
