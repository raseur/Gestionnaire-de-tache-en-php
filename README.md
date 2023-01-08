# Gestionnaire-de-tache-en-php
Un gestionnaire sans css avec connexion à une base de donnée permettant de créer, modifier et supprimer des tâches.


# Créer une Base de donnée avec cette structure : 

CREATE TABLE `tasks` ( 
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


# Modifier les paramètres de connexion à la base de donnée ligne 3 :
localhost = Hôte
database = Nom de la base de données
root = Utilisateur de la base de données
motdepasse = mot de passe de l'utilisateur pour accéder à la base de données
