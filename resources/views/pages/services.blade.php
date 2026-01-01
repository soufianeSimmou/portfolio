@extends('layouts.app')

@section('title', 'Services - Soufiane Simmou')
@section('description', 'Découvrez mes services : développement web, création de SaaS, e-commerce et automatisation.')

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
        right: -100px;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(255,77,0,0.08) 0%, transparent 60%);
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
    .line-number {
        color: #444;
        font-size: 14px;
        width: 30px;
        text-align: right;
    }
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
        max-width: 500px;
        margin-top: 16px;
        padding-left: 46px;
    }

    /* Service Cards Grid */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 24px;
        margin-bottom: 80px;
    }

    /* Service Card */
    .service-card {
        background: linear-gradient(135deg, #111 0%, #0d0d0d 100%);
        border: 1px solid #1a1a1a;
        border-radius: 16px;
        padding: 32px;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #ff4d00, transparent);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }
    .service-card:hover {
        transform: translateY(-8px) rotateX(0deg);
        border-color: #2a2a2a;
        box-shadow: 0 25px 50px rgba(0,0,0,0.4);
    }
    .service-card:hover::before {
        transform: scaleX(1);
    }

    /* Card Number */
    .card-number {
        position: absolute;
        top: 20px;
        right: 24px;
        font-size: 4rem;
        font-weight: 800;
        color: rgba(255,77,0,0.08);
        line-height: 1;
    }

    /* Card Icon */
    .card-icon-wrap {
        width: 56px;
        height: 56px;
        background: rgba(255,77,0,0.1);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
        transition: all 0.4s ease;
        position: relative;
    }
    .card-icon-wrap::after {
        content: '';
        position: absolute;
        inset: -4px;
        border-radius: 18px;
        border: 2px solid transparent;
        transition: border-color 0.3s ease;
    }
    .service-card:hover .card-icon-wrap {
        background: #ff4d00;
        transform: scale(1.1) rotate(-5deg);
    }
    .service-card:hover .card-icon-wrap::after {
        border-color: rgba(255,77,0,0.3);
    }
    .card-icon-wrap svg {
        width: 28px;
        height: 28px;
        color: #ff4d00;
        transition: color 0.3s ease;
    }
    .service-card:hover .card-icon-wrap svg {
        color: #fff;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 12px;
    }
    .card-desc {
        color: #666;
        line-height: 1.7;
        margin-bottom: 24px;
    }

    /* Features List */
    .features-list {
        space-y: 12px;
    }
    .feature-item {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #888;
        font-size: 14px;
        padding: 8px 0;
    }
    .feature-check {
        width: 20px;
        height: 20px;
        background: rgba(255,77,0,0.15);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .feature-check svg {
        width: 12px;
        height: 12px;
        color: #ff4d00;
    }

    /* Tech Tags */
    .tech-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 24px;
        padding-top: 24px;
        border-top: 1px solid rgba(255,255,255,0.05);
    }
    .tech-tag {
        font-size: 12px;
        color: #666;
        background: rgba(255,255,255,0.03);
        padding: 6px 12px;
        border-radius: 6px;
        transition: all 0.2s ease;
    }
    .tech-tag:hover {
        color: #ff4d00;
        background: rgba(255,77,0,0.1);
    }

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
    .cta-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 16px;
    }
    .cta-desc {
        color: #666;
        margin-bottom: 32px;
    }
</style>
@endpush

@section('content')
<div class="page-hero">
    <div class="max-w-6xl mx-auto px-6">
        <div class="code-header">
            <div class="code-header-line">
                <span class="line-number">1</span>
                <span class="code-comment">// Services disponibles</span>
            </div>
            <div class="code-header-line">
                <span class="line-number">2</span>
                <span class="page-title-code">
                    <span class="code-tag">&lt;h1&gt;</span>
                    <span class="code-text">Ce que je</span>
                    <span class="code-accent">propose</span>
                    <span class="code-tag">&lt;/h1&gt;</span>
                </span>
            </div>
            <p class="page-desc">Des solutions sur mesure pour vos projets digitaux. Du développement web à l'automatisation, je vous accompagne de A à Z.</p>
        </div>
    </div>
</div>

<div class="max-w-6xl mx-auto px-6">
    <div class="services-grid">
        <!-- Dev Web -->
        <div class="service-card" data-service="1">
            <span class="card-number">01</span>
            <div class="card-icon-wrap">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                </svg>
            </div>
            <h2 class="card-title">Développement Web</h2>
            <p class="card-desc">Applications web modernes et performantes avec les dernières technologies. Architecture solide, code maintenable.</p>
            <div class="features-list">
                <div class="feature-item">
                    <span class="feature-check"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <span>Sites vitrines & landing pages</span>
                </div>
                <div class="feature-item">
                    <span class="feature-check"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <span>Applications web complexes</span>
                </div>
                <div class="feature-item">
                    <span class="feature-check"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <span>APIs & back-end robustes</span>
                </div>
            </div>
            <div class="tech-tags">
                <span class="tech-tag">Laravel</span>
                <span class="tech-tag">React</span>
                <span class="tech-tag">Tailwind</span>
                <span class="tech-tag">MySQL</span>
            </div>
        </div>

        <!-- SaaS -->
        <div class="service-card" data-service="2">
            <span class="card-number">02</span>
            <div class="card-icon-wrap">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <h2 class="card-title">Création SaaS</h2>
            <p class="card-desc">Logiciels en tant que service complets. De l'idée au produit prêt à être commercialisé.</p>
            <div class="features-list">
                <div class="feature-item">
                    <span class="feature-check"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <span>Gestion utilisateurs & rôles</span>
                </div>
                <div class="feature-item">
                    <span class="feature-check"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <span>Paiements Stripe intégrés</span>
                </div>
                <div class="feature-item">
                    <span class="feature-check"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <span>Dashboard & analytics</span>
                </div>
            </div>
            <div class="tech-tags">
                <span class="tech-tag">Laravel</span>
                <span class="tech-tag">Stripe</span>
                <span class="tech-tag">API REST</span>
            </div>
        </div>

        <!-- E-commerce -->
        <div class="service-card" data-service="3">
            <span class="card-number">03</span>
            <div class="card-icon-wrap">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <h2 class="card-title">E-Commerce</h2>
            <p class="card-desc">Boutiques en ligne performantes et sécurisées. Interface intuitive, tunnel de vente optimisé.</p>
            <div class="features-list">
                <div class="feature-item">
                    <span class="feature-check"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <span>Paiement sécurisé</span>
                </div>
                <div class="feature-item">
                    <span class="feature-check"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <span>Gestion des stocks</span>
                </div>
                <div class="feature-item">
                    <span class="feature-check"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <span>Interface admin complète</span>
                </div>
            </div>
            <div class="tech-tags">
                <span class="tech-tag">Laravel</span>
                <span class="tech-tag">Stripe</span>
                <span class="tech-tag">PayPal</span>
            </div>
        </div>

        <!-- Automatisation -->
        <div class="service-card" data-service="4">
            <span class="card-number">04</span>
            <div class="card-icon-wrap">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <h2 class="card-title">Automatisation & IA</h2>
            <p class="card-desc">Gagnez du temps avec des scripts sur mesure. Intégration d'IA pour automatiser vos tâches.</p>
            <div class="features-list">
                <div class="feature-item">
                    <span class="feature-check"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <span>Scripts Python personnalisés</span>
                </div>
                <div class="feature-item">
                    <span class="feature-check"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <span>Intégration GPT API</span>
                </div>
                <div class="feature-item">
                    <span class="feature-check"><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span>
                    <span>Web scraping & data</span>
                </div>
            </div>
            <div class="tech-tags">
                <span class="tech-tag">Python</span>
                <span class="tech-tag">GPT API</span>
                <span class="tech-tag">Selenium</span>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="cta-section">
        <h3 class="cta-title">Un projet en tête ?</h3>
        <p class="cta-desc">Discutons de vos besoins et trouvons la meilleure solution ensemble.</p>
        <a href="{{ route('contact') }}" class="btn btn-accent">
            Me contacter
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</div>
@endsection
