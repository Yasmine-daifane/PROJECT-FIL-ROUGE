<?php
include "./managers/GestionClient.php";
// Trouver tous les employés depuis la base de données 
$GestionClient = new GestionClient();
$clients = $GestionClient->RechercherTous();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./UI/style/file.css">
    <title>Gestion des Clients</title>
</head>

<body>
    <div>
        <a href="./UI/Ajoute.php">Ajouter un client</a>
        <table>
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>action</th>
            </tr>
            <?php
            foreach ($clients as $client) {
                ?>
                <tr>
                    <td>
                        <?= $client->getNom() ?>
                    </td>
                    <td>
                        <?= $client->getEmail() ?>
                    </td>
                    <td>
                        <a href="./UI/edit.php?Id_client=<?php echo $client->getId() ?>">Éditer</a>
                        <a href="./UI/delet.php?Id_client=<?php echo $client->getId() ?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>