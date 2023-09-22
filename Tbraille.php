<!DOCTYPE html>
<html>
<head>
    <title>Text to Braille Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: black;
            color: #fff;
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 80%;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            min-height: 100px;
        }

        #braille-output {
            border: 1px solid #ccc;
            font-size:30px;
            padding: 10px;
            border-radius: 4px;
            min-height: 100px;
            color: #333; /* Dark gray text color */
            animation: textAnimation 2s infinite alternate; /* Text color-changing animation */
        }

        .submit-button {
            background-color: #e05b3d; /* Blue color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth color transition */
        }

        .submit-button:hover {
            background-color: #324a39; /* Darker blue color on hover */
        }

        p {
            font-weight: bold;
            margin-top: 10px;
            text-align: center;
        }

        @keyframes textAnimation {
            0% {
                color: #333;
            }
            100% {
                color: #e05b3d; /* Reddish-orange color */
            }
        }
    </style>
</head>
<body>
    <h1 id="typing-header">Text to Braille Converter</h1>
    <div class="container">
        <form method="post" action="">
            <label for="english-text">Enter English Text:</label>
            <textarea id="english-text" name="english-text" placeholder="Enter your text here" required></textarea>
            <input class="submit-button" type="submit" value="Convert">
        </form>
        <div id="braille-output">
            <?php
            function textToBraille($text) {
                $braille_mapping = array(
                    'a' => '⠁',
                    'b' => '⠃',
                    'c' => '⠉',
                    'd' => '⠙',
                    'e' => '⠑',
                    'f' => '⠋',
                    'g' => '⠛',
                    'h' => '⠓',
                    'i' => '⠊',
                    'j' => '⠚',
                    'k' => '⠅',
                    'l' => '⠇',
                    'm' => '⠍',
                    'n' => '⠝',
                    'o' => '⠕',
                    'p' => '⠏',
                    'q' => '⠟',
                    'r' => '⠗',
                    's' => '⠎',
                    't' => '⠞',
                    'u' => '⠥',
                    'v' => '⠧',
                    'w' => '⠺',
                    'x' => '⠭',
                    'y' => '⠽',
                    'z' => '⠵',
                    ' ' => ' ',
                );

                $braille_text = "";
                for ($i = 0; $i < strlen($text); $i++) {
                    $char = strtolower($text[$i]);
                    if (array_key_exists($char, $braille_mapping)) {
                        $braille_text .= $braille_mapping[$char];
                    } else {
                        $braille_text .= $text[$i];
                    }
                }

                return $braille_text;
            }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $englishText = $_POST["english-text"];
                $brailleOutput = textToBraille($englishText);
                echo "<p>Braille Output:</p><pre>$brailleOutput</pre>";
            }
            ?>
        </div>
    </div>

    <script>
        const headerText = "Text to Braille Converter";
        let charIndex = 0;
        const typingHeader = document.getElementById("typing-header");
        typingHeader.textContent = "";

        function type() {
            if (charIndex < headerText.length) {
                typingHeader.textContent += headerText.charAt(charIndex);
                charIndex++;
                setTimeout(type, 100);
            }
        }

        type();
    </script>
</body>
</html>
