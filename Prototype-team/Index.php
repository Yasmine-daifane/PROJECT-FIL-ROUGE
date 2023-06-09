<!DOCTYPE html>
<html lang="en">

<?php
include "Views/Layout/head.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <?php
        include "Views/Layout/preloader.php";
        ?>
        <!-- Navbar -->
        <?php
        include "Views/Layout/navbare.php";
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include "Views/Layout/sidebare.php";
        ?>
        <!-- /.sidebar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Clients manager</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Clients</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content d-flex flex-column justify-content-center align-items-center ">
                <!-- Default box -->
                <div class="row w-100 p-5">
                    <div class="col w-100">
                        <a href="Controller/client/">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text fw-bold">Clients</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div>
                    <div class="col w-100">
                        <a href="Views/services/">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text fw-bold">Services</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div>
                </div>
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
    include "Views/Layout/footer.php";
    ?>
    <!-- ./wrapper -->
    <!-- links script -->
    <?php
    include "Views/Layout/links.php";
    ?>
</body>

</html>