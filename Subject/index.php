<body>
    <?php

    $query = "SELECT * FROM subjects WHERE deleted_at IS NULL";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die(mysqli_error($con));
    }

    $error = $_GET['e'] ?? 0;
    $error_msg = '';
    if ($error == 1) $error_msg = 'Cannot delete this Subject! This Subject is assigned to some students.';

    ?>

    <?php if ($error == 1) { ?>
        <div>
            <?php echo $error_msg; ?>
        </div>
    <?php } ?>


    <table>
        <thead>
            <tr>
                <th>Subject Name</th>
                <th>Subject Index</th>
                <th>Subject Order</th>
                <th>Subject Color</th>
                <th>Subject Number</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_array($result)) { ?>

                <tr onclick="window.location='?page=show&section=subject&id=<?php echo $row[0]; ?>'" title="<?php echo $row['subject_name'] . "'s Details"; ?>">
                    <td><?php echo $row['subject_name']; ?></td>
                    <td><?php echo $row['subject_index']; ?></td>
                    <td><?php echo $row['subject_order']; ?></td>
                    <td><?php echo $row['subject_color']; ?></td>
                    <td><?php echo $row['subject_number']; ?></td>

                    <td>
                        <a href="subject/delete.php?id=<?php echo $row['id']; ?>"
                           title="Delete subject"
                           onclick="return confirm('Do you want to delete?')">
                            <img src="./public/bin.png" alt="delete image" width="16" height="16">
                        </a>
                    </td>

                    <td>
                        <a href="?section=subject&page=edit&id=<?php echo $row['id']; ?>"
                           title="Edit subject details">
                            <img src="./public/edit.png" alt="edit image" width="16" height="16">
                        </a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</body>
