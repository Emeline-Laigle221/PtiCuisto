# PtiCuisto 
PtiCuisto est un site web permettant de consulter et publier des recettes de cuisines.

## Utilisation :page_facing_up:

## Base de données
La base de données est hébergée sur un serveu mysql. Voici quelques remarques la concernant:
Dans la table RECETTE, la colonne rec_validation est égale 1 si la recette est validé, -1 si elle est interdite ou 0 si elle est en attente de validation.
Dans la table UTILISATEUR, la colonne statut est égale à 0 si l'utilisateur est actif ou -1 si son compte est suspendu.
Toujours dans la table UTILISATEUR, la colonne type est égale à 0 si il s'agit d'un utilisateur ordinaire, 1 si c'est un éditeur ou 2 si c'est un administrateur.
Le modèle conceptuel des données et le modèle logique des données sont disponibles dans le dossier. (MCD.jpg et MLD.jpg)

## Contexte :wrench:
Ce site est réalisé dans le cadre de la ressource "R3.01 Développement Web" de la deuxième année du BUT informatique.
L'objectif est de nous favoriser avec le langage PHP, et nous apprendre à l'implémenter dans une architecture MVC.

## Auteurs :construction_worker:
Ce projet est réalisé par Emeline Laigle, Maxime Jobard, Cyrille Riguet et Vladimir Rekaï. Étudiants en BUT informatique à l'IUT Grand Ouest Normandie.
À partir du sujet donné par Christophe Vallot.

## Remerciement :beers:
Merci à Christophe Vallot pour son cours et son aide, et Jean Guideau pour ses conseils en CSS.
