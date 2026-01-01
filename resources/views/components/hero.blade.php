<section id="hero" class="relative min-h-screen flex items-center justify-center bg-black overflow-hidden">

    <!-- Background gradient effect -->
    <div class="absolute inset-0 bg-gradient-to-br from-black via-black to-[#1a0a00] opacity-50"></div>

    <div class="container mx-auto px-6 max-w-7xl relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <!-- Left: Text Content -->
            <div class="text-left">
                <!-- Logo/Brand -->
                <div class="hero-logo mb-8 opacity-0">
                    <span class="text-2xl font-bold tracking-wider text-white">NOIR</span>
                </div>

                <!-- Main Headline -->
                <h1 class="hero-title text-5xl md:text-7xl lg:text-8xl font-bold leading-tight mb-6">
                    <span class="block word opacity-0">FREELANCE</span>
                    <span class="block word opacity-0">WEB DEVELOPER</span>
                    <span class="block word opacity-0 text-gradient">&</span>
                    <span class="block word opacity-0">ENTREPRENEUR</span>
                </h1>

                <!-- Subtitle -->
                <p class="hero-subtitle text-lg md:text-xl text-gray-400 mb-8 max-w-xl opacity-0">
                    Salut, je m'appelle <span class="text-white font-semibold">Soufiane Simmou</span>,
                    j'ai 23 ans et je suis passionné par la création de solutions digitales qui ont du sens.
                </p>

                <!-- CTA Button -->
                <a href="#projects"
                   class="hero-cta inline-flex items-center gap-2 bg-[#FF5722] hover:bg-[#FF6E40] text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 hover:glow-orange opacity-0">
                    Voir mes projets
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <!-- Right: Profile Photo -->
            <div class="flex justify-center lg:justify-end">
                <div class="hero-photo relative opacity-0">
                    <!-- Decorative circle backgrounds -->
                    <div class="absolute -top-4 -left-4 w-64 h-64 md:w-80 md:h-80 bg-[#FF5722] rounded-full opacity-20 blur-3xl"></div>
                    <div class="absolute -bottom-4 -right-4 w-64 h-64 md:w-80 md:h-80 bg-[#FF6E40] rounded-full opacity-10 blur-3xl"></div>

                    <!-- Profile image -->
                    <div class="relative w-64 h-64 md:w-80 md:h-80 rounded-full overflow-hidden border-4 border-[#FF5722] shadow-2xl">
                        <img
                            src="{{ asset('images/profile/soufiane-profile.jpg') }}"
                            alt="Soufiane Simmou"
                            class="w-full h-full object-cover"
                            onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22400%22%3E%3Crect width=%22400%22 height=%22400%22 fill=%22%231a1a1a%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22sans-serif%22 font-size=%2248%22 fill=%22%23666%22%3ESS%3C/text%3E%3C/svg%3E'"
                        >
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator absolute bottom-8 left-1/2 transform -translate-x-1/2 opacity-0">
        <div class="flex flex-col items-center gap-2">
            <span class="text-gray-400 text-sm">Scroll</span>
            <svg class="w-6 h-6 text-[#FF5722] animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </div>

</section>
