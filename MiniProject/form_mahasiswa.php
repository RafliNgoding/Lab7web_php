<?php
$data = null;
$error = [];

// Eksperimen 4: aturan NIM (ubah angka ini sesuai ketentuan Anda)
$panjangNim = 10;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "");

    if ($nama === "") {
        $error[] = "Nama wajib diisi.";
    }

    // Eksperimen 4: NIM hanya angka dan panjang tepat $panjangNim digit
    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    } elseif (!ctype_digit($nim)) {
        $error[] = "NIM hanya boleh berisi angka.";
    } elseif (strlen($nim) !== $panjangNim) {
        $error[] = "NIM harus terdiri dari $panjangNim digit.";
    }

    if ($prodi === "") {
        $error[] = "Program studi wajib diisi.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }

    if (
        !ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 ||
        (int)$semesterInput > 14
    ) {
        $error[] = "Semester harus berupa angka 1-14.";
    }

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Data Mahasiswa</title>
</head>
<body>

    <h2>Formulir Data Mahasiswa</h2>

    <form method="POST" action="">

        <label>Nama:</label>
        <input type="text" name="nama" required>
        <br><br>

        <label>NIM:</label>
        <!-- validasi sisi browser; validasi sebenarnya tetap di PHP -->
        <input type="text" name="nim"
               pattern="[0-9]{<?= $panjangNim ?>}"
               maxlength="<?= $panjangNim ?>"
               title="NIM harus <?= $panjangNim ?> digit angka" required>
        <br><br>

        <label>Program Studi:</label>
        <input type="text" name="prodi" required>
        <br><br>

        <label>Semester:</label>
        <input type="number" name="semester"
               min="1" max="14" step="1" required>
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" required>
        <br><br>

        <button type="submit">Kirim Data</button>
        <!-- Eksperimen 5: tombol reset -->
        <button type="reset">Reset</button>

    </form>

    <?php
    if ($error) {
        echo "<h3>Terjadi Kesalahan:</h3>";
        foreach ($error as $pesan) {
            echo "<p>" . htmlspecialchars($pesan, ENT_QUOTES, "UTF-8") . "</p>";
        }
    }

    if (isset($data)) {
        echo "<h3>Data Mahasiswa Diterima</h3>";
        echo "<p>Nama: " . htmlspecialchars($data["nama"], ENT_QUOTES, "UTF-8") . "</p>";
        echo "<p>NIM: " . htmlspecialchars($data["nim"], ENT_QUOTES, "UTF-8") . "</p>";
        echo "<p>Program Studi: " . htmlspecialchars($data["prodi"], ENT_QUOTES, "UTF-8") . "</p>";
        echo "<p>Semester: " . htmlspecialchars((string)$data["semester"], ENT_QUOTES, "UTF-8") . "</p>";
        echo "<p>Email: " . htmlspecialchars($data["email"], ENT_QUOTES, "UTF-8") . "</p>";
    }
    ?>

</body>
</html>