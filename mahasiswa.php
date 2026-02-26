<?php
require 'connection.php';
$stmt = $pdo->query("SELECT * FROM mahasiswa ORDER BY id DESC");
$mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total = count($mahasiswa);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa — AkademiDB</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="nav-logo">
        <span class="logo-icon">◈</span>
        <span>AkademiDB</span>
    </div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="mahasiswa.php" class="active">Data Mahasiswa</a></li>
        <li><a href="about.php">Tentang Saya</a></li>
    </ul>
    <button class="nav-hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
    </button>
    <div class="nav-right"><button class="theme-toggle" title="Toggle tema"><span class="icon-sun">☀️</span><span class="icon-moon">🌙</span></button><a href="tambah.php" class="nav-cta">+ Tambah Data</a></div>
</nav>

<div class="page-container">
    <div class="page-header">
        <div class="page-title-group">
            <h1>Data Mahasiswa</h1>
            <p>Kelola seluruh data mahasiswa yang terdaftar di sistem</p>
        </div>
        <div class="search-box">
            <input type="text" id="searchInput" class="search-input" placeholder="🔍 Cari nama, NIM, jurusan...">
            <a href="tambah.php" class="btn-primary">+ Tambah</a>
        </div>
    </div>

    <div class="table-wrapper">
        <?php if (count($mahasiswa) > 0): ?>
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($mahasiswa as $row): ?>
                <tr>
                    <td style="color: var(--text-dim); font-size: 13px;"><?= $no++ ?></td>
                    <td><span class="nim-badge"><?= htmlspecialchars($row['npm']) ?></span></td>
                    <td>
                        <div style="font-weight: 500;"><?= htmlspecialchars($row['nama']) ?></div>
                    </td>
                    <td><span class="jurusan-badge"><?= htmlspecialchars($row['jurusan']) ?></span></td>
                    <td>
                        <div class="action-buttons">
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">✏️ Edit</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn-delete">🗑️ Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="table-footer">
            <span>Menampilkan <strong id="rowCount"><?= $total ?></strong> dari <strong><?= $total ?></strong> data</span>
            <span style="color: var(--accent);">● Database Aktif</span>
        </div>
        <?php else: ?>
        <div class="empty-state">
            <div class="empty-icon">📂</div>
            <h3>Belum Ada Data</h3>
            <p>Belum ada mahasiswa yang terdaftar. Tambahkan data pertama kamu!</p>
            <a href="tambah.php" class="btn-primary">+ Tambah Data Pertama</a>
        </div>
        <?php endif; ?>
    </div>

    <!-- Info Cards -->
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-top: 24px;">
        <?php
        $perJurusan = $pdo->query("SELECT jurusan, COUNT(*) as total FROM mahasiswa GROUP BY jurusan ORDER BY total DESC LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($perJurusan as $j):
        ?>
        <div style="background: var(--card); border: 1px solid var(--card-border); border-radius: var(--radius); padding: 20px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <div style="font-size: 13px; color: var(--text-muted); margin-bottom: 4px;">Jurusan</div>
                <div style="font-weight: 600;"><?= htmlspecialchars($j['jurusan']) ?></div>
            </div>
            <div style="font-family: 'Syne', sans-serif; font-size: 32px; font-weight: 800; color: var(--accent);"><?= $j['total'] ?></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="main.js"></script>
</body>
</html>