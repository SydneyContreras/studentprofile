<?php
include_once("../db.php");
include_once("../student.php");

$db = new Database();
$connection = $db->getConnection();
$student = new Student($db);
?>
        
        <div class="content">
            <div class="container-fluid">
                <h2>Edit Employee</h2>
                <?php
                include 'base.php';
                $result = $student->getStudentById($id); 
                ?>
                <form action="" method="post">
                    <div class='form-group'>
                        <label for='student_number'>STUDENT_NUMBER: </label>
                        <input type='text' name='student_number' value="<?php echo $result['student_number']; ?>" required><br>
                    </div>
                    <div class='form-group'>
                        <label for='first_name'>FIRST NAME: </label>
                        <input type='text' name='first_name' value="<?php echo $result['first_name']; ?>" required><br>
                    </div>
                    <input type="submit" name="submit" value="Update">
                </form>
            </div>
        </div>
        
        <p></p>
    </main>
</body>

</html>
