<!DOCTYPE html>
<html>
<head>
    <title>Display Sign Language Images</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .image-container img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 2px solid #333;
            border-radius: 10px;
        }

        .image-container p {
            text-align: center;
            font-size: 20px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Display Sign Language Images</h1>

    <div class="image-container" id="image-container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $letters = $_POST['letters'];
            $length = strlen($letters);
            for ($i = 0; $i < $length; $i++) {
                $letters[$i] = strtoupper($letters[$i]);
                if ($letters[$i] == ' ') {
                    $letters[$i] = "@";
                }
                $imagePath = "braille/" . $letters[$i] . ".jpg";
                if (file_exists($imagePath)) {
                    echo '<img src="' . $imagePath . '" id="image' . $i . '"';
                    if ($i != 0) {
                        echo ' style="display: none;"'; // Hide all images except the first one
                    }
                    echo '>';
                    if ($letters[$i] != '@') {
                        echo '<p>' . $letters[$i] . '</p>'; // Display the name alongside the image
                    }
                } else {
                    // echo 'Image not found for letter ' . $letters[$i];
                }
            }
        }
        ?>
    </div>

    <script>
        var currentIndex = 0;
        var images = document.querySelectorAll('.image-container img');
        var imageContainer = document.getElementById('image-container');

        function displayNextImage() {
            if (currentIndex < images.length) {
                if (currentIndex > 0) {
                    images[currentIndex - 1].style.display = 'none'; // Hide the previous image
                }
                images[currentIndex].style.display = 'block'; // Display the current image
                currentIndex++;

                if (currentIndex === images.length) {
                    clearInterval(interval); // Stop the interval when all images have been displayed
                }
            }
        }

        var interval = setInterval(displayNextImage, 1000); // Change image every 1 second (1000 milliseconds)
    </script>
</body>
</html>
