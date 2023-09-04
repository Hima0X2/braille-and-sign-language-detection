<!DOCTYPE html>
<html>
<?php
session_start();
if (empty($_SESSION['email'])) {
    header("location: LogIn.php");
}
?>
<head>
    <title>Sign language detection</title>
    <style>
        /* Your existing CSS styles here */
        body {
            background-image: url('colors.gif');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: slide-up 1s ease-out;
        }

        /* Define a class for dynamic background color */
        .dynamic-bg {
            background-color: #fff; /* Default background color */
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Style the buttons */
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            margin-bottom: 10px; /* Add some vertical spacing between buttons */
            transition: background-color 0.3s ease; /* Add a smooth hover transition */
        }

        button:hover {
            background-color: #0056b3; /* Change the background color on hover */
        }

        /* Other existing styles */
    </style>
</head>

<body>
    <div class="container dynamic-bg">
        <h1>Enter letters to display sign language images:</h1>
        <form method="post">
            <label for="letters">Letters:</label>
            <input type="text" id="letters" name="letters" placeholder="Enter letters">
            <br>
            <br>
            <button type="submit" formaction="process.php">Convert to Sign Language</button>
            <button type="submit" formaction="dynamic.php">Dynamic Sign Language</button>
            <button type="submit" formaction="Tbraille.php">Convert to Braille Language</button>
            <button type="submit" formaction="dynamicB.php">Dynamic Braille Language</button>
        </form>
    </div>

    <script>
        // JavaScript code to dynamically change the background color
        document.querySelector('#letters').addEventListener('input', function () {
            const inputText = this.value.trim();
            const container = document.querySelector('.container');

            if (inputText.length > 0) {
                // Change background color to green when there is input
                container.classList.add('dynamic-bg-green');
            } else {
                // Revert to default background color when input is empty
                container.classList.remove('dynamic-bg-green');
            }
        });
    </script>
</body>
</html>
