<?php
require 'connection.php';
$id   = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    header("Location: mahasiswa.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm     = trim($_POST['npm']);
    $nama    = trim($_POST['nama']);
    $jurusan = trim($_POST['jurusan']);
    $sql     = "UPDATE mahasiswa SET npm = ?, nama = ?, jurusan = ? WHERE id = ?";
    $stmt    = $pdo->prepare($sql);
    if ($stmt->execute([$npm, $nama, $jurusan, $id])) {
        header("Location: mahasiswa.php?success=updated");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa — AkademiDB</title>
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
            <div style="font-size: 40px; margin-bottom: 16px;">✏️</div>
            <h2>Edit Mahasiswa</h2>
            <p>Perbarui data mahasiswa <strong style="color: var(--accent);"><?= htmlspecialchars($data['nama']) ?></strong></p>
        </div>

        <!-- Current info card -->
        <div style="background: rgba(108,99,255,0.06); border: 1px solid rgba(108,99,255,0.15); border-radius: 12px; padding: 14px 16px; margin-bottom: 28px; display: flex; gap: 16px; flex-wrap: wrap;">
            <div>
                <div style="font-size: 11px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em;">NIM Saat Ini</div>
                <div style="font-size: 14px; color: var(--accent); font-weight: 500;"><?= htmlspecialchars($data['npm']) ?></div>
            </div>
            <div>
                <div style="font-size: 11px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em;">Jurusan</div>
                <div style="font-size: 14px; color: var(--accent-3); font-weight: 500;"><?= htmlspecialchars($data['jurusan']) ?></div>
            </div>
        </div>

        <form method="POST" action="">
            <div class="form-group">
                <label>NIM / NPM</label>
                <input type="text" name="npm" required value="<?= htmlspecialchars($data['npm']) ?>">
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" required value="<?= htmlspecialchars($data['nama']) ?>">
            </div>
            <div class="form-group">
                <label>Jurusan / Program Studi</label>
                <input type="text" name="jurusan" required value="<?= htmlspecialchars($data['jurusan']) ?>">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">🔄 Update Data</button>
                <a href="mahasiswa.php" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>

<script src="main.js"></script>
</body>
</html>