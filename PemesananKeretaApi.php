<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "tiketkereta");

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST["id"]) ? $_POST["id"] : null;
    $nama = isset($_POST["nama"]) ? $_POST["nama"] : null;
    $stasiun_keberangkatan = isset($_POST["stasiun_keberangkatan"]) ? $_POST["stasiun_keberangkatan"] : null;
    $stasiun_tujuan = isset($_POST["stasiun_tujuan"]) ? $_POST["stasiun_tujuan"] : null;
    $kelas = isset($_POST["kelas"]) ? $_POST["kelas"] : null;
    $kereta = isset($_POST["kereta"]) ? $_POST["kereta"] : null;
    $tanggal_keberangkatan = isset($_POST["tanggal_keberangkatan"]) ? $_POST["tanggal_keberangkatan"] : null;
    $jam_keberangkatan = isset($_POST["jam_keberangkatan"]) ? $_POST["jam_keberangkatan"] : null;
    $jam_tiba = isset($_POST["jam_tiba"]) ? $_POST["jam_tiba"] : null;
    $jumlah_tiket = isset($_POST["jumlah_tiket"]) ? $_POST["jumlah_tiket"] : null;
    $total_harga = isset($_POST["total_harga"]) ? $_POST["total_harga"] : null;

    if (empty($nama)) {
        $errors[] = "Nama tidak boleh kosong.";
    }

    if (empty($stasiun_keberangkatan) || empty($stasiun_tujuan)) {
        $errors[] = "Stasiun keberangkatan dan tujuan tidak boleh kosong.";
    }

    if (!strtotime($tanggal_keberangkatan)) {
        $errors[] = "Format tanggal keberangkatan tidak valid.";
    }

    if (!is_numeric($jumlah_tiket) || $jumlah_tiket <= 0) {
        $errors[] = "Jumlah tiket harus berupa angka dan lebih dari 0.";
    }

    if (!is_numeric($total_harga) || $total_harga <= 0) {
        $errors[] = "Total harga harus berupa angka dan lebih dari 0.";
    }

    if (empty($errors)) {
        $hargaPerTiket = 0;
        $jamDatang = '';
        $jamTiba = '';

        switch ($kelas) {
            case "Ekonomi":
                $hargaPerTiket += 80000;
                break;
            case "Bisnis":
                $hargaPerTiket += 150000;
                break;
            case "Eksekutif":
                $hargaPerTiket += 300000;
                break;
        }

        switch ($kereta) {
            case "Argo Wilis":
                $hargaPerTiket += 350000;
                $jamDatang = '06:30';
                $jamTiba = '12:30';
                break;
            case "Argo Bromo Anggrek":
                $hargaPerTiket += 400000;
                $jamDatang = '07:00';
                $jamTiba = '14:00';
                break;
            case "Malabar":
                $hargaPerTiket += 250000;
                $jamDatang = '09:45';
                $jamTiba = '16:30';
                break;
            case "Taksaka":
                $hargaPerTiket += 500000;
                $jamDatang = '08:00';
                $jamTiba = '15:00';
                break;
            case "Bima":
                $hargaPerTiket += 450000;
                $jamDatang = '10:30';
                $jamTiba = '17:30';
                break;
            case "Turangga":
                $hargaPerTiket += 350000;
                $jamDatang = '12:15';
                $jamTiba = '19:00';
                break;
            case "Gajayana":
                $hargaPerTiket += 380000;
                $jamDatang = '14:00';
                $jamTiba = '21:00';
                break;
            case "Argo Lawu":
                $hargaPerTiket += 600000;
                $jamDatang = '16:45';
                $jamTiba = '23:30';
                break;
        }
        $total_harga = $hargaPerTiket * $jumlah_tiket;

        $insertQuery = "INSERT INTO pesankereta (id, nama, stasiun_keberangkatan, stasiun_tujuan, kelas, kereta, tanggal_keberangkatan, jam_keberangkatan, jam_kedatangan, jumlah_tiket, total_harga) VALUES ('id', '$nama', '$stasiun_keberangkatan', '$stasiun_tujuan', '$kelas', '$kereta', '$tanggal_keberangkatan', '$jam_keberangkatan', '$jamTiba', '$jumlah_tiket', '$total_harga')";
        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            echo "";
        } else {
            echo "" . mysqli_error($conn);
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pemesanan Tiket Kereta Api</title>
    <link rel="stylesheet" type="text/css" href="pemesanan.css">
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="logo.jpg" alt="">
            </div>
        </div>
    </header>

    <h1>Pemesanan Tiket Kereta Api</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label for="id">Id:</label>
        <input type="number" name="id" required>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>

        <label for="stasiun_keberangkatan">Stasiun Keberangkatan:</label>
        <select name="stasiun_keberangkatan" required>
            <option value="Bandung">Bandung</option>
            <option value="Jakarta">Jakarta</option>
            <option value="Yogyakarta">Yogyakarta</option>
            <option value="Surabaya">Surabaya</option>
            <option value="Malang">Malang</option>
            <option value="Solo">Solo</option>
            <option value="Semarang">Semarang</option>
            <option value="Cirebon">Cirebon</option>
        </select>

        <label for="stasiun_tujuan">Stasiun Tujuan:</label>
        <select name="stasiun_tujuan" required>
            <option value="Bandung">Bandung</option>
            <option value="Jakarta">Jakarta</option>
            <option value="Yogyakarta">Yogyakarta</option>
            <option value="Surabaya">Surabaya</option>
            <option value="Malang">Malang</option>
            <option value="Solo">Solo</option>
            <option value="Semarang">Semarang</option>
            <option value="Cirebon">Cirebon</option>
        </select>

        <label for="kelas">Kelas:</label>
        <select id="kelas" name="kelas" required>
            <option value="Ekonomi">Ekonomi</option>
            <option value="Bisnis">Bisnis</option>
            <option value="Eksekutif">Eksekutif</option>
        </select>

        <label for="kereta">Kereta:</label>
        <select id="kereta" name="kereta" required onchange="updateJam()">
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

        <label for="jam_keberangkatan">Jam Keberangkatan:</label>
        <input type="time" name="jam_keberangkatan" id="jam_keberangkatan" required>

        <label for="jam_kedatangan">Jam Kedatangan:</label>
        <input type="time" name="jam_kedatangan" id="jam_kedatangan" required>

        <label for="jumlah_tiket">Jumlah Tiket:</label>
        <input type="number" id="jumlah_tiket" name="jumlah_tiket" min="1" required>

        <label for="total_harga">Total Harga:</label>
        <input type="number" id="total_harga" name="total_harga" min="1" readonly>

        <input type="submit" name="submit" value="Pesan Tiket">
        <input type="reset" value="Reset">
        <input type="button" onclick="window.location.href='dasboard.html'" value="Menu Utama">
    </form>

    <script>
        document.getElementById("kelas").addEventListener("change", updateTotalHarga);
        document.getElementById("kereta").addEventListener("change", updateJam);
        document.getElementById("jumlah_tiket").addEventListener("input", updateTotalHarga);

        function updateTotalHarga() {
            var kelas = document.getElementById("kelas").value;
            var kereta = document.getElementById("kereta").value;
            var jumlah_tiket = parseFloat(document.getElementById("jumlah_tiket").value) || 0;

            var hargaPerTiket = 0;

            switch (kelas) {
                case "Ekonomi":
                    hargaPerTiket += 50000;
                    break;
                case "Bisnis":
                    hargaPerTiket += 100000;
                    break;
                case "Eksekutif":
                    hargaPerTiket += 150000;
                    break;
            }

            switch (kereta) {
                case "Argo Wilis":
                    hargaPerTiket += 20000;
                    break;
                case "Argo Bromo Anggrek":
                    hargaPerTiket += 30000;
                    break;
                case "Malabar":
                    hargaPerTiket += 25000;
                    break;
                case "Taksaka":
                    hargaPerTiket += 35000;
                    break;
                case "Bima":
                    hargaPerTiket += 40000;
                    break;
                case "Turangga":
                    hargaPerTiket += 45000;
                    break;
                case "Gajayana":
                    hargaPerTiket += 50000;
                    break;
                case "Argo Lawu":
                    hargaPerTiket += 55000;
                    break;
            }
            var total_harga = hargaPerTiket * jumlah_tiket;

            document.getElementById("total_harga").value = total_harga.toFixed(2);
        }

        function updateJam() {
            var kereta = document.getElementById("kereta").value;
            var jamKeberangkatan = "";
            var jamTiba = "";

            switch (kereta) {
                case "Argo Wilis":
                    jamKeberangkatan = "06:30";
                    jamTiba = "12:30";
                    break;
                case "Argo Bromo Anggrek":
                    jamKeberangkatan = "07:00";
                    jamTiba = "14:00";
                    break;
                case "Malabar":
                    jamKeberangkatan = "09:45";
                    jamTiba = "16:30";
                    break;
                case "Taksaka":
                    jamKeberangkatan = "08:00";
                    jamTiba = "15:00";
                    break;
                case "Bima":
                    jamKeberangkatan = "10:30";
                    jamTiba = "17:30";
                    break;
                case "Turangga":
                    jamKeberangkatan = "12:15";
                    jamTiba = "19:00";
                    break;
                case "Gajayana":
                    jamKeberangkatan = "14:00";
                    jamTiba = "21:00";
                    break;
                case "Argo Lawu":
                    jamKeberangkatan = "16:45";
                    jamTiba = "23:30";
                    break;
            }

            document.getElementById("jam_keberangkatan").value = jamKeberangkatan;
            document.getElementById("jam_kedatangan").value = jamTiba;

        }
    </script>
</body>
</html>
