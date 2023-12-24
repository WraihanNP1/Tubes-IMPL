<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
}
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main>
        <div id="mysidebar" class="sidebar">
            <ul class="sidebar-navlink">
                <li>
                    <a href="#">
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="jadwalkereta.php">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Jadwal Kereta</span>
                    </a>
                </li>
                <li>
                    <a href="PemesananKeretaApi.php">
                        <i class="fa-solid fa-ticket"></i>
                        <span>Pesan Tiket</span>
                    </a>
                </li>
                </li>
                <li>
                    <a href="about.php">
                        <i class="fa-solid fa-list-check"></i>
                        <span>About</span>
                    </a>
                </li>
                <li>
                    <a href="login.php">
                        <i class="fa-solid fa-users"></i>
                        <span>Logouts</span>
                    </a>
                </li>
            </ul>
            <button onclick="toggleMneu()" id="toogleBtn" class="colleps-btn">
                <i class="fa-solid fa-angles-up"></i>
            </button>
        </div>
        <section>
            <div onclick="toggleDark()" class="toggle-dark-theme">
                <button>
                    <div class="sun icon"></div>
                </button>
            </div>
            <div class="content-page">

                <div>
                    <section class="jumbotron text-center">
                        <img src="logo.jpg" width="200" class="rounded-circle img-thumbnail">
                        <h1 class="text-center text-warning">Kereta Api Explore</h1>
                        <p class="text-center text-white">Platform pemesanan tiket online kereta api</p>
                        <p class="text-center text-white">“E-Tiket Kereta Api Explore”</p>
                        <a class="nav-link" href="PemesananKeretaApi.php"><button type="button"
                                class="btn btn-warning">Pesan
                                Sekarang!</button></a>

                </div>
            </div>
        </section>
    </main>
</body>
<script src="Theme.js"></script>

</html>