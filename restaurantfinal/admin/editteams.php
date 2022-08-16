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
            $select_query = "SELECT * FROM teams WHERE id=$id";
            $select_result = mysqli_query($conn, $select_query);
            // $select_row = mysqli_fetch_assoc($select_result);
            $select_row = $select_result->fetch_assoc();
            $select_name = $select_row['name'];
            $select_position = $select_row['position'];
            $select_img = $select_row['img'];
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
                            <h1 class="m-0">Edit Teams</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Teams</li>
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
                                $name = $_POST['name'];
                                $position = $_POST['position'];
                                $img = $_POST['img'];
                                $order_no = $_POST['order_no'];
                                $status = $_POST['status'];
                                $created_at = $_POST['created_at'];
                                $updated_at = $_POST['updated_at'];


                                if ($name != "" && $position != "" && $order_no != "" && $created_at) {
                                    $update_query = "UPDATE teams SET name='$name', position='$position' ,img='$img', order_no='$order_no', status='$status', created_at='$created_at', updated_at='$updated_at' WHERE id=$id";
                                    $update_result = mysqli_query($conn, $update_query);
                                    if ($update_result) {
                            ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Team is updated successfully.</strong>
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
                                            <strong>Team couldn't be updated successfully.</strong>
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
                                    <h3 class="card-title">Edit Teams</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" name="name" value="<?php echo $select_name; ?>" class="form-control" id="exampleInputTitle1" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Position</label>
                                            <input type="text" name="position" value="<?php echo $select_position; ?>" class="form-control" id="exampleInputSlug1" placeholder="">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="container mt-3">
                                                    <h2>Add Image</h2>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                                        Choose Image
                                                    </button>
                                                </div>

                                                <!-- The Modal -->
                                                <div class="modal" id="myModal">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header modal-lg">
                                                                <h4 class="modal-title">Imagesfrom folder name uploads</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <h3 class="text-center">Images</h3>
                                                                <div class="card-body">

                                                                    <div class="row">
                                                                        <?php

                                                                        $select_query = "SELECT * FROM filemanager";
                                                                        $select_result = mysqli_query($conn, $select_query);
                                                                        $i = 0;
                                                                        while ($data_row = mysqli_fetch_array($select_result)) {
                                                                            $i++;
                                                                        ?>
                                                                            <div class="col-md-6">
                                                                                <label>
                                                                                    <input type="radio" name="img" value="<?php echo $data_row['filelink']; ?>" style="opacity: 0;" />
                                                                                    <img id="file" src="<?php echo "uploads/" . $data_row['filelink']; ?>" alt="" height="100px;" width="100px;" style="margin-right:20px;">
                                                                                </label>

                                                                            </div>

                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="firstFunction();">save</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input class="mt-2" id="imagebox" value="<?php echo $select_row['img']; ?>" type="text" class="form-control" name="imgae" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputContent1">Order_no</label>
                                            <input type="number" name="order_no" value="<?php echo $select_order_no; ?>" class="form-control" id="exampleInputContent1" placeholder="">
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
                                            <input type="datetime" name="updated_at" value="<?php echo $select_created_at; ?>" class="form-control" id="exampleInputUpdated_at" placeholder="">
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
        <script>
            function firstFunction() {
                var selected_option1 = document.querySelector('input[name=img]:checked').value;
                document.getElementById('imagebox').value = selected_option1;
            }
        </script>

        <?php require('inc/footer.php'); ?>