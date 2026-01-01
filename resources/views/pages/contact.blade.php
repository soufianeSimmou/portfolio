@extends('layouts.app')

@section('title', 'Contact - Soufiane Simmou')
@section('description', 'Contactez-moi pour discuter de votre projet. Disponible pour des missions freelance.')

@push('styles')
<style>
    /* Page Hero */
    .page-hero {
        padding: 120px 0 60px;
        position: relative;
        overflow: hidden;
    }
    .page-hero::before {
        content: '';
        position: absolute;
        top: -150px;
        left: 50%;
        transform: translateX(-50%);
        width: 800px;
        height: 800px;
        background: radial-gradient(circle, rgba(255,77,0,0.06) 0%, transparent 50%);
        pointer-events: none;
    }

    /* Code Header */
    .code-header {
        font-family: 'JetBrains Mono', monospace;
        margin-bottom: 60px;
        text-align: center;
    }
    .code-header-line {
        display: inline-flex;
        align-items: center;
        gap: 16px;
    }
    .line-number { color: #444; font-size: 14px; }
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
        max-width: 450px;
        margin: 16px auto 0;
    }

    /* Contact Grid */
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: start;
    }
    @media (max-width: 900px) {
        .contact-grid { grid-template-columns: 1fr; gap: 40px; }
    }

    /* Form Card */
    .form-card {
        background: linear-gradient(135deg, #111 0%, #0d0d0d 100%);
        border: 1px solid #1a1a1a;
        border-radius: 20px;
        padding: 40px;
    }

    .form-header {
        margin-bottom: 32px;
    }
    .form-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .form-title::before {
        content: '>';
        color: #ff4d00;
        font-family: 'JetBrains Mono', monospace;
    }
    .form-subtitle {
        color: #666;
        font-size: 14px;
    }

    /* Form Inputs */
    .form-group {
        margin-bottom: 24px;
    }
    .form-label {
        display: block;
        font-size: 13px;
        font-weight: 500;
        margin-bottom: 10px;
        color: #888;
    }
    .form-input {
        width: 100%;
        padding: 14px 18px;
        background: rgba(255,255,255,0.03);
        border: 1px solid #222;
        border-radius: 10px;
        color: #fff;
        font-size: 14px;
        font-family: inherit;
        transition: all 0.3s ease;
    }
    .form-input:focus {
        outline: none;
        border-color: #ff4d00;
        background: rgba(255,77,0,0.05);
        box-shadow: 0 0 0 3px rgba(255,77,0,0.1);
    }
    .form-input::placeholder {
        color: #444;
    }
    textarea.form-input {
        resize: vertical;
        min-height: 140px;
    }

    /* Submit Button */
    .submit-btn {
        width: 100%;
        padding: 16px 32px;
        background: linear-gradient(135deg, #ff4d00 0%, #ff6a2a 100%);
        border: none;
        border-radius: 10px;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        font-family: inherit;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(255,77,0,0.3);
    }
    .submit-btn:active {
        transform: translateY(-1px);
    }
    .submit-btn svg {
        transition: transform 0.3s ease;
    }
    .submit-btn:hover svg {
        transform: translateX(4px);
    }

    /* Success Message */
    .success-message {
        padding: 16px 20px;
        background: rgba(34,197,94,0.1);
        border: 1px solid rgba(34,197,94,0.2);
        border-radius: 10px;
        color: #22c55e;
        font-size: 14px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* Info Section */
    .info-section {
    }

    /* Contact Cards */
    .contact-cards {
        display: flex;
        flex-direction: column;
        gap: 16px;
        margin-bottom: 32px;
    }

    .contact-card {
        background: linear-gradient(135deg, #111 0%, #0d0d0d 100%);
        border: 1px solid #1a1a1a;
        border-radius: 14px;
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 18px;
        transition: all 0.4s ease;
    }
    .contact-card:hover {
        border-color: #2a2a2a;
        transform: translateX(8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.3);
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
        transition: all 0.3s ease;
    }
    .contact-card:hover .contact-icon {
        background: #ff4d00;
        transform: scale(1.1) rotate(-5deg);
    }
    .contact-icon svg {
        width: 22px;
        height: 22px;
        color: #ff4d00;
        transition: color 0.3s ease;
    }
    .contact-card:hover .contact-icon svg {
        color: #fff;
    }

    .contact-info h4 {
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 4px;
    }
    .contact-info p {
        color: #666;
        font-size: 13px;
    }

    /* Availability Card */
    .availability-card {
        background: linear-gradient(135deg, rgba(34,197,94,0.1) 0%, rgba(34,197,94,0.05) 100%);
        border: 1px solid rgba(34,197,94,0.2);
        border-radius: 14px;
        padding: 24px;
    }

    .availability-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }
    .availability-dot {
        width: 10px;
        height: 10px;
        background: #22c55e;
        border-radius: 50%;
        position: relative;
    }
    .availability-dot::before {
        content: '';
        position: absolute;
        inset: -4px;
        border-radius: 50%;
        border: 2px solid rgba(34,197,94,0.3);
        animation: pulse-ring 2s ease-out infinite;
    }
    @keyframes pulse-ring {
        0% { transform: scale(1); opacity: 1; }
        100% { transform: scale(1.5); opacity: 0; }
    }
    .availability-status {
        color: #22c55e;
        font-weight: 600;
        font-size: 15px;
    }
    .availability-text {
        color: #888;
        font-size: 14px;
        line-height: 1.6;
    }

    /* Response Time */
    .response-card {
        background: linear-gradient(135deg, #111 0%, #0d0d0d 100%);
        border: 1px solid #1a1a1a;
        border-radius: 14px;
        padding: 24px;
        margin-top: 16px;
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .response-icon {
        width: 44px;
        height: 44px;
        background: rgba(255,77,0,0.1);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .response-icon svg {
        width: 20px;
        height: 20px;
        color: #ff4d00;
    }
    .response-info h4 {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 2px;
    }
    .response-info p {
        color: #666;
        font-size: 13px;
    }
</style>
@endpush

@section('content')
<div class="page-hero">
    <div class="max-w-5xl mx-auto px-6">
        <div class="code-header">
            <div class="code-header-line">
                <span class="line-number">1</span>
                <span class="code-comment">// Nouveau projet ?</span>
            </div>
            <div class="code-header-line" style="margin-top: 8px;">
                <span class="line-number">2</span>
                <span class="page-title-code">
                    <span class="code-tag">&lt;h1&gt;</span>
                    <span class="code-text">Travaillons</span>
                    <span class="code-accent">ensemble</span>
                    <span class="code-tag">&lt;/h1&gt;</span>
                </span>
            </div>
            <p class="page-desc">Un projet en tête ? Une question ? N'hésitez pas à me contacter. Je réponds généralement sous 24h.</p>
        </div>
    </div>
</div>

<div class="max-w-5xl mx-auto px-6 pb-20">
    <div class="contact-grid">
        <!-- Form -->
        <div class="form-card">
            <div class="form-header">
                <h2 class="form-title">Envoyez-moi un message</h2>
                <p class="form-subtitle">Tous les champs sont requis</p>
            </div>

            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf

                @if(session('success'))
                <div class="success-message">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    {{ session('success') }}
                </div>
                @endif

                <div class="form-group">
                    <label for="name" class="form-label">Nom complet</label>
                    <input type="text" id="name" name="name" required class="form-input" placeholder="John Doe">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" id="email" name="email" required class="form-input" placeholder="john@exemple.com">
                </div>

                <div class="form-group">
                    <label for="subject" class="form-label">Sujet</label>
                    <select id="subject" name="subject" class="form-input">
                        <option value="projet">Nouveau projet</option>
                        <option value="devis">Demande de devis</option>
                        <option value="collaboration">Collaboration</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" name="message" required class="form-input" placeholder="Décrivez votre projet en quelques lignes..."></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    Envoyer le message
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </form>
        </div>

        <!-- Info -->
        <div class="info-section">
            <div class="contact-cards">
                <a href="mailto:contact@soufianesimmou.fr" class="contact-card">
                    <div class="contact-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div class="contact-info">
                        <h4>Email</h4>
                        <p>contact@soufianesimmou.fr</p>
                    </div>
                </a>

                <a href="https://linkedin.com/in/soufiane-simmou" target="_blank" class="contact-card">
                    <div class="contact-icon">
                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </div>
                    <div class="contact-info">
                        <h4>LinkedIn</h4>
                        <p>Connectons-nous</p>
                    </div>
                </a>

                <a href="https://github.com/soufiane-simmou" target="_blank" class="contact-card">
                    <div class="contact-icon">
                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </div>
                    <div class="contact-info">
                        <h4>GitHub</h4>
                        <p>Voir mon code</p>
                    </div>
                </a>
            </div>

            <div class="availability-card">
                <div class="availability-header">
                    <span class="availability-dot"></span>
                    <span class="availability-status">Disponible</span>
                </div>
                <p class="availability-text">Actuellement disponible pour des missions freelance. N'hésitez pas à me contacter pour discuter de votre projet.</p>
            </div>

            <div class="response-card">
                <div class="response-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="response-info">
                    <h4>Temps de réponse</h4>
                    <p>Généralement sous 24 heures</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
