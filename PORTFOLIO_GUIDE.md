# Guide de Mise en Route - Portfolio Soufiane Simmou

Félicitations! Votre portfolio a été créé avec succès. Voici tout ce que vous devez savoir pour le finaliser et le lancer.

---

## ✅ Ce qui a été fait

### 1. Configuration initiale
- ✅ GSAP installé et configuré
- ✅ Tailwind CSS étendu avec thème personnalisé (dark mode, couleurs orange)
- ✅ Structure de dossiers créée

### 2. Composants créés
- ✅ Layout principal ([resources/views/layouts/app.blade.php](resources/views/layouts/app.blade.php))
- ✅ Section Hero avec photo et CTA
- ✅ Section À Propos avec timeline du parcours
- ✅ Section Projets avec grille de 5 projets
- ✅ Section Contact avec liens sociaux
- ✅ Footer

### 3. Animations GSAP
- ✅ Animations d'entrée pour le Hero
- ✅ Animations au scroll pour les sections
- ✅ Effets hover sur les cartes
- ✅ Autoplay vidéos au scroll
- ✅ Respect de `prefers-reduced-motion`

### 4. Données
- ✅ 5 projets configurés dans [routes/web.php](routes/web.php):
  - Kira - Assistant IA
  - SaaS Plan Professionnel
  - SaaS Annonces Multi-plateformes
  - E-commerce Parfum
  - Sites Vitrine

---

## 📋 Actions à réaliser maintenant

### Étape 1: Préparer vos assets

#### a) Photo de profil
📁 Emplacement: `public/images/profile/soufiane-profile.jpg`

Ajoutez une photo professionnelle:
- Format: JPG ou PNG
- Dimensions: 800x800px minimum (carré)
- Taille: < 200 KB
- Style: fond neutre, visage visible, bonne luminosité

#### b) Vidéos des projets
📁 Emplacement: `public/videos/`

Créez 5 vidéos de démonstration:
1. `kira-demo.mp4` - Démonstration de Kira
2. `saas-plan-pro-demo.mp4` - SaaS Plan Pro
3. `saas-annonces-demo.mp4` - Scraper annonces
4. `ecommerce-parfum-demo.mp4` - Site e-commerce
5. `sites-vitrine-demo.mp4` - Sites vitrine

**Specs vidéos:**
- Format: MP4 (H.264)
- Résolution: 1080p ou 720p
- Durée: 30-60 secondes
- Taille: < 10 MB par vidéo
- Framerate: 30 fps

**Comment créer les vidéos:**
- Screen recording avec OBS Studio (gratuit)
- QuickTime sur Mac
- ShareX sur Windows
- Ou capturer des GIFs puis les convertir en MP4

**Compression (si vidéo trop lourde):**
```bash
ffmpeg -i input.mp4 -vcodec h264 -b:v 2M -b:a 128k output.mp4
```

#### c) Posters (thumbnails) des vidéos
📁 Emplacement: `public/images/posters/`

Créez 5 images de prévisualisation:
1. `kira-poster.jpg`
2. `saas-plan-pro-poster.jpg`
3. `saas-annonces-poster.jpg`
4. `ecommerce-parfum-poster.jpg`
5. `sites-vitrine-poster.jpg`

**Specs posters:**
- Format: JPG
- Dimensions: 1920x1080px (16:9)
- Taille: < 500 KB

**Extraire un poster d'une vidéo:**
```bash
ffmpeg -i video.mp4 -ss 00:00:01 -vframes 1 poster.jpg
```

### Étape 2: Personnaliser les informations de contact

Ouvrez [resources/views/components/contact.blade.php](resources/views/components/contact.blade.php) et mettez à jour:

```blade
<!-- Email -->
<a href="mailto:contact@soufianesimmou.fr">  <!-- ← Changez l'email -->

<!-- LinkedIn -->
<a href="https://linkedin.com/in/soufiane-simmou">  <!-- ← Changez le lien -->

<!-- GitHub -->
<a href="https://github.com/soufiane-simmou">  <!-- ← Changez le lien -->
```

### Étape 3: Lancer le serveur de développement

Dans deux terminaux séparés:

**Terminal 1 - Laravel:**
```bash
php artisan serve
```
Accessible sur: http://localhost:8000

**Terminal 2 - Vite (hot reload):**
```bash
npm run dev
```

Ou utilisez la commande combinée Laravel:
```bash
composer dev
```

### Étape 4: Tester le portfolio

