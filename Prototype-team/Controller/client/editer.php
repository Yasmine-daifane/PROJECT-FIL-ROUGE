<?php
// define('__ROOT__', dirname(dirname(dirname(__FILE__))));
// include_once(__ROOT__ . './Managers/GestionClient.php');
include "../Managers/GestionClient.php";
$GestionClient = new GestionClients();

if (isset($_GET['id'])) {
    $client = $GestionClient->RechercherParId($_GET['Id_client']);
}

if (isset($_POST['modifier'])) {
    $id = $_POST['Id_client'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $GestionClient->Modifier($id, $nom, $email);
    header('Location: index.php');
}
include_once(__ROOT__ . '/Views/clients/editer.php');
?>