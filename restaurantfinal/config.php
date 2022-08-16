<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "restaurant";
$conn = new mysqli($servername,$username,$password,$database);
if($conn){
    // echo "database connection successful";
}else{
    echo "database connection: failed";
}
?>