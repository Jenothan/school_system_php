<html>
  <head>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body>

    <?php 
      session_start();
      if(isset($_SESSION['username'])) {
        header('location:../index.php');
        exit();
      }
    ?>

    
    <div>

      <h1>Login Form</h1>

      <form action="login.php" method="POST">

        
        <div>
          <label for="username">Username</label>
          <input 
            type="text"
            id="username"
            name="username"
            placeholder="Enter the username"
            required
          />
        </div>

        
        <div>
          <label for="password">Password</label>
          <input 
            type="password"
            id="password"
            name="password"
            placeholder="Your password"
            required
          />
        </div>

       
        <div>
          <input 
            type="submit"
            value="Login"
          />
        </div>

      </form>
    </div>

  </body>
</html>
