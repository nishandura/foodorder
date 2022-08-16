<?php
 session_start();
 unset($_SESSION['id']);
 unset($_SESSION['name']);
 unset($_SESSION['email']);
 unset($_SESSION['password']);
 unset($_SESSION['phnno']);
 echo header('Location: index.php?msg=logged out');
?>