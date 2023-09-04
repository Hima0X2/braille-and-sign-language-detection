<?php
session_start();
if (!empty($_SESSION['login'])) {
    
    echo "login success";
}
else{
header("location: LogIn.php");

}

?>
<a href="Logout.php">Logout</a>