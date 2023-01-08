# Gestionnaire-de-tache-en-php
Un gestionnaire sans css avec connexion à une base de donnée permettant de créer, modifier et supprimer des tâches.


# Créer une Base de donnée avec cette structure : 

CREATE TABLE `tasks` ( <br>
  `id` int(11) NOT NULL,<br>
  `name` varchar(255) NOT NULL,<br>
  `description` text DEFAULT NULL<br>
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;<br><br>


# Modifier les paramètres de connexion à la base de donnée ligne 3 :
localhost = Hôte <br>
database = Nom de la base de données<br>
root = Utilisateur de la base de données<br>
motdepasse = mot de passe de l'utilisateur pour accéder à la base de données
