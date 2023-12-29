<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

include "conection.php"; // Pastikan file connection.php di-include dengan benar

// ...
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
    <!-- Style dan tag head lainnya -->
</head>


<body>
<section id="jadwal">
        <div class="container">
            <div class="row text-center">
                <h2>Jadwal dan Rute Perjalanan</h2>
            </div>
        </div>
    </section>
    <section id="jadwal">
        <!-- Konten -->
    </section>

    <table class="table table-dark table-sm table table-bordered border-light">
        <thead>
            <!-- Header tabel -->
            <tr>
                <th scope="col">No</th>
                
                <th scope="col">Keberangkatan</th>
                <th scope="col">Stasiun Tujuan</th>
                <th scope="col">Kelas</th>
                <th scope="col">Kereta</th>
                <th scope="col">Tanggal Keberangkatan</th>
                <th scope="col">Jam Keberangkatan</th>
                <th scope="col">Jam Kedatangan</th>
            </tr>
        </thead>
        <div class="container button-center">
        <div class="row text-center">
            <a href="dasboard.php" style="text-decoration: none; color: #333;">
                <button style=" display: block; margin: 0 auto; padding: 10px 20px; font-size: 16px; background-color: #333; color: #fff; border: none; cursor: pointer;">Kembali ke Dashboard</button>
            </a>
        </div>
    </div>
        <tbody>
            <?php
            $id = 1;
            $data = mysqli_query($conn, "SELECT * FROM pesankereta"); // Ubah variabel $koneksi menjadi $conn
            while ($hasil = mysqli_fetch_assoc($data)) { // Menggunakan mysqli_fetch_assoc untuk mendapatkan array asosiatif
            ?>
                <tr>
                    <td><?php echo $id++; ?></td>
                    <td><?php echo $hasil['stasiun_keberangkatan']; ?></td>
                    <td><?php echo $hasil['stasiun_tujuan']; ?></td>
                    <td><?php echo $hasil['kelas']; ?></td>
                    <td><?php echo $hasil['kereta']; ?></td>
                    <td><?php echo $hasil['tanggal_keberangkatan']; ?></td>
                    <td><?php echo $hasil['jam_keberangkatan']; ?></td>
                    <td><?php echo $hasil['jam_kedatangan']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="container button-center">
        <!-- Tombol Kembali ke Dashboard -->
    </div>
</body>

</html>
