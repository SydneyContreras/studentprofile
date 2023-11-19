<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/utils.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/modern-normalize.css">
    <script type="module" src="js/theme_toggle.js"></script>
</head>
<body>
    <main>
        <?php include 'templates/header.html'; ?>

<?php
include_once("db.php");
include_once("student.php");
$db = new Database();
$connection = $db->getConnection();
$student = new Student($db);

// Check if 'id' is set in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $result = $student->getStudentById($id);
    if ($result) {
        ?>
        <div class="content">
            <div class="container-fluid">
                <h2>Edit Employee</h2>
                <form action="" method="post">
                    <div class='form-group'>
                        <label for='student_number'>STUDENT_NUMBER: </label>
                        <input class='form-control' type='text' name='student_number' value="<?php echo $result['student_number']; ?>" required><br>
                    </div>
                    <div class='form-group'>
                        <label for='first_name'>FIRST NAME: </label>
                        <input class='form-control' type='text' name='first_name' value="<?php echo $result['first_name']; ?>" required><br>
                    </div>
                    <div class='form-group'>
                        <label for='first_name'>MIDDLE NAME: </label>
                        <input class='form-control' type='text' name='middle_name' value="<?php echo $result['middle_name']; ?>" required><br>
                    </div>
                    <div class='form-group'>
                        <label for='first_name'>LAST NAME: </label>
                        <input class='form-control' type='text' name='last_name' value="<?php echo $result['last_name']; ?>" required><br>
                    </div>
                    <div class='form-group'>
                        <label for='first_name'>GENDER: </label>
                        <input class='form-control' type='text' name='gender' value="<?php echo $result['gender']; ?>" required><br>
                    </div>
                    <div class='form-group'>
                        <label for='first_name'>BIRTHDAY: </label>
                        <input class='form-control' type='text' name='birthday' value="<?php echo $result['birthday']; ?>" required><br>
                    </div>
                    <input type="submit" name="submit" value="Update">

                </form>
                <?php
                ?>
            </div>
        </div>
        <?php
    } else {
        echo 'Error retrieving student data.';
    }
} else {
    echo 'Invalid or missing student ID.';
}
?>
