
<!-- Modal -->
<!-- UPDATE/EDIT Bootstrap Modal Form -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Student Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="updatedata.php" method="POST">
                    <div class="modal-body">

                    <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label>First name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter first name">
                        </div>

                        <div class="form-group">
                            <label>Last name</label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter last name">
                        </div>

                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" name="course" id="course" class="form-control" placeholder="Enter course">
                        </div>

                        <div class="form-group">
                            <label>Skills</label>
                            <input type="text" name="skills" id="skills" class="form-control" placeholder="Enter your main skills">
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
                        <button type="submit" name="updateData" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS, Popper.js, and jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('.editbtn').on('click', function(){
                //show the modal or page
                $('#editmodal').modal('show');
                //access the row
                $tr = $(this).closest('tr');
                //get and store the row data into a data var 
                var data = $tr.children('td').map(function(){
                    return $(this).text();
                }).get();
                console.log(data);

                // dispplay the contents of the form in row fields of edit modal
                $('#update_id').val(data[0]);
                $('#fname').val(data[1]);
                $('#lname').val(data[2]);
                $('#course').val(data[3]);
                $('#skills').val(data[4]);
                $('#phone').val(data[5]);
                $('#email').val(data[6]);
                

            });
        });
    </script>