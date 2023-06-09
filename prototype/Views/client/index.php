<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));


require_once(__ROOT__ . "/Managers/ManagerClient.php");// Trouver tous les employés depuis la base de données 
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>yasmine | Dashboard</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Views/Assets/vendor/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="../Assets/vendor/AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../Assets/vendor/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../Assets/vendor/AdminLTE-3.2.0/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../Assets/vendor/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="Views/Assets/vendor/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../Assets/vendor/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../Assets/vendor/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">

      
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../Views/Assets/css/style.css">
</head>

<body class="hold-transition sidebar-mini  text-center layout-fixed">
  
    <div class="container">

        <?php
        include "../Layout/navbare.php";
        ?>

        <?php
        include "../Layout/sidebare.php";
        ?>
    </div>
 <main class="">
        <div class="card container ">
            <div class="card-header  ">
                <div class="card-body table-responsive ">
                    <div class="row mb-3">
                        <div class="col">
                            <a class="btn btn-primary" href="./UI/Ajoute.php">Ajouter un Client</a>
                        </div>
                        <div class="input-group w-50 col">
                            <input type="search" class="form-control form-control-sm" id="holder" placeholder="Search"
                                aria-label="Search" aria-describedby="search-addon">
                        </div>
                 </div>



                </div>


                <div class="card-body table-responsive p-0 " style="height: 200px ;" ;>
                    <table class="table table-head-fixed text-nowrap table-hover ">
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
                                <a class="btn btn-danger"
                                    href="./UI/edit.php?Id_client=<?php echo $Client->GetID() ?>">Éditer</a>
                                <a class="btn btn-warning"
                                    href="./UI/delet.php?Id_client=<?php echo $Client->GetID() ?>">delet</a>
                                <a class="btn btn-info" href="./UI/Services.php?id=<?php echo $Client->GetID() ?>">
                                    Services
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>

                </div>
            </div>
            <?php if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>
            <nav class="mt-2" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $pagesNum; $i++) {
                if (($currentPage == $i)) {
            ?>
                    <li class="page-item"><a class="page-link active"
                            href="<?php echo "index.php?pageId=" . $i ?>"><?php echo $i; ?></a></li>
                    <?php
                } else {
                ?>
                    <li class="page-item"><a class="page-link"
                            href="<?php echo "index.php?pageId=" . $i ?>"><?php echo $i; ?></a></li>
                    <?php }
            } ?>
                </ul>
            </nav>
            <?php } ?>
         


            <aside class="control-sidebar control-sidebar-dark">

            </aside>
   </div>

   </main>
   <footer>
        <?php
    include "../Layout/links.php";
    ?>
        <?php
    include "../Layout/footer.php";
    ?>
   </footer>

</body>

</html>