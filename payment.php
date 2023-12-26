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
    <link rel="stylesheet" type="text/css" href="style2.css">
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .resi,
            .resi * {
                visibility: visible;
            }

            .resi {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="logo.png" alt="">
            </div>
        </div>
    </header>

    <h1>Pemesanan Tiket Kereta Api</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $stasiun_keberangkatan = $_POST["stasiun_keberangkatan"];
        $stasiun_tujuan = $_POST["stasiun_tujuan"];
        $kelas = $_POST["kelas"];
        $kereta = $_POST["kereta"];
        $tanggal_keberangkatan = $_POST["tanggal_keberangkatan"];
        $jumlah_tiket = $_POST["jumlah_tiket"];
        $total_harga = $_POST["Total_Harga"];

        $nomor_resi = "RSI" . rand(1000, 9999);

        $pembayaran_berhasil = true;

        if ($pembayaran_berhasil) {
            echo '<div class="resi">';
            echo '<h2>Resi Pemesanan Tiket Kereta Api</h2>';
            echo '<p>Nomor Resi: ' . $nomor_resi . '</p>';
            echo '<p>Nama: ' . $nama . '</p>';
            echo '<p>Stasiun Keberangkatan: ' . $stasiun_keberangkatan . '</p>';
            echo '<p>Stasiun Tujuan: ' . $stasiun_tujuan . '</p>';
            echo '<p>Kelas: ' . $kelas . '</p>';
            echo '<p>Kereta: ' . $kereta . '</p>';
            echo '<p>Tanggal Keberangkatan: ' . $tanggal_keberangkatan . '</p>';
            echo '<p>Jumlah Tiket: ' . $jumlah_tiket . '</p>';
            echo '<p>Total Harga: ' . $total_harga . '</p>';
            echo '<input type="submit" onclick="printResi()">';
            echo '<input type="reset">';
            echo '</div>';
        }
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]); ?>">
    </form>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="blue" fill-opacity="1"
            d="M0,32L80,64C160,96,320,160,480,160C640,160,800,96,960,74.7C1120,53,1280,75,1360,85.3L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
    </svg>
    <footer class="bg-primary text-white text-center pb-2">
        <p>Created By <a href="" class="text-white fw-bold" style="color: red;">Kelompok 2 IPL</a></p>
    </footer>
    <script>
        function printResi() {
            var printContents = document.querySelector('.resi').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>
