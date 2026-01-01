<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flyer - Soufiane Simmou</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'JetBrains Mono', monospace;
        }

        @page { size: A5; margin: 0; }

        @media print {
            html, body { -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }
            .no-print { display: none !important; }
            .flyer { margin: 0 !important; box-shadow: none !important; }
        }

        :root {
            --bg: #0d0d0f;
            --card: #161618;
            --card-border: #252528;
            --accent: #ff5500;
            --accent-light: #ff6a1a;
            --accent-glow: rgba(255, 85, 0, 0.25);
            --text: #ffffff;
            --text-secondary: #c0c0c0;
            --text-muted: #808080;
        }

        body {
            background: #111;
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .print-controls {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
            z-index: 100;
        }

        .print-btn {
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            background: var(--accent);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .print-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--accent-glow);
        }

        .back-btn {
            background: var(--card);
            border: 1px solid var(--card-border);
        }

        /* ==================== FLYER ==================== */
        .flyer {
            width: 148mm;
            height: 210mm;
            max-height: 210mm;
            background: var(--bg);
            position: relative;
            overflow: hidden;
            box-shadow: 0 25px 80px rgba(0,0,0,0.5);
        }

        /* ==================== CODE BACKGROUND ==================== */
        .code-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .code-bg::before {
            content: '';
            position: absolute;
            top: -20%;
            right: -20%;
            width: 70%;
            height: 70%;
            background: radial-gradient(circle, rgba(255,85,0,0.08) 0%, transparent 60%);
            filter: blur(30px);
        }

        .code-symbol {
            position: absolute;
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700;
            opacity: 0.06;
            user-select: none;
        }

        .code-symbol.orange { color: #ff5500; }
        .code-symbol.blue { color: #569cd6; }
        .code-symbol.yellow { color: #dcdcaa; }

        /* ==================== CONTENT ==================== */
        .flyer-content {
            position: relative;
            z-index: 5;
            padding: 20px 24px;
            height: 210mm;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 14px;
        }

        .logo {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .logo .white { color: #fff; }
        .logo .accent { color: var(--accent); }
        .logo .muted { color: var(--text-muted); }

        /* ==================== HERO ==================== */
        .hero {
            text-align: center;
            margin-bottom: 18px;
        }

        .hero-pretitle {
            font-size: 10px;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 10px;
        }

        .hero-title {
            font-size: 28px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 12px;
        }

        .hero-title .highlight {
            color: var(--accent);
        }

        .hero-subtitle {
            font-size: 12px;
            color: var(--text-secondary);
            line-height: 1.5;
            max-width: 90%;
            margin: 0 auto;
        }

        /* ==================== SERVICES ==================== */
        .services-section {
            margin-bottom: 16px;
        }

        .section-title {
            font-size: 9px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
            text-align: center;
        }

        .services-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .service-card {
            background: var(--card);
            border: 1px solid var(--card-border);
            border-radius: 8px;
            padding: 12px;
            text-align: center;
        }

        .service-card.primary {
            background: rgba(255,85,0,0.04);
            border-color: rgba(255,85,0,0.25);
        }

        .service-name {
            font-size: 12px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 4px;
        }

        .service-desc {
            font-size: 9px;
            color: var(--text-muted);
            line-height: 1.3;
            margin-bottom: 6px;
        }

        .service-price {
            font-size: 11px;
            font-weight: 600;
            color: var(--accent);
        }

        /* ==================== STATS ==================== */
        .stats-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 14px 0;
            border-top: 1px solid var(--card-border);
            border-bottom: 1px solid var(--card-border);
            margin-bottom: 16px;
            background: rgba(255,85,0,0.02);
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 700;
            color: var(--accent);
            line-height: 1;
        }

        .stat-label {
            font-size: 8px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 4px;
        }

        /* ==================== CONTACT ==================== */
        .contact-section {
            margin-top: auto;
            text-align: center;
        }

        .contact-title {
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 12px;
        }

        .contact-item {
            text-align: center;
        }

        .contact-label {
            font-size: 8px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 2px;
        }

        .contact-value {
            font-size: 11px;
            color: var(--text);
            font-weight: 500;
        }

        .cta-button {
            display: inline-block;
            background: var(--accent);
            color: #fff;
            padding: 12px 28px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 2px 8px var(--accent-glow);
        }

        .website {
            margin-top: 10px;
            font-size: 10px;
            color: var(--text-muted);
        }

        .website span {
            color: var(--accent);
        }

        /* Bottom accent */
        .flyer::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--accent);
            z-index: 10;
        }

        @media screen and (max-width: 600px) {
            .flyer { width: 100%; min-height: auto; }
            .print-controls { top: 10px; right: 10px; flex-direction: column; }
        }
    </style>
</head>
<body>
    <div class="print-controls no-print">
        <a href="{{ route('home') }}" class="print-btn back-btn">&larr; Retour</a>
        <button class="print-btn" onclick="downloadPDF()">Telecharger PDF</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function downloadPDF() {
            const element = document.querySelector('.flyer');
            const opt = {
                margin: 0,
                filename: 'Soufiane_Simmou_Developpeur_Web.pdf',
                image: { type: 'jpeg', quality: 1 },
                html2canvas: {
                    scale: 2,
                    useCORS: true,
                    backgroundColor: '#0d0d0f'
                },
                jsPDF: { unit: 'mm', format: 'a5', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>

    <div class="flyer">
        <!-- Code Background (subtil) -->
        <div class="code-bg">
            <span class="code-symbol orange" style="top: 8%; left: 10%; font-size: 48px;">{</span>
            <span class="code-symbol blue" style="top: 5%; right: 15%; font-size: 40px;">}</span>
            <span class="code-symbol yellow" style="bottom: 15%; left: 8%; font-size: 36px;">&lt;/&gt;</span>
            <span class="code-symbol orange" style="bottom: 20%; right: 10%; font-size: 44px;">[</span>
        </div>

        <div class="flyer-content">
            <!-- Header -->
            <header class="header">
                <div class="logo">
                    <span class="white">soufiane</span><span class="accent">.</span><span class="muted">dev</span>
                </div>
            </header>

            <!-- Hero -->
            <section class="hero">
                <p class="hero-pretitle">Developpeur Web Freelance</p>
                <h1 class="hero-title">
                    Votre site doit <span class="highlight">vendre</span>.<br>
                    Je m'en <span class="highlight">charge</span>.
                </h1>
                <p class="hero-subtitle">
                    Transformez vos visiteurs en clients avec un site qui convertit.
                </p>
            </section>

            <!-- Services -->
            <section class="services-section">
                <p class="section-title">Mes services</p>
                <div class="services-grid">
                    <div class="service-card primary">
                        <div class="service-name">Site Vitrine</div>
                        <div class="service-desc">Design moderne et optimise pour convertir</div>
                        <div class="service-price">A partir de 1 000&#x20AC;</div>
                    </div>
                    <div class="service-card primary">
                        <div class="service-name">Boutique en ligne</div>
                        <div class="service-desc">Paiement securise et gestion complete</div>
                        <div class="service-price">A partir de 3 000&#x20AC;</div>
                    </div>
                    <div class="service-card">
                        <div class="service-name">Application Web</div>
                        <div class="service-desc">Solutions sur mesure pour votre activite</div>
                        <div class="service-price">Sur devis</div>
                    </div>
                    <div class="service-card">
                        <div class="service-name">Maintenance</div>
                        <div class="service-desc">Securite, backups et mises a jour</div>
                        <div class="service-price">79&#x20AC; / 119&#x20AC; /mois</div>
                    </div>
                </div>
            </section>

            <!-- Stats -->
            <section class="stats-section">
                <p class="section-title" style="width: 100%; margin-bottom: 10px;">Pourquoi me choisir ?</p>
                <div class="stat-item">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Projets livres</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Dans les delais</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24h</div>
                    <div class="stat-label">Reponse garantie</div>
                </div>
            </section>

            <!-- Contact -->
            <section class="contact-section">
                <h2 class="contact-title">Discutons de votre projet</h2>
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-label">Telephone</div>
                        <div class="contact-value">07 83 82 01 67</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-label">Email</div>
                        <div class="contact-value">simmou.soufiane34@gmail.com</div>
                    </div>
                </div>
                <div class="cta-button">DISPONIBLE POUR VOTRE PROJET</div>
                <p class="website">Portfolio : <span>soufiane.dev</span></p>
            </section>
        </div>
    </div>
</body>
</html>
