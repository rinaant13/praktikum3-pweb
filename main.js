// ================================================
//   AkademiDB - JavaScript
//   Sparkle: hanya 1-2 bintang besar dekat teks
//   Theme toggle: glassmorphism transparan
// ================================================

document.addEventListener('DOMContentLoaded', () => {

    /* ========== THEME TOGGLE ========== */
    const themeToggle = document.querySelector('.theme-toggle');
    const savedTheme  = localStorage.getItem('akademidb-theme') || 'dark';

    if (savedTheme === 'light') {
        document.body.classList.add('light-mode');
    }

    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('light-mode');
            const isLight = document.body.classList.contains('light-mode');
            localStorage.setItem('akademidb-theme', isLight ? 'light' : 'dark');
        });
    }

    /* ========== HAMBURGER MOBILE MENU ========== */
    const hamburger = document.querySelector('.nav-hamburger');
    const navLinks  = document.querySelector('.nav-links');

    if (hamburger && navLinks) {
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('open');
        });
        navLinks.querySelectorAll('a').forEach(a => {
            a.addEventListener('click', () => navLinks.classList.remove('open'));
        });
    }

    /* ========== SPARKLE BESAR DEKAT TEKS HEADING ========== */
    // Tempatkan 1-2 bintang SVG besar di samping teks utama saja
    // seperti di referensi gambar: bintang 4-point besar, putih, glowing

    function createTextSparkle(anchorEl, position = 'right', size = 38) {
        if (!anchorEl) return;

        const wrapper = document.createElement('span');
        wrapper.className = 'text-sparkle-wrap';

        wrapper.innerHTML = `
            <svg class="text-sparkle" width="${size}" height="${size}" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M30 2 L33 27 L58 30 L33 33 L30 58 L27 33 L2 30 L27 27 Z" fill="white"/>
                <path d="M30 8 L32 27 L52 30 L32 32 L30 52 L28 32 L8 30 L28 27 Z" fill="rgba(255,255,255,0.3)"/>
            </svg>
        `;

        const rect   = anchorEl.getBoundingClientRect();
        const scrollY = window.scrollY;
        let left, top;

        switch (position) {
            case 'right':
                left = rect.right + 8;
                top  = rect.top + scrollY + (rect.height / 2) - (size / 2);
                break;
            case 'top-right':
                left = rect.right - (size / 2);
                top  = rect.top + scrollY - size + 4;
                break;
            case 'above-center':
                // Di atas teks, rata tengah horizontal
                left = rect.left + (rect.width / 2) - (size / 2);
                top  = rect.top + scrollY - size - 6;
                break;
            case 'above-right':
                // Di atas teks, sedikit ke kanan dari tengah
                left = rect.left + (rect.width * 0.7) - (size / 2);
                top  = rect.top + scrollY - size - 6;
                break;
            case 'above-left':
                left = rect.left + (rect.width * 0.25) - (size / 2);
                top  = rect.top + scrollY - size - 6;
                break;
        }

        wrapper.style.cssText = `
            position: absolute;
            pointer-events: none;
            z-index: 10;
            left: ${left}px;
            top: ${top}px;
        `;

        document.body.appendChild(wrapper);
    }

    // Pasang sparkle di teks-teks utama
    const heroTitle = document.querySelector('.title-accent');
    const heroBadge = document.querySelector('.hero-badge');
    const sectionH2 = document.querySelector('.section-header h2');
    const pageH1    = document.querySelector('.page-title-group h1');
    const formH2    = document.querySelector('.form-card-header h2');
    const aboutH1   = document.querySelector('.about-info h1');
    const ctaH2     = document.querySelector('.cta-section h2');

    if (heroTitle)  createTextSparkle(heroTitle, 'top-right', 42);
    if (heroBadge)  createTextSparkle(heroBadge, 'right',     26);
    // Section header h2 "Semua yang Kamu Butuhkan" → bintang di ATAS teks, tengah
    if (sectionH2)  createTextSparkle(sectionH2, 'above-right', 36);
    if (pageH1)     createTextSparkle(pageH1,    'top-right',   36);
    if (formH2)     createTextSparkle(formH2,    'top-right',   32);
    if (aboutH1)    createTextSparkle(aboutH1,   'top-right',   40);
    if (ctaH2)      createTextSparkle(ctaH2,     'above-right', 36);

    /* ========== SCROLL FADE-IN CARDS ========== */
    const fadeObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const delay = (entry.target.dataset.delay || 0) * 0.1;
                entry.target.style.animationDelay = delay + 's';
                entry.target.classList.add('fade-in');
                fadeObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.stat-card, .feature-card, .about-card').forEach((el, i) => {
        el.dataset.delay = el.dataset.delay || i;
        el.style.opacity = '0';
        fadeObserver.observe(el);
    });

    /* ========== SKILL BAR ANIMATION ========== */
    const skillObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll('.skill-fill').forEach(bar => {
                    bar.style.width = bar.dataset.width;
                });
                skillObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });

    document.querySelectorAll('.about-card').forEach(el => skillObserver.observe(el));

    /* ========== LIVE TABLE SEARCH ========== */
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', () => {
            const val = searchInput.value.toLowerCase().trim();
            let visible = 0;
            document.querySelectorAll('.data-table tbody tr').forEach(row => {
                const match = row.textContent.toLowerCase().includes(val);
                row.style.display = match ? '' : 'none';
                if (match) visible++;
            });
            const countEl = document.getElementById('rowCount');
            if (countEl) countEl.textContent = visible;
        });
    }

    /* ========== TOAST NOTIFICATIONS ========== */
    const urlParams = new URLSearchParams(window.location.search);
    if      (urlParams.get('success') === '1')       showToast('✅ Data berhasil disimpan!',    'success');
    else if (urlParams.get('success') === 'deleted')  showToast('🗑️ Data berhasil dihapus!',    'success');
    else if (urlParams.get('success') === 'updated')  showToast('✏️ Data berhasil diperbarui!', 'success');

    /* ========== DELETE MODAL ========== */
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            showConfirmModal(() => { window.location.href = btn.getAttribute('href'); });
        });
    });

    /* ========== NAVBAR SCROLL ========== */
    window.addEventListener('scroll', () => {
        const nb = document.querySelector('.navbar');
        if (!nb) return;
        const isLight = document.body.classList.contains('light-mode');
        nb.style.background = window.scrollY > 20
            ? (isLight ? 'rgba(244,244,251,0.98)' : 'rgba(10,10,15,0.97)')
            : '';
    });

    /* ========== FORM SUBMIT FEEDBACK ========== */
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', () => {
            const btn = form.querySelector('.btn-submit');
            if (btn) {
                btn.textContent = '⏳ Menyimpan...';
                btn.disabled = true;
                btn.style.opacity = '0.7';
            }
        });
    }

    /* ========== STAT NUMBER COUNT-UP ========== */
    const statObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el     = entry.target;
                const target = parseInt(el.dataset.target, 10);
                if (!isNaN(target) && target > 0) animateCount(el, 0, target, 1200);
                statObserver.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.stat-number[data-target]').forEach(el => statObserver.observe(el));

    function animateCount(el, start, end, duration) {
        const startTime = performance.now();
        function update(time) {
            const p = Math.min((time - startTime) / duration, 1);
            const e = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.floor(e * (end - start) + start);
            if (p < 1) requestAnimationFrame(update);
            else el.textContent = end;
        }
        requestAnimationFrame(update);
    }

    /* ========== CARD TILT ========== */
    document.querySelectorAll('.feature-card, .stat-card, .about-card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const rotX = ((y - rect.height / 2) / rect.height) * -5;
            const rotY = ((x - rect.width  / 2) / rect.width)  *  5;
            card.style.transform = `perspective(600px) rotateX(${rotX}deg) rotateY(${rotY}deg) translateY(-6px)`;
        });
        card.addEventListener('mouseleave', () => { card.style.transform = ''; });
    });

});

