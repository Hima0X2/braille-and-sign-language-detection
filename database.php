<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['images'])) {

    $uploadDirectory = 'train/0/';
    
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0755, true);
    }

    $uploadedFiles = $_FILES['images'];

    // Create a connection to the database
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "spl";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    for ($i = 0; $i < count($uploadedFiles['name']); $i++) {
        $name = $uploadedFiles['name'][$i];
        $tmp_name = $uploadedFiles['tmp_name'][$i];
        $location = $uploadDirectory . $name; // Image location
        
        if (move_uploaded_file($tmp_name, $location)) {
            echo "Image $name uploaded successfully.<br>";

            // Insert image name and location into the 's' table
            $sql = "INSERT INTO train (name, location) VALUES ('$name', '$location')";
            if ($conn->query($sql) === TRUE) {
                echo "Image name and location inserted into table.<br>";
            } else {
                echo "Error inserting image info: " . $conn->error . "<br>";
            }
        } else {
            echo "Error uploading $name.<br>";
        }
    }