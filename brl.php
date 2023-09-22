<!DOCTYPE html>
<html>
<head>
    <title>Braille to English Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Hide overflow to prevent scrollbars */
        }

        #animated-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Place the animated background behind content */
        }

        h1 {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        @keyframes colorChange {
            0% {
                background-color: #007bff;
            }
            100% {
                background-color: #e74c3c;
            }
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 50%;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #f39c12; /* Orange color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 0 auto;
            transition: background-color 0.3s ease; /* Smooth color transition */
        }

        input[type="submit"]:hover {
            background-color: #e74c3c; /* Red color on hover */
        }

        p {
            font-weight: bold;
            margin-top: 10px;
            text-align: center;
            color: #333; /* Dark gray text color */
            animation: textAnimation 2s infinite alternate; /* Text color-changing animation */
        }

        @keyframes textAnimation {
            0% {
                color: #333;
            }
            100% {
                color: #234175;
            }
        }

        /* CSS styles for the output box */
        #output-box {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Braille to English Converter</h1>
    <form method="post" action="">
        <label for="braille">Enter Braille:</label>
        <input type="text" id="braille" name="braille" placeholder="⠑⠝⠞⠑⠗ ⠽⠕⠥⠗ ⠞⠑⠭⠞ ⠓⠑⠗⠑" required>
        <input type="submit" value="Convert">
    </form>
    <?php
    function brailleToText($braille) {
        $brailleMapping = array(
            '⠁' => 'a', '⠃' => 'b', '⠉' => 'c', '⠙' => 'd',
            '⠑' => 'e', '⠋' => 'f', '⠛' => 'g', '⠓' => 'h',
            '⠊' => 'i', '⠚' => 'j', '⠅' => 'k', '⠇' => 'l',
            '⠍' => 'm', '⠝' => 'n', '⠕' => 'o', '⠏' => 'p',
            '⠟' => 'q', '⠗' => 'r', '⠎' => 's', '⠞' => 't',
            '⠥' => 'u', '⠧' => 'v', '⠺' => 'w', '⠭' => 'x',
            '⠽' => 'y', '⠵' => 'z', ' ' => ' ',
        );

        $text = "";
        $braillePattern = "";
        $brailleArray = preg_split('//u', $braille, null, PREG_SPLIT_NO_EMPTY); // Split input into an array of characters

        foreach ($brailleArray as $char) {
            $braillePattern .= $char;
            if (array_key_exists($braillePattern, $brailleMapping)) {
                $text .= $brailleMapping[$braillePattern];
                $braillePattern = ""; 
            }
        }

        return $text;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $brailleInput = $_POST["braille"];
        $englishOutput = brailleToText($brailleInput);
        echo '<div id="output-box">';
        echo "<p>English Output: $englishOutput</p>";
        echo '</div>';
    }
    ?>
</body>
</html>
