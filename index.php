<?php
require 'connection.php';

// Stats
$totalMahasiswa = $pdo->query("SELECT COUNT(*) FROM mahasiswa")->fetchColumn();
$totalJurusan = $pdo->query("SELECT COUNT(DISTINCT jurusan) FROM mahasiswa")->fetchColumn();
$latestMahasiswa = $pdo->query("SELECT * FROM mahasiswa ORDER BY id DESC LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AkademiDB — Sistem Informasi Mahasiswa</title>
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
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="mahasiswa.php">Data Mahasiswa</a></li>
        <li><a href="about.php">Tentang Saya</a></li>
    </ul>
    <button class="nav-hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
    </button>
    <div class="nav-right"><button class="theme-toggle" title="Toggle tema"><span class="icon-sun">☀️</span><span class="icon-moon">🌙</span></button><a href="mahasiswa.php" class="nav-cta">Kelola Data →</a></div>
</nav>

<!-- Hero -->
<section class="hero">
    <div class="hero-bg-grid"></div>
    <div class="floating-orb orb-1"></div>
    <div class="floating-orb orb-2"></div>
    <div class="floating-orb orb-3"></div>

    <div class="hero-content">
        <div class="hero-badge">
            <span class="badge-dot"></span>
            Sistem Manajemen Data Akademik
        </div>
        <h1 class="hero-title">
            Kelola Data <br>
            <span class="title-accent">Mahasiswa</span><br>
            dengan Mudah
        </h1>
        <p class="hero-desc">
            Platform modern untuk mencatat, mengelola, dan memantau informasi mahasiswa secara efisien. 
            Dirancang untuk kemudahan dan kecepatan.
        </p>
        <div class="hero-actions">
            <a href="mahasiswa.php" class="btn-primary">
                <span>Lihat Data</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
            <a href="tambah.php" class="btn-secondary">+ Tambah Mahasiswa</a>
        </div>
    </div>

    <div class="hero-visual">
        <div class="card-stack">
            <div class="stack-card card-back-2"></div>
            <div class="stack-card card-back-1"></div>
            <div class="stack-card card-front">
                <div class="card-header-inner">
                    <span class="card-dot red"></span>
                    <span class="card-dot yellow"></span>
                    <span class="card-dot green"></span>
                    <span class="card-title-inner">mahasiswa.db</span>
                </div>
                <div class="card-body-inner">
                    <div class="db-row header-row">
                        <span>ID</span><span>NIM</span><span>NAMA</span><span>JURUSAN</span>
                    </div>
                    <?php foreach ($latestMahasiswa as $i => $m): ?>
                    <div class="db-row <?= $i === 0 ? 'active-row' : '' ?>" style="animation-delay: <?= $i * 0.15 ?>s">
                        <span><?= $m['id'] ?></span>
                        <span><?= htmlspecialchars(substr($m['npm'], 0, 8)) ?></span>
                        <span><?= htmlspecialchars(substr($m['nama'], 0, 10)) ?>...</span>
                        <span class="tag-jurusan"><?= htmlspecialchars(substr($m['jurusan'], 0, 6)) ?></span>
                    </div>
                    <?php endforeach; ?>
                    <?php if (count($latestMahasiswa) === 0): ?>
                    <div class="db-row">
                        <span colspan="4" style="color:#666;font-size:12px">Belum ada data</span>
                    </div>
                    <?php endif; ?>
                    <div class="db-footer">
                        <span><?= $totalMahasiswa ?> total record</span>
                        <span class="status-live">● LIVE</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="stats-section">
    <div class="stats-container">
        <div class="stat-card" data-delay="0">
            <div class="stat-icon">🎓</div>
            <div class="stat-number counter" data-target="<?= $totalMahasiswa ?>"><?= $totalMahasiswa ?></div>
            <div class="stat-label">Total Mahasiswa</div>
        </div>
        <div class="stat-card" data-delay="1">
            <div class="stat-icon">📚</div>
            <div class="stat-number counter" data-target="<?= $totalJurusan ?>"><?= $totalJurusan ?></div>
            <div class="stat-label">Jurusan Tersedia</div>
        </div>
        <div class="stat-card" data-delay="2">
            <div class="stat-icon">⚡</div>
            <div class="stat-number">4</div>
            <div class="stat-label">Fitur CRUD</div>
        </div>
        <div class="stat-card" data-delay="3">
            <div class="stat-icon">🛡️</div>
            <div class="stat-number">100%</div>
            <div class="stat-label">Keamanan Data</div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="features-section">
    <div class="section-header">
        <span class="section-tag">Fitur Unggulan</span>
        <h2>Semua yang Kamu Butuhkan</h2>
        <p>Sistem lengkap dengan operasi database yang aman dan efisien</p>
    </div>
    <div class="features-grid">
        <div class="feature-card feat-large">
            <div class="feat-icon">➕</div>
            <h3>Tambah Data</h3>
            <p>Input data mahasiswa baru dengan form yang intuitif dan validasi real-time. Tersimpan langsung ke database MySQL.</p>
            <a href="tambah.php" class="feat-link">Tambah Sekarang →</a>
            <div class="feat-bg-shape"></div>
        </div>
        <div class="feature-card">
            <div class="feat-icon">📋</div>
            <h3>Lihat Semua Data</h3>
            <p>Tampilan tabel responsif dengan pencarian cepat dan pagination.</p>
            <a href="mahasiswa.php" class="feat-link">Buka Tabel →</a>
        </div>
        <div class="feature-card">
            <div class="feat-icon">✏️</div>
            <h3>Edit Data</h3>
            <p>Update informasi mahasiswa kapan saja dengan form pre-filled yang akurat.</p>
        </div>
        <div class="feature-card feat-wide">
            <div class="feat-icon">🗑️</div>
            <h3>Hapus Data</h3>
            <p>Hapus data dengan konfirmasi modal yang elegan untuk mencegah penghapusan tidak sengaja. Data aman sebelum dihapus.</p>
        </div>
        <div class="feature-card feat-wide">
            <div class="feat-icon">🔒</div>
            <h3>Keamanan dengan PDO Prepared Statement</h3>
            <p>Setiap query menggunakan Prepared Statement untuk mencegah SQL Injection. Data kamu aman bersama kami.</p>
            <div class="code-snippet">
                <span class="code-keyword">$stmt</span> = <span class="code-var">$pdo</span>-><span class="code-fn">prepare</span>(<span class="code-str">"INSERT INTO mahasiswa (npm, nama, jurusan) VALUES (?, ?, ?)"</span>);<br>
                <span class="code-var">$stmt</span>-><span class="code-fn">execute</span>([$nim, $nama, $jurusan]);
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="cta-content">
        <h2>Siap Mulai Mengelola Data?</h2>
        <p>Akses sistem database mahasiswa sekarang juga</p>
        <div class="cta-buttons">
            <a href="mahasiswa.php" class="btn-primary large">Buka Dashboard</a>
            <a href="about.php" class="btn-ghost">Tentang Developer</a>
        </div>
    </div>
    <div class="cta-decoration">
        <div class="deco-ring ring-1"></div>
        <div class="deco-ring ring-2"></div>
        <div class="deco-ring ring-3"></div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-brand">
            <span class="logo-icon">◈</span> AkademiDB
        </div>
        <p class="footer-text">Dibuat dengan menggunakan PHP & MySQL</p>
        <div class="footer-links">
            <a href="index.php">Home</a>
            <a href="mahasiswa.php">Data</a>
            <a href="about.php">About</a>
        </div>
    </div>
</footer>

<script src="main.js"></script>
</body>
</html>