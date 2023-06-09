<?php





// define('__ROOT__', dirname(dirname(__FILE__)));
// require_once(__ROOT__ . '/managers/GestionClient.php');
include "../managers/GestionClient.php";

$gestionClient = new GestionClient();

if(isset($_GET['Id_client'])){
    $id = $_GET['Id_client'];
    $client = $gestionClient->ClientId($id);
}

if(isset($_POST['Edite'])){
    $id = $_POST['Id_client'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $gestionClient->Edit($id, $nom, $email);
    header('Location: ../index.php');
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
   
    <title>Edite : </title>
</head>
<body>

<h1 class="text-center">Modification de Projet : <?=$client->Getnom() ?></h1>
<form method="post" action="">
    <input type="hidden" required="required" 
        id="Id" name="Id_client"   
        value=<?php echo $client->GetID()?> >

    <div class="input-group mb-3">
        <label for="Nom">Nom</label>
        <input type="text" required="required" class="form-control"
        id="Nom" name="nom"  placeholder="Nom" 
        value=<?php echo $client->Getnom()?> >
    </div>
  
    <div class="input-group mb-3">
        <label for="email">description</label>
        <input type="email" required="required" class="form-control" 
        id="email"  name="email" placeholder="description"
        value=<?php echo $client->Getemail()?>>
    </div>
    <div>
        <input class="btn btn-primary" name="Edite" type="submit" value="Edite">
        <a  class="btn btn-info" href="../index.php">Annuler</a>
    </div>
</form>
</body>
</html>