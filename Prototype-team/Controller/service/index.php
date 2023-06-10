<?php
include "../../Views/Layout/root.php";
if (isset($_GET['Id_srvice'])) {
    $id = $_GET['Id_srvice'];
} else {
    $id = $_POST['Id_srvice'];
}
// echo $id;
require_once(__ROOT__ . '/Managers/GestionService.php');
$GestionServices = new GestionServices();
$IsAjaxRequest = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $IsAjaxRequest = true;
}
if (isset($_POST['pageId'])) {
    $currentPage = $_POST['pageId'];
} else {
    $currentPage = 1;
}
if (isset($_POST['Query'])) {
    $Query = $_POST['Query'];
    $result = $GestionServices->rechercherParNom($Query, $id);
    $services = $result[1];
    $clients = $result[0];
    $itemsPerPage = 6;
    $totalItems = count($services);
    $pagesNum = ceil($totalItems / $itemsPerPage);
    $pages = $GestionServices->pages($services, $pagesNum, $itemsPerPage);
} else {
    $result = $GestionServices->RechercherTous($id);
    $services = $result[1];
    $clients = $result[0];
    $itemsPerPage = 6;
    $totalItems = count($services);
    $pagesNum = ceil($totalItems / $itemsPerPage);
    $pages = $GestionServices->pages($services, $pagesNum, $itemsPerPage);
}

if ($IsAjaxRequest) {
    include_once(__ROOT__ . "/Views/services/index.data.php");
} else {
    include_once(__ROOT__ . "/Views/services/index.php");
}
?>