# Lecomte Dylan - We Fashion - 30/05/2021

## Description

We Fashion est une toute nouvelle boutique de e-commerce qui vend des vêtements homme et femme de créateurs.

## Avant-propos

Créer une base de donnée sur `phpMyAdmin`

`composer install` pour installer toutes les dépendances

Créer un fichier `.env` à la racine, copier-coller le contenu du fichier `.env.example`

Configurer le fichier `.env` avec `DB_DATABASE={{DATABASE_NAME}}`

Générer une clé avec `php artisan key:generate`

`php artisan migrate:refresh --seed` pour générer vos produits, users, catégories et images.

`php artisan serve` pour lancer le projet en local

## Attention
Ce projet utilise la `version 5.5` de Laravel, la `version 7` de php est requise, une version supérieure vous causera des soucis !

## Bonus
Vous pouvez naviguer sur le site en mode visiteur, vous connecter en tant qu'utilisateur Standard et en tant qu'utilisateur Admin

- Utilisateur Standard : </br>

`mail` : dylan@dylan.fr </br>
`password` : dylan

- Utilisateur Admin : </br>

`mail` : edouard@edouard.fr </br>
`password` : edouard