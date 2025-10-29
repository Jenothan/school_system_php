<html>
  <head>
    <link rel="stylesheet" href="../global.css">
	<style>
		.form {
			width: 500px;
		}
	</style>
  </head>
  <body>
    <div class="form">
      <form action="login.php" method="POST">
        <h1>Login Form</h1>

        <div class="row">
          <div class="col">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter the username" required />
          </div>
		  
		  <div class="col">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" placeholder="Your password" required />
          </div>
        </div>

        <div class="actions">
          <input type="reset" />
          <input type="submit" />
        </div>
      </form>
    </div>
  </body>
</html>
