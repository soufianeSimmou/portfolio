@extends('layouts.app')

@section('title', 'Soufiane Simmou - Développeur Fullstack')
@section('description', 'Je crée des applications web modernes et performantes avec Laravel, React et Python.')

@push('styles')
<style>
    /* ========================================
       CODE STYLE VARIABLES
    ======================================== */
    :root {
        --code-bg: #0d0d0d;
        --code-line: #1a1a1a;
        --code-gutter: 60px;
        --c-comment: #6a9955;
        --c-keyword: #c586c0;
        --c-string: #ce9178;
        --c-variable: #9cdcfe;
        --c-function: #dcdcaa;
        --c-tag: #569cd6;
        --c-bracket: #ffd700;
        --c-text: #d4d4d4;
        --c-accent: #ff4d00;
    }

    /* ========================================
       HERO
    ======================================== */
    .hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 120px 0 80px;
        position: relative;
    }

    /* Code Lines */
    .code-line {
        display: flex;
        line-height: 2;
        opacity: 0;
        transform: translateX(-20px);
    }

    .line-num {
        width: var(--code-gutter);
        text-align: right;
        padding-right: 24px;
        color: #4a4a4a;
        user-select: none;
        flex-shrink: 0;
    }

    .line-content {
        flex: 1;
    }

    /* Code Syntax */
    .c-comment { color: var(--c-comment); font-style: italic; }
    .c-keyword { color: var(--c-keyword); }
    .c-string { color: var(--c-string); }
    .c-variable { color: var(--c-variable); }
    .c-function { color: var(--c-function); }
    .c-tag { color: var(--c-tag); }
    .c-bracket { color: var(--c-bracket); }
    .c-text { color: var(--c-text); }
    .c-accent { color: var(--c-accent); }

    /* Hero specific */
    .hero-line .line-content {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 700;
        line-height: 1.2;
    }

    .hero-line .c-tag {
        font-size: 0.4em;
        vertical-align: middle;
    }

    .hero-name {
        color: #fff;
    }

    .hero-role {
        color: var(--c-text);
    }

    .hero-desc {
        color: #888;
        font-size: 1.1rem;
    }

    .status-dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        background: #22c55e;
        border-radius: 50%;
        margin-left: 8px;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(34,197,94,0.4); }
        50% { box-shadow: 0 0 0 6px rgba(34,197,94,0); }
    }

    /* Hero buttons */
    .hero-actions {
        display: flex;
        gap: 16px;
        margin-top: 48px;
        padding-left: var(--code-gutter);
        opacity: 0;
        transform: translateY(20px);
    }

    /* ========================================
       SECTIONS
    ======================================== */
    section {
        padding: 100px 0;
    }

    .section-header {
        margin-bottom: 56px;
    }

    .section-code {
        background: var(--code-bg);
        border: 1px solid #1f1f1f;
        border-radius: 10px;
        padding: 20px 0;
        display: inline-block;
        min-width: 400px;
        opacity: 0;
        transform: translateY(20px);
    }

    .section-line {
        display: flex;
        line-height: 1.8;
        padding-right: 24px;
    }

    /* ========================================
       SERVICE CARDS
    ======================================== */
    .cards-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 32px;
    }

    @media (max-width: 768px) {
        .cards-grid { grid-template-columns: 1fr; }
    }

    .card {
        background: #111;
        border: 1px solid #1a1a1a;
        border-radius: 12px;
        padding: 32px;
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-6px);
        border-color: #2a2a2a;
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    .card-icon {
        width: 52px;
        height: 52px;
        background: rgba(255,77,0,0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .card-icon svg {
        width: 26px;
        height: 26px;
        color: var(--c-accent);
    }

    .card h3 {
        font-size: 1.15rem;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .card p {
        color: #666;
        line-height: 1.7;
        font-size: 0.95rem;
    }

    /* ========================================
       PROJECT CARDS
    ======================================== */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
    }

    @media (max-width: 1200px) {
        .projects-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 768px) {
        .projects-grid { grid-template-columns: 1fr; }
    }

    .project-card {
        background: #111;
        border: 1px solid #1a1a1a;
        border-radius: 12px;
        overflow: hidden;
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.3s ease;
    }

    .project-card:hover {
        transform: translateY(-6px);
        border-color: #2a2a2a;
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    .project-media {
        aspect-ratio: 16/10;
        background: #0a0a0a;
        position: relative;
        overflow: hidden;
    }

    .project-media video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .project-card:hover .project-media video {
        transform: scale(1.05);
    }

    .project-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity 0.3s;
    }

    .project-card:hover .project-overlay {
        opacity: 0;
    }

    .project-play {
        width: 56px;
        height: 56px;
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(8px);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .project-badge {
        position: absolute;
        top: 14px;
        right: 14px;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 6px;
        backdrop-filter: blur(8px);
    }

    .project-body {
        padding: 22px;
    }

    .project-body h3 {
        font-weight: 600;
        margin-bottom: 8px;
        transition: color 0.2s;
    }

    .project-card:hover .project-body h3 {
        color: var(--c-accent);
    }

    .project-body p {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 14px;
    }

    .project-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .project-tag {
        font-size: 0.75rem;
        color: #777;
        background: rgba(255,255,255,0.05);
        padding: 5px 12px;
        border-radius: 100px;
    }

    /* ========================================
       PARCOURS
    ======================================== */
    .parcours-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
    }

    @media (max-width: 900px) {
        .parcours-grid { grid-template-columns: 1fr; gap: 40px; }
    }

    .timeline {
        position: relative;
        padding-left: 30px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 6px;
        top: 8px;
        bottom: 8px;
        width: 2px;
        background: linear-gradient(to bottom, var(--c-accent), #222);
    }

    .timeline-item {
        position: relative;
        padding-bottom: 36px;
        opacity: 0;
        transform: translateX(20px);
    }

    .timeline-item:last-child { padding-bottom: 0; }

    .timeline-dot {
        position: absolute;
        left: -30px;
        top: 6px;
        width: 14px;
        height: 14px;
        background: #0a0a0a;
        border: 3px solid var(--c-accent);
        border-radius: 50%;
    }

    .timeline-date {
        font-size: 0.85rem;
        color: var(--c-accent);
        margin-bottom: 6px;
    }

    .timeline-title {
        font-weight: 600;
        margin-bottom: 6px;
    }

    .timeline-text {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.6;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .stat-card {
        background: #111;
        border: 1px solid #1a1a1a;
        border-radius: 12px;
        padding: 28px;
        text-align: center;
        opacity: 0;
        transform: translateY(20px);
    }

    .stat-num {
        font-size: 2.8rem;
        font-weight: 700;
        line-height: 1;
        margin-bottom: 6px;
    }

    .stat-label {
        color: #666;
        font-size: 0.85rem;
    }

    /* ========================================
       CONTACT
    ======================================== */
    .contact-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .contact-card {
        background: #111;
        border: 1px solid #1a1a1a;
        border-radius: 12px;
        padding: 22px 28px;
        display: flex;
        align-items: center;
        gap: 18px;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-4px);
        border-color: #2a2a2a;
        box-shadow: 0 16px 32px rgba(0,0,0,0.3);
    }

    .contact-icon {
        width: 50px;
        height: 50px;
        background: rgba(255,77,0,0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .contact-icon svg {
        width: 24px;
        height: 24px;
        color: var(--c-accent);
    }

    .contact-label {
        font-weight: 600;
        margin-bottom: 2px;
    }

    .contact-value {
        color: #666;
        font-size: 0.85rem;
    }
</style>
@endpush

@section('content')

<!-- ==================== HERO ==================== -->
<section class="hero" id="hero">
    <div class="max-w-7xl mx-auto px-6 w-full">
        <!-- Line 1: Comment disponibilité -->
        <div class="code-line">
            <span class="line-num">1</span>
            <span class="line-content">
                <span class="c-comment">// Disponible pour nouveaux projets</span>
                <span class="status-dot"></span>
            </span>
        </div>

        <!-- Line 2: h1 open + name -->
        <div class="code-line hero-line">
            <span class="line-num">2</span>
            <span class="line-content">
                <span class="c-tag">&lt;h1&gt;</span><span class="hero-name">Soufiane Simmou</span>
            </span>
        </div>

        <!-- Line 3: role + h1 close -->
        <div class="code-line hero-line">
            <span class="line-num">3</span>
            <span class="line-content">
                <span class="hero-role">Développeur <span class="c-accent">Fullstack</span></span><span class="c-tag">&lt;/h1&gt;</span>
            </span>
        </div>

        <!-- Line 4: p open -->
        <div class="code-line">
            <span class="line-num">4</span>
            <span class="line-content">
                <span class="c-tag">&lt;p&gt;</span>
            </span>
        </div>

        <!-- Line 5: description -->
        <div class="code-line">
            <span class="line-num">5</span>
            <span class="line-content hero-desc">
                Transformez vos visiteurs en clients avec un site qui convertit.
            </span>
        </div>

        <!-- Line 6: description suite -->
        <div class="code-line">
            <span class="line-num">6</span>
            <span class="line-content hero-desc">
                Sites vitrines, boutiques en ligne et applications sur mesure.
            </span>
        </div>

        <!-- Line 7: p close -->
        <div class="code-line">
            <span class="line-num">7</span>
            <span class="line-content">
                <span class="c-tag">&lt;/p&gt;</span>
            </span>
        </div>

        <!-- Line 8: stack -->
        <div class="code-line">
            <span class="line-num">8</span>
            <span class="line-content">
                <span class="c-keyword">const</span> <span class="c-variable">stack</span> <span class="c-text">=</span> <span class="c-bracket">[</span><span class="c-string">"Laravel"</span><span class="c-text">,</span> <span class="c-string">"React"</span><span class="c-text">,</span> <span class="c-string">"Python"</span><span class="c-bracket">]</span>
            </span>
        </div>

        <!-- Buttons -->
        <div class="hero-actions">
            <a href="{{ route('contact') }}" class="btn btn-accent">
                Démarrer un projet
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            <a href="{{ route('projets') }}" class="btn btn-ghost">Voir mes projets</a>
        </div>
    </div>
</section>


<!-- ==================== SERVICES ==================== -->
<section id="services">
    <div class="max-w-7xl mx-auto px-6">
        <div class="section-header">
            <div class="section-code">
                <div class="section-line">
                    <span class="line-num">10</span>
                    <span class="line-content"><span class="c-comment">// Services</span></span>
                </div>
                <div class="section-line">
                    <span class="line-num">11</span>
                    <span class="line-content">
                        <span class="c-tag">&lt;h2&gt;</span><span class="c-text">Ce que je</span> <span class="c-accent">propose</span><span class="c-tag">&lt;/h2&gt;</span>
                    </span>
                </div>
            </div>
        </div>

        <div class="cards-grid">
            <div class="card">
                <div class="card-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3>Site Vitrine</h3>
                <p>Design moderne optimisé pour convertir vos visiteurs en clients. À partir de 1 000€.</p>
            </div>

            <div class="card">
                <div class="card-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3>Boutique en ligne</h3>
                <p>Paiement sécurisé et gestion complète de vos produits. À partir de 3 000€.</p>
            </div>

            <div class="card">
                <div class="card-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                <h3>Application Web</h3>
                <p>Solutions sur mesure pour votre activité. Devis personnalisé selon vos besoins.</p>
            </div>

            <div class="card">
                <div class="card-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3>Maintenance</h3>
                <p>Sécurité, backups et mises à jour régulières. 79€ ou 119€ /mois selon formule.</p>
            </div>
        </div>
    </div>
</section>


<!-- ==================== PROJETS ==================== -->
<section id="projets">
    <div class="max-w-7xl mx-auto px-6">
        <div class="section-header">
            <div class="section-code">
                <div class="section-line">
                    <span class="line-num">12</span>
                    <span class="line-content"><span class="c-comment">// Portfolio</span></span>
                </div>
                <div class="section-line">
                    <span class="line-num">13</span>
                    <span class="line-content">
                        <span class="c-tag">&lt;h2&gt;</span><span class="c-text">Projets</span> <span class="c-accent">récents</span><span class="c-tag">&lt;/h2&gt;</span>
                    </span>
                </div>
            </div>
        </div>

        <div class="projects-grid">
            @foreach($projects as $project)
            <a href="{{ route('projet.detail', $project['id']) }}" class="project-card">
                <div class="project-media">
                    <video poster="{{ asset($project['poster']) }}" muted playsinline loop preload="metadata">
                        <source src="{{ asset($project['video']) }}" type="video/mp4">
                    </video>
                    <div class="project-overlay">
                        <div class="project-play">
                            <svg class="w-5 h-5 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </div>
                    @php
                        $badgeClass = match(true) {
                            str_contains($project['status'], 'Livré') => 'bg-green-500/20 text-green-400',
                            str_contains($project['status'], 'Fonctionnel') && !str_contains($project['status'], 'Non') => 'bg-blue-500/20 text-blue-400',
                            str_contains($project['status'], 'Arrêté') => 'bg-yellow-500/20 text-yellow-400',
                            default => 'bg-purple-500/20 text-purple-400'
                        };
                    @endphp
                    <span class="project-badge {{ $badgeClass }}">{{ Str::limit($project['status'], 15) }}</span>
                </div>
                <div class="project-body">
                    <h3>{{ $project['title'] }}</h3>
                    <p>{{ Str::limit($project['description'], 90) }}</p>
                    <div class="project-tags">
                        @foreach(array_slice($project['tech_stack'], 0, 3) as $tech)
                        <span class="project-tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>


<!-- ==================== PARCOURS ==================== -->
<section id="parcours">
    <div class="max-w-7xl mx-auto px-6">
        <div class="section-header">
            <div class="section-code">
                <div class="section-line">
                    <span class="line-num">14</span>
                    <span class="line-content"><span class="c-comment">// Parcours</span></span>
                </div>
                <div class="section-line">
                    <span class="line-num">15</span>
                    <span class="line-content">
                        <span class="c-tag">&lt;h2&gt;</span><span class="c-text">Mon</span> <span class="c-accent">histoire</span><span class="c-tag">&lt;/h2&gt;</span>
                    </span>
                </div>
            </div>
        </div>

        <div class="parcours-grid">
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">2019 - 2021</div>
                    <div class="timeline-title">BTS SIO SLAM</div>
                    <p class="timeline-text">Formation développement web : programmation orientée objet, bases de données, architecture MVC.</p>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">2021 - 2023</div>
                    <div class="timeline-title">Parcours Entrepreneurial</div>
                    <p class="timeline-text">Expériences multiples : livraison, automobile, trading. Apprentissage terrain de la gestion et des affaires.</p>
                </div>

                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">2023 - Aujourd'hui</div>
                    <div class="timeline-title">Développeur Web Freelance</div>
                    <p class="timeline-text">Spécialisé Laravel & React. 15+ projets livrés. Vision technique couplée à l'expérience business.</p>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-num" data-value="15">0</div>
                    <div class="stat-label">projets livrés</div>
                </div>
                <div class="stat-card">
                    <div class="stat-num" data-value="100" data-suffix="%">0</div>
                    <div class="stat-label">dans les délais</div>
                </div>
                <div class="stat-card">
                    <div class="stat-num" data-value="24" data-suffix="h">0</div>
                    <div class="stat-label">réponse garantie</div>
                </div>
                <div class="stat-card">
                    <div class="stat-num c-accent" data-value="5.5" data-suffix="k€">0</div>
                    <div class="stat-label">plus gros projet</div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ==================== CONTACT ==================== -->
<section id="contact">
    <div class="max-w-7xl mx-auto px-6">
        <div class="section-header">
            <div class="section-code">
                <div class="section-line">
                    <span class="line-num">16</span>
                    <span class="line-content"><span class="c-comment">// Contact</span></span>
                </div>
                <div class="section-line">
                    <span class="line-num">17</span>
                    <span class="line-content">
                        <span class="c-tag">&lt;h2&gt;</span><span class="c-text">Un projet en</span> <span class="c-accent">tête ?</span><span class="c-tag">&lt;/h2&gt;</span>
                    </span>
                </div>
            </div>
        </div>

        <div class="contact-grid">
            <a href="mailto:contact@soufianesimmou.fr" class="contact-card">
                <div class="contact-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <div class="contact-label">Email</div>
                    <div class="contact-value">contact@soufianesimmou.fr</div>
                </div>
            </a>

            <a href="https://linkedin.com/in/soufiane-simmou" target="_blank" class="contact-card">
                <div class="contact-icon">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                    </svg>
                </div>
                <div>
                    <div class="contact-label">LinkedIn</div>
                    <div class="contact-value">Connectons-nous</div>
                </div>
            </a>

            <a href="https://github.com/soufiane-simmou" target="_blank" class="contact-card">
                <div class="contact-icon">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                </div>
                <div>
                    <div class="contact-label">GitHub</div>
                    <div class="contact-value">Voir mon code</div>
                </div>
            </a>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.querySelectorAll('.project-card').forEach(card => {
    const video = card.querySelector('video');
    if (video) {
        card.addEventListener('mouseenter', () => video.play().catch(() => {}));
        card.addEventListener('mouseleave', () => video.pause());
    }
});
</script>
@endpush

@endsection
