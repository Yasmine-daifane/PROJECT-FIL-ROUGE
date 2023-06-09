<?php


if (file_exists('./managers/GestionClient.php')) {
	include '../managers/GestionClient.php';
} elseif (file_exists('../managers/GestionClient.php')) {
	include '../managers/GestionClient.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Client.php not found in either directory.";
}

$gestionClient = new GestionClient();

if(isset($_GET['Id_client'])){
    $Client = $gestionClient->RechercherParId($_GET['Id_client']);
}

if(isset($_POST['modifier'])){
    $id = $_POST['Id_client'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $gestionClient->Modifier($id,$nom,$email);
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/file.css">
    <title>Modifier : </title>
</head>
<body>

<h1>Modification de Client : <?=$Client->getNom() ?></h1>
<form method="post" action="">
    <input type="hidden" required="required" 
        id="Id" name="Id_client"   
        value=<?php echo   $Client->getId()?> >

    <div>
        <label for="nom">Nom</label>
        <input type="text" required="required" 
        id="nom" name="nom"  placeholder="Nom" 
        value=<?php echo $Client->getNom()?> >
    </div>
  
    <div>
        <label for="email">Description</label>
        <input type="email" required="required"  
        id="email"  name="email" placeholder="EMAIL"
        value=<?php echo $Client->getEmail()?>>
    </div>
    <div>
        <input name="modifier" type="submit" value="Modifier">
        <a href="../index.php">Annuler</a>
    </div>
</form>
</body>
</html>