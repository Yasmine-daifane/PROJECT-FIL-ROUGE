<?php

 




// define('__ROOT__', dirname(dirname(__FILE__)));
// require_once(__ROOT__ . '/managers/GestionServices.php');
include "../managers/GestionServices.php";


$id = $_GET['id'];
// Trouver tous les employés depuis la base de données 
$GestionService = new GestionServices();
// $Services = $GestionService-> AllServices($id);

if (!empty($_POST)) {
	$Service = new Services();
	$Service->SetID($id);
	$Service->Setnom($_POST['nom']);
	$Service->SetType($_POST['type']);
	$Service->SetPrice($_POST['price']);
	$GestionService->Add($Service);
	// Redirection vers la page index.php
	header("Location: Services.php?id=".$id);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./style/file.css">

	<title>Gestion des Services</title>

</head>

<body>

	<h1 class="text-center">Ajouter un Service</h1>

	<form method="post" action="">
		<div class="input-group mb-3">
			<label for="Nom">Nom</label>
			<input type="text" required="required" class="form-control" id="name" name="nom" placeholder="Nom">
		</div>
		<div class="input-group mb-3">
			<label for="type">type</label>
			<input type="text" required="required" class="form-control" id="type" name="type" placeholder="type">
		</div>

		<div class="input-group mb-3">
			<label for="price">price</label>
			<input type="number" required="required" class="form-control" id="price" name="price" placeholder="price">
		</div>

		<div>
			<button   class="btn btn-primary" type="submit" >Add</button>
			<a   class="btn btn-info" href="../index.php">Annuler</a>
		</div>
	</form>
</body>

</html>