<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <style>

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2, p {
            text-align: center; 
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin-bottom: 30px; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <header>
        <h1>Kereta Api Explore</h1>
    </header>
    <div class="container">
        <section id="about">
            <div class="row text-center">
                <h2>About</h2>
                <p>Kereta Api Explore adalah tempat di mana kenyamanan perjalanan kereta api Anda menjadi prioritas utama.
                    Platform pemesanan tiket kereta api ini didedikasikan untuk menyediakan pengalaman perjalanan yang mulus dan efisien.
                    Dengan menggunakan teknologi terkini, kami memastikan bahwa setiap langkah dalam proses pemesanan tiket kereta api menjadi mudah dan cepat.
                </p>
            </div>
            <div class="container button-center">
            <div class="row text-center">
            <a href="dasboard.php" style="text-decoration: none; color: #333;">
                <button style="display: block; margin: 0 auto; padding: 10px 20px; font-size: 16px; background-color: #333; color: #fff; border: none; cursor: pointer;">Kembali ke Dashboard</button>
            </a>
            </div>
        </div>
        </section>
</body>