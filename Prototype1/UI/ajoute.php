<?php
if (file_exists('./managers/GestionClient.php')) {
	include './managers/GestionClient.php';
} elseif (file_exists('../managers/GestionClient.php')) {
	include '../managers/GestionClient.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Client.php not found in either directory.";
}

// Trouver tous les employés depuis la base de données 
$gestionClient = new GestionClient();
$clients = $gestionClient->RechercherTous();

if (!empty($_POST)) {
	$client= new  Client();
	$client->setId($_POST['Id_client']);
	$client->setNom($_POST['nom']);
	$client->setEmail($_POST['email']);
	$gestionClient->Ajouter($client);

	// Redirection vers la page index.php
	header("Location: ../index.php");
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./style/file.css">
	<title>Gestion des Clients</title>

</head>

<body>

	<h1>Ajouter un Client</h1>

	<form method="post" action="">
		<div>
			<label for="nom">Nom</label>
			<input type="text" required="required" id="nom" name="nom" placeholder="Nom">
		</div>
		<div>
			<label for="email">Email</label>
			<input type="email" required="required" id="email" name="email" placeholder="EMAIL">
		</div>

		<div>
			<button type="submit">Ajouter</button>
			<a href="../index.php">Annuler</a>
		</div>
	</form>
</body>

</html>