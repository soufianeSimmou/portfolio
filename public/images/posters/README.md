# Dossier Posters (Thumbnails) des Vidéos

## Instructions

Placez ici les images de prévisualisation (posters) pour les vidéos des projets.

### Fichiers attendus:

1. `kira-poster.jpg` - Thumbnail pour la vidéo Kira
2. `saas-plan-pro-poster.jpg` - Thumbnail pour SaaS Plan Pro
3. `saas-annonces-poster.jpg` - Thumbnail pour SaaS Annonces
4. `ecommerce-parfum-poster.jpg` - Thumbnail pour E-commerce Parfum
5. `sites-vitrine-poster.jpg` - Thumbnail pour Sites Vitrine

### Recommandations:

- **Format**: JPG ou PNG
- **Dimensions**: 1920x1080 pixels (16:9)
- **Taille**: < 500 KB par image
- **Qualité**: Nette et représentative du projet

### Comment créer un poster:

1. **Depuis une vidéo**: Extraire la première frame avec FFmpeg:
   ```bash
   ffmpeg -i video.mp4 -ss 00:00:01 -vframes 1 poster.jpg
   ```

2. **Screenshot**: Prendre une capture d'écran du projet

3. **Design personnalisé**: Créer un visuel dans Figma/Photoshop avec:
   - Titre du projet
   - Logo/icône
   - Aperçu de l'interface
