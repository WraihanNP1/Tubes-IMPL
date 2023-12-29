<?php
$conn = mysqli_connect("localhost", "root", "", "tiketkereta");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function daftar($data)
{
    global $conn;
    

    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $confirm_password = mysqli_real_escape_string($conn, $data["confirm_password"]);

    //cek username sudah ada / belum
    $result = mysqli_query($conn, "SELECT email FROM user WHERE
        email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script> 
            alert('email yang dipilih sudah terdaftar!')
            </script>";
        return false;
    }
    if (strlen($password) < 8) {
        echo "<script>
        alert( 'password minimal 8 karakter!');
        </script>";
        return false;
    }

    // cek password
    if ($password !== $confirm_password) {
        echo "<script>
        alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //menambahkan userbaru ke data base
    mysqli_query($conn, "INSERT INTO user VALUES('', '$email', '$password')");

    return mysqli_affected_rows($conn);
    
}

