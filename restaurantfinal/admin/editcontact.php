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
            $select_query = "SELECT * FROM contacts WHERE id=$id";
            $select_result = mysqli_query($conn, $select_query);
            // $select_row = mysqli_fetch_assoc($select_result);
            $select_row = $select_result->fetch_assoc();
            $select_name = $select_row['name'];
            $select_email = $select_row['email'];
            $select_subject = $select_row['subject'];
            $select_message = $select_row['message'];
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
                            <h1 class="m-0">Edit Contact</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Contact</li>
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
                                $email = $_POST['email'];
                                $subject = $_POST['subject'];
                                $message = $_POST['message'];
                                $status = $_POST['status'];
                                $created_at = $_POST['created_at'];
                                $updated_at = $_POST['updated_at'];


                                if ($name != "" && $email != "" && $subject != "" && $message != "" && $created_at) {
                                    $update_query = "UPDATE contacts SET name='$name', email='$email' ,subject='$subject', message='$message', status='$status', created_at='$created_at', updated_at='$updated_at' WHERE id=$id";
                                    $update_result = mysqli_query($conn, $update_query);
                                    if ($update_result) {
                            ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Contact is updated successfully.</strong>
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
                                            <strong>User couldn't be updated successfully.</strong>
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
                                    <h3 class="card-title">Edit User</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" name="name" value="<?php echo $select_name; ?>" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="email" name="email" value="<?php echo $select_email; ?>" class="form-control" id="exampleInputPassword1" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputSubject1">Subject</label>
                                            <input type="text" name="subject" value="<?php echo $select_subject; ?>" class="form-control" id="exampleInputSubject1" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputMessage1">Message</label>
                                            <input type="text" name="message" value="<?php echo $select_message; ?>" class="form-control" id="exampleInputMessage1" placeholder="">
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

        <?php require('inc/footer.php'); ?>