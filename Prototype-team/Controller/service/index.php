<?php
include "../../Views/Layout/root.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = $_POST['id'];
}
// echo $id;
require_once(__ROOT__ . '/Managers/GestionTask.php');
$GestionTasks = new GestionTasks();
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
    $result = $GestionTasks->rechercherParNom($Query, $id);
    $tasks = $result[1];
    $projects = $result[0];
    $itemsPerPage = 6;
    $totalItems = count($tasks);
    $pagesNum = ceil($totalItems / $itemsPerPage);
    $pages = $GestionTasks->pages($tasks, $pagesNum, $itemsPerPage);
} else {
    $result = $GestionTasks->RechercherTous($id);
    $tasks = $result[1];
    $projects = $result[0];
    $itemsPerPage = 6;
    $totalItems = count($tasks);
    $pagesNum = ceil($totalItems / $itemsPerPage);
    $pages = $GestionTasks->pages($tasks, $pagesNum, $itemsPerPage);
}

if ($IsAjaxRequest) {
    include_once(__ROOT__ . "/Views/Tasks/index.data.php");
} else {
    include_once(__ROOT__ . "/Views/Tasks/index.php");
}
?>