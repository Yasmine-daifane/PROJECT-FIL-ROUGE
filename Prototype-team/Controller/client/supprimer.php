<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
include_once(__ROOT__ . '/Managers/GestionClient.php');

if (isset($_GET['Id_client'])) {
    // Trouver tous les employés depuis la base de données 
    $GestionClients = new GestionClients();
    $id = $_GET['Id_client'];
    $GestionClients->Supprimer($id);
    header('Location: index.php');
}
?>