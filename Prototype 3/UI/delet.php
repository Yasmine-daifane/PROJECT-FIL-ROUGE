<?php


// define('__ROOT__', dirname(dirname(__FILE__)));
// require_once(__ROOT__ . '/managers/GestionClient.php');
include "../managers/GestionClient.php";

if(isset($_GET['Id_client'])){

    // Trouver tous les employés depuis la base de données 
    $gestionClient= new GestionClient();
    $id = $_GET['Id_client'] ;
    $gestionClient->delete($id);
        
    header('Location: ../index.php');
}
?>