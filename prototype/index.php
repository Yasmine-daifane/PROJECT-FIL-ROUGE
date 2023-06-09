<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clients Manager</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Views/Assets/vendor/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="Views/Assets/vendor/AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="Views/Assets/vendor/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="Views/Assets/vendor/AdminLTE-3.2.0/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="Views/Assets/vendor/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="Views/Assets/vendor/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="Views/Assets/vendor/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="Views/Assets/vendor/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
     
        <!-- Navbar -->
        <?php
        include "Views/Layout/navbare.php";
        ?>

        <!-- Main Sidebar Container -->
        <?php
        include "Views/Layout/sidebare.php";
        ?>
        <!-- /.sidebar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Clients manager</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Clinets</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content d-flex flex-column justify-content-center align-items-center ">
                <!-- Default box -->
                <div class="row w-100 p-5">
                    <div class="col w-100">
                        <a href="Views/client/">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text fw-bold">Cliets</span>
                                </div>
                              
                            </div>
                          
                        </a>
                    </div>
                    <div class="col w-100">
                        <a href="Views/services/">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text fw-bold">Services</span>
                                </div>
                             
                            </div>
                           
                        </a>
                    </div>
                </div>
            </section>
        </div>
    


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            
        </aside>
     
    </div>
    <!-- ./wrapper -->
    <!-- links script -->
    <?php
    include "Views/Layout/links.php";
    ?>
      <?php
    include "Views/Layout/footer.php";
    ?>

</body>

</html>