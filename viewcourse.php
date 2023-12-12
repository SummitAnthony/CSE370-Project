<?php
// Include necessary files
include('index1.php');
include('connection.php');

// SQL query to select all records from the 'cms' table
$sql = "SELECT * FROM cms";
$run = mysqli_query($conn, $sql);

// Check if the query was successful
if ($run == false) {
    echo "<div class='alert alert-danger'>Error in executing the query</div>"; // Display error message with a red alert box
} elseif (mysqli_num_rows($run) < 1) {
    echo "<div class='alert alert-info'>No records found</div>"; // Display info message with a blue alert box
} else {
    ?>
    <!-- Display the data in a table with Bootstrap styling -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Subject Code</th>
                    <th>Course Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($run)) {
                    ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><img src="<?php echo $data['image']; ?>" alt="Course Image" width="100" height="100"></td>
                        <td><?php echo $data['sc']; ?></td>
                        <td><?php echo $data['cname']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
}
?>
