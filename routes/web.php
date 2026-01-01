<?php

use Illuminate\Support\Facades\Route;

// Projects data (shared)
$projects = [
    [
        'id' => 'kira',
        'title' => 'Kira - Assistant IA Desktop',
        'description' => 'Assistant personnel basé sur GPT-4 capable de modifier du code, ouvrir des pages web, corriger des documents Word et créer des fichiers automatiquement.',
        'tech_stack' => ['Python', 'GPT API', 'Desktop', 'Automation'],
        'challenge' => 'Créer une interface conversationnelle capable d\'interagir avec le système d\'exploitation',
        'status' => 'Fonctionnel',
        'video' => 'videos/kira-demo.mp4',
        'poster' => 'images/posters/kira-poster.jpg'
    ],
    [
        'id' => 'saas-plan-pro',
        'title' => 'SaaS Plan Professionnel',
        'description' => 'Générateur de plans d\'affaires professionnels avec budget, étapes détaillées et export PDF. Un outil pour aider les entrepreneurs à structurer leurs idées.',
        'tech_stack' => ['Laravel', 'GPT API', 'PDF Generation', 'SaaS'],
        'challenge' => 'Générer des plans d\'affaires structurés et pertinents basés sur une simple idée',
        'status' => 'Fonctionnel (Non commercialisé)',
        'video' => 'videos/saas-plan-pro-demo.mp4',
        'poster' => 'images/posters/saas-plan-pro-poster.jpg'
    ],
    [
        'id' => 'saas-annonces',
        'title' => 'SaaS Annonces Multi-plateformes',
        'description' => 'Scraper intelligent pour Leboncoin et La Centrale avec système d\'alertes en temps réel. Agrégation multi-plateformes pour ne manquer aucune opportunité.',
        'tech_stack' => ['Node.js', 'Web Scraping', 'WebSockets', 'Real-time'],
        'challenge' => 'Contourner les captchas et respecter les CGU des plateformes',
        'status' => 'Arrêté (Problèmes légaux)',
        'video' => 'videos/saas-annonces-demo.mp4',
        'poster' => 'images/posters/saas-annonces-poster.jpg'
    ],
    [
        'id' => 'ecommerce-parfum',
        'title' => 'E-commerce Parfum Premium',
        'description' => 'Site e-commerce complet pour une boutique de parfums de luxe. Interface élégante, paiement sécurisé et gestion des stocks. Projet facturé 6000€.',
        'tech_stack' => ['Laravel', 'Stripe', 'Tailwind CSS', 'MySQL'],
        'challenge' => 'Créer une expérience d\'achat premium qui reflète le standing des produits',
        'status' => 'Livré et commercialisé',
        'video' => 'videos/ecommerce-parfum-demo.mp4',
        'poster' => 'images/posters/ecommerce-parfum-poster.jpg'
    ],
    [
        'id' => 'sites-vitrine',
        'title' => 'Collection Sites Vitrine',
        'description' => 'Portfolio de plusieurs sites vitrine créés pour perfectionner mes compétences en CSS, animations et design responsive. Chaque projet explore une nouvelle technique.',
        'tech_stack' => ['HTML5', 'CSS3', 'JavaScript', 'Responsive Design'],
        'challenge' => 'Maîtriser les animations CSS avancées et les layouts complexes',
        'status' => 'Portfolio de compétences',
        'video' => 'videos/sites-vitrine-demo.mp4',
        'poster' => 'images/posters/sites-vitrine-poster.jpg'
    ]
];

// Home
Route::get('/', function () use ($projects) {
    return view('pages.home', compact('projects'));
})->name('home');

// Services
Route::get('/services', function () {
    return view('pages.services');
})->name('services');

// Projets
Route::get('/projets', function () use ($projects) {
    return view('pages.projets', compact('projects'));
})->name('projets');

// Projet détail
Route::get('/projets/{id}', function ($id) use ($projects) {
    $project = collect($projects)->firstWhere('id', $id);
    if (!$project) {
        abort(404);
    }
    return view('pages.projet-detail', compact('project', 'projects'));
})->name('projet.detail');

// Parcours
Route::get('/parcours', function () {
    return view('pages.parcours');
})->name('parcours');

// Contact
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

// Contact form submission
Route::post('/contact', function () {
    // TODO: Implement contact form logic
    return back()->with('success', 'Message envoyé avec succès !');
})->name('contact.submit');

// Flyer
Route::get('/flyer', function () {
    return view('pages.flyer');
})->name('flyer');
