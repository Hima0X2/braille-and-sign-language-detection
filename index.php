<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toggle Sidebar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <style>
        /* Base Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 0;
            height: 100vh;
            background-color: #333;
            overflow-x: hidden;
            transition: 0.3s;
            padding-top: 60px;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .sidebar a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        /* Active Sidebar */
        .active {
            width: 250px;
        }

        /* Navbar Styles */
        .navbar {
            /* background-color: #0074d9; */
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            color: white;
            font-size: 24px;
            margin: 0;
        }

        .navbar button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: white;
            font-size: 20px;
        }
        .content h1{
            font-family: 'Fjalla One', sans-serif;
        }
    </style>
</head>

<body>
    <div class="navbar bg-sky-500 lg:px-12 md:px:4 sm:px:4">
        <img class="rounded-xl " src="images/navbar.png" alt="" width="200px">
        <button class="btn btn-" id="toggleSidebar">&#9776;</button>
       
    </div>
    
    <div class="container">
        <div class="sidebar" id="sidebar">
            <?php
            session_start();
    
     // Echo the anchor element
           echo '<a href="">Home</a>';
          if (isset($_SESSION['name'])) {
              echo '<a href="">'.$_SESSION['name'].'</a>';
            echo '<a href="UpdateProfile.php">Update Profile</a>';
            echo '<a href="education.php">Learn Sign Language</a>';
            echo '<a href="braille.php">Learn braille Language</a>';
            echo '<a href="LogOut.php">Logout</a>';

          }
          else {
            echo '<a href="LogIn.php">Login</a>';
          }
            ?>
        </div>
       <div style="margin: 0 auto;" class="flex flex-nowrap  items-center ">
        <div class="content flex flex-col">
                <h1 class="text-xl text-bold">Welcome to Sign & Braille Language Detection System</h1>
                <div class="mt-4">
                    <button id="convertToTextBtn" class="mt-2 rounded-xl font-bold bg-blue-400 p-3">Convert Text to Sign or Braille</button>
                    <button id="convertToSignBtn" class="mt-2 rounded-xl font-bold bg-blue-400 p-3">Convert Sign to Text</button>
                    <button id="convertTobrlBtn" class="mt-2 rounded-xl font-bold bg-blue-400 p-3">Convert Braille to Text</button>
                </div>
            </div>
            <div>
                <img class="w-full " src="images/banner1.png" alt="">
            </div>
       </div>
    </div>
    <script>
        
        const toggleSidebarBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');

        toggleSidebarBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
        var convertToTextBtn = document.getElementById("convertToTextBtn");
    var convertToSignBtn = document.getElementById("convertToSignBtn");
    convertToTextBtn.addEventListener("click", function() {
      window.location.href = "txttosign.php";
    });

    convertToSignBtn.addEventListener("click", function() {
      window.location.href = "predict.php";
    });
    convertTobrlBtn.addEventListener("click", function() {
      window.location.href = "brl.php";
    });

    </script>
</body>

</html>
