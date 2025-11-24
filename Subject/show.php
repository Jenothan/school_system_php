<body>

<?php 
    $id = $_GET['id'];
    $query = "SELECT * FROM subjects WHERE id='$id'";
    $results = mysqli_query($con, $query);
    if(!$results) die("Query Failed: " . mysqli_error($con));

    $row = mysqli_fetch_array($results);

    $subject_name  = $row['subject_name'];
    $subject_index = $row['subject_index'];
    $subject_order = $row['subject_order'];
    $subject_color = $row['subject_color'];
    $subject_number = $row['subject_number'];
?>

<div>

    <h1><?php echo $subject_name; ?></h1>

    <div>
        <a href="?section=subject&page=edit&id=<?php echo $id; ?>">
            Edit
        </a>
    </div>

    <table border="1">
        <tr>
            <th>Field</th>
            <th>Details</th>
        </tr>

        <tr>
            <td>Subject Name</td>
            <td><?php echo $subject_name; ?></td>
        </tr>

        <tr>
            <td>Subject Index</td>
            <td><?php echo $subject_index; ?></td>
        </tr>

        <tr>
            <td>Subject Order</td>
            <td><?php echo $subject_order; ?></td>
        </tr>

        <tr>
            <td>Subject Color</td>
            <td><?php echo $subject_color; ?></td>
        </tr>

        <tr>
            <td>Subject Number</td>
            <td><?php echo $subject_number; ?></td>
        </tr>
    </table>
</div>

</body>
