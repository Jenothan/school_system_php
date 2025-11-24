<body>

    <?php
    $id = $_GET['id'];

    //---------------------------------- get grade details ----------------------------------------

    $query = "SELECT * FROM grades WHERE id='$id'";
    $results = mysqli_query($con, $query);

    if (!$results) {
        echo mysqli_error($con);
    }

    $row = mysqli_fetch_array($results);
    $grade_name  = $row['grade_name'];
    $grade_group = $row['grade_group'];
    $grade_color = $row['grade_color'];
    $grade_order = $row['grade_order'];

    //--------------------------------- get assigned subjects ----------------------------------------

    $grd_sub_query = "SELECT subject_id FROM grade_subject WHERE grade_id='$id'";
    $grd_sub_res = mysqli_query($con, $grd_sub_query);
    $subject_ids = [];
    while ($grd_sub_row = mysqli_fetch_array($grd_sub_res)) {
        $subject_ids[] = $grd_sub_row['subject_id'];
    }

    //-------------------------------------- get all subjects ----------------------------------------

    $quer = "SELECT id, subject_name FROM subjects";
    $res = mysqli_query($con, $quer);
    if (!$res) die("Query Failed! " . mysqli_error($con));
    ?>

    <div>

        <h1><?php echo $grade_name; ?> & Subjects</h1>

        <table border="1">
            <tr>
                <th>Field</th>
                <th>Details</th>
            </tr>
            <tr>
                <td>Grade Name</td>
                <td><?php echo $grade_name; ?></td>
            </tr>
            <tr>
                <td>Grade Group</td>
                <td><?php echo $grade_group; ?></td>
            </tr>
            <tr>
                <td>Grade Color</td>
                <td><?php echo $grade_color; ?></td>
            </tr>
            <tr>
                <td>Grade Order</td>
                <td><?php echo $grade_order; ?></td>
            </tr>
        </table>

        <form action="grade/add-sub.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <h2>Assign Subjects</h2>

            <div>
                <?php while ($rows = mysqli_fetch_assoc($res)) { ?>
                    <label>
                        <input type="checkbox" name="subjects[]" value="<?php echo $rows['id']; ?>"
                            <?php if (in_array($rows['id'], $subject_ids)) echo "checked"; ?>>
                        <?php echo $rows['subject_name']; ?>
                    </label>
                    <br>
                <?php } ?>
            </div>

            <div>
                <button type="reset">Reset</button>
                <button type="submit">Save</button>
            </div>
        </form>

    </div>

</body>
