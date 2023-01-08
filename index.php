<?php
// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=database', 'root', 'motdepasse');

// Récupère l'action à effectuer (ajout, modification, suppression ou affichage)
$action = isset($_GET['action']) ? $_GET['action'] : 'display';

// Traite l'action en fonction de sa valeur
switch ($action) {
  case 'add':
    // Ajoute une tâche à la base de données
    if (isset($_POST['name']) && isset($_POST['description'])) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $stmt = $db->prepare("INSERT INTO tasks (name, description) VALUES (?, ?)");
      $stmt->execute([$name, $description]);
      header('Location: index.php?action=display');
    }
    // Affiche le formulaire d'ajout de tâche
    include 'add_task_form.php';
    break;
    
  case 'edit':
    // Modifie une tâche dans la base de données
    if (isset($_POST['name']) && isset($_POST['description'])) {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $stmt = $db->prepare("UPDATE tasks SET name = ?, description = ? WHERE id = ?");
      $stmt->execute([$name, $description, $id]);
      header('Location: index.php?action=display');
    }
    // Récupère la tâche à modifier
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $stmt = $db->prepare("SELECT * FROM tasks WHERE id = ?");
	  $stmt->execute([$id]);

	}
  // Affiche le formulaire de modification de tâche
  include 'edit_task_form.php';
  break;
    
  case 'delete':
    // Supprime une tâche de la base de données
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $stmt = $db->prepare("DELETE FROM tasks WHERE id = ?");
      $stmt->execute([$id]);
    }
    header('Location: index.php?action=display');
    break;
    
  case 'display':
  default:
    // Récupère toutes les tâches de la base de données
    $stmt = $db->prepare("SELECT * FROM tasks");
    $stmt->execute();
    $tasks = $stmt->fetchAll();
    // Affiche la liste des tâches
    include 'task_list.php';
}
