<?php
include "../managers/GestionServices.php";
$id = $_GET['id'];
// Trouver tous les employés depuis la base de données 
$GestionService = new GestionServices();
$Services = $GestionService->AllServices($id);
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
    <div>
        <h2 class="text-center">les Services  </h2>
        <a class="btn btn-primary" href="./ajouteServices.php?id=<?php echo $id ?>">Ajouter un Service</a>
        <table class="table table-success table-striped table-hover" >
            <tr>
                <th>Name</th>
                <th>type</th>
                <th>price</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($Services as $Service) {
            ?>
                <tr>
                    <td>
                        <?= $Service->Getnom() ?>
                    </td>
                    <td>
                        <?= $Service->GetType() ?>
                    </td>
                    <td>
                        <?= $Service->GetPrice() ?>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="editServices.php?Id_srvice=<?php echo $Service->GetID() ?>&Id_client=<?php echo $id ?>">Éditer</a>
                        <a class="btn btn-danger" href="deletServices.php?Id_srvice=<?php echo $Service->GetID() ?>&Id_client=<?php echo $id ?>">delet</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a class="btn btn-info" href="../index.php">Annuler</a>
    </div>
</body>

</html>