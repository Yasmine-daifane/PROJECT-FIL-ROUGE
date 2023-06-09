<?php





// define('__ROOT__', dirname(dirname(__FILE__)));
// require_once(__ROOT__ . '/managers/GestionServices.php');
include "../managers/GestionServices.php";

$GestionService= new GestionServices();

if(isset($_GET['Id_srvice'])){
    $Services = $GestionService->ServiceParId($_GET['Id_srvice']);
}
$id_client = $_GET['Id_client'];
if(isset($_POST['Edite'])){
    $id = $_POST['Id_srvice'];
    $nom = $_POST['nom'];
    $type = $_POST['type'];
 $price = $_POST['price'];
    $GestionService->Edite($id,   $Name,  $type,  $price);
    header("Location: Services.php?id=".$id_client);
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
  
    <title>Modifier : </title>
</head>
<body>

<h1>Modification de Services : <?= $service->Getnom() ?></h1>
<form method="post" action="">
    <input type="hidden" required="required" 
        id="Id" name="Id_srvice"   
        value=<?php echo $service->GetID()?> >

    <div class="input-group mb-3">
        <label for="Nom">Nom</label>
        <input type="text" required="required" class="form-control"
        id="Nom" name="nom"  placeholder="Nom" 
        value=<?php echo   $service->Getnom()?> >
    </div>
  
    <div class="input-group mb-3">
        <label for="type">description</label>
        <input type="text" required="required"  class="form-control"
        id="type"  name="type" placeholder="type"
        value=<?php echo   $service->GetType()?>>
    </div>

    <div class="input-group mb-3">
        <label for="price">price</label>
        <input type="number" required="required"  class="form-control"
        id="price"  name="price" placeholder="price"
        value=<?php echo   $service->GetPrice()?>>
    </div>
    <div>
        <input class="btn btn-primary" name="Edite" type="submit" value="Edite">
        <a  class="btn btn-info" href="Services.php?id=<?php $id ?>">Annuler</a>
    </div>
</form>
</body>
</html>