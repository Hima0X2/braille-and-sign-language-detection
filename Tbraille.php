<!DOCTYPE html>
<html>

<head>
    <title>Display Braille Language Images</title>
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

        .image-card {
            text-align: center;
            margin: 10px;
            padding: 10px;
        }

        .image-card img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border: 1px solid #333;
        }

        .image-name {
            font-size: 18px;
            margin-top: 10px;
            color: #007BFF; /* Unique text color */
        }

        /* Add any other unique CSS styles you want */
    </style>
</head>

<body>
    <h1>Display Sign Language Images</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $letters = $_POST['letters'];
        $length = strlen($letters);
        echo '<div class="image-container">';
        for ($i = 0; $i < $length; $i++) {
            $command = escapeshellcmd("python sign.py " . $letters[$i]);
            $output = shell_exec($command);
            echo $output;
            echo "<br>";
            $letters[$i] = strtoupper($letters[$i]);
            if ($letters[$i] == ' ') {
                $imagePath = "braille/@.jpg";
            } else {
                $imagePath = "braille/" . $letters[$i] . ".jpg";
            }
            if (file_exists($imagePath)) {
                echo '<div class="image-card">';
                echo '<img src="' . $imagePath . '" alt="Image">';
                echo '<p class="image-name">' . $letters[$i] . '</p>';
                echo '</div>';
            } else {
                echo 'Image not found for letter ' . $letters[$i];
            }
        }
        echo '</div>';
    }
    ?>
</body>

</html>
