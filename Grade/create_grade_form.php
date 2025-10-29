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
      <form action="store.php" method="POST">
        <h1>Create Grade</h1>

        <div class="row">
          <div class="col">
            <label for="grade_name">Grade Name</label>
            <input type="text" name="grade_name" id="grade_name" required />
          </div>
		  
		  <div class="col">
            <label for="grade_group">Grade Group</label>
            <input type="text" name="grade_group" id="grade_group" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="grade_color">Grade Color</label>
            <input type="text" id="grade_color" name="grade_color" required />
          </div>
        </div>
		
		<div class="row">
          <div class="col">
            <label for="grade_order">Grade Order</label>
            <input type="text" id="grade_order" name="grade_order" required />
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
