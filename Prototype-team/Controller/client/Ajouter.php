<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));

include_once(__ROOT__ . '/Managers/GestionClient.php');
// Trouver tous les employés depuis la base de données 
$GestionClients = new GestionClients();


if (!empty($_POST)) {
    $client = new Client();
    $client->Setnom($_POST['nom']);
    $client->Setemail($_POST['email']);
    $GestionClients->Ajouter($client);
    // Redirection vers la page index.php
    header("Location: index.php");
}
include_once(__ROOT__.'/Views/clients/Ajouter.php')
?>