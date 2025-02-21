# Documentation du Projet : Gestion de Bibliothèque

## 1. Introduction
Ce projet consiste à développer une application web en Laravel pour la gestion des ressources d'une bibliothèque municipale. L'application permettra de gérer l'authentification des utilisateurs, la gestion des livres ainsi que le suivi des emprunts et des retours.

## 2. Technologies Utilisées
- **Langage Backend** : PHP (Laravel Framework)
- **Base de Données** : PostgreSQL
- **Frontend** : Blade Templates, Bootstrap
- **Outil de Gestion de Version** : Git (GitHub)
- **Serveur Web** : Apache

## 3. Fonctionnalités Implémentées

### 3.1 Authentification des Utilisateurs
- Inscription d'un nouvel utilisateur
- Connexion et déconnexion
- Affichage et modification du profil utilisateur
- Gestion des rôles et permissions (admin, utilisateur standard)

### 3.2 Gestion des Livres
- Affichage de la liste des livres disponibles
- Ajout de nouveaux livres
- Modification et suppression des livres existants
- Recherche avancée et filtrage des livres

### 3.3 Gestion des Emprunts
- Enregistrement des emprunts de livres
- Suivi des retours de livres

## 4. Installation et Configuration

### 4.1 Installation du Projet
1. Cloner le repository Git :
   ```bash
   git clone https://github.com/Youcode-Classe-E-2024-2025/imrane_ait_dahmade_gestion_bibiliotheque-.git
   ```
2. Accéder au dossier du projet :
   ```bash
   cd Gestionne_bibliotheque
   ```
3. Installer les dépendances avec Composer :
   ```bash
   composer install
   ```
4. Copier le fichier d'environnement :
   ```bash
   cp .env
   ```
6. Configurer la base de données dans le fichier `.env`
7. Exécuter les migrations et insérer les données initiales :
   ```bash
   php artisan migrate --seed
   ```
8. Démarrer le serveur local :
   ```bash
   php artisan serve
   ```

## 5. Architecture du Projet

### 5.1 Modèles Laravel
- **User** : Gère les utilisateurs et l'authentification
- **Book** : Gère les informations des livres
- **Borrower** : Gère les emprunts et les retours
- **History** : Stocke l'historique des emprunts et des retours
- **Notification** : Gère les rappels pour les retards

### 5.2 Routes Principales
| Méthode | URL | Fonctionnalité |
|---------|-----|---------------|
| GET | / | Page d'accueil |
| GET | /login | Formulaire de connexion |
| POST | /login | Connexion utilisateur |
| GET | /register | Formulaire d'inscription |
| POST | /register | Inscription utilisateur |
| POST | /logout | Déconnexion utilisateur |
| GET | /dashboard | Tableau de bord (auth requis) |
| GET | /profile | Affichage du profil utilisateur |
| GET | /profile/edit | Modification du profil |
| PUT | /profile | Mise à jour du profil |
| GET | /books | Liste des livres |
| GET | /books/{id} | Détails d'un livre |
| POST | /books | Ajouter un livre |
| PUT | /books/{id} | Modifier un livre |
| DELETE | /books/{id} | Supprimer un livre |
| POST | /borrow/{book_id} | Emprunter un livre |
| POST | /return/{borrow_id} | Retourner un livre |
| GET | /history | Voir l'historique des emprunts |



## 7. Conclusion
Ce projet vise à moderniser la gestion des bibliothèques en permettant une gestion efficace des ressources et des emprunts. Son développement suit les meilleures pratiques Laravel et inclut une documentation claire pour faciliter sa prise en main.

