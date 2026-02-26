<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Saya — AkademiDB</title>
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
        <li><a href="about.php" class="active">Tentang Saya</a></li>
    </ul>
    <button class="nav-hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
    </button>
    <div class="nav-right"><button class="theme-toggle" title="Toggle tema"><span class="icon-sun">☀️</span><span class="icon-moon">🌙</span></button><a href="mahasiswa.php" class="nav-cta">Kelola Data →</a></div>
</nav>

<div class="about-page">

    <!-- Hero Section -->
    <div class="about-hero">
    <div class="about-avatar">
        <img src="rina.jpg" alt="Foto Rina Natalia">
    </div>
        <div class="about-info">
            <h1>Rina Natalia</h1>
            <div class="about-role">
                <span>●</span>
                Mahasiswa Informatika · Developer Web
            </div>
            <p class="about-bio">
                Halo! Saya adalah mahasiswa yang sedang belajar pemrograman web dengan PHP dan MySQL. 
                Proyek AkademiDB ini dibuat sebagai tugas praktikum untuk mempelajari konsep dasar 
                sistem manajemen database dan penerapan CRUD menggunakan PDO.
            </p>
            <div class="about-tags">
                <span class="tech-tag">PHP</span>
                <span class="tech-tag">MySQL</span>
                <span class="tech-tag">PDO</span>
                <span class="tech-tag">HTML & CSS</span>
                <span class="tech-tag">JavaScript</span>
                <span class="tech-tag">Database Design</span>
            </div>
        </div>
    </div>

    <!-- Info Cards -->
    <div class="about-sections">

        <!-- Card: Project Info -->
        <div class="about-card" data-delay="0">
            <div class="about-card-icon">📋</div>
            <h3>Tentang Proyek</h3>
            <p>
                <strong>AkademiDB</strong> adalah sistem informasi manajemen data mahasiswa berbasis web yang dibangun 
                menggunakan PHP Native dengan koneksi database MySQL via PDO (PHP Data Objects). 
                Proyek ini mengimplementasikan konsep CRUD (Create, Read, Update, Delete) secara lengkap 
                dengan antarmuka yang modern dan responsif.
            </p>
        </div>

        <!-- Card: Skills -->
        <div class="about-card" data-delay="1">
            <div class="about-card-icon">⚡</div>
            <h3>Kemampuan Teknis</h3>
            <ul class="skill-list">
                <li class="skill-item">
                    <div class="skill-info">
                        <span class="skill-name">PHP & MySQL</span>
                        <span class="skill-pct">75%</span>
                    </div>
                    <div class="skill-bar"><div class="skill-fill" data-width="85%" style="width:0"></div></div>
                </li>
                <li class="skill-item">
                    <div class="skill-info">
                        <span class="skill-name">HTML & CSS</span>
                        <span class="skill-pct">90%</span>
                    </div>
                    <div class="skill-bar"><div class="skill-fill" data-width="90%" style="width:0"></div></div>
                </li>
                <li class="skill-item">
                    <div class="skill-info">
                        <span class="skill-name">JavaScript</span>
                        <span class="skill-pct">70%</span>
                    </div>
                    <div class="skill-bar"><div class="skill-fill" data-width="70%" style="width:0"></div></div>
                </li>
                <li class="skill-item">
                    <div class="skill-info">
                        <span class="skill-name">Database Design</span>
                        <span class="skill-pct">75%</span>
                    </div>
                    <div class="skill-bar"><div class="skill-fill" data-width="75%" style="width:0"></div></div>
                </li>
            </ul>
    <button class="nav-hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
    </button>
        </div>

        <!-- Card: Fitur & Teknologi -->
        <div class="about-card" data-delay="2">
            <div class="about-card-icon">🔧</div>
            <h3>Teknologi yang Digunakan</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 8px;">
                <div style="background: var(--bg-3); border-radius: 10px; padding: 14px;">
                    <div style="font-size: 20px; margin-bottom: 4px;">🐘</div>
                    <div style="font-size: 13px; font-weight: 600; margin-bottom: 2px;">PHP 8+</div>
                    <div style="font-size: 12px; color: var(--text-muted);">Backend & Logic</div>
                </div>
                <div style="background: var(--bg-3); border-radius: 10px; padding: 14px;">
                    <div style="font-size: 20px; margin-bottom: 4px;">🗄️</div>
                    <div style="font-size: 13px; font-weight: 600; margin-bottom: 2px;">MySQL</div>
                    <div style="font-size: 12px; color: var(--text-muted);">Database Engine</div>
                </div>
                <div style="background: var(--bg-3); border-radius: 10px; padding: 14px;">
                    <div style="font-size: 20px; margin-bottom: 4px;">🔐</div>
                    <div style="font-size: 13px; font-weight: 600; margin-bottom: 2px;">PDO</div>
                    <div style="font-size: 12px; color: var(--text-muted);">Secure Queries</div>
                </div>
                <div style="background: var(--bg-3); border-radius: 10px; padding: 14px;">
                    <div style="font-size: 20px; margin-bottom: 4px;">🎨</div>
                    <div style="font-size: 13px; font-weight: 600; margin-bottom: 2px;">CSS3 + JS</div>
                    <div style="font-size: 12px; color: var(--text-muted);">UI & Animation</div>
                </div>
            </div>
        </div>

        <!-- Card: Pembelajaran -->
        <div class="about-card" data-delay="3">
            <div class="about-card-icon">🎓</div>
            <h3>Yang Dipelajari</h3>
            <p style="margin-bottom: 16px;">Dari proyek ini, saya berhasil mempelajari dan menerapkan:</p>
            <ul style="list-style: none; display: flex; flex-direction: column; gap: 10px;">
                <li style="display: flex; gap: 10px; font-size: 14px; color: var(--text-muted);">
                    <span style="color: var(--accent-3);">✓</span>
                    Koneksi PHP ke MySQL menggunakan PDO
                </li>
                <li style="display: flex; gap: 10px; font-size: 14px; color: var(--text-muted);">
                    <span style="color: var(--accent-3);">✓</span>
                    Operasi CRUD lengkap pada database relasional
                </li>
                <li style="display: flex; gap: 10px; font-size: 14px; color: var(--text-muted);">
                    <span style="color: var(--accent-3);">✓</span>
                    Keamanan dengan Prepared Statement
                </li>
                <li style="display: flex; gap: 10px; font-size: 14px; color: var(--text-muted);">
                    <span style="color: var(--accent-3);">✓</span>
                    Desain UI/UX web responsif modern
                </li>
                <li style="display: flex; gap: 10px; font-size: 14px; color: var(--text-muted);">
                    <span style="color: var(--accent-3);">✓</span>
                    Animasi dan interaksi JavaScript
                </li>
            </ul>
    <button class="nav-hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
    </button>
        </div>

        <!-- Card: Database Schema (full width) -->
        <div class="about-card about-card-full" data-delay="4">
            <div class="about-card-icon">🗂️</div>
            <h3>Struktur Database</h3>
            <p style="margin-bottom: 20px;">Tabel <code style="background:rgba(108,99,255,0.12);color:var(--accent);padding:2px 8px;border-radius:6px;font-size:13px;">mahasiswa</code> pada database <code style="background:rgba(108,99,255,0.12);color:var(--accent);padding:2px 8px;border-radius:6px;font-size:13px;">kampus</code> memiliki struktur sebagai berikut:</p>
            <div class="code-snippet" style="font-size: 13px; line-height: 2;">
                <span style="color:#c792ea;">CREATE TABLE</span> <span style="color:#82aaff;">mahasiswa</span> (<br>
                &nbsp;&nbsp;<span style="color:#ffcb6b;">id</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#c792ea;">INT</span>(11) NOT NULL AUTO_INCREMENT,<br>
                &nbsp;&nbsp;<span style="color:#ffcb6b;">npm</span> &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#c792ea;">VARCHAR</span>(20) NOT NULL,<br>
                &nbsp;&nbsp;<span style="color:#ffcb6b;">nama</span> &nbsp;&nbsp;&nbsp;<span style="color:#c792ea;">VARCHAR</span>(100) NOT NULL,<br>
                &nbsp;&nbsp;<span style="color:#ffcb6b;">jurusan</span> <span style="color:#c792ea;">VARCHAR</span>(100) NOT NULL,<br>
                &nbsp;&nbsp;<span style="color:#c792ea;">PRIMARY KEY</span> (<span style="color:#ffcb6b;">id</span>)<br>
                ) <span style="color:#c792ea;">ENGINE</span>=InnoDB <span style="color:#c792ea;">DEFAULT CHARSET</span>=utf8mb4;
            </div>
        </div>

        <!-- Card: Contact -->
        <div class="about-card about-card-full" data-delay="5">
            <div class="about-card-icon">📬</div>
            <h3>Hubungi Saya</h3>
            <p style="margin-bottom: 16px;">Ada pertanyaan atau ingin berkolaborasi? Jangan ragu untuk menghubungi saya!</p>
            <div class="contact-links">
                <a href="mailto:247006111033@student.unsil.ac.id" class="contact-link">
                    <span>📧</span> Email
                </a>
                <a href="https://github.com/rinaant13" target="_blank" class="contact-link">
                    <span>🐙</span> GitHub
                </a>
                <a href="https://www.linkedin.com/in/rina-natalia-199099301?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" class="contact-link">
                    <span>💼</span> LinkedIn
                </a>
                <a href="https://instagram.com/rinaant_" target="_blank" class="contact-link">
                    <span>📸</span> Instagram
                </a>
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<footer class="footer" style="margin-top: 60px;">
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