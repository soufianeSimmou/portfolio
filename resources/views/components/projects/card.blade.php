@props(['project'])

<div class="project-card group bg-[#1a1a1a] rounded-lg overflow-hidden border border-[#2a2a2a] hover:border-[#FF5722] transition-all duration-500 hover:shadow-2xl hover:shadow-[#FF5722]/20">

    <!-- Video Container -->
    <div class="video-container aspect-video relative bg-black">
        <video
            class="project-video w-full h-full object-cover"
            poster="{{ asset($project['poster']) }}"
            muted
            playsinline
            loop
            preload="metadata"
        >
            <source src="{{ asset($project['video']) }}" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéos.
        </video>

        <!-- Play Overlay -->
        <div class="absolute inset-0 flex items-center justify-center bg-black/40 opacity-100 group-hover:opacity-0 transition-opacity duration-300">
            <div class="w-16 h-16 rounded-full bg-[#FF5722]/90 flex items-center justify-center">
                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </div>
        </div>

        <!-- Status Badge (Top Right) -->
        @php
            $statusColors = [
                'Fonctionnel' => 'bg-green-500',
                'Livré et commercialisé' => 'bg-blue-500',
                'Arrêté (Problèmes légaux)' => 'bg-yellow-500',
                'Fonctionnel (Non commercialisé)' => 'bg-purple-500',
                'Portfolio de compétences' => 'bg-indigo-500',
            ];
            $statusColor = $statusColors[$project['status']] ?? 'bg-gray-500';
        @endphp

        <div class="absolute top-4 right-4">
            <span class="{{ $statusColor }} text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                {{ $project['status'] }}
            </span>
        </div>
    </div>

    <!-- Content -->
    <div class="p-6">

        <!-- Title -->
        <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-gradient transition-all duration-300">
            {{ $project['title'] }}
        </h3>

        <!-- Description -->
        <p class="text-gray-400 leading-relaxed mb-4">
            {{ $project['description'] }}
        </p>

        <!-- Challenge & Solution (if featured) -->
        @if(!empty($project['challenge']))
            <div class="mb-4 p-4 bg-black/50 rounded-lg border border-[#2a2a2a]">
                <p class="text-sm text-gray-500 font-semibold mb-1">Défi technique</p>
                <p class="text-sm text-gray-300">{{ $project['challenge'] }}</p>
            </div>
        @endif

        <!-- Tech Stack -->
        <div class="flex flex-wrap gap-2 mb-4">
            @foreach($project['tech_stack'] as $tech)
                <span class="px-3 py-1 bg-[#2a2a2a] text-gray-300 rounded-full text-sm font-medium hover:bg-[#FF5722] hover:text-white transition-colors duration-300">
                    {{ $tech }}
                </span>
            @endforeach
        </div>

        <!-- Learn More Link -->
        <div class="flex items-center gap-2 text-[#FF5722] font-semibold group-hover:gap-4 transition-all duration-300">
            <span>En savoir plus</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </div>

    </div>

</div>
