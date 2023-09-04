<?php
include('DbConnection.php');
session_start();

if (!empty($_SESSION['email']) && isset($_POST['update_btn'])) {
    $email = $_SESSION['email'];
    $update_name = trim($_POST['name']);
    $updated_pass = $_POST['password'];
    $updated_re_pass = $_POST['retype_password'];
    
    // Check if any changes were made
    if (empty($update_name) && empty($updated_pass) && empty($updated_re_pass)) {
        $_SESSION['status'] = 'No changes were made';
        header("Location: UpdateProfile.php");
        exit;
    }

    // Check if passwords match
    if (!empty($updated_pass) && $updated_pass !== $updated_re_pass) {
        $_SESSION['status'] = 'Passwords do not match';
        header("Location: UpdateProfile.php");
        exit;
    }

    // Update name and/or password
    $query = "UPDATE users SET ";
    if (!empty($update_name)) {
        $query .= "name = '$update_name'";
        $_SESSION['name'] = $update_name;
    }
    if (!empty($updated_pass)) {
        if (!empty($update_name)) {
            $query .= ", ";
        }
        $md5_pass = md5($updated_pass);
        $query .= "password = '$md5_pass'";
    }
    $query .= " WHERE email = '$email'";

    $query_run = mysqli_query($conn, $query);
    
    if ($query_run) {
        if (!empty($update_name) && !empty($updated_pass)) {
            $_SESSION['status'] = 'Name and password updated successfully';
        } elseif (!empty($update_name)) {
            $_SESSION['status'] = 'Name updated successfully';
        } elseif (!empty($updated_pass)) {
            $_SESSION['status'] = 'Password updated successfully';
        }
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['status'] = 'Error updating profile';
        header("Location: UpdateProfile.php");
        exit;
    }
}
if (isset($_POST['cancel_btn'])){
   header("Location: index.php");
    exit;
}
?>
