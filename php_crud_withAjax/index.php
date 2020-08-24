<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Crud with AJAX</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>
        #header{
            text-align: center;
            background-color: #ccc;
            color: #2b2d2f;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="jumbotron">
            <div class="card" id="header">
                <h1 >PHP CRUD WITH AJAX</h1>
            </div>
            <div class="card">
                <div class="card-body d-flex justify-content-end" id="adddatabtn">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#studentaddmodal">
                        Add Data
                    </button>
                </div>    
            </div>
            <div class="card" id="header">
            <h3>All Records</h3>
            </div>
            <div id="records_contant"></div>
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
                        <form method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>First name</label>
                                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter first name">
                                </div>

                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter last name">
                                </div>

                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="insertData" class="btn btn-primary" onclick="addrecord()" >Save Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ########################## UPDATE MODEL START ################################## -->

    <!-- Modal -->
    <div class="modal fade" id="studenteditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Student Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>First name</label>
                            <input type="text" name="edit_fname" id="edit_fname" class="form-control" placeholder="Enter first name">
                        </div>

                        <div class="form-group">
                            <label>Last name</label>
                            <input type="text" name="edit_lname" id="edit_lname" class="form-control" placeholder="Enter last name">
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="edit_phone" id="edit_phone" class="form-control" placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="edit_email" id="edit_email" class="form-control" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="editData" class="btn btn-primary" onclick="editrecord()" >Update Data</button>
                        <input type="hidden" name="hidden_editid" id="hidden_editid">
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- ########################## UPDATE MODEL END ################################## -->

</body>

<!-- JS, Popper.js, and jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script type="text/javascript">

$(document).ready(function(){
    readrecord();
});

    function addrecord(){
        // var data = $('form').serialize();
        var Fname = $('#fname').val();
        var Lname = $('#lname').val();
        var Phone = $('#phone').val();
        var Email = $('#email').val();
        
        $.ajax({
            url: "backend.php",
            type: 'post',
            data: { firstname: Fname,
                    lastname: Lname,
                    phonenum: Phone,
                    emailaddr: Email
            },
            success: function(data, status){
                readrecord();
            }
        });
    }

    //READ Record
    function readrecord(){
        var ReadRecord = "readrecord";    //dummy var for debugging
        $.ajax({
            url: "backend.php",
            type: "post",
            data: {readrecord: ReadRecord},
            success: function(data, status){
                $('#records_contant').html(data);
            }
        });
    }

    //DELETE Record
    function deleterecord(deleteid){
        var conf = confirm("Are you sure");
        if(conf == true){
            $.ajax({
                url: 'backend.php',
                type: 'post',
                data: {deleteid: deleteid},
                success: function(data, status){
                    readrecord();
                }
            });
        }
    }

    //EDIT Records
    function geteditrecord(id){
        $('#hidden_editid').val(id);
        // shorthand for ajax request (HTTP POST)
        //user variable contains DB columns name (hence used, user.fname,  ...)
        $.post("backend.php", {id: id}, function (data, status){
            var user = JSON.parse(data);
            $('#edit_fname').val(user.fname);
            $('#edit_lname').val(user.lname);
            $('#edit_phone').val(user.phone);
            $('#edit_email').val(user.email);
        }
        );

        $('#studenteditmodal').modal("show");
    }

    function editrecord(){
        var FirstName = $('#edit_fname').val();
        var LastName = $('#edit_lname').val();
        var Phone = $('#edit_phone').val();
        var Email = $('#edit_email').val();

        var hidden_editid = $('#hidden_editid').val();

        $.post("backend.php", {
            hidden_editid: hidden_editid,
            Firstname: FirstName,
            Lastname: LastName,
            Phone: Phone,
            Email: Email
        },
        function(data, status){
            $('#studenteditmodal').modal('hide');
            readrecord();
        } 
        
        );
        
    }
    
</script>
</html>

<!-- INSERT INTO `ajaxcrud` (`id`, `edit_fname`, `edit_lname`, `edit_phone`, `edit_email`) VALUES ('1', 'dummy0', 'dummy1', '78778', 'dummy@edit_email'); -->