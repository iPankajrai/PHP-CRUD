<?php
//placeholder
$output = NULL;
// make connection
$con = new mysqli("localhost", "root", "", "addEdit");
if ($con->connect_error) {
    die("Error: " . $con->connect_error);
}
// echo "<pre>";
// print_r($_POST);
// when the inserData button is pressed, then ...
if (isset($_POST['insertData'])) {
    // $fname = $_POST['fname'];
    // $lname = $_POST['lname'];
    // $course = $_POST['course'];
    // $skills = $_POST['skills'];
    // $phone = $_POST['phone'];
    // $email = $_POST['email'];
    extract($_POST);

    $query = "INSERT INTO `addTable` (`fname`, `lname`, `course`, `skills`, `phone`, `email`) 
                VALUES ('$fname', '$lname', '$course', '$skills', '$phone', '$email');";
    
    if($con->query($query) == TRUE){
        $last_id = $con->insert_id;
        echo "INSERTED successfully with last inserted id: " . $last_id . "<br>";

        echo "<script>alert('data saved');</script>";
        header('Location: index.php');   /* Redirect browser */
        
    }
    else{
        echo "Error insterting the last record: " . $con->error . "<br>";
        echo "<script>alert('data Not saved');</script>";
    }
}

?>



















<!--  -->