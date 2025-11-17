<html>
  <head>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="bg-[#e6d2da] flex items-center justify-center min-h-screen">

    <?php 
      session_start();
      if(isset($_SESSION['username'])) {
        header('location:../index.php');
        exit();
      }
    ?>

    
    <div class="bg-white w-full max-w-lg p-10 rounded-xl shadow-[0_8px_20px_rgba(0,0,0,0.3)] border-2 border-[#387281]">

      <h1 class="text-3xl font-bold text-center mb-8">Login Form</h1>

      <form action="login.php" method="POST" class="space-y-6">

        
        <div>
          <label for="username" class="block font-semibold mb-1">Username</label>
          <input 
            type="text"
            id="username"
            name="username"
            placeholder="Enter the username"
            required
            class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-black focus:outline-none"
          />
        </div>

        
        <div>
          <label for="password" class="block font-semibold mb-1">Password</label>
          <input 
            type="password"
            id="password"
            name="password"
            placeholder="Your password"
            required
            class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-black focus:outline-none"
          />
        </div>

       
        <div class="flex justify-center space-x-4 pt-4">
          <input 
            type="submit"
            value="Login"
            class="px-6 py-2 bg-[#2E4756] text-white rounded-md hover:bg-[#385262] cursor-pointer"
          />
        </div>

      </form>
    </div>

  </body>
</html>
