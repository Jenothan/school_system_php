<body class="bg-gray-50 p-6">

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

<div class="w-full bg-white rounded p-6">
    <h1 class="text-3xl font-bold mb-6 text-center"><?php echo $subject_name; ?></h1>

    <div class="w-full flex justify-end items-end mb-4">
        <a href="?section=subject&page=edit&id=<?php echo $id; ?>" 
		    class="px-5 py-2 bg-gradient-to-br from-yellow-300 to-yellow-500 
                  hover:from-yellow-500 hover:to-yellow-300
                  text-black font-semibold rounded-[10px]">
            Edit
        </a>
    </div>

    <table class="w-full border border-[#387281] rounded">
        <tr class="bg-[#3C7A89] text-white">
            <th class="w-[50%] p-3 text-left border-r">Field</th>
            <th class="w-[50%] p-3 text-left">Details</th>
        </tr>

        <tr class="border-t">
            <td class="p-3 font-semibold border-r">Subject Name</td>
            <td class="p-3 text-lg"><?php echo $subject_name; ?></td>
        </tr>

        <tr class="border-t">
            <td class="p-3 font-semibold border-r">Subject Index</td>
            <td class="p-3 text-lg"><?php echo $subject_index; ?></td>
        </tr>

        <tr class="border-t">
            <td class="p-3 font-semibold border-r">Subject Order</td>
            <td class="p-3 text-lg"><?php echo $subject_order; ?></td>
        </tr>

        <tr class="border-t">
            <td class="p-3 font-semibold border-r">Subject Color</td>
            <td class="p-3 text-lg">
                <?php echo $subject_color; ?>
            </td>
        </tr>

        <tr class="border-t">
            <td class="p-3 font-semibold border-r">Subject Number</td>
            <td class="p-3 text-lg"><?php echo $subject_number; ?></td>
        </tr>
    </table>
</div>

</body>
