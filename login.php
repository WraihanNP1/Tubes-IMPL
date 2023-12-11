<?php

require 'conection.php';

if (isset($_POST["login"])) {

  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

  if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row["password"])) {
      header("location: dasboard.html");
      exit;
    } else {
      echo "<script>
        alert( 'password salah');
        </script>";
    }
  }
}

?>

<?php
// koneksi ke database
mysqli_connect("localhost", "root", "", "tiketkereta");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Form Login</title>
  <link rel="stylesheet" href="login.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
  <form action="" method="post" class="input-group">
    <div class="title">
      <b class="front">Tiket </b><b class="back">Kereta</b>
    </div>
    <div class="form">
      <input type="text" name="email" required>
      <span data-placeholder="Masukkan Email"></span>
    </div>
    <div class="form">
      <input type="password" name="password" required>
      <span data-placeholder="Password"></span>
    </div>
    <button type="submit" class="btn btn-warning" name="login">Masuk</button>

    <p style="margin-top: 200px;">
      <small>Belum mempunyai akun? register <a href="register.php">di sini</a></small>
    </p>
  </form>

  <script type="text/javascript">
    $(".form input").on("focus", function() {
      $(this).addClass("focus");
    });
    $(".form input").on("blur", function() {
      if ($(this).val() == "")
        $(this).removeClass("focus");
    });
  </script>

</body>

</html>