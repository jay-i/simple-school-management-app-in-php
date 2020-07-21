<?php

    require_once 'admin-header.php';

?>

<div class="row">
        <div class="col-lg-12">
            <div class="card my-2 border-success">
                <div class="card-header bg-success text-white">
                    <h4 class="m-0">Total Courses</h4>
                </div>
                <div class="card-body">

                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal">Add Course</button>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add New Course</h4>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="post" id="add-course-form">
                                    <div class="form-group">
                                        <input type="text" name="courseCode" id="courseCode" class="form-control" placeholder="Course Code" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="courseName" id="courseName" class="form-control" placeholder="Course Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="courseUnit" id="courseUnit" class="form-control" placeholder="Course Unit" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Add Course" id="addCourseBtn" class="btn btn-success btn-block">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </div>

                        </div>
                    </div>

                <!---------------------- Add Modal Button Ends---------------------->

                <!---------------------- Display Courses Modal Button Begins---------------------->


                    


                <!---------------------- Display Courses Modal Button Ends---------------------->

                    <div class="table-responsive" id="showAllCourses">
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

            // Add New Course
            $("#addCourseBtn").click(function(e){
                if($("#add-course-form")[0].checkValidity()){
                    // prevent page from refresh
                    e.preventDefault();
                    // Display note when click add new course
                    $("#addCourseBtn").val('Please Wait...');

                    $.ajax({
                        url: 'admin-action.php',
                        method: 'post',
                        data: $("#add-course-form").serialize()+'&action=add_course',
                        success:function(response){
                            // console.log(response);
                            $("#addCourseBtn").val('Add Note');
                            $("#add-course-form")[0].reset();
                        }
                    });
                }
            });

               
        });

        // Display Courses
        $(document).ready(function(){
                // Fetch All Courses Ajax Request
                displayAllCourses();

                function displayAllCourses(){
                    $.ajax({
                        url: 'admin-action.php',
                        method: 'post',
                        data: { action: 'display_courses' },
                        success:function(response){
                            // console.log(response);
                            $("#showAllCourses").html(response);
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