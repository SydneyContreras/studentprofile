<?php
include_once("db.php");
include_once("student.php");

$db = new Database();
$connection = $db->getConnection();
$student = new Student($db);

?>
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
</head>
<body>
    <!-- Include the header -->
    <header class="header container">
    <ul class="header-items">
    <li class="header-items">
        <button id="button-menu" class="navbar-toggler toggler-example" onclick="toggleMenu()"  >&#9776;
        </button>
        <div class="sidebar" id="mySidebar">
            <a href="#">HOME</a>
            <a href="students/students.view.php">STUDENTS</a>
            <a href="students/students.town_city.php">TOWN CITY</a>
            <a href="students/students.province.php">PROVINCE</a>
            </div>
        <div id="overlay" onclick="w3_open()">
            <!-- sideBar Script -->
            <script src="js/sidebar.js"></script>
            <!-- sideBar Script-->
        </div>
    </li>
    <li>
        <a class="header-link" href="#about">About</a>
    </li>
    <li>
        <a class="header-link" href="#featured">Work</a>
    </li>
    <li>
        <a class="header-link" href="#contact">Contact</a>
    </li>
    <li class="header-link"></li>
    <li>
        <button
        aria-label="theme-toggle btn"
        id="theme-toggle"
        class="theme"
        >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
        >
            <path
            d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"
            />
        </svg>
        </button>
    </li>
    </ul>
    <button aria-label="mobile nav button" class="header-menu-button">
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="currentColor"
    >
        <path
        fill-rule="evenodd"
        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
        clip-rule="evenodd"
        />
    </svg>
    </button>

</header>

<div class="content">
</div>
        <!-- Include the footer -->
    <?php include 'templates/footer.html'; ?>
</body>
</html>
