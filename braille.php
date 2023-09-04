<!DOCTYPE html>
<html>
<head>
    <title>Sign language detection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .image-container {
            margin: 20px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.2s;
            cursor: pointer;
        }

        .image-container:hover {
            transform: scale(1.05);
        }

        img {
            max-width: 100%;
            height: auto;
        }

        p {
            margin: 10px 0;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <?php
    $imageDirectory = 'braille/';
    $imageFiles = glob($imageDirectory . '*.{jpg,JPG}', GLOB_BRACE);

    if (empty($imageFiles)) {
        echo 'No images found in the directory.';
    } else {
        foreach ($imageFiles as $imageFile) {
            $imageName = pathinfo($imageFile, PATHINFO_FILENAME);
            if ($imageName == '@') {
                $imageName = "space";
            }
            
            echo '<div class="image-container" onclick="speakLetter(\'' . $imageName . '\')">';
            echo '<img src="' . $imageFile . '" alt="Image">';
            echo '<p>' . $imageName . '</p>';
            echo '</div>';
        }
    }
    ?>

    <script>
        function speakLetter(letter) {
            const synth = window.speechSynthesis;
            const utterance = new SpeechSynthesisUtterance(letter);
            synth.speak(utterance);
        }
    </script>
</body>
</html>
