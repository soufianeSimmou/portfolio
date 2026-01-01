@extends('layouts.app')

@section('title', $project['title'] . ' - Soufiane Simmou')
@section('description', $project['description'])

@push('styles')
<style>
    .video-wrapper { aspect-ratio: 16/9; background: #0a0a0a; border-radius: 12px; overflow: hidden; }
    .video-wrapper video { width: 100%; height: 100%; object-fit: cover; }
</style>
@endpush

@section('content')
<div class="max-w-6xl mx-auto px-6">

    <!-- Back -->
    <div class="pt-8">
        <a href="{{ route('projets') }}" class="inline-flex items-center gap-2 text-sm text-muted hover:text-white transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Retour aux projets
        </a>
    </div>

    <!-- Header -->
    <div class="page-header pb-8">
        @php
            $badgeClass = match(true) {
                str_contains($project['status'], 'Livré') => 'bg-green-500/20 text-green-400',
                str_contains($project['status'], 'Fonctionnel') && !str_contains($project['status'], 'Non') => 'bg-blue-500/20 text-blue-400',
                str_contains($project['status'], 'Arrêté') => 'bg-yellow-500/20 text-yellow-400',
                default => 'bg-purple-500/20 text-purple-400'
            };
        @endphp
        <span class="badge {{ $badgeClass }} mb-4">{{ $project['status'] }}</span>
        <h1 class="page-title">{{ $project['title'] }}</h1>
    </div>

    <!-- Video -->
    <div class="video-wrapper mb-12">
        <video controls poster="{{ asset($project['poster']) }}" preload="metadata">
            <source src="{{ asset($project['video']) }}" type="video/mp4">
        </video>
    </div>

    <!-- Content -->
    <div class="grid lg:grid-cols-3 gap-12 mb-20">

        <!-- Description -->
        <div class="lg:col-span-2">
            <h2 class="text-xl font-semibold mb-4">Description</h2>
            <p class="text-muted leading-relaxed mb-8">{{ $project['description'] }}</p>

            <h2 class="text-xl font-semibold mb-4">Challenge</h2>
            <p class="text-muted leading-relaxed">{{ $project['challenge'] }}</p>
        </div>

        <!-- Sidebar -->
        <div>
            <div class="card">
                <h3 class="font-semibold mb-4">Technologies</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($project['tech_stack'] as $tech)
                    <span class="text-sm text-muted bg-white/5 px-3 py-1.5 rounded">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <!-- Other projects -->
    <div class="border-t border-white/5 pt-16 mb-12">
        <h2 class="text-2xl font-bold mb-8">Autres projets</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach(collect($projects)->where('id', '!=', $project['id'])->take(3) as $other)
            <a href="{{ route('projet.detail', $other['id']) }}" class="card group block">
                <h3 class="font-semibold text-white mb-2 group-hover:text-[#ff4d00] transition-colors">{{ $other['title'] }}</h3>
                <p class="text-muted text-sm">{{ Str::limit($other['description'], 80) }}</p>
            </a>
            @endforeach
        </div>
    </div>

</div>
@endsection
