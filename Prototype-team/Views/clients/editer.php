<!DOCTYPE html>
<html lang="fr">
<?php
include_once(__ROOT__ . "/Views/Layout/head.php");
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <?php
        // include "Views/Layout/preloader.php";
        // include_once(__ROOT__ . "/Views/Layout/preloader.php");

        ?>
        <!-- Navbar -->
        <?php
        // include "Views/Layout/navbare.php";
        include_once(__ROOT__ . "/Views/Layout/navbare.php");
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        // include "Views/Layout/sidebare.php";
        include_once(__ROOT__ . "/Views/Layout/sidebare.php");

        ?>
        <!-- /.sidebar -->


        <div class="content-wrapper" style="min-height: 1604.61px;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Client Edite</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">edit Client</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <form method="post">
                    <div class="row">
                        <div class="col">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit client
                                        <?= $client->Getnom() ?>
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" required="required" class="form-control" id="Id" name="Id"
                                        value=<?php echo $client->GetID() ?>>
                                    <div class="form-group">
                                        <label for="inputName">Client Name</label>
                                        <input name="nom" value=<?php echo $client->Getnom() ?> type="text"
                                            id="inputName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription"> client Email</label>
                                        <textarea name="email" id="inputDescription" class="form-control"
                                            rows="4"><?php echo  $client->Getemail() ?></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="index.php" class="btn btn-secondary">Cancel</a>
                            <input type="submit" name="modifier" value="Update Client"
                                class="btn btn-success float-right">
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <?php
    include_once(__ROOT__ . "/Views/Layout/footer.php");
    ?>
</body>
<?php
include_once(__ROOT__ . "/Views/Layout/links.php");
?>

</html>