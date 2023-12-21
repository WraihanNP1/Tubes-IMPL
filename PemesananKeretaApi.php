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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pemesanan Tiket Kereta Api</title>
    <style>
        body {
            text-align: center;
            background-color: #f2f2f2;
            background-image: url('');
            background-size: cover;
            background-position: center center;
        }

        h1 {
            color: #333;
        }

        form {
            text-align: left;
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 10px 0;
        }

        /* Navbar Styles */
        header {
            background-color: blue;
            padding: 10px 0;
        }

        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            color: white;
        }

        .logo {
            display: flex;
            align-items: center;
            border-radius: 50%; /* Membuat logo menjadi bulat */
            overflow: hidden; /* Memastikan logo tetap dalam bentuk bulat */
            width: 50px; /* Lebar logo */
            height: 50px; /* Tinggi logo */
        }

        .logo img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto; /* Membuat gambar berada di tengah */
            border-radius: 50%; 
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="logo.jpg" alt="" width="50px" height="50px">
            </div>
        </div>
    </header>

    <!-- Formulir pemesanan tiket -->
    <h1>Pemesanan Tiket Kereta Api</h1>
    <form method="post" action="">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>

        <label for="stasiun_keberangkatan">Stasiun Keberangkatan:</label>
        <input type="text" name="stasiun_keberangkatan" required>

        <label for="stasiun_tujuan">Stasiun Tujuan:</label>
        <input type="text" name="stasiun_tujuan" required>

        <label for="kelas">Kelas:</label>
        <select name="kelas" required>
            <option value="Ekonomi">Ekonomi</option>
            <option value="Bisnis">Bisnis</option>
            <option value="Eksekutif">Eksekutif</option>
        </select>

        <label for="kereta">Kereta:</label>
        <select name="kereta" required>
            <option value="Argo Wilis">Argo Wilis</option>
            <option value="Argo Bromo Anggrek">Argo Bromo Anggrek</option>
            <option value="Malabar">Malabar</option>
            <option value="Taksaka">Taksaka</option>
            <option value="Bima">Bima</option>
            <option value="Turangga">Turangga</option>
            <option value="Gajayana">Gajayana</option>
            <option value="Argo Lawu">Argo Lawu</option>
        </select>
        <label for="tanggal_keberangkatan">Tanggal Keberangkatan:</label>
        <input type="date" name="tanggal_keberangkatan" required>

        <label for="jumlah_tiket">Jumlah Tiket:</label>
        <input type="number" name="jumlah_tiket" min="1" required>

        <label for="Total_Harga">Total Harga:</label>
        <input type="text" name="Total_Harga" min="1" required>

        <input type="submit" value="Pesan Tiket">
        <input type="reset" value="Reset">
    </form>

    <!-- SVG wave -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="blue" fill-opacity="1"
            d="M0,32L80,64C160,96,320,160,480,160C640,160,800,96,960,74.7C1120,53,1280,75,1360,85.3L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
    </svg>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center pb-2">
        <p>Created By <a href="" class="text-white fw-bold" style="color: rgb(255, 255, 255);">Kelompok 2 IPL</a></p>
    </footer>

</body>

</html>
