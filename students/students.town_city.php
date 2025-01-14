<?php
include_once("../db.php");
include_once("../town_city.php");
$db = new Database();
$city = new TownCity($db); 
?>
    <?php  include 'base.php'; ?>
    <div class="content">
    <h2 class='text-center'>Student Records</h2>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th>Town_CITY ID</th>
                <th>TOWN_CITY NAME</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- You'll need to dynamically generate these rows with data from your database -->
        
            
            
            <?php
            $results = $city->getAll(); 
            foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['name']; ?></td>
                
                <td>
                    <a href="student_edit.php?id=<?php echo $result['id']; ?>">Edit</a>
                    |
                    <a href="student_delete.php?id=<?php echo $result['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>

            
        </tbody>
    </table>
        
    <a class="button-link" href="student_add.php">Add New Record</a>

        </div>
        
        <!-- Include the header -->

    <?php include('../templates/footer.html'); ?>


    <p></p>
</body>
</html>
