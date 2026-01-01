@props(['projects'])

<section id="projects" class="relative py-20 md:py-32 bg-gradient-to-b from-black to-[#0a0a0a]">

    <div class="container mx-auto px-6 max-w-7xl">

        <!-- Section Title -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-6xl font-bold mb-4">
                Mes <span class="text-gradient">Projets</span>
            </h2>
            <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto">
                De Python à Laravel, du SaaS au e-commerce.
                Découvrez les projets qui ont façonné mon parcours de développeur.
            </p>
        </div>

        <!-- Projects Grid -->
        <div class="projects-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <x-projects.card :project="$project" />
            @endforeach
        </div>

        <!-- CTA Section -->
        <div class="text-center mt-16">
            <p class="text-gray-400 mb-6 text-lg">
                Intéressé par mon travail ?
            </p>
            <a href="#contact"
               class="inline-flex items-center gap-2 bg-transparent border-2 border-[#FF5722] text-[#FF5722] hover:bg-[#FF5722] hover:text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300">
                Discutons de votre projet
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
            </a>
        </div>

    </div>

</section>
