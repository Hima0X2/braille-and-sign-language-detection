<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class=' flex justify-center bg-slate-200'>
<div class="rounded-xl  mt-5 flex sm:mx-auto sm:w-full sm:max-w-sm lg:w-2/4 min-h-full flex-col justify-center px-6 py-4 lg:px-8 bg-slate-900">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-1 text-center text-xl font-bold leading-9 tracking-tight text-white">Update Profile</h2>
  </div>

  <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="Change.php" method="POST">
      <div>
        <label for="name" class="block text-sm font-medium leading-6 text-white">Change Name</label>
        <div class="mt-2">
          <input id="name" name="name" type="text"   class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div>
          <label for="password" class="block text-sm font-medium leading-6 text-white">Change Password</label>

        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password"  class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <div>
          <label for="password" class="block text-sm font-medium leading-6 text-white">Retype Password</label>

        </div>
        <div class="mt-2">
          <input id="password" name="retype_password" type="password" autocomplete="current-password"  class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm sm:leading-6">
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
      <div class="flex gap-4">
        <button type="submit" name="update_btn" class="flex w-full justify-center rounded-2xl bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        <button type="submit" name="cancel_btn" class="flex w-full justify-center rounded-2xl bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</button>
      </div>
    </form>

  </div>

</div>
</body>
</html>