/* ========== TOAST ========== */
function showToast(message, type = 'success') {
    let toast = document.querySelector('.toast');
    if (!toast) {
        toast = document.createElement('div');
        toast.className = 'toast';
        document.body.appendChild(toast);
    }
    toast.className = `toast ${type}`;
    toast.textContent = message;
    clearTimeout(toast._timeout);
    requestAnimationFrame(() => requestAnimationFrame(() => toast.classList.add('show')));
    toast._timeout = setTimeout(() => toast.classList.remove('show'), 3800);
}

/* ========== CONFIRM MODAL ========== */
function showConfirmModal(onConfirm) {
    const existing = document.getElementById('confirmModal');
    if (existing) existing.remove();

    const overlay = document.createElement('div');
    overlay.id = 'confirmModal';
    overlay.style.cssText = `
        position:fixed; inset:0; z-index:2000;
        background:rgba(0,0,0,0.65); backdrop-filter:blur(10px);
        display:flex; align-items:center; justify-content:center;
    `;

    overlay.innerHTML = `
        <div id="confirmBox" style="
            background:var(--card); border:1px solid var(--card-border);
            border-radius:20px; padding:40px; max-width:360px; width:90%;
            text-align:center; box-shadow:var(--shadow);
            opacity:0; transform:translateY(20px) scale(0.95);
            transition:all 0.3s cubic-bezier(0.34,1.56,0.64,1);
        ">
            <div style="font-size:52px; margin-bottom:14px;">🗑️</div>
            <h3 style="font-family:'Syne',sans-serif; font-size:22px; font-weight:700; margin-bottom:10px; color:var(--text);">Hapus Data?</h3>
            <p style="color:var(--text-muted); font-size:14px; margin-bottom:28px; line-height:1.6;">Data yang dihapus tidak dapat dikembalikan.<br>Yakin ingin menghapus?</p>
            <div style="display:flex; gap:12px; justify-content:center;">
                <button id="cancelDelete" style="background:var(--bg-3);color:var(--text-muted);border:1px solid var(--card-border);padding:12px 26px;border-radius:12px;font-size:14px;cursor:pointer;font-family:'DM Sans',sans-serif;transition:all 0.2s;">Batal</button>
                <button id="confirmDelete" style="background:var(--accent-2);color:white;border:none;padding:12px 26px;border-radius:12px;font-size:14px;cursor:pointer;font-family:'DM Sans',sans-serif;transition:all 0.2s;">Ya, Hapus</button>
            </div>
        </div>
    `;

    document.body.appendChild(overlay);

    const box = overlay.querySelector('#confirmBox');
    requestAnimationFrame(() => requestAnimationFrame(() => {
        box.style.opacity = '1';
        box.style.transform = 'translateY(0) scale(1)';
    }));

    const cancelBtn  = document.getElementById('cancelDelete');
    const confirmBtn = document.getElementById('confirmDelete');

    cancelBtn.onclick   = () => overlay.remove();
    confirmBtn.onclick  = () => { overlay.remove(); onConfirm(); };
    overlay.onclick     = (e) => { if (e.target === overlay) overlay.remove(); };

    cancelBtn.onmouseenter  = () => { cancelBtn.style.background = 'var(--bg-2)'; cancelBtn.style.color = 'var(--text)'; };
    cancelBtn.onmouseleave  = () => { cancelBtn.style.background = 'var(--bg-3)'; cancelBtn.style.color = 'var(--text-muted)'; };
    confirmBtn.onmouseenter = () => { confirmBtn.style.transform = 'translateY(-2px)'; confirmBtn.style.boxShadow = '0 6px 20px rgba(255,101,132,0.4)'; };
    confirmBtn.onmouseleave = () => { confirmBtn.style.transform = ''; confirmBtn.style.boxShadow = ''; };
}