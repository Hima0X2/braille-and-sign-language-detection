<?php
session_start();
if (empty($_SESSION['email'])) {
    header("location: LogIn.php");
}
?>
<?php
$pythonScript = "final_pred.py";

// Use exec() to run the Python script
$output = exec("python $pythonScript 2>&1");
include('index.php');
?>