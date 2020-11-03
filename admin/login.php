<?php
include '../config.php';

session_start();

if (isset($_POST["login"])) {

  $email = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM admin WHERE email ='$email'");
  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    if (password_verify($password, $row["password"])) {

      // set session
      $_SESSION["login"] = true;
      $_SESSION['id'] = $row['id'];
      $user = $_SESSION['id'];
      // $sqlquery = query("SELECT * FROM content, user WHERE user.id = content.id_user AND content.id_user = '$user'");

      // foreach ($sqlquery as $key) {
      //   $_SESSION['fname']=$key['materi'];

      // }
      // $_SESSION['id_user'] = $cnt['id_user'];
      // cek remember me
      if (isset($_POST['remember'])) {
        // buat cookie
        setcookie('id', $row['id'], time() + 60);
        setcookie('key', hash('sha256', $row['email']), time() + 60);
      }

      header("Location: index.php");
      exit;
    }
  }

  $error = true;
}


// script register
if (isset($_SESSION['login'])) {
  if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
      echo "<script>
          alert('user baru berhasil ditambahkan!');
          </script>";
    } else {
      echo mysqli_error($conn);
    }
  }
} else {
  echo "<script>
          alert('Maaf anda tidak bisa mendaftar. Silahkan Login dengan akun Admin');
          </script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login & Register Akun</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <!-- Mixins-->
  <!-- Pen Title-->
  <div class="pen-title">
    <h1>Silahkan Login</h1>
  </div>
  <div class="rerun"><a href="../index.php">Back to WebSite</a></div>
  <div class="container">
    <div class="card"></div>
    <div class="card">
      <h1 class="title">Login</h1>

      <form method="POST" action>
        <div class="input-container">
          <input type="text" id="username" autocomplete="off" name="username" required="required" />
          <label for="username">E-mail</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" id="password" name="password" required="required" />
          <label for="#{label}">Password</label>
          <div class="bar"></div>
        </div>
        <div class="button-container">
          <button name="login" id="login"><span>Login</span></button>
        </div>
      </form>

    </div>
    <div class="card alt">
      <div class="toggle"></div>
      <h1 class="title">Register
        <div class="close"></div>
      </h1>

      <form action="login.php" method="POST">
        <div class="input-container">
          <input type="email" id="username" autocomplete="off" name="username" required="required" />
          <label for="username">E-mail</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" id="password1" name="password1" required="required" />
          <label for="password1">Password</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" id="password2" name="password2" required="required" />
          <label for="password2">Repeat Password</label>
          <div class="bar"></div>
        </div>
        <div class="button-container">
          <button type="submit" name="register"><span>Register</span></button>
        </div>
      </form>


    </div>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="./script.js"></script>

</body>

</html>