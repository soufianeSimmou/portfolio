<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Soufiane Simmou - Développeur Fullstack')</title>
    <meta name="description" content="@yield('description', 'Portfolio de Soufiane Simmou, développeur fullstack spécialisé en Laravel, Python et création de SaaS.')">

    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Soufiane Simmou - Développeur Fullstack')">
    <meta property="og:description" content="@yield('description', 'Portfolio de Soufiane Simmou, développeur fullstack.')">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { font-family: 'JetBrains Mono', monospace; }
        body { background: #0a0a0a; color: #e5e5e5; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0a0a0a; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 3px; }

        .accent { color: #ff4d00; }
        .bg-accent { background: #ff4d00; }
        .text-muted { color: #666; }
        .text-subtle { color: #888; }

        /* Nav */
        .nav-logo { transition: transform 0.2s; }
        .nav-logo:hover { transform: scale(1.05); }

        .cursor-blink {
            animation: blink 1s step-end infinite;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Nav Tabs */
        .nav-tabs {
            display: flex;
            background: rgba(255,255,255,0.03);
            border-radius: 10px;
            padding: 4px;
            gap: 2px;
        }
        .nav-tab {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            font-size: 13px;
            color: #666;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .nav-tab .tab-icon {
            font-size: 8px;
            opacity: 0;
            transform: scale(0);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            color: #ff4d00;
        }
        .nav-tab:hover {
            color: #fff;
            background: rgba(255,255,255,0.05);
        }
        .nav-tab:hover .tab-icon {
            opacity: 1;
            transform: scale(1);
        }
        .nav-tab.active {
            color: #fff;
            background: rgba(255,77,0,0.15);
        }
        .nav-tab.active .tab-icon {
            opacity: 1;
            transform: scale(1);
        }
        .nav-tab.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 2px;
            background: #ff4d00;
            border-radius: 2px;
        }

        /* Status badge */
        .nav-status {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: #22c55e;
        }
        .status-dot-live {
            width: 8px;
            height: 8px;
            background: #22c55e;
            border-radius: 50%;
            position: relative;
        }
        .status-dot-live::before {
            content: '';
            position: absolute;
            inset: -3px;
            border: 1px solid rgba(34,197,94,0.5);
            border-radius: 50%;
            animation: pulse-ring 2s ease-out infinite;
        }
        @keyframes pulse-ring {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.5); opacity: 0; }
        }

        /* CTA Button */
        .nav-cta-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 500;
            color: #fff;
            background: #ff4d00;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .nav-cta-btn:hover {
            background: #ff6a2a;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(255,77,0,0.3);
        }
        .nav-cta-btn .cta-arrow {
            transition: transform 0.3s ease;
        }
        .nav-cta-btn:hover .cta-arrow {
            transform: translateX(4px);
        }

        /* Hamburger */
        .hamburger {
            width: 20px;
            height: 14px;
            position: relative;
            cursor: pointer;
        }
        .hamburger span {
            display: block;
            position: absolute;
            height: 2px;
            width: 100%;
            background: #fff;
            border-radius: 1px;
            transition: all 0.3s ease;
        }
        .hamburger span:nth-child(1) { top: 0; }
        .hamburger span:nth-child(2) { top: 6px; width: 70%; }
        .hamburger span:nth-child(3) { top: 12px; }

        .mobile-menu-btn.active .hamburger span:nth-child(1) {
            transform: rotate(45deg);
            top: 6px;
        }
        .mobile-menu-btn.active .hamburger span:nth-child(2) {
            opacity: 0;
            width: 0;
        }
        .mobile-menu-btn.active .hamburger span:nth-child(3) {
            transform: rotate(-45deg);
            top: 6px;
        }

        /* Mobile Menu */
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            background: #0a0a0a;
        }
        .mobile-menu.active {
            max-height: 300px;
        }
        .mobile-nav-link {
            display: block;
            padding: 12px 0;
            color: #888;
            font-size: 14px;
            transition: color 0.2s;
        }
        .mobile-nav-link:hover, .mobile-nav-link.active {
            color: #ff4d00;
        }

        .btn { display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; font-size: 14px; font-weight: 500; border-radius: 6px; transition: all 0.2s; }
        .btn-accent { background: #ff4d00; color: #fff; }
        .btn-accent:hover { background: #ff6a2a; transform: translateY(-1px); }
        .btn-ghost { background: transparent; color: #888; border: 1px solid #222; }
        .btn-ghost:hover { border-color: #444; color: #fff; }
        .btn-sm { padding: 8px 16px; font-size: 13px; }

        .card { background: #111; border-radius: 12px; padding: 24px; transition: all 0.3s; }
        .card:hover { background: #151515; }

        .page-header { padding: 80px 0 60px; }
        .page-title { font-size: clamp(2rem, 5vw, 3rem); font-weight: 700; line-height: 1.1; letter-spacing: -0.02em; }

        .input { width: 100%; background: #111; border: 1px solid #222; border-radius: 8px; padding: 12px 16px; color: #fff; font-size: 14px; transition: border-color 0.2s; }
        .input:focus { outline: none; border-color: #ff4d00; }
        .input::placeholder { color: #444; }
        textarea.input { resize: vertical; min-height: 120px; }

        .badge { font-size: 10px; font-weight: 600; padding: 4px 8px; border-radius: 4px; text-transform: uppercase; letter-spacing: 0.5px; }

        /* ========================================
           CODE BACKGROUND - Global Animated
        ======================================== */
        .code-bg-global {
            position: fixed;
            top: -50vh;
            left: 0;
            width: 100vw;
            height: 200vh;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .code-bg-global::before {
            content: '';
            position: absolute;
            top: 10%;
            right: 0%;
            width: 50%;
            height: 50%;
            background: radial-gradient(circle, rgba(255,85,0,0.08) 0%, transparent 60%);
            filter: blur(80px);
        }

        .code-bg-global::after {
            content: '';
            position: absolute;
            bottom: 15%;
            left: 0%;
            width: 50%;
            height: 50%;
            background: radial-gradient(circle, rgba(86,156,214,0.06) 0%, transparent 60%);
            filter: blur(70px);
        }

        .code-symbol {
            position: absolute;
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700;
            opacity: 0.1;
            user-select: none;
        }

        .code-symbol.orange { color: #ff5500; }
        .code-symbol.blue { color: #569cd6; }
        .code-symbol.yellow { color: #dcdcaa; }
        .code-symbol.purple { color: #c586c0; }
        .code-symbol.green { color: #6a9955; }
        .code-symbol.cyan { color: #4ec9b0; }
        .code-symbol.red { color: #f14c4c; }
        .code-symbol.pink { color: #d16d9e; }
        .code-symbol.gold { color: #ffd700; }

        /* Animations flottantes */
        @keyframes float-1 { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-20px) rotate(3deg); } }
        @keyframes float-2 { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(15px) rotate(-2deg); } }
        @keyframes float-3 { 0%, 100% { transform: translateX(0); } 50% { transform: translateX(10px); } }
        @keyframes float-4 { 0%, 100% { transform: translate(0, 0); } 50% { transform: translate(-8px, 12px); } }
        @keyframes float-5 { 0%, 100% { transform: translateY(0) scale(1); } 50% { transform: translateY(-15px) scale(1.05); } }

        .float-1 { animation: float-1 8s ease-in-out infinite; }
        .float-2 { animation: float-2 10s ease-in-out infinite; }
        .float-3 { animation: float-3 7s ease-in-out infinite; }
        .float-4 { animation: float-4 12s ease-in-out infinite; }
        .float-5 { animation: float-5 9s ease-in-out infinite; }
    </style>
    @stack('styles')
</head>
<body class="antialiased">

    <!-- CODE BACKGROUND - Global Animated (25 symbols, varied sizes) -->
    <div class="code-bg-global">
        <!-- Très gros -->
        <span class="code-symbol orange float-1" style="top: 28%; left: 1%; font-size: 150px;">{</span>
        <span class="code-symbol blue float-3" style="top: 55%; left: 75%; font-size: 130px;">}</span>
        <span class="code-symbol gold float-5" style="top: 42%; left: 40%; font-size: 120px;">(</span>

        <!-- Gros -->
        <span class="code-symbol purple float-2" style="top: 35%; left: 60%; font-size: 80px;">=&gt;</span>
        <span class="code-symbol orange float-4" style="top: 60%; left: 5%; font-size: 90px;">]</span>
        <span class="code-symbol cyan float-1" style="top: 48%; left: 85%; font-size: 75px;">;</span>

        <!-- Moyen-gros -->
        <span class="code-symbol yellow float-3" style="top: 30%; left: 30%; font-size: 55px;">&lt;div&gt;</span>
        <span class="code-symbol blue float-5" style="top: 52%; left: 25%; font-size: 60px;">||</span>
        <span class="code-symbol red float-2" style="top: 38%; left: 80%; font-size: 50px;">!</span>
        <span class="code-symbol gold float-4" style="top: 62%; left: 55%; font-size: 65px;">)</span>

        <!-- Moyen -->
        <span class="code-symbol purple float-1" style="top: 44%; left: 12%; font-size: 38px;">export</span>
        <span class="code-symbol cyan float-3" style="top: 33%; left: 48%; font-size: 35px;">async</span>
        <span class="code-symbol green float-5" style="top: 58%; left: 38%; font-size: 32px;">return</span>
        <span class="code-symbol yellow float-2" style="top: 65%; left: 70%; font-size: 40px;">&lt;/&gt;</span>

        <!-- Petit -->
        <span class="code-symbol blue float-4" style="top: 27%; left: 70%; font-size: 24px;">const</span>
        <span class="code-symbol red float-1" style="top: 40%; left: 92%; font-size: 28px;">&amp;&amp;</span>
        <span class="code-symbol green float-3" style="top: 50%; left: 60%; font-size: 22px;">// TODO</span>
        <span class="code-symbol purple float-5" style="top: 68%; left: 15%; font-size: 26px;">null</span>
        <span class="code-symbol cyan float-2" style="top: 36%; left: 18%; font-size: 20px;">await</span>

        <!-- Très petit -->
        <span class="code-symbol gold float-4" style="top: 32%; left: 88%; font-size: 16px;">:</span>
        <span class="code-symbol yellow float-1" style="top: 56%; left: 48%; font-size: 14px;">.map()</span>
        <span class="code-symbol green float-3" style="top: 45%; left: 72%; font-size: 12px;">/**/</span>
        <span class="code-symbol blue float-5" style="top: 63%; left: 30%; font-size: 15px;">===</span>
        <span class="code-symbol orange float-2" style="top: 70%; left: 88%; font-size: 18px;">//</span>
    </div>

    <!-- NAV -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-[#0a0a0a]/95 backdrop-blur-md border-b border-white/5" id="main-nav">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="nav-logo group flex items-center gap-1">
                <span class="text-white font-bold text-lg">soufiane</span>
                <span class="text-[#ff4d00] font-bold text-lg">.</span>
                <span class="text-[#888] font-bold text-lg">dev</span>
                <span class="cursor-blink text-[#ff4d00]">_</span>
            </a>

            <!-- Nav Tabs - Style onglets IDE -->
            <div class="hidden md:flex items-center">
                <div class="nav-tabs">
                    <a href="{{ route('services') }}" class="nav-tab {{ request()->routeIs('services') ? 'active' : '' }}">
                        <span class="tab-icon">◈</span>
                        <span>Services</span>
                    </a>
                    <a href="{{ route('projets') }}" class="nav-tab {{ request()->routeIs('projets', 'projet.detail') ? 'active' : '' }}">
                        <span class="tab-icon">◈</span>
                        <span>Projets</span>
                    </a>
                    <a href="{{ route('parcours') }}" class="nav-tab {{ request()->routeIs('parcours') ? 'active' : '' }}">
                        <span class="tab-icon">◈</span>
                        <span>Parcours</span>
                    </a>
                    <a href="{{ route('contact') }}" class="nav-tab {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <span class="tab-icon">◈</span>
                        <span>Contact</span>
                    </a>
                </div>
            </div>

            <!-- CTA -->
            <div class="hidden md:flex items-center gap-4">
                <div class="nav-status">
                    <span class="status-dot-live"></span>
                    <span>Disponible</span>
                </div>
                <a href="{{ route('contact') }}" class="nav-cta-btn">
                    <span>Démarrer un projet</span>
                    <span class="cta-arrow">→</span>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden mobile-menu-btn p-2" aria-label="Menu">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="px-6 py-4 space-y-2 border-t border-white/5">
                <a href="{{ route('services') }}" class="mobile-nav-link {{ request()->routeIs('services') ? 'active' : '' }}">
                    Services
                </a>
                <a href="{{ route('projets') }}" class="mobile-nav-link {{ request()->routeIs('projets', 'projet.detail') ? 'active' : '' }}">
                    Projets
                </a>
                <a href="{{ route('parcours') }}" class="mobile-nav-link {{ request()->routeIs('parcours') ? 'active' : '' }}">
                    Parcours
                </a>
                <a href="{{ route('contact') }}" class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    Contact
                </a>
                <div class="pt-4 mt-2 border-t border-white/5">
                    <a href="{{ route('contact') }}" class="nav-cta-btn w-full justify-center">
                        <span>Démarrer un projet</span>
                        <span class="cta-arrow">→</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="relative z-10 pt-16 min-h-screen">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="relative z-10 py-8 mt-12 border-t border-white/5 bg-[#0a0a0a]">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col items-center gap-6 text-center md:flex-row md:justify-between md:text-left">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="text-white font-bold text-xl order-1">SS</a>

                <!-- Links -->
                <div class="flex flex-wrap justify-center items-center gap-4 md:gap-6 text-sm text-muted order-3 md:order-2">
                    <a href="{{ route('services') }}" class="hover:text-white transition">Services</a>
                    <a href="{{ route('projets') }}" class="hover:text-white transition">Projets</a>
                    <a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a>
                    <a href="{{ route('flyer') }}" class="hover:text-[#ff4d00] transition" title="Flyer imprimable">Flyer</a>
                </div>

                <!-- Copyright -->
                <span class="text-sm text-muted order-2 md:order-3">© {{ date('Y') }} Soufiane Simmou</span>
            </div>
        </div>
    </footer>

    @stack('scripts')

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const mobileMenu = document.querySelector('.mobile-menu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenuBtn.classList.toggle('active');
                mobileMenu.classList.toggle('active');
            });

            // Close menu on link click
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenuBtn.classList.remove('active');
                    mobileMenu.classList.remove('active');
                });
            });
        }

        // Parallax effect for code background (scroll + mouse)
        (function() {
            const codeBg = document.querySelector('.code-bg-global');
            if (!codeBg) return;

            let currentScrollY = 0;
            let targetScrollY = 0;
            let currentMouseX = 0;
            let currentMouseY = 0;
            let targetMouseX = 0;
            let targetMouseY = 0;
            const ease = 0.05;

            let windowWidth = window.innerWidth;
            let windowHeight = window.innerHeight;

            // Mouse tracking
            document.addEventListener('mousemove', (e) => {
                targetMouseX = (e.clientX - windowWidth / 2) / windowWidth;
                targetMouseY = (e.clientY - windowHeight / 2) / windowHeight;
            });

            window.addEventListener('resize', () => {
                windowWidth = window.innerWidth;
                windowHeight = window.innerHeight;
            });

            // Scroll tracking
            window.addEventListener('scroll', () => {
                targetScrollY = window.scrollY;
            }, { passive: true });

            // Animation loop
            function animate() {
                currentScrollY += (targetScrollY - currentScrollY) * ease;
                currentMouseX += (targetMouseX - currentMouseX) * ease;
                currentMouseY += (targetMouseY - currentMouseY) * ease;

                // Parallax: le fond descend plus lentement que le scroll (effet de profondeur)
                const scrollOffset = currentScrollY * 0.15;
                const mouseOffsetX = currentMouseX * 20;
                const mouseOffsetY = currentMouseY * 15;

                codeBg.style.transform = `translate3d(${mouseOffsetX}px, ${-scrollOffset + mouseOffsetY}px, 0)`;

                requestAnimationFrame(animate);
            }

            animate();
        })();
    </script>
</body>
</html>
