# GrandTaxiGo
Plateforme de Réservation de Grands Taxis

**GrandTaxiGo** est une plateforme web développée pour simplifier la réservation de grands taxis pour des trajets interurbains. Elle permet aux passagers de réserver des trajets et de trouver des chauffeurs disponibles, tout en offrant aux chauffeurs la possibilité de publier leurs disponibilités et gérer leurs courses.

## Table des matières
- [Fonctionnalités](#fonctionnalités)
- [Technologies utilisées](#technologies-utilisées)
- [Installation](#installation)
- [Usage](#usage)
- [Diagrammes](#diagrammes)
- [Contributions](#contributions)
- [Contact](#contact)

---

## Fonctionnalités

### Authentification et gestion des comptes
- Création de compte avec photo de profil obligatoire.
- Connexion et gestion des informations personnelles.

### Passagers
- Réservation de trajets en indiquant la date, le lieu de départ et la destination.
- Annulation des réservations avant l'heure de départ.
- Consultation de l'historique des réservations.

### Chauffeurs
- Mise à jour des disponibilités.
- Gestion des réservations (accepter/refuser).
- Consultation de l'historique des courses.

### Notifications
- Notifications par email ou système :
  - Nouveau trajet réservé.
  - Annulation de réservation.
  - Rappel avant une annulation automatique.

### Bonus
- Automatisation des disponibilités des chauffeurs.
- Gestion des statuts des trajets.

---

## Technologies utilisées
- **Backend** : Laravel (PHP)
- **Base de données** : PostgreSQL
- **Frontend** : Tailwind CSS, Blade Templates
- **Authentification** : Middleware Laravel
- **Outils** : 
  - ORM Eloquent pour les requêtes SQL.
  - Seeders et Factories pour les données de test.
  - Validation des formulaires côté serveur et client.

---

## Installation

### Prérequis
- PHP >= 8.0
- Composer
- PostgreSQL
- Node.js et npm

### Étapes
1. Clonez le repository :
   ```bash
   git clone https://github.com/votre-utilisateur/grandtaxigo.git
   cd grandtaxigo
   ```

2. Installez les dépendances :
   ```bash
   composer install
   npm install && npm run dev
   ```

3. Configurez votre fichier `.env` :
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configurez la base de données dans le fichier `.env` :
   ```dotenv
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=grandtaxigo
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. Appliquez les migrations et seeders :
   ```bash
   php artisan migrate --seed
   ```

6. Lancez le serveur local :
   ```bash
   php artisan serve
   ```

7. Accédez à l'application sur `http://127.0.0.1:8000`.

---

## Usage

- Créez un compte en tant que passager ou chauffeur.
- Les passagers peuvent réserver des trajets en fonction des disponibilités.
- Les chauffeurs peuvent accepter ou refuser les réservations.
- Notifications automatiques envoyées selon les actions (nouvelle réservation, annulation, etc.).

---

## Diagrammes

### Diagramme de classes
Le diagramme de classes représente les relations principales dans le système.

voir Dossier UML

---

## Contributions

Les contributions sont les bienvenues ! Suivez ces étapes pour contribuer :
1. Forkez le repository.
2. Créez une branche pour vos modifications :
   ```bash
   git checkout -b feature/nom-feature
   ```
3. Soumettez un pull request avec une description détaillée.

---

## Contact

Pour toute question ou suggestion, contactez-nous :
- **Email** : nmissinadia@gmail.com
- **GitHub** : [votre-utilisateur](https://github.com/nmissi-nadia)

---
