<?php   
if(isset($_SESSION['userSession'])) {
    echo '<li class="dropdown"><a href="logout.php"><span>Log Out</span></a>   </li>';
} else {
    echo '<li class="dropdown"><a href="login.php"><span>Log In</span></a></li>';
} 
?> 