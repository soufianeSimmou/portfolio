# Déploiement sur Railway

## Variables d'environnement requises

Ajoute ces variables dans Railway (Settings → Variables) :

```env
APP_KEY=base64:UKw4unU/QtwJyOVME2v5mnoOJm6xBP1gDB8JLELBwVA=
APP_ENV=production
APP_DEBUG=false
APP_URL=https://ton-domaine.railway.app
LOG_CHANNEL=stack
```

## Étapes de déploiement

1. **Via Railway Web Dashboard** (recommandé)
   - Va sur https://railway.app
   - Connecte-toi avec GitHub
   - New Project → Deploy from GitHub repo
   - Sélectionne `soufianeSimmou/portfolio`
   - Ajoute les variables d'environnement ci-dessus
   - Railway génère automatiquement un domaine `.railway.app`

2. **Via Railway CLI**
   ```bash
   railway login
   railway init
   railway up
   railway open
   ```

## Dépannage erreur 500

Si tu as une erreur 500 :

1. Vérifie que `APP_KEY` est bien configurée
2. Vérifie les logs : `railway logs`
3. Assure-toi que `storage` et `bootstrap/cache` sont accessibles en écriture

## Commandes utiles

```bash
# Voir les logs
railway logs

# Ouvrir le projet
railway open

# Redéployer
git push
```
