<?php

$con = new mysqli("localhost", "root", "", "addEdit");

if ($con->connect_error) {
    die("Error: " . $con->connect_error);
}

//ADD records to DB

extract($_POST);
if(isset($_POST['firstname'])){
    $insertquery = " INSERT INTO `ajaxcrud` ( `fname`, `lname`, `phone`, `email`) 
                VALUES ('$firstname', '$lastname', '$phonenum', '$emailaddr' ); ";
    $insertquery_run = $con->query($insertquery);
    
}

//READ records to client side inside table
if(isset($_POST['readrecord'])){
    $data = '<table class = "table table-bordered table-striped">
                    <tr>
                        <th>No.</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>';
    $displayquery = "SELECT * FROM `ajaxcrud` ";
    $displayquery_run = $con->query($displayquery);
    if(($displayquery_run->num_rows)>0){
        $number = 1;
        // inside data, 'fname', 'lname'... are taken from db column name????
        while($row = $displayquery_run->fetch_array()){
            $data .='<tr>
                        <td>'.$number.'</td>
                        <td>'.$row['fname'].'</td>    
                        <td>'.$row['lname'].'</td>
                        <td>'.$row['phone'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>
                            <button onclick ="geteditrecord('.$row['id'].')" class = "btn btn-warning">Edit</button>
                        </td>
                        <td>
                            <button onclick ="deleterecord('.$row['id'].')" class = "btn btn-danger">Delete</button>
                        </td>
                    </tr>';
            $number++;
        }
    }
    $data .= '</table>';
    echo $data ;
}

//DELETE RECORDS

if(isset($_POST['deleteid'])){
    $delid = $_POST['deleteid'] ;
    $deletequery = "DELETE FROM `ajaxcrud` WHERE id = '$delid' " ;
    $deletequery_run = $con->query($deletequery);
}

//UPDATE Record

if(isset($_POST['id']) && isset($_POST['id']) != ""){
    $id = $_POST['id'];
    $editquery = "SELECT * FROM `ajaxcrud` WHERE id = '$id'";
    if(!$editquery_run = $con->query($editquery)){
        exit($con->error);
    }
    $response = array();
    if(($editquery_run->num_rows)>0){
        while($row = $editquery_run->fetch_array()){
            $response = $row ;
        }
    }else{
        $response['status'] = 200;
        $response['message'] = 'Data Not Found' ;
    }
    echo json_encode($response);
}
else{
    $response['status'] = 200;
    $response['message'] = 'INVALID Request' ;
}

// UPDATE Table

if(isset($_POST['hidden_editid'])){
    $hidden_editid = $_POST['hidden_editid'];
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];

    $updatequery = "UPDATE `ajaxcrud` 
                        SET `fname`='$Firstname',`lname`='$Lastname',`phone`='$Phone',`email`='$Email' 
                        WHERE id = '$hidden_editid' "; 
    $updatequery_run = $con->query($updatequery);
}
?>