<?php

    require_once 'admin-header.php';

?>

<div class="row">
        <div class="col-lg-12">
            <div class="card my-2 border-success">
                <div class="card-header bg-success text-white">
                    <h4 class="m-0">Total Session</h4>
                </div>
                <div class="card-body">

                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal">Add Session</button>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add New Session</h4>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="post" id="add-session-form">
                                    <div class="form-group">
                                        <input type="text" name="session_name" id="session_name" class="form-control" placeholder="Session" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="submit" value="Add Session" id="addSessionBtn" class="btn btn-success btn-block">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </div>

                        </div>
                    </div>


                <!---------------------- Display Courses Modal Button Ends---------------------->

                    <div class="table-responsive" id="showAllSession">
                      <p class="text-center align-self-center lead">Please Wait...</p>  
                    </div>
                </div>

                
            </div>
        </div>
</div>
<!------------Footer Area-------------->
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#open-nav").click(function(){
                $(".admin-nav").toggleClass('animate');
            });

            // Add New Level
            $("#addSessionBtn").click(function(e){
                if($("#add-session-form")[0].checkValidity()){
                    // prevent page from refresh
                    e.preventDefault();
                    // Display note when click add new Level
                    $("#addSessionBtn").val('Please Wait...');

                    $.ajax({
                        url: 'admin-action.php',
                        method: 'post',
                        data: $("#add-session-form").serialize()+'&action=add_session',
                        success:function(response){
                            // console.log(response);
                            $("#addSessionBtn").val('Add Semester');
                            $("#add-session-form")[0].reset();
                        }
                    });
                }
            });

               
        });

        // Display Courses
        $(document).ready(function(){
                // Fetch All students Ajax Request
                displayAllSemesters();

                function displayAllSemesters(){
                    $.ajax({
                        url: 'admin-action.php',
                        method: 'post',
                        data: { action: 'display_session' },
                        success:function(response){
                            // console.log(response);
                            $("#showAllSession").html(response);
                        }
                    });
                }
        });



        $(document).ready(function(){
             // Edit Course
             $("body").on("click", ".editBtn", function(e){
                e.preventDefault();

                edit_id = $(this).attr('id');
                console.log(edit_id);
            });
        });

    </script>
</body>
</html>