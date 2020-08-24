
<div class="card">
    <div class="card-body">
        <h4>Table for Fetching DB table data(READ)</h4>

        <?php
        $con = new mysqli("localhost", "root", "", "addEdit");
        if ($con->connect_error) {
            die("Error: " . $con->connect_error);
        }
        $query = "SELECT * FROM `addTable`";
        $query_run = $con->query($query);
        ?>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Skills</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>

            <?php
            if ($query_run) {
                foreach ($query_run as $row) {
            ?>

            <tbody>
                <tr>
                    <td> <?php echo $row['id']; ?> </td>
                    <td> <?php echo $row['fname']; ?> </td>
                    <td> <?php echo $row['lname']; ?> </td>
                    <td> <?php echo $row['course'];?> </td>
                    <td> <?php echo $row['skills']; ?> </td>
                    <td> <?php echo $row['phone']; ?> </td>
                    <td> <?php echo $row['email']; ?> </td>
                    <td>
                        <button type = "button"  class="btn btn-success editbtn">EDIT</button>
                    </td>
                    <td>
                        <button type = "button"  class="btn btn-danger deletebtn">DELETE</button>
                    </td>
                </tr>
            </tbody>

            <?php
                }
            } else {
                echo "No Records Found";
            }
            ?>

        </table>
    </div>
</div>