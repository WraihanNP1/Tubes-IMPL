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
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        #jadwal {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            color: #000;
            text-align: center;
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
    <section id="jadwal">
        <div class="container">
            <div class="row text-center">
                <h2>Jadwal dan Rute Perjalanan</h2>
            </div>
        </div>
    </section>

    <table class="table table-dark table-sm table table-bordered border-light">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Rute Perjalanan</th>
                <th scope="col">Kelas Kereta</th>
                <th scope="col">Keberangkatan</th>
                <th scope="col">Tiba</th>
                <th scope="col">Kereta</th>
            </tr>
        </thead>
        <tbody>
        <td>1</td>
                <td>Jakarta - Surabaya</td>
                <td>Ekonomi - Bisnis - Eksekutif</td>
                <td>10:30 </td>
                <td>17:30 </td>
                <td>Bima</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Bandung - Yogyakarta</td>
                <td>Ekonomi - Bisnis - Eksekutif</td>
                <td>06:30</td>
                <td>12:30</td>
                <td>Argo Wilis</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Surabaya - Malang</td>
                <td>Ekonomi - Bisnis - Eksekutif</td>
                <td>07:00 </td>
                <td>14:00 </td>
                <td>Taksaka</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Jakarta - Semarang</td>
                <td>Ekonomi - Bisnis - Eksekutif</td>
                <td>14:00 </td>
                <td>21:00 </td>
                <td>Gajayana</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Yogyakarta - Solo</td>
                <td>Ekonomi - Bisnis - Eksekutif</td>
                <td>08:00 </td>
                <td>15:00 </td>
                <td>Taksaka</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Surabaya - Jakarta</td>
                <td>Ekonomi - Bisnis - Eksekutif</td>
                <td>15:00  </td>
                <td>23:30  </td>
                <td>Argo Bromo Anggrek</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Bandung - Jakarta</td>
                <td>Ekonomi - Bisnis - Eksekutiff</td>
                <td>08:30 </td>
                <td>11:30 </td>
                <td>Argo Lawu</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Yogyakarta - Malang</td>
                <td>Ekonomi - Bisnis - Eksekutif</td>
                <td>09:45 </td>
                <td>16:30 </td>
                <td>Malabar</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Semarang - Solo</td>
                <td>Ekonomi - Bisnis - Eksekutif</td>
                <td>10:30 </td>
                <td>12:30 </td>
                <td>Bima</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Semarang - Bandung</td>
                <td>Ekonomi - Bisnis - Eksekutif</td>
                <td>12:15 </td>
                <td>19:00 </td>
                <td>Turangga</td>
            </tr>
        </tbody>
    </table>
    <div class="container button-center">
        <div class="row text-center">
            <a href="dasboard.php" style="text-decoration: none; color: #333;">
                <button style=" display: block; margin: 0 auto; padding: 10px 20px; font-size: 16px; background-color: #333; color: #fff; border: none; cursor: pointer;">Kembali ke Dashboard</button>
            </a>
        </div>
    </div>
</body>

</html>
