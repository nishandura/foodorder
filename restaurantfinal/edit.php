<?php 
 require('config.php');
 session_start();
 require('secureuser.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index page</title>
    <link rel="stylesheet" href="Assets/css/index.css">
    <!-- Boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/de0b87d9a2.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- start navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Food Plaza</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fooditem.php">Food Item</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Breakfast</a></li>
                            <li><a class="dropdown-item" href="#">Lunch</a></li>
                            <li><a class="dropdown-item" href="#">Dinner</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="myorder.php">Myorder</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ourteam.php">Our Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Signup</a>
                    </li>
                </ul>
                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- first section edit form -->
    <section class="firstsectionedit">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                         <br />
                        <span style="color: hsl(218, 81%, 75%)">Edit Your Profile</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">

                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <?php
                              if(isset($_POST['submit']))
                              {
                                $name = $_POST['name'];
                                $phnno = $_POST['phnno'];
                                $password = $_POST['password'];
                                $email = $_POST['email'];
                                $update_query = "UPDATE users set name='$name', email='$email', phnno='$phnno', password='$password'"; 
                                $update_result = mysqli_query($conn,$update_query);
                                if($update_result){
                                    echo'<script>alert("succesfully update profile information");</script>';
                                }else{
                                    echo'<script>alert("fail to update profile information");</script>';
                                }
                              }
                            ?>
                            <form action="#" method="POST">
                            <?php
                              
                              $id = $_SESSION['id'];
                              $select_query = "SELECT * FROM users WHERE id='$id'";
                              $select_result = mysqli_query($conn,$select_query);
                              $select_row = $select_result->fetch_assoc();
                              $id = $select_row['id'];
                              $name = $select_row['name'];
                              $email = $select_row['email'];
                              $phnno = $select_row['phnno'];
                              $password = $select_row['password'];
                         
                            ?>
                                <!-- Image Input -->
                                <!-- <div class="form-outline mb-4">
                                    <input type="file" id="" class="form-control" value=""/>
                                    <label class="form-label" for="">Image</label>
                                </div> -->
                                <!-- name -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="" class="form-control" name="name" value="<?php echo $name;?>"/>
                                    <label class="form-label" for="">Name</label>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="" class="form-control" name="email" value="<?php echo $email;?>"/>
                                    <label class="form-label" for="">Email address</label>
                                </div>


                                <!-- Phone Number input -->
                                <div class="form-outline mb-4">
                                    <input type="tel" id="" class="form-control" name="phnno" value="<?php echo $phnno;?>" />
                                    <label class="form-label" for="">Phone Number</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="" class="form-control" name="password" value="<?php echo $password;?>" />
                                    <label class="form-label" for="">Password</label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>
    <!-- end first section -->

    <!-- start footer  -->
    <footer class="foot">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 links">
                    <h1>About us</h1>
                    <ul class="unorderli">
                       <li class="">
                            <a class="" href="index.php">Home</a>
                        </li>
                        <li class="listli">
                            <a class="" href="aboutus.php">About Us</a>
                        </li>
                        <li class="">
                            <a class="" href="contactus.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class=" container col-12 col-sm-6  location">
                    <h1>Our Location</h1>
                    <h4>Restaurant Timing: (10:00am - 10pm)</h4>
                    <div class="container iframeloc">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1832.1071787774003!2d84.26985508453525!3d27.976493558681288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399507d4b96251f9%3A0xb32bbdc5548c25af!2sThe%20Burger%20House%20and%20Crunchy%20Fried%20Chicken!5e0!3m2!1sen!2snp!4v1655111158144!5m2!1sen!2snp"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class=" copy bg-primary">
            <p class="text-center">© Restaurant Food Ordering 2022, All rights reserved</p>
        </div>
    </footer>
    <!-- end of footer -->


    <!-- Boostrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>