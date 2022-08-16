<?php
require('../../connection/config.php');
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "SELECT * FROM filemanager WHERE id=$id";
    $result = mysqli_query($conn,$query);
    $select_row = $result->fetch_assoc();
    $select_row_filelink = $select_row['filelink'];
    $full_filelink = '../uploads/'.$select_row_filelink;
    unlink($full_filelink);
    $delete_query = "DELETE FROM filemanager WHERE id=$id";
    $delete_result = mysqli_query($conn,$delete_query);
    if($delete_result)
    {
        echo header('Location: ../managefile.php?msg=dsuccess');
    }
    else 
    {
        echo header('Location: ../managefile.php?msg=derror');
    }
} 
?>