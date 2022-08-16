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
            $select_query = "SELECT * FROM blogs WHERE id=$id";
            $select_result = mysqli_query($conn, $select_query);
            // $select_row = mysqli_fetch_assoc($select_result);
            $select_row = $select_result->fetch_assoc();
            $select_title = $select_row['title'];
            $select_slug = $select_row['slug'];
            $select_img = $select_row['img'];
            $select_content = $select_row['content'];
            // $select_ext = $select_row['ext'];
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
                            <h1 class="m-0">View Blogs</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">View Blogs</li>
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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">View Blogs</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputTitle1">Title</label>
                                            <input type="text" name="title" value="<?php echo $select_title; ?>" class="form-control" id="exampleInputTitle1" placeholder="" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTitle1">Slug</label>
                                            <input type="text" name="slug" value="<?php echo $select_slug; ?>" class="form-control" id="exampleInputSlug1" placeholder="" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFilelink1">Img</label>
                                            <input type="text" name="img" value="<?php echo $select_img; ?>" class="form-control" id="exampleInputFileImg1" placeholder="" disabled>
                                            <td><img src="uploads/<?php echo $select_img;?>" alt="" height="150px;" width="200px"></td>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputExt1">Content</label>
                                            <input type="text" name="content" value="<?php echo $select_content; ?>" class="form-control" id="exampleInputContent1" placeholder="" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputStatus1">Status</label>
                                            <input type="number" name="status" value="<?php echo $select_status; ?>" class="form-control" id="exampleInputStatus1" placeholder="" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputCreated_at1">Created_at</label>
                                            <input type="text" name="created_at" value="<?php echo $select_created_at; ?>" class="form-control" id="exampleInputCreated_at1" placeholder="" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUpdated_at1">Updated_at</label>
                                            <input type="text" name="updated_at" value="<?php echo $select_updated_at; ?>" class="form-control" id="exampleInputUpdated_at1" placeholder="" disabled>
                                        </div>
                                        <!-- /.card-body -->
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