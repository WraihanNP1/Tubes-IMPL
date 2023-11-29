<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai input dari formulir
    $email = $_POST["email"];
    $password = $_POST["password"];

    if($email != 'raihanpputra6@gmail.com'){
        echo 'login tidak berhasil';
    } else {
        echo 'login berhasil';
    }
}
