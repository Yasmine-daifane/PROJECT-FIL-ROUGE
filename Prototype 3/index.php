<?php
// define('__ROOT__', dirname(dirname(__FILE__)));
include "./managers/GestionClient.php";

// Trouver tous les employés depuis la base de données 
$GestionClient = new GestionClient();
if (isset($_GET['pageId'])) {
    $currentPage = $_GET['pageId'];
} else {
    $currentPage = 1;
}
$Clients = $GestionClient->Pagination($currentPage);
$pagesNum = $GestionClient->Page_num();
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./UI/style/file.css">
    <title>Gestion des CLients</title>
</head>

<body class="p-5">
    <div>
        <div class="row mb-3">
            <div class="col">
                <a class="btn btn-primary" href="./UI/Ajoute.php">Ajouter un Client</a>
            </div>
            <div class="input-group w-50 col">
                <input type="search" class="form-control form-control-sm" id="holder" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
            </div>
        </div>

        <table class="table table-success table-striped table-hover">
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($Clients as $Client) {
            ?>
                <tr>
                    <td>

                        <?= $Client->Getnom() ?>

                    </td>
                    <td>
                        <?= $Client->Getemail() ?>

                    </td>
                    <td>
                        <a class="btn btn-danger" href="./UI/edit.php?Id_client=<?php echo $Client->GetID() ?>">Éditer</a>
                        <a class="btn btn-warning" href="./UI/delet.php?Id_client=<?php echo $Client->GetID() ?>">delet</a>
                        <a class="btn btn-info" href="./UI/Services.php?id=<?php echo $Client->GetID() ?>">
                            Services
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>
    <nav class="mt-2" aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $pagesNum; $i++) {
                if (($currentPage == $i)) {
            ?>
                    <li class="page-item"><a class="page-link active" href="<?php echo "index.php?pageId=" . $i ?>"><?php echo $i; ?></a></li>
                <?php
                } else {
                ?>
                    <li class="page-item"><a class="page-link" href="<?php echo "index.php?pageId=" . $i ?>"><?php echo $i; ?></a></li>
            <?php }
            } ?>
        </ul>
    </nav>
<?php } ?>
    <script>
        <?php
        include "./UI/js/script.js";
        ?>
    </script>
</body>

</html>