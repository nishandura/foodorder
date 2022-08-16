<?php require('inc/toppart.php');?>

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
              <h1 class="m-0">Add Pages</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Pages</li>
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
                $content = $_POST['content'];
                // $status = $_POST['status'];
                // $created_at = $_POST['$created_at'];
                // $updated_at = $_POST['$updated_at'];

                if ($title != "" && $slug != "" && $content != "") {

                  $insert_query = "INSERT INTO pages(title,slug,content) VALUES('$title','$slug','$content')";
                  $insert_result = mysqli_query($conn, $insert_query);
                  if ($insert_query) {
              ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>pages added successfully.</strong>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Pages couldn't be added successully.</strong>
                    </div>
                <?php
                  }
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
                  <h3 class="card-title">Add Pages</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="#" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" name="title" class="form-control" id="exampleInputTitle1" placeholder="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Slug</label>
                          <input type="text" name="slug" class="form-control" id="exampleInputSubTitle1" placeholder="">
                        </div>
                      </div>
                      <!-- <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputStatus1">Slug</label>
                          <input type="text" name="status" class="form-control" id="exampleInputStatus1" placeholder="">
                        </div>
                      </div> -->
                      <!-- <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputCreated_at1">Created_at</label>
                          <input type="datetime" name="created_at" value="" class="form-control" id="exampleInputCreated_at1" placeholder="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputCreated_at1">Created_at</label>
                          <input type="datetime" name="updated_at" value="" class="form-control" id="exampleInputUpdated_at1" placeholder="">
                        </div>
                      </div> -->

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