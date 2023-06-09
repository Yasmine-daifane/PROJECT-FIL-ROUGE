<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
include_once(__ROOT__ . '/Managers/GestionProject.php');

if (isset($_GET['id'])) {
    // Trouver tous les employés depuis la base de données 
    $GestionProjects = new GestionProjects();
    $id = $_GET['id'];
    $GestionProjects->Supprimer($id);
    header('Location: index.php');
}
?>