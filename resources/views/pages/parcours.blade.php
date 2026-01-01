@extends('layouts.app')

@section('title', 'Parcours - Soufiane Simmou')
@section('description', 'Mon parcours : du BTS SIO à l\'entrepreneuriat, jusqu\'au développement web professionnel.')

@push('styles')
<style>
    /* Page Hero */
    .page-hero {
        padding: 120px 0 80px;
        position: relative;
        overflow: hidden;
    }
    .page-hero::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -200px;
        width: 700px;
        height: 700px;
        background: radial-gradient(circle, rgba(255,77,0,0.06) 0%, transparent 60%);
        pointer-events: none;
    }

    /* Code Header */
    .code-header {
        font-family: 'JetBrains Mono', monospace;
        margin-bottom: 60px;
    }
    .code-header-line {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .line-number { color: #444; font-size: 14px; width: 30px; text-align: right; }
    .code-comment { color: #6a9955; }
    .code-tag { color: #569cd6; }
    .code-text { color: #d4d4d4; }
    .code-accent { color: #ff4d00; }

    .page-title-code {
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 700;
        line-height: 1.2;
    }
    .page-desc {
        color: #888;
        font-size: 1.1rem;
        max-width: 550px;
        margin-top: 16px;
        padding-left: 46px;
    }

    /* Timeline Section */
    .timeline-section {
        position: relative;
        padding-left: 60px;
        margin-bottom: 100px;
    }

    /* Vertical Line */
    .timeline-section::before {
        content: '';
        position: absolute;
        left: 24px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, #ff4d00, #ff4d00 30%, #222 100%);
    }

    /* Timeline Item */
    .timeline-item {
        position: relative;
        padding-bottom: 50px;
    }
    .timeline-item:last-child {
        padding-bottom: 0;
    }

    /* Timeline Dot */
    .timeline-dot {
        position: absolute;
        left: -48px;
        top: 4px;
        width: 18px;
        height: 18px;
        background: #0a0a0a;
        border: 3px solid #ff4d00;
        border-radius: 50%;
        z-index: 2;
        transition: all 0.3s ease;
    }
    .timeline-item:hover .timeline-dot {
        background: #ff4d00;
        transform: scale(1.3);
        box-shadow: 0 0 20px rgba(255,77,0,0.5);
    }

    /* Timeline Card */
    .timeline-card {
        background: linear-gradient(135deg, #111 0%, #0d0d0d 100%);
        border: 1px solid #1a1a1a;
        border-radius: 16px;
        padding: 28px;
        transition: all 0.4s ease;
    }
    .timeline-item:hover .timeline-card {
        border-color: #2a2a2a;
        transform: translateX(10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    .timeline-date {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #ff4d00;
        margin-bottom: 12px;
    }
    .timeline-badge {
        font-size: 11px;
        padding: 4px 10px;
        border-radius: 6px;
        background: rgba(255,77,0,0.15);
        color: #ff4d00;
    }
    .timeline-badge.neutral {
        background: rgba(255,255,255,0.05);
        color: #888;
    }

    .timeline-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 12px;
    }
    .timeline-text {
        color: #666;
        line-height: 1.7;
        margin-bottom: 16px;
    }

    /* Tech Tags */
    .timeline-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    .timeline-tag {
        font-size: 11px;
        color: #666;
        background: rgba(255,255,255,0.03);
        padding: 5px 12px;
        border-radius: 6px;
    }

    /* Info Box */
    .info-box {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 16px;
        background: rgba(255,77,0,0.05);
        border: 1px solid rgba(255,77,0,0.1);
        border-radius: 10px;
        margin-top: 16px;
    }
    .info-box svg {
        width: 20px;
        height: 20px;
        color: #ff4d00;
        flex-shrink: 0;
        margin-top: 2px;
    }
    .info-box p {
        font-size: 13px;
        color: #888;
        line-height: 1.6;
        margin: 0;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 80px;
    }
    @media (max-width: 900px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
    }

    .stat-card {
        background: linear-gradient(135deg, #111 0%, #0d0d0d 100%);
        border: 1px solid #1a1a1a;
        border-radius: 16px;
        padding: 32px 24px;
        text-align: center;
        transition: all 0.4s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        border-color: #2a2a2a;
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    .stat-value {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1;
        margin-bottom: 8px;
        background: linear-gradient(135deg, #fff 0%, #888 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .stat-value.accent {
        background: linear-gradient(135deg, #ff4d00 0%, #ff6a2a 100%);
        -webkit-background-clip: text;
        background-clip: text;
    }
    .stat-label {
        font-size: 13px;
        color: #666;
    }

    /* Skills Section */
    .skills-section {
        margin-bottom: 80px;
    }
    .skills-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 32px;
    }
    .skills-header .line-number { color: #444; font-size: 14px; }
    .skills-title {
        font-size: 1.5rem;
        font-weight: 700;
    }

    .skills-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }
    @media (max-width: 900px) {
        .skills-grid { grid-template-columns: 1fr; }
    }

    .skill-card {
        background: linear-gradient(135deg, #111 0%, #0d0d0d 100%);
        border: 1px solid #1a1a1a;
        border-radius: 16px;
        padding: 28px;
        transition: all 0.4s ease;
    }
    .skill-card:hover {
        transform: translateY(-5px);
        border-color: #2a2a2a;
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    .skill-card h3 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .skill-card h3::before {
        content: '>';
        color: #ff4d00;
        font-family: 'JetBrains Mono', monospace;
    }

    .skill-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .skill-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 14px;
        color: #888;
        padding: 8px 0;
        border-bottom: 1px solid rgba(255,255,255,0.03);
    }
    .skill-item:last-child { border-bottom: none; }
    .skill-level {
        display: flex;
        gap: 4px;
    }
    .skill-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #222;
    }
    .skill-dot.filled { background: #ff4d00; }

    /* CTA Section */
    .cta-section {
        text-align: center;
        padding: 80px 0;
        position: relative;
    }
    .cta-section::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 800px;
        height: 400px;
        background: radial-gradient(ellipse, rgba(255,77,0,0.06) 0%, transparent 70%);
        pointer-events: none;
    }
    .cta-title { font-size: 2rem; font-weight: 700; margin-bottom: 16px; }
    .cta-desc { color: #666; margin-bottom: 32px; }
</style>
@endpush

@section('content')
<div class="page-hero">
    <div class="max-w-5xl mx-auto px-6">
        <div class="code-header">
            <div class="code-header-line">
                <span class="line-number">1</span>
                <span class="code-comment">// Parcours professionnel</span>
            </div>
            <div class="code-header-line">
                <span class="line-number">2</span>
                <span class="page-title-code">
                    <span class="code-tag">&lt;h1&gt;</span>
                    <span class="code-text">Mon</span>
                    <span class="code-accent">histoire</span>
                    <span class="code-tag">&lt;/h1&gt;</span>
                </span>
            </div>
            <p class="page-desc">Un parcours atypique entre formation, entrepreneuriat et développement web. Chaque étape m'a appris quelque chose d'essentiel.</p>
        </div>
    </div>
</div>

<div class="max-w-5xl mx-auto px-6">
    <!-- Timeline -->
    <div class="timeline-section">
        <!-- BTS SIO -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <div class="timeline-date">
                    2019 - 2021
                    <span class="timeline-badge">Formation</span>
                </div>
                <h3 class="timeline-title">BTS SIO - Option SLAM</h3>
                <p class="timeline-text">Découverte de la programmation et des bases de données. J'ai appris les fondamentaux qui me servent encore aujourd'hui : algorithmique, SQL, PHP, et les bonnes pratiques de développement.</p>
                <div class="timeline-tags">
                    <span class="timeline-tag">PHP</span>
                    <span class="timeline-tag">SQL</span>
                    <span class="timeline-tag">HTML/CSS</span>
                    <span class="timeline-tag">JavaScript</span>
                </div>
            </div>
        </div>

        <!-- Entrepreneuriat -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <div class="timeline-date">
                    2021 - 2023
                    <span class="timeline-badge neutral">Entrepreneuriat</span>
                </div>
                <h3 class="timeline-title">Expériences Entrepreneuriales</h3>
                <p class="timeline-text">Deux années intenses d'expériences variées. Livreur indépendant, achat-revente automobile, et trading. J'ai perdu 22k€ en trading, mais j'ai appris des leçons inestimables sur la gestion du risque et la résilience.</p>
                <div class="info-box">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p>Cette période m'a appris l'importance de capitaliser sur ses compétences plutôt que de chercher des raccourcis.</p>
                </div>
            </div>
        </div>

        <!-- Dev Web -->
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <div class="timeline-date">
                    2023 - Présent
                    <span class="timeline-badge">Actuel</span>
                </div>
                <h3 class="timeline-title">Développeur Fullstack</h3>
                <p class="timeline-text">Retour à ma passion première : la création. J'ai commencé avec Kira, un assistant IA en Python, puis je me suis spécialisé dans le développement web avec Laravel. Aujourd'hui, je combine mes compétences techniques et ma vision business.</p>
                <div class="timeline-tags">
                    <span class="timeline-tag">Laravel</span>
                    <span class="timeline-tag">React</span>
                    <span class="timeline-tag">Python</span>
                    <span class="timeline-tag">GPT API</span>
                    <span class="timeline-tag">Tailwind</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-value" data-value="23">0</div>
            <div class="stat-label">ans</div>
        </div>
        <div class="stat-card">
            <div class="stat-value" data-value="2">0</div>
            <div class="stat-label">années d'expérience</div>
        </div>
        <div class="stat-card">
            <div class="stat-value" data-value="5">0</div>
            <div class="stat-label">projets majeurs</div>
        </div>
        <div class="stat-card">
            <div class="stat-value accent" data-value="6" data-suffix="k€">0</div>
            <div class="stat-label">plus gros projet</div>
        </div>
    </div>

    <!-- Skills -->
    <div class="skills-section">
        <div class="skills-header">
            <span class="line-number">3</span>
            <h2 class="skills-title"><span class="code-tag">&lt;h2&gt;</span> Compétences <span class="code-tag">&lt;/h2&gt;</span></h2>
        </div>

        <div class="skills-grid">
            <div class="skill-card">
                <h3>Back-end</h3>
                <div class="skill-list">
                    <div class="skill-item">
                        <span>Laravel / PHP</span>
                        <div class="skill-level">
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot"></span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span>Python</span>
                        <div class="skill-level">
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot"></span>
                            <span class="skill-dot"></span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span>MySQL / PostgreSQL</span>
                        <div class="skill-level">
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot"></span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span>API REST</span>
                        <div class="skill-level">
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="skill-card">
                <h3>Front-end</h3>
                <div class="skill-list">
                    <div class="skill-item">
                        <span>React / Vue.js</span>
                        <div class="skill-level">
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot"></span>
                            <span class="skill-dot"></span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span>Tailwind CSS</span>
                        <div class="skill-level">
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span>JavaScript / TS</span>
                        <div class="skill-level">
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot"></span>
                            <span class="skill-dot"></span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span>GSAP / Animations</span>
                        <div class="skill-level">
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot"></span>
                            <span class="skill-dot"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="skill-card">
                <h3>Outils</h3>
                <div class="skill-list">
                    <div class="skill-item">
                        <span>Git / GitHub</span>
                        <div class="skill-level">
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot"></span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span>Docker</span>
                        <div class="skill-level">
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot"></span>
                            <span class="skill-dot"></span>
                            <span class="skill-dot"></span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span>VS Code</span>
                        <div class="skill-level">
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span>Figma</span>
                        <div class="skill-level">
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot filled"></span>
                            <span class="skill-dot"></span>
                            <span class="skill-dot"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="cta-section">
        <h3 class="cta-title">Envie de travailler ensemble ?</h3>
        <p class="cta-desc">Je suis disponible pour des missions freelance.</p>
        <a href="{{ route('contact') }}" class="btn btn-accent">
            Me contacter
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</div>
@endsection
