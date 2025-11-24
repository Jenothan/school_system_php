    <body>
    <?php
    $error = $_GET['e'] ?? 0;
    $error_msg = "Student Addmission number or nic already exist!";

    $query = "SELECT id, grade_name FROM grades";

    $result = mysqli_query($con, $query);

    if (!$result) {
      die("Query Failed!" . mysqli_error($con));
    }

    ?>
    <div>
      <form action="student/store.php" method="POST">

        <h1>Create Student</h1>

        
        <?php if ($error == 1) { ?>
          <div>
            <?php echo $error_msg; ?>
          </div>
        <?php } ?>

        <div>

        
          <div>
            <label for="father_name">Father Name</label>
            <input type="text" name="father_name" id="father_name" placeholder="Amela Newton" required>
          </div>

        
          <div>
            <label for="student_name">Student Name</label>
            <input type="text" name="student_name" id="student_name" placeholder="Dolan Schultz" required>
          </div>

          
          <div>
            <label for="addmission_no">Admission No</label>
            <input type="text" id="addmission_no" name="addmission_no" placeholder="12345" required>
          </div>

          
          <div>
            <label for="grade_id">Grade</label>
            <select name="grade_id" id="grade_id" required>
              <option value="" disabled selected>Select your Grade</option>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['grade_name']; ?></option>
              <?php } ?>
            </select>
          </div>

          
          <div>
            <label for="nic">NIC</label>
            <input type="text" id="nic" name="nic" placeholder="2001XXXXXXXX" required>
          </div>

          
          <div>
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" required>
          </div>

          
          <div>
            <label>Gender</label>
            <div>
              <label>
                <input type="radio" id="male" name="gender" value="male"  required>
                Male
              </label>

              <label>
                <input type="radio" id="female" name="gender" value="female" required>
                Female
              </label>
            </div>
          </div>

          
          <div>
            <label for="address">Address</label>
            <textarea id="address" name="address" rows="3" placeholder="Karaveddy, Jaffna" required></textarea>
          </div>

  
          <div>
            <label for="phone">Telephone</label>
            <input type="tel" id="phone" name="telephone" placeholder="076XXXXXXX" required>
          </div>

        </div>

      
        <div>
          <button type="reset">Reset</button>
          <button type="submit">Save</button>
        </div>

      </form>
    </div>

  </body>
