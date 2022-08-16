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
              <h1 class="m-0">Add Slider</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Slider</li>
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
            if (isset($_POST['submit'])) 
              {
                $title = $_POST['title'];
                $btn_txt = $_POST['btn_txt'];
                $btn_link = $_POST['btn_link'];
                $watch_video_link = $_POST['watch_video_link'];
                $img = $_POST['img'];

                if ($title != "" && $btn_txt != "" && $btn_link != "" && $watch_video_link !="" && $img !="") 
                {
                  $insert_query = "INSERT INTO sliders(title,btn_txt,btn_link,watch_video_link,img) VALUES('$title','$btn_txt','$btn_link','$watch_video_link','$img')";
                  $insert_result = mysqli_query($conn, $insert_query);
                  if ($insert_query) {
               ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Slider is added successfully.</strong>
                    </div>
                  <?php
                  } else {
                  ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Slider couldn't be added successully.</strong>
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
                  <h3 class="card-title">Add Slider</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="#" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputTitle1">Title</label>
                          <input type="text" name="title" class="form-control" id="exampleInputTitle1" placeholder="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputSlug1">Button Text</label>
                          <input type="text" name="btn_txt" class="form-control" id="exampleInputSlug1" placeholder="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputSlug1">Button Link</label>
                          <input type="text" name="btn_link" class="form-control" id="exampleInputSlug1" placeholder="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputSlug1">Watch video link</label>
                          <input type="text" name="watch_video_link" class="form-control" id="exampleInputSlug1" placeholder="">
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
                                                            <input class="mt-2" id="imagebox" class="form-control" name="imgae" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
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
    <script>
      function firstFunction() {
        var selected_option1 = document.querySelector('input[name=img]:checked').value;
        document.getElementById('imagebox').value = selected_option1;
      }
    </script>

    <?php require('inc/footer.php'); ?>