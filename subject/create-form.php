<body>
    <?php 
        $error = $_GET['e'] ?? 0;
        $error_msg = "Subject Name or Index already exist!";
    ?>

    <form action="subject/store.php" method="POST">

        <h1>Create Subject</h1>

        <!-- error msg -->
        <?php if($error==1) { ?>
            <div>
                <?php echo $error_msg; ?>
            </div>
        <?php } ?>

        <div>

            <div>
                <label for="subject_name">Subject Name</label>
                <input type="text" name="subject_name" id="subject_name"
                    placeholder="English" required />
            </div>

            <div>
                <label for="subject_index">Subject Index</label>
                <input type="text" name="subject_index" id="subject_index"
                    placeholder="14363" required />
            </div>

            <div>
                <label for="subject_order">Subject Order</label>
                <input type="text" name="subject_order" id="subject_order"
                    placeholder="3.00" required />
            </div>

            <div>
                <label for="subject_color">Subject Color</label>
                <input type="text" name="subject_color" id="subject_color"
                    placeholder="Green" required />
            </div>

            <div>
                <label for="subject_number">Subject Number</label>
                <input type="text" name="subject_number" id="subject_number"
                    placeholder="54" required />
            </div>

        </div>

        <div>
            <button type="reset">Reset</button>
            <button type="submit">Save</button>
        </div>

    </form>
</body>
