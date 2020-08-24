<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD without Ajax</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>
        #header{
            text-align: center;
            background-color: #000;
            color: #fff;
        }
    </style>

</head>

<body>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="studentaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="insertdata.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>First name</label>
                            <input type="text" name="fname" class="form-control" placeholder="Enter first name">
                        </div>

                        <div class="form-group">
                            <label>Last name</label>
                            <input type="text" name="lname" class="form-control" placeholder="Enter last name">
                        </div>

                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" name="course" class="form-control" placeholder="Enter course">
                        </div>

                        <div class="form-group">
                            <label>Skills</label>
                            <input type="text" name="skills" class="form-control" placeholder="Enter your main skills">
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertData" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="container">
        <div class="jumbotron">
            <div class="card" id="header">
                <h1 >PHP CRUD</h1>
            </div>
            <div class="card">
                <div class="card-body d-flex justify-content-end" id="adddatabtn">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#studentaddmodal">
                        Add Data
                    </button>
                </div>
            </div>

            <!-- Now for Fetching(READ) DB table data -->
            <?php include "fetch.php" ; ?> 

            <!-- Now UPDATE or EDIT the form data -->
            <?php include "update.php"; ?>

            <!-- Now DELETE any form data -->
            <?php include "delete.php"; ?>


        </div>

    </div>

</body>

<!-- JS, Popper.js, and jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>