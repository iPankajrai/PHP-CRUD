<?php
    $con = new mysqli("localhost", "root", "", "addEdit");
    
    //when the updateData Button is clicked then, ...
    if(isset($_POST['deleteData'])){
        $id = $_POST['delete_id'];
        
        //write UPDATE query for DB table value update
        $query_delete =  "DELETE FROM `addTable` WHERE `id` = $id"; 
        
        $query_run = $con->query($query_delete);
        if($query_run){
            echo '<scirpt> alert("Record Deleted successfully!")</script>' ;
            header ("Location:index.php");
        } 
        else{
            echo '<scirpt> alert("Not Deleted")</script>' ;
        }   
}
?>