# PtiCuisto 
PtiCuisto est un site web permettant de consulter et de publier des recettes de cuisine.

## Utilisation :page_facing_up:
Avant d'utiliser l'application, il est préférable de se créer un compte. Il y a 3 types de comptes. Un utilisateur "classique" peut consulter les recettes, un éditeur peut publier une nouvelle recette, modifier et supprimer les siennes, tandis que l'administrateur peut, en plus de tout ça, supprimer et modifier les recettes de tout le monde, et modifier l'édito. Les recettes des éditeurs doivent être au préalable validé par un administrateur avant d'être publié.

## Base de données :ambulance:
La base de données est hébergée sur un serveur mysql. Voici quelques remarques la concernant:
Dans la table RECETTE, la colonne rec_validation est égale 1 si la recette est validée, -1 si elle est interdite ou 0 si elle est en attente de validation.
Dans la table UTILISATEUR, la colonne statut est égale à 0 si l'utilisateur est actif ou -1 si son compte est suspendu.
Toujours dans la table UTILISATEUR, la colonne type est égale à 0 s'il s'agit d'un utilisateur ordinaire, 1 si c'est un éditeur ou 2 si c'est un administrateur.
Le modèle conceptuel des données et le modèle logique des données sont disponibles dans le dossier. (MCD.jpg et MLD.jpg)

## Contexte :wrench:
Ce site est réalisé dans le cadre de la ressource "R3.01 Développement Web" de la deuxième année du BUT informatique.
L'objectif est de nous favoriser avec le langage PHP, et de nous apprendre à l'implémenter dans une architecture MVC.

## Auteurs :construction_worker:
Ce projet est réalisé par Emeline Laigle, Maxime Jobard, Cyrille Riguet et Vladimir Rekaï. Étudiants en BUT informatique à l'IUT Grand Ouest Normandie.
À partir du sujet donné par Christophe Vallot.

## Remerciement :beers:
Merci à Christophe Vallot pour son cours et son aide, et Jean Guideau pour ses conseils en CSS.

## accès au site :closed_lock_with_key:
https://dev-riguet222.users.info.unicaen.fr/etudiant/PtiCuisto/index.php (utiliser son id et son mot de passe unicaen pour y accéder)

login éditeur:
id : editeur@editeur.fr
mdp : editeur


login administrateur:
id : admin@admin.fr
mdp : admin
