<?php
// include "../Layout/root.php";

// 
// Afficher la liste des projets 
//

// if request isn't ajax:

?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once(__ROOT__ . "/Views/Layout/head.php");
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <?php
        include_once(__ROOT__ . "/Views/Layout/preloader.php");
        ?>
        <!-- Navbar -->
        <?php
        include_once(__ROOT__ . "/Views/Layout/navbare.php");
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include_once(__ROOT__ . "/Views/Layout/sidebare.php");
        ?>
        <!-- /.sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Projects</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Projects</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Projects</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="row p-3">
                            <div class="col-sm-12 col-md-6">
                                <a class="btn btn-primary" href="Ajouter.php">Add Project</a>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="search_project" class="dataTables_filter"><input type="search" id="search"
                                        class="form-control" placeholder="Project name" aria-controls="search_project">
                                </div>
                            </div>
                        </div>
                        <div id="result" class="p-3">
                            <?php include_once(__ROOT__ . "/Views/clients/index.data.php") ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <?php
    include_once(__ROOT__ . '/Views/Layout/footer.php');
    ?>
    <!-- ./wrapper -->
    <!-- links script -->
    <?php
    include_once(__ROOT__ . '/Views/Layout/links.php');
    ?>
</body>

</html>