<body>
    <?php
        $error = $_GET['e'] ?? 0;
        $error_msg = "Grade Name already exist!";

        $path="/jenothan/school-data/grade/create-grade-form.php";
        if($_SERVER['PHP_SELF']==$path) {
            include('../auth/auth-session.php');
        }
    ?>

    <form action="grade/store.php" method="POST">

        <h1>Create Grade</h1>

        <!-- error msg -->
        <?php if($error==1) { ?>
            <div>
                <?php echo $error_msg; ?>
            </div>
        <?php } ?>

        <div>

            <div>
                <label for="grade_name">Grade Name</label>
                <input type="text" name="grade_name" id="grade_name"
                       placeholder="10A" required />
            </div>

            <div>
                <label for="grade_group">Grade Group</label>
                <input type="text" name="grade_group" id="grade_group"
                       placeholder="10" required />
            </div>

            <div>
                <label for="grade_color">Grade Color</label>
                <input type="text" name="grade_color" id="grade_color"
                       placeholder="Green" required />
            </div>

            <div>
                <label for="grade_order">Grade Order</label>
                <input type="text" name="grade_order" id="grade_order"
                       placeholder="1.00" required />
            </div>

        </div>

        <div>
          <button type="reset">Reset</button>
          <button type="submit">Save</button>
        </div>

    </form>
</body>
