<?php
session_start();
  include('DbConnection.php');
  if (isset($_POST['login_btn'] )) {

$email = $_POST['email'];
$password=$_POST['password'];
$encrypted_password=md5($password);

    $query = "SELECT * FROM users WHERE email='$email'" ;
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0 ) {
        $pass_query="SELECT * FROM   users WHERE  email='$email'  AND password='$encrypted_password'" ;
        $result_with_password = mysqli_query($conn, $pass_query);
        $count_with_password = mysqli_num_rows($result_with_password);
        if ($count_with_password > 0) {
            $_SESSION['login'] = 'login successfully';
            $_SESSION['email']=$email;
            $result_fetch=mysqli_fetch_assoc($result_with_password);
            $_SESSION['name']=$result_fetch['name'];

            header('location:index.php');
        }
        else{
           $_SESSION['status'] = 'Wrong Password';
              header("Location: LogIn.php"); 
                 exit;
            }
            // echo "Wrong password";
         
    }else{
        $_SESSION['status'] = 'User not found';
        header("Location: LogIn.php"); 
           exit;
        // echo "User not found";
    }
  
 }


?>