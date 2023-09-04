<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class=' flex justify-center bg-slate-200'>
<div class="rounded-xl my-2 flex sm:mx-auto sm:w-full sm:max-w-sm lg:w-2/4 min-h-full flex-col justify-center px-6 py-4 lg:px-8 bg-slate-900">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-1 text-center text-xl font-bold leading-9 tracking-tight text-white">Create an Account</h2>
  </div>

  <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="Code.php" method="POST">
      <div>
        <label for="name" class="block text-sm font-medium leading-6 text-white">Name</label>
        <div class="mt-1">
          <input id="name" name="name" type="text"  required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-white">Email address</label>
        <div class="mt-1">
          <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
        </div>
  

  
      </div>

      <div>
        <div>
          <label for="password" class="block text-sm font-medium leading-6 text-white">Password</label>

        </div>
        <div class="mt-1">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <div>
          <label for="password" class="block text-sm font-medium leading-6 text-white">Retype Password</label>

        </div>
        <div class="mt-1">
          <input id="password" name="retype_password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm sm:leading-6">
        </div>
        <!-- <?php if (isset($_POST['register_btn']) && $_POST['password']!==$_POST['retype_password']) { echo "<span class='text-red-700'>Password Didnot Match</span>"; }?> -->
        <?php
session_start();
        if(isset($_SESSION['status'])){

            echo '<span class="text-red-700">' .$_SESSION['status']. '</span>';
        unset($_SESSION['status']); 
      }
  

    ?>
    
     
      </div>
      <div>
        <button type="submit" name="register_btn" class="flex w-full justify-center rounded-3xl  bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
      </div>
    </form>

    <p class="mt-4 text-center text-sm text-gray-500 mb-2">
     Already Have An Account?

      <a href="LogIn.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Login Now</a>
    </p>

  </div>
  <hr>
  <a href="index.php" class="font-semibold text-center text-sm pt-2 leading-6 text-indigo-600 hover:text-indigo-500">Back to Home</a>

</div>
</body>
</html>