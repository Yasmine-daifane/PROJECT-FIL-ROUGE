<?php
include "../../Views/Layout/root.php";
require_once(__ROOT__ . '/Managers/GestionClient.php');
$GestionClients = new GestionClients();

if (isset($_GET['Id_client'])) {
    $client = $GestionClients->RechercherParId($_GET['Id_client']);
}

if (isset($_POST['modifier'])) {
    $id = $_POST['Id_client'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $GestionClients->Modifier($id, $nom, $email);
    header('Location: index.php');
}

include_once(__ROOT__.'/Views/clients/editer.php')
?>