<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum PHP</title>
</head>
<body>
<h1>Belajar PHP</h1>

<?php
echo "<p>PHP berhasil dijalankan.</p>";
echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";

/* ===== EKSPERIMEN 3: function format Rupiah (dipakai di banyak tempat) ===== */
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}
?>

<?php
/* ===== Nilai mahasiswa + EKSPERIMEN 1: rata-rata ===== */
$nama = "Siti";
$tugas = 90;
$uts = 98;
$uas = 90;

$nilaiAkhir = ($tugas * 0.25) + ($uts * 0.30) + ($uas * 0.30);

// Eksperimen 1: rata-rata dari tiga komponen nilai
$rataRata = ($tugas + $uts + $uas) / 3;

if ($nilaiAkhir >= 85) {
    $predikat = "A";
} elseif ($nilaiAkhir >= 75) {
    $predikat = "B";
} elseif ($nilaiAkhir >= 60) {
    $predikat = "C";
} else {
    $predikat = "D";
}

echo "Nama: " . htmlspecialchars($nama) . "<br>";
echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
echo "Rata-rata (tugas, UTS, UAS): " . number_format($rataRata, 2) . "<br>";
echo "Predikat: " . $predikat;
?>

<?php
$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fikri", "Gita"];

echo "<h3>Daftar Mahasiswa</h3><ol>";
foreach ($mahasiswa as $namaMhs) {
    echo "<li>" . htmlspecialchars($namaMhs) . "</li>";
}
echo "</ol>";
?>

<?php
function hitungDiskon($harga, $persen) {
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}

$hargaAkhir = hitungDiskon(150000, 10);
// Eksperimen 3: pakai formatRupiah()
echo "Harga setelah diskon: " . formatRupiah($hargaAkhir) . "<br><br>";

function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}
echo "Luas persegi panjang: " . hitungLuasPersegiPanjang(10, 5) . "<br>";

function cekKelulusan($nilai) {
    return ($nilai >= 75) ? "Lulus" : "Tidak Lulus";
}
echo "Status siswa: " . cekKelulusan(80) . "<br>";
?>

<!-- ===== EKSPERIMEN 2: pencarian nama dari array ===== -->
<h3>Cari Mahasiswa</h3>
<form method="GET" action="">
    <label for="kata">Kata kunci:</label>
    <input id="kata" name="kata" type="text">
    <button type="submit">Cari</button>
</form>
<?php
if (isset($_GET["kata"])) {
    $kata = trim($_GET["kata"]);
    echo "Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8") . "<br>";

    if ($kata === "") {
        echo "<p>Masukkan kata kunci terlebih dahulu.</p>";
    } else {
        // stripos = pencarian tanpa membedakan huruf besar/kecil
        $hasilCari = array_filter($mahasiswa, function ($n) use ($kata) {
            return stripos($n, $kata) !== false;
        });

        if (count($hasilCari) > 0) {
            echo "<p>Ditemukan " . count($hasilCari) . " nama:</p><ul>";
            foreach ($hasilCari as $n) {
                echo "<li>" . htmlspecialchars($n, ENT_QUOTES, "UTF-8") . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Nama tidak ditemukan.</p>";
        }
    }
}
?>

<h3>Form Nama &amp; Program Studi</h3>
<form method="POST" action="">
    <label for="nama">Nama:</label>
    <input id="nama" name="nama" type="text" required>

    <label for="prodi">Program Studi:</label>
    <input id="prodi" name="prodi" type="text" required>

    <button type="submit" name="kirim">Kirim Data</button>
</form>

<?php
// isset($_POST["kirim"]) supaya hanya jalan saat form ini yang dikirim
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["kirim"])) {
    $namaForm = trim($_POST["nama"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");

    if ($namaForm === "" || $prodi === "") {
        echo "<p>Semua kolom wajib diisi.</p>";
    } else {
        echo "<h3>Data diterima</h3>";
        echo "Nama: " . htmlspecialchars($namaForm, ENT_QUOTES, "UTF-8") . "<br>";
        echo "Program Studi: " . htmlspecialchars($prodi, ENT_QUOTES, "UTF-8");
    }
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["hitung"])) {
    $barang = trim($_POST["barang"] ?? "");
    $hargaInput = $_POST["harga"] ?? "";
    $jumlahInput = $_POST["jumlah"] ?? "";

    if (
        $barang === "" ||
        !is_numeric($hargaInput) ||
        !ctype_digit((string)$jumlahInput) ||
        (float)$hargaInput < 0 ||
        (int)$jumlahInput < 1
    ) {
        $error = "Periksa kembali nama barang, harga, dan jumlah.";
    } else {
        $subtotal = (float)$hargaInput * (int)$jumlahInput;
    }
}
?>

<h3>Hitung Subtotal</h3>
<form method="POST">
    <label>
        Nama barang
        <input name="barang" required>
    </label>

    <label>
        Harga
        <input name="harga" type="number" min="0" step="0.01" required>
    </label>

    <label>
        Jumlah
        <input name="jumlah" type="number" min="1" step="1" required>
    </label>

    <button type="submit" name="hitung">Hitung</button>
</form>

<?php
if (isset($error)) {
    echo "<p>" . htmlspecialchars($error) . "</p>";
} elseif (isset($subtotal)) {
    echo "<p>Barang: " . htmlspecialchars($barang) . "</p>";
    echo "<p>Subtotal: " . formatRupiah($subtotal) . "</p>";   // Eksperimen 3
}
?>

</body>
</html>