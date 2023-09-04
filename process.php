<!DOCTYPE html>
<html>

<head>
    <title>Display Sign Language Images</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-top: 20px;
        }

        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .image-container img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 2px solid #333;
            border-radius: 50%;
            margin: 10px;
        }

        .image-name {
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>Display Sign Language Images</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $letters = $_POST['letters'];
        $length = strlen($letters);
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "sign";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        echo '<div class="image-container">';
        for ($i = 0; $i < $length; $i++) {
            $letters[$i] = strtoupper($letters[$i]);
            if ($letters[$i] == ' ') {
                $letters[$i] = "@";
            }

            // Query the database to retrieve the image location
            $sql = "SELECT location FROM images WHERE name = '" . $letters[$i] . ".jpg'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Fetch the image location from the result
                $row = $result->fetch_assoc();
                $imagePath = $row['location'];

                echo '<div>';
                $imagePath = $imagePath . $letters[$i] . ".jpg";
                echo '<img src="' . $imagePath . '" alt="Image">';
                if ($letters[$i] != '@') {
                    echo '<p class="image-name">' . $letters[$i] . '</p>';
                }
                echo '</div>';
            } else {
                echo 'Image not found for letter ' . $letters[$i];
            }
        }
        echo '</div>';

        // Close the database connection
        $conn->close();
    }
    ?>
</body>

</html>
