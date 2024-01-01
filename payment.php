<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "tiketkereta");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pemesanan Tiket Kereta Api</title>
    <link rel="stylesheet" type="text/css" href="payment.css">
    <style>
        @media print {
            .back-button {
                display: none;
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Pemesanan Tiket Kereta Api</h1>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nama = $_POST["nama"];
                        $stasiun_keberangkatan = $_POST["stasiun_keberangkatan"];
                        $stasiun_tujuan = $_POST["stasiun_tujuan"];
                        $kelas = $_POST["kelas"];
                        $kereta = $_POST["kereta"];
                        $tanggal_keberangkatan = $_POST["tanggal_keberangkatan"];
                        $jumlah_tiket = $_POST["jumlah_tiket"];
                        $total_harga = $_POST["total_harga"];

                        $nomor_resi = "RSI" . rand(1000, 9999);

                        $pembayaran_berhasil = true;

                        if ($pembayaran_berhasil) {
                            $insertQuery = "INSERT INTO payment (nama, stasiun_keberangkatan, stasiun_tujuan, kelas, kereta, tanggal_keberangkatan, jumlah_tiket, total_harga, nomor_resi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                            $stmt = mysqli_prepare($conn, $insertQuery);

                            mysqli_stmt_bind_param($stmt, "ssssssiss", $nama, $stasiun_keberangkatan, $stasiun_tujuan, $kelas, $kereta, $tanggal_keberangkatan, $jumlah_tiket, $total_harga, $nomor_resi);

                            $result = mysqli_stmt_execute($stmt);

                            if ($result) {
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
                                echo '<input type="submit" onclick="printResi()" value="Cetak Resi">';
                                echo '<a href="PemesananKeretaApi.php" class="back-button">Kembali ke Pemesanan Tiket</a>';
                                echo '</div>';
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }

                            mysqli_stmt_close($stmt);
                        }
                    }
                    ?>
                </form>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="gray" fill-opacity="1"
                        d="M0,32L80,64C160,96,320,160,480,160C640,160,800,96,960,74.7C1120,53,1280,75,1360,85.3L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
                    </path>
                </svg>

                <footer class="bg-primary text-white text-center pb-2">
                    <p class="text-center">Created By <a href="" class="text-white fw-bold" style="color: red;">Kelompok 2 IPL</a></p>
                </footer>
            </div>
        </div>
    </div>

    <script>
        function printResi() {
            var printContents = document.querySelector('.resi').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;
        }

        function goToBookingPage() {
            window.location.href = "booking.php"; 
        }
    </script>
</body>

</html>

<?php
mysqli_close($conn);
?>
