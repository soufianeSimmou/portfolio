@extends('layouts.app')

@section('title', 'Projets - Soufiane Simmou')
@section('description', 'Découvrez mes réalisations : applications web, SaaS, e-commerce et projets d\'automatisation.')

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
        left: -100px;
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

    /* Projects Grid */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 28px;
        margin-bottom: 80px;
    }

    /* Project Card */
    .project-card {
        background: #111;
        border: 1px solid #1a1a1a;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .project-card:hover {
        transform: translateY(-8px);
        border-color: #2a2a2a;
        box-shadow: 0 30px 60px rgba(0,0,0,0.4);
    }

    /* Video Container */
    .video-container {
        aspect-ratio: 16/10;
        background: #0a0a0a;
        position: relative;
        overflow: hidden;
    }
    .video-container video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .project-card:hover .video-container video {
        transform: scale(1.08);
    }

    /* Video Overlay */
    .video-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0.3) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 1;
        transition: opacity 0.4s ease;
    }
    .project-card:hover .video-overlay {
        opacity: 0;
    }

    /* Play Button */
    .play-btn {
        width: 60px;
        height: 60px;
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    .play-btn svg {
        width: 24px;
        height: 24px;
        color: #fff;
        margin-left: 3px;
    }
    .project-card:hover .play-btn {
        transform: scale(1.1);
        background: rgba(255,77,0,0.8);
        border-color: #ff4d00;
    }

    /* Badge */
    .project-badge {
        position: absolute;
        top: 16px;
        right: 16px;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: 8px;
        backdrop-filter: blur(10px);
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    /* Card Body */
    .card-body {
        padding: 24px;
    }
    .card-body h3 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 10px;
        transition: color 0.3s ease;
    }
    .project-card:hover .card-body h3 {
        color: #ff4d00;
    }
    .card-body p {
        color: #666;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 16px;
    }

    /* Tech Stack */
    .tech-stack {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    .tech-item {
        font-size: 11px;
        color: #888;
        background: rgba(255,255,255,0.05);
        padding: 5px 12px;
        border-radius: 100px;
        transition: all 0.2s ease;
    }
    .project-card:hover .tech-item {
        background: rgba(255,77,0,0.1);
        color: #ff4d00;
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

    /* Responsive */
    @media (max-width: 768px) {
        .projects-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="page-hero">
    <div class="max-w-6xl mx-auto px-6">
        <div class="code-header">
            <div class="code-header-line">
                <span class="line-number">1</span>
                <span class="code-comment">// Portfolio</span>
            </div>
            <div class="code-header-line">
                <span class="line-number">2</span>
                <span class="page-title-code">
                    <span class="code-tag">&lt;h1&gt;</span>
                    <span class="code-text">Mes</span>
                    <span class="code-accent">réalisations</span>
                    <span class="code-tag">&lt;/h1&gt;</span>
                </span>
            </div>
            <p class="page-desc">Une sélection de projets sur lesquels j'ai travaillé. Du SaaS à l'e-commerce en passant par l'automatisation.</p>
        </div>
    </div>
</div>

<div class="max-w-6xl mx-auto px-6">
    <div class="projects-grid">
        @foreach($projects as $index => $project)
        <a href="{{ route('projet.detail', $project['id']) }}" class="project-card" data-index="{{ $index }}">
            <div class="video-container">
                <video class="project-video" poster="{{ asset($project['poster']) }}" muted playsinline loop preload="metadata">
                    <source src="{{ asset($project['video']) }}" type="video/mp4">
                </video>
                <div class="video-overlay">
                    <div class="play-btn">
                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </div>
                </div>
                @php
                    $badgeClass = match(true) {
                        str_contains($project['status'], 'Livré') => 'bg-green-500/20 text-green-400 border border-green-500/30',
                        str_contains($project['status'], 'Fonctionnel') && !str_contains($project['status'], 'Non') => 'bg-blue-500/20 text-blue-400 border border-blue-500/30',
                        str_contains($project['status'], 'Arrêté') => 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30',
                        default => 'bg-purple-500/20 text-purple-400 border border-purple-500/30'
                    };
                @endphp
                <span class="project-badge {{ $badgeClass }}">{{ Str::limit($project['status'], 15) }}</span>
            </div>
            <div class="card-body">
                <h3>{{ $project['title'] }}</h3>
                <p>{{ Str::limit($project['description'], 100) }}</p>
                <div class="tech-stack">
                    @foreach(array_slice($project['tech_stack'], 0, 4) as $tech)
                    <span class="tech-item">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- CTA -->
    <div class="cta-section">
        <h3 class="cta-title">Vous avez un projet similaire ?</h3>
        <p class="cta-desc">Discutons de vos besoins et voyons comment je peux vous aider.</p>
        <a href="{{ route('contact') }}" class="btn btn-accent">
            Démarrer un projet
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</div>

@push('scripts')
<script>
document.querySelectorAll('.project-card').forEach(card => {
    const video = card.querySelector('video');
    if (video) {
        card.addEventListener('mouseenter', () => video.play().catch(() => {}));
        card.addEventListener('mouseleave', () => {
            video.pause();
            video.currentTime = 0;
        });
    }
});
</script>
@endpush
@endsection
