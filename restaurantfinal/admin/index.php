<?php
// ERROR IN LINE 112 to solve say header warning: cannot modify header information - headers already sent by (output started at php
ob_start();
require('connection/config.php');
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
   

    <!-- first section login form -->
    <section class="firstsection">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
           
               

                <div class="col-lg-6 mb-5 mb-lg-0 ">

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <?php
                              if(isset($_POST['submit'])){
                                $email =$_POST['email'];
                                $password = $_POST['password'];
                    
                                if($email!="" && $password!=""){
                                   
                                        $login_query = "SELECT * FROM admin Where email='$email' AND password='$password'";
                                        $login_result = mysqli_query($conn,$login_query);
                                        $count = mysqli_num_rows($login_result);
                                        if($count==1)
                                        {
                                            session_start();
                                            $login_row = $login_result->fetch_assoc();
                                            $_SESSION['id'] = $login_row['id'];
                                            $_SESSION['email'] = $login_row['email'];
                                            $_SESSION['password'] = $login_row['password'];
                                            echo header('Location: dashboard.php?msg=loginsuccessful');
                            
                                        }else{
                                            echo'<script>alert("Incorrect credentials");</script>';
                                        }
                                }else{
                                    echo '<script>alert("Input the all fields in form ");</script>';
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <!-- Email input -->
                                <div class="text-center"><h1>Admin Login</h1></div>
                                <div class="form-outline mb-4">
                                    <input type="email" id="" name="email" class="form-control" />
                                    <label class="form-label" for="">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="" name="password" class="form-control" />
                                    <label class="form-label" for="">Password</label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Login</button>

                                <!-- Login buttons -->
                                <!-- <div class="text-center">
                                    <p>Login with:</p>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-google"></i>
                                    </button>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
    </section>
    <!-- end first section -->

    <!-- Boostrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>