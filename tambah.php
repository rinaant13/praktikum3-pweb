<?php
require 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim   = trim($_POST['npm']);
    $nama  = trim($_POST['nama']);
    $jurusan = trim($_POST['jurusan']);

    $sql  = "INSERT INTO mahasiswa (npm, nama, jurusan) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$nim, $nama, $jurusan])) {
        header("Location: mahasiswa.php?success=1");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa — AkademiDB</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <div class="nav-logo">
        <span class="logo-icon">◈</span>
        <span>AkademiDB</span>
    </div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="mahasiswa.php">Data Mahasiswa</a></li>
        <li><a href="about.php">Tentang Saya</a></li>
    </ul>
    <button class="nav-hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
    </button>
    <div class="nav-right"><button class="theme-toggle" title="Toggle tema"><span class="icon-sun">☀️</span><span class="icon-moon">🌙</span></button><a href="mahasiswa.php" class="nav-cta">← Kembali</a></div>
</nav>

<div class="form-page">
    <div class="form-card">
        <div class="form-card-header">
            <div style="font-size: 40px; margin-bottom: 16px;">➕</div>
            <h2>Tambah Mahasiswa</h2>
            <p>Isi form di bawah untuk menambahkan data mahasiswa baru ke sistem</p>
        </div>

        <form method="POST" action="">
            <div class="form-group">
                <label>NIM / NPM</label>
                <input type="text" name="npm" required placeholder="Contoh: 247006111033" value="<?= htmlspecialchars($_POST['npm'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" required placeholder="Contoh: Rina Natalia" value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Jurusan / Program Studi</label>
                <input type="text" name="jurusan" required placeholder="Contoh: Informatika" value="<?= htmlspecialchars($_POST['jurusan'] ?? '') ?>">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">💾 Simpan Data</button>
                <a href="mahasiswa.php" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>

<script src="main.js"></script>
</body>
</html>