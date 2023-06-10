<h1>
    <?php var_dump($IsAjaxRequest) ?>
</h1>
<div class="col-md-12 col-md-6">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                                                   with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Clients
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <?php
                    foreach ($clients as $result) {
                        ?>
                        <li class="nav-item">
                            <a href="index.php?Id_client=<?= $result->GetID() ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    <?= $result->Getnom() ?>
                                </p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="nav-item">
                        <hr class="p-0 m-0">
                    </li>
                    <li class="nav-item">
                        <a href="../services/index.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p class="">All Clients</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<table class="table table-striped projects">
    <thead>
        <tr>
            <th style="width: 2%">
                #
            </th>
            <th style="width: 20%">
                service Name
            </th>
            <th class="text-center" style="width: 50%">
                type
            </th>
            <th style="width: 8%" class="text-center">
                price
            </th>
            <th style="width: 20%">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (empty($pages)) {
            ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                No Tasks Found!
            </div>
            <?php
        } else {
            $Services = $pages[$currentPage - 1];
            foreach ($Services as $result) {
                ?>
                <tr>
                    <td>
                        <?= $result->GetID() ?>
                    </td>
                    <td>
                        <a>
                            <?= $result->Getnom() ?>
                        </a>
                    </td>
                    <td>
                        <?= $result->GetType() ?>

                    </td>
                    <td>
                        <?= $result->GetPrice() ?>
                    </td>
                
                    <td class="project-actions">
                        <a class="btn btn-info btn-sm" href="editer.php?Id_srvice=<?= $result->GetID() ?>">
                            <i class="fas fa-pencil-alt"></i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="supprimer.php?Id_srvice=<?= $result->GetID() ?>">
                            <i class="fas fa-trash"></i>
                            Delete
                        </a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<div class="mt-3 d-flex justify-content-center align-items-center">
    <div class="dataTables_paginate paging_simple_numbers" id="paginate">
        <ul class="pagination">
            <?php
            if (isset($pagesNum)) {
                for ($i = 0; $i < $pagesNum; $i++) {
                    if ($currentPage == $i + 1) {
                        ?>
                        <li class="page-item active">
                            <a class="page-link" data-page="<?= $i + 1 ?>" href="#">
                                <?= $i + 1 ?>
                            </a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="page-item ">
                            <a class="page-link" data-page="<?= $i + 1 ?>" href="#">
                                <?= $i + 1 ?>
                            </a>
                        </li>
                        <?php
                    }
                }
            }
            ?>
        </ul>
    </div>
</div>