<?php
require('../../connection/config.php');
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "DELETE FROM teams WHERE id=$id";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        echo header('Location: ../manageteams.php?msg=dsuccess');
    }
    else 
    {
        echo header('Location: ../manageteams.php?msg=derror');
    }
} 
?>