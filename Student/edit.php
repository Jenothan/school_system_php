<body>

<?php 
    $id = $_GET['id'];
    $error = $_GET['e'] ?? 0;
    if($error == 1) $error_msg = "Student Admission number or NIC already exist!";
    else if($error == 2) $error_msg = "Image type not acceptable!";
    else if($error == 3) $error_msg = "Image size grater thaan 2MB";
    else if($error == 4) $error_msg = "Image not found!";
    else if($error == 5) $error_msg = "There is no image to delete!";

    //------------------------------------------------- get student info --------------------------------------

    $query = "SELECT * FROM students WHERE id='$id'";
    $result = mysqli_query($con, $query);
    if (!$result) die("Query Failed: " . mysqli_error($con));

    $row = mysqli_fetch_array($result);
    $father_name = $row['father_name'];
    $student_name = $row['student_name'];
    $addmission_no = $row['addmission_no'];
    $grade_id = $row['grade_id'];
    $nic = $row['nic'];
    $dob = $row['dob'];
    $gender = $row['gender'] ?? "";
    $telephone = $row['telephone'];
    $address = $row['address'];

    //---------------------------------------------------------- Get profile image ----------------------------------------------

    $img_query = "SELECT * FROM images WHERE student_id='$id'";
    $img_res = mysqli_query($con, $img_query);
    $path = "profiles/def.jpg"; // default image
    if(mysqli_num_rows($img_res) > 0){
        $img_row = mysqli_fetch_array($img_res);
        $path = substr($img_row['file_name'], 3);
    }

    //--------------------------------------------------------------- get all grades ---------------------------------------------
    
    $grade_res = mysqli_query($con, "SELECT id, grade_name FROM grades");
?>

<div class="p-6 rounded-lg w-full border-2 border-[#387281]">

    <h1 class="text-3xl font-bold mb-6 text-center"><?php echo $father_name. ' ' . $student_name; ?></h1>

    <?php if($error!=0) { ?>
        <div class="bg-red-500 text-white p-3 rounded mb-4">
            <?php echo $error_msg; ?>
        </div>
    <?php } ?>
<form action="student/update.php" method="POST" enctype="multipart/form-data">

    <div class="flex flex-col items-center mb-6">

		<img src="<?php echo $path; ?>" alt="profile image" class="w-36 h-36 rounded-full mb-4 border-2 border-[#ADD2C2] object-cover">
	
		<div class="flex flex-row items-center justify-center pl-20 gap-4">
			
			<a href="student/delete-img.php?id=<?php echo $id; ?>" 
			class="flex items-center justify-center w-10 h-10 bg-red-600 text-white rounded-full hover:bg-red-700 transition"
			onclick="return confirm('Do you want to delete?')">
				<img src="./public/delete.png" alt="delete button" class="w-full h-full">
			</a>

				<input type="file" id="file" name="imagefile" accept="image/*">
                <script>
                    const uploadField = document.getElementById("file");

                        uploadField.onchange = function() {
                            if(this.files[0].size > 2097152) {
                            alert("File is too big!");
                            this.value = "";
                            }
                        };
                </script>
			
		</div>
	</div>

    
    
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table class="w-full border border-[#387281] rounded mb-6">
            <tr class="bg-[#3C7A89] text-white">
                <th class="p-3 border-r border-white text-left">Field</th>
                <th class="p-3 text-left">Value</th>
            </tr>
            <tr class="border-t">
                <td class="p-3 font-semibold border-r border-[#387281]">Father Name</td>
                <td class="p-3"><input type="text" name="father_name" value="<?php echo $father_name; ?>" class="w-full border-2 border-gray-300 p-2 rounded" required></td>
            </tr>
            <tr class="border-t">
                <td class="p-3 font-semibold border-r border-[#387281]">Student Name</td>
                <td class="p-3"><input type="text" name="student_name" value="<?php echo $student_name; ?>" class="w-full border-2 border-gray-300 p-2 rounded" required></td>
            </tr>
            <tr class="border-t">
                <td class="p-3 font-semibold border-r border-[#387281]">Admission No</td>
                <td class="p-3"><input type="text" name="addmission_no" value="<?php echo $addmission_no; ?>" class="w-full border-2 border-gray-300 p-2 rounded" required></td>
            </tr>
            <tr class="border-t">
                <td class="p-3 font-semibold border-r border-[#387281]">Grade</td>
                <td class="p-3">
                    <select name="grade_id" class="w-full border-2 border-gray-300 p-2 rounded" required>
                        <option value="" disabled>Select your Grade</option>
                        <?php while($grade_row = mysqli_fetch_assoc($grade_res)) { ?>
                            <option value="<?php echo $grade_row['id']; ?>" <?php echo $grade_row['id']==$grade_id?'selected':''; ?>>
                                <?php echo $grade_row['grade_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr class="border-t">
                <td class="p-3 font-semibold border-r border-[#387281]">NIC</td>
                <td class="p-3"><input type="text" name="nic" value="<?php echo $nic; ?>" class="w-full border-2 border-gray-300 p-2 rounded" required></td>
            </tr>
            <tr class="border-t">
                <td class="p-3 font-semibold border-r border-[#387281]">Date of Birth</td>
                <td class="p-3"><input type="date" name="dob" value="<?php echo $dob; ?>" class="w-full border-2 border-gray-300 p-2 rounded" required></td>
            </tr>
            <tr class="border-t">
                <td class="p-3 font-semibold border-r border-[#387281]">Gender</td>
                <td class="p-3">
                    <label class="mr-4"><input type="radio" name="gender" value="male" <?php echo $gender=='male'?'checked':''; ?> required> Male</label>
                    <label><input type="radio" name="gender" value="female" <?php echo $gender=='female'?'checked':''; ?> required> Female</label>
                </td>
            </tr>
            <tr class="border-t">
                <td class="p-3 font-semibold border-r border-[#387281]">Address</td>
                <td class="p-3"><textarea name="address" rows="3" class="w-full border-2 border-gray-300 p-2 rounded" required><?php echo $address; ?></textarea></td>
            </tr>
            <tr class="border-t">
                <td class="p-3 font-semibold border-r border-[#387281]">Telephone</td>
                <td class="p-3"><input type="tel" name="telephone" value="<?php echo $telephone; ?>" class="w-full border-2 border-gray-300 p-2 rounded" required></td>
            </tr>
        </table>

        <div class="flex justify-end gap-4">
            <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>

    </form>
</div>

</body>
