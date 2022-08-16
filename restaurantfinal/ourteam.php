<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ourteam page</title>
    <link rel="stylesheet" href="Assets/css/index.css">
    <!-- Boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                     <!-- hide and show link on session check -->
                     <?php
                      if(isset($_SESSION['id'])){
                        echo ' <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>';
                        echo ' <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                      }else{
                        echo ' <li class="nav-item"> <a class="nav-link" href="signup.php">Signup</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                      }
                      ?>
                </ul>
                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- start first section our team -->
    <section class="firstsectionourteam">
        <div class="main mt-5">
            <div class="row justify-content-evenly">
                <div class="card col-12 col-sm-6 col-md-3 col-lg-4 mt-3" style="width: 18rem;">
                    <img src="Assets/uploads/team/chef1.jpg" class="card-img-top h-50 mt-1" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Head Chef</h5>
                        <p class="card-text">Lena Gurung</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>


                <div class="card col-12 col-sm-6 col-md-3 col-lg-4 mt-3" style="width: 18rem;">
                    <img src="Assets/uploads/team/chef2.jpg" class="card-img-top h-50 mt-1" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Head Chef</h5>
                        <p class="card-text">Vicky Tamang</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
                <div class="card col-12 col-sm-6 col-md-3 col-lg-4 mt-3" style="width: 18rem;">
                    <img src="Assets/uploads/team/chef3.jpg" class="card-img-top h-50 mt-1" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Head Chef</h5>
                        <p class="card-text">John Chhetri</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
                <div class="card col-12 col-sm-6 col-md-3 col-lg-4 mt-3 " style="width: 18rem;">
                    <img src="Assets/uploads/team/chef4.jpg" class="card-img-top h-50 mt-1" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Head Chef</h5>
                        <p class="card-text">Rita Neupana</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
                <div class="card col-12 col-sm-6 col-md-3 col-lg-4 mt-3" style="width: 18rem;">
                    <img src="Assets/uploads/team/chef5.jpg" class="card-img-top h-50 mt-1" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Head Chef</h5>
                        <p class="card-text">Bishow Nepali</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
                <div class="card col-12 col-sm-6 col-md-3 col-lg-4 mt-3" style="width: 18rem;">
                    <img src="Assets/uploads/team/chef6.jpg" class="card-img-top h-50 mt-1" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Helper</h5>
                        <p class="card-text">Gita Tamang</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
                <div class="card col-12 col-sm-6 col-md-3 col-lg-4 mt-3" style="width: 18rem;">
                    <img src="Assets/uploads/team/waiter1.jpg" class="card-img-top h-50 mt-1" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Waiteress</h5>
                        <p class="card-text">Sharmila Ghimira</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
                <div class="card col-12 col-sm-6 col-md-3 col-lg-4 mt-3" style="width: 18rem;">
                    <img src="Assets/uploads/team/waiter2.png" class="card-img-top h-50 mt-1" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Waiteress</h5>
                        <p class="card-text">Lina Gurung</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end first section our team-->

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