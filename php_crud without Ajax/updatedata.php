<?php
    $con = new mysqli("localhost", "root", "", "addEdit");
    
    //when the updateData Button is clicked then, ...
    if(isset($_POST['updateData'])){
        $id = $_POST['update_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $course = $_POST['course'];
        $skills = $_POST['skills'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        
        //write UPDATE query for DB table value update
        $query_update = "UPDATE `addTable` 
                    SET `fname`='$fname',`lname`='$lname',`course`='$course',`skills`='$skills',`phone`='$phone',`email`='$email' WHERE `id`='$id'";
        $query_run = $con->query($query_update);
        if($query_run){
            echo '<scirpt> alert("Updated the entry successfully!")</script>' ;
            header ("Location:index.php");
        } 
        else{
            echo '<scirpt> alert("Not Updated")</script>' ;
        }   
}
    
?>

<!-- `fname`=[value-2],`lname`=[value-3],`course`=[value-4],`skills`=[value-5],`phone`=[value-6],`email`=[value-7] -->