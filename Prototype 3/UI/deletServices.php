<?php



// define('__ROOT__', dirname(dirname(__FILE__)));
// require_once(__ROOT__ . '/managers/GestionServices.php');
include "../managers/GestionServices.php";

if(isset($_GET['Id_srvice'])){

    // Trouver tous les employés depuis la base de données 
    $Gestionservice= new GestionServices();
    $id = $_GET['Id_srvice'] ;
    $Gestionservice->delete($id);
        
    header("Location: Services.php?id=".$id);
}

