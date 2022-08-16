<?php require('inc/toppart.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <?php require('inc/navbar.php'); ?>

        <?php require('inc/sidebar.php'); ?>


        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $select_query = "SELECT * FROM menu WHERE id=$id";
            $select_result = mysqli_query($conn, $select_query);
            // $select_row = mysqli_fetch_assoc($select_result);
            $select_row = $select_result->fetch_assoc();
            $select_title = $select_row['title'];
            $select_slug = $select_row['slug'];
            $select_order_no = $select_row['order_no'];
            $select_status = $select_row['status'];
            $select_created_at = $select_row['created_at'];
            $select_updated_at = $select_row['updated_at'];
        }
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit Menu Info</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Menu Info</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if (isset($_POST['submit'])) {
                                $title = $_POST['title'];
                                $slug = $_POST['slug'];
                                $order_no = $_POST['order_no'];
                                $status = $_POST['status'];
                                $created_at = $_POST['created_at'];
                                $updated_at = $_POST['updated_at'];


                                if ($title != "" && $slug != "" && $order_no != "") {
                                    $update_query = "UPDATE menu SET title='$title', slug='$slug' ,order_no='$order_no', status='$status', created_at='$created_at', updated_at='$updated_at' WHERE id=$id";
                                    $update_result = mysqli_query($conn, $update_query);
                                    if ($update_result) {
                            ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Menu info is updated successfully.</strong>
                                        </div>

                                        <script>
                                            $(".alert").alert();
                                        </script>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Menu info couldn't be updated successfully.</strong>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>All fields are necessary.</strong>
                                    </div>

                                    <script>
                                        $(".alert").alert();
                                    </script>
                            <?php
                                }
                            }
                            ?>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Menu info</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" name="title" value="<?php echo $select_title; ?>" class="form-control" id="exampleInputTitle1" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Slug</label>
                                            <input type="text" name="slug" value="<?php echo $select_slug; ?>" class="form-control" id="exampleInputSubTitle1" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputSubject1">Content</label>
                                            <input type="text" name="order_no" value="<?php echo $select_order_no; ?>" class="form-control" id="exampleInputContent1" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputStatus1">Status</label>
                                            <input type="number" name="status" value="<?php echo $select_status; ?>" class="form-control" id="exampleInputStatus1" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputCreated_at1">Created_at</label>
                                            <input type="datetime" name="created_at" value="<?php echo $select_created_at; ?>" class="form-control" id="exampleInputCreated_at1" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUpdated_at1">Upadated_at</label>
                                            <input type="datetime" name="updated_at" value="<?php echo $select_updated_at; ?>" class="form-control" id="exampleInputUpdated_at" placeholder="">
                                        </div>
                                       
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php require('inc/footer.php'); ?>