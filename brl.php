<!DOCTYPE html>
<html>
<head>
    <title>Braille to English Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Braille to English Converter</h1>
    <form method="post" action="">
        <label for="braille">Enter Braille:</label>
        <input type="text" id="braille" name="braille" placeholder="⠓⠑⠇⠇⠕   ⠺⠕⠗⠑⠝⠑" required>
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
        for ($i = 0; $i < strlen($braille); $i++) {
            $braillePattern .= $braille[$i];
            if (array_key_exists($braillePattern, $brailleMapping)) {
                $text .= $brailleMapping[$braillePattern];
                $braillePattern = "";  // Reset the pattern
            }
        }

        return $text;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $brailleInput = $_POST["braille"];
        $englishOutput = brailleToText($brailleInput);
        echo "<p>English Output: $englishOutput</p>";
    }
    ?>
</body>
</html>
