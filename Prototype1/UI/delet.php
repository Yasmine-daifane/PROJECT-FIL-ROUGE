<?php
if (file_exists('./managers/GestionClient.php')) {
	include './managers/GestionClient.php';
} elseif (file_exists('../managers/GestionClient.php')) {
	include '../managers/GestionClient.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error:Client.php not found in either directory.";
}

if(isset($_GET['Id_client'])){

    // Trouver tous les employés depuis la base de données 
    $gestionClient= new GestionClient();
    $id = $_GET['Id_client'] ;
    $gestionClient->Supprimer($id);
        
    header('Location: ../index.php');
}
?>