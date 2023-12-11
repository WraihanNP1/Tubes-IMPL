<?php

require 'conection.php';

if (isset($_POST["daftar"])) {

    if (daftar($_POST) > 0 ) {
        echo "<script>
                    alert('user baru berhasil ditambahkan!');
                </script>";
    } else {
       echo mysqli_error($conn);
    } 
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Form Register</title>
    <link rel="stylesheet" href="login.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    <form action="" method="post" class="input-group">
        <div class="title">
            <b class="front">Daftar </b><b class="back">Akun</b>
        </div>
        <div class="form">
            <input type="text" name="email" required>
            <span data-placeholder="Masukkan Email"></span>
        </div>
        <div class="form">
            <input type="password" name="password" required>
            <span data-placeholder="Password"></span>
        </div>
        <div class="form">
            <input type="password" name="confirm_password" required>
            <span data-placeholder="Confirm Password"></span>
        </div>
        <button type="submit" name="daftar">Daftar</button>

        <p style="margin-top: 129px;">
            <small>Sudah mempunyai akun? login <a href="login.php">di sini</a></small>
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