Ouvrez http://localhost:8000 et vérifiez:
- ✅ Les animations se déclenchent correctement
- ✅ Les vidéos se chargent (ou placeholders si pas encore ajoutées)
- ✅ La navigation smooth scroll fonctionne
- ✅ Le design est responsive (testez sur mobile)
- ✅ Les liens sociaux fonctionnent

### Étape 5: Personnalisation optionnelle

#### Modifier les couleurs
[resources/css/app.css](resources/css/app.css)
```css
@theme {
    --color-accent: #FF5722;  /* Changez la couleur d'accent */
    --color-accent-hover: #FF6E40;
}
```

#### Modifier le contenu "À Propos"
[resources/views/components/about.blade.php](resources/views/components/about.blade.php)
- Personnalisez l'histoire de votre parcours
- Ajustez les dates et descriptions

#### Ajouter/Modifier des projets
[routes/web.php](routes/web.php)
- Modifiez l'array `$projects`
- Ajoutez de nouveaux projets
- Changez les descriptions

---

## 🚀 Déploiement (quand prêt)

### Option 1: Laravel Forge
1. Connectez votre repo GitHub
2. Configurez le serveur
3. Deploy automatique

### Option 2: Vercel/Netlify
1. Installez Laravel sur serveur
2. Configurez .env
3. `npm run build` pour production

### Build de production:
```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📁 Structure du projet

```
portfolio/
├── public/
│   ├── videos/              # Vos vidéos de projets
│   └── images/
│       ├── posters/         # Thumbnails vidéos
│       └── profile/         # Photo de profil
│
├── resources/
│   ├── css/
│   │   └── app.css          # Styles Tailwind + custom
│   ├── js/
│   │   ├── app.js           # Entry point
│   │   ├── animations/      # Animations GSAP
│   │   └── components/      # JS components
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php    # Layout principal
│       ├── components/          # Composants Blade
│       └── pages/
│           └── home.blade.php   # Page d'accueil
│
└── routes/
    └── web.php              # Routes + données projets
```

---

## 🎨 Palette de couleurs

- **Background**: #000000 (noir pur)
- **Cards**: #1a1a1a (gris très foncé)
- **Accent Orange**: #FF5722
- **Accent Orange Hover**: #FF6E40
- **Texte Principal**: #ffffff
- **Texte Secondaire**: #a1a1a1
- **Bordures**: #2a2a2a

---

## 🐛 Dépannage

### Les animations ne fonctionnent pas
- Vérifiez que Vite dev server tourne: `npm run dev`
- Ouvrez la console navigateur (F12) pour voir les erreurs

### Les vidéos ne se chargent pas
- Vérifiez que les fichiers sont dans `public/videos/`
- Vérifiez les noms de fichiers correspondent exactement
- Les placeholders s'afficheront si vidéos manquantes

### Erreur 500 Laravel
- Vérifiez `.env` existe (copiez `.env.example`)
- Générez la clé: `php artisan key:generate`
- Vérifiez permissions dossiers `storage/` et `bootstrap/cache/`

### Build Vite échoue
```bash
rm -rf node_modules
npm install
npm run build
```

---

## ✨ Fonctionnalités incluses

- ✅ Design dark moderne avec accent orange
- ✅ Animations GSAP fluides (stagger, scroll-trigger)
- ✅ Vidéos auto-play au scroll
- ✅ Smooth scroll navigation
- ✅ Design 100% responsive
- ✅ Accessibility (prefers-reduced-motion)
- ✅ SEO optimisé (meta tags, Open Graph)
- ✅ Performance optimisée
- ✅ Hover effects magnétiques

---

## 📞 Prochaines étapes recommandées

1. ✅ **Ajoutez vos assets** (photos, vidéos)
2. ✅ **Personnalisez les liens sociaux**
3. ✅ **Testez sur mobile et desktop**
4. ⏳ **Optimisez les vidéos** si trop lourdes
5. ⏳ **Ajoutez Google Analytics** (optionnel)
6. ⏳ **Configurez un nom de domaine**
7. ⏳ **Déployez en production**

---

## 🎯 Commandes utiles

```bash
# Développement
npm run dev                    # Démarrer Vite dev server
php artisan serve              # Démarrer Laravel
composer dev                   # Démarrer tout (Laravel + Vite)

# Production
npm run build                  # Build assets production
php artisan optimize           # Optimiser Laravel

# Maintenance
php artisan cache:clear        # Clear cache
php artisan view:clear         # Clear views compiled
npm install                    # Réinstaller dépendances
```

---

**Votre portfolio est prêt à 95%! Il ne manque que vos assets personnels (photos et vidéos).**

Bon courage et bravo pour votre parcours inspirant! 🚀
