<!-- Modal -->
<!-- DELETE Bootstrap Modal Form -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="deletedata.php" method="POST">
                    <div class="modal-body">

                    <input type="hidden" name="delete_id" id="delete_id">
                    <h3>Do you want to delete this row data?</h3>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" name="deleteData" class="btn btn-primary">Yes</button>
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
            $('.deletebtn').on('click', function(){
                //show the modal or page
                $('#deletemodal').modal('show');
                //access the row
                $tr = $(this).closest('tr');
                // get and store the row data into a data var 
                var data = $tr.children('td').map(function(){
                    return $(this).text();
                }).get();
                console.log(data);

                // dispplay the contents of the form in row fields of edit modal
                $('#delete_id').val(data[0]);
                
                

            });
        });
    </script>