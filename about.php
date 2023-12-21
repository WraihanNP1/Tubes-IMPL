<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
}
    

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        #jadwal {
            text-align: center;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<section id="about">
    <div class="container">
        <div class="row text-center">
            <h2>About</h2>
            <p>Kereta Api Explore adalah tempat di mana kenyamanan perjalanan kereta api Anda menjadi prioritas utama. 
                Platform pemesanan tiket kereta api ini didedikasikan untuk menyediakan pengalaman perjalanan yang mulus dan efisien. 
                Dengan menggunakan teknologi terkini, kami memastikan bahwa setiap langkah dalam proses pemesanan tiket kereta api menjadi mudah dan cepat.
            </p>
        </div>
</section>
</body>