<?php require('inc/toppart.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <?php require('inc/navbar.php'); ?>

        <?php require('inc/sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add Teams</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add Teams</li>
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

                                if ($name != "" && $position != "" && $img != "" && $order_no != "") {
                                    $insert_query = "INSERT INTO teams(name,position,img,order_no) VALUES('$name','$position','$img','$order_no')";
                                    $insert_result = mysqli_query($conn, $insert_query);
                                    if ($insert_query) {
                            ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Teams is added successfully.</strong>
                                        </div>
                                    <?php
                                    } else {
                                    ?>

                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Teams couldn't be added successully.</strong>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>Image is mandatory.</strong>
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
                            <?php
                            }
                            ?>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Teams</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputTitle1">Name</label>
                                                    <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputSlug1">Position</label>
                                                    <input type="text" name="position" class="form-control" id="exampleInputPosition1" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
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
                                                                            require('connection/config.php');
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
                                                                <input class="mt-2" id="imagebox" type="text" class="form-control" name="img" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Content</label>
                                                        <textarea class="form-control" name="content" id="summernote" rows="15"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputSlug1">Order_no</label>
                                                <input type="text" name="order_no" class="form-control" id="exampleInputOrder_no1" placeholder="">
                                            </div>
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