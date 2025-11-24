<body>

<?php 
    $id = $_GET['id'];
    $error = $_GET['e'] ?? 0;
    $error_msg = "Subject Name or Index already exist!";

    $query = "SELECT * FROM subjects WHERE id='$id'";
    $result = mysqli_query($con, $query);
    if(!$result) die("Query Failed: " . mysqli_error($con));

    $row = mysqli_fetch_array($result);
    $subject_name  = $row['subject_name'];
    $subject_index = $row['subject_index'];
    $subject_order = $row['subject_order'];
    $subject_color = $row['subject_color'];
    $subject_number = $row['subject_number'];
?>

<div>

    <h1><?php echo $subject_name; ?></h1>

    <!-- error msg -->
    <?php if($error==1) { ?>
        <div>
            <?php echo $error_msg; ?>
        </div>
    <?php } ?>

    <form action="subject/update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div>

            <div>
                <label for="subject_name">Subject Name</label>
                <input type="text" name="subject_name" id="subject_name"
                       value="<?php echo $subject_name; ?>" required />
            </div>

            <div>
                <label for="subject_index">Subject Index</label>
                <input type="text" name="subject_index" id="subject_index"
                       value="<?php echo $subject_index; ?>" required />
            </div>

            <div>
                <label for="subject_order">Subject Order</label>
                <input type="text" name="subject_order" id="subject_order"
                       value="<?php echo $subject_order; ?>" required />
            </div>

            <div>
                <label for="subject_color">Subject Color</label>
                <input type="text" name="subject_color" id="subject_color"
                       value="<?php echo $subject_color; ?>" required />
            </div>

            <div>
                <label for="subject_number">Subject Number</label>
                <input type="text" name="subject_number" id="subject_number"
                       value="<?php echo $subject_number; ?>" required />
            </div>

        </div>

        <div>
            <button type="submit">Update</button>
        </div>

    </form>
</div>

</body>
