<?php

    require_once 'admin-header.php';
    require_once 'admin-db.php';

    $count = new Admin();
?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-deck mt-3 text-light text-center font-weight-bold">

                <div class="card bg-primary">
                    <div class="card-header">Total Students</div>
                    <div class="card-body">
                        <h1 class="display-4">
                            <!---------Count Registered users by calling the students tb------>
                            <?= $count->totalCount('students'); ?>
                        </h1>
                    </div>
                </div>

                <div class="card bg-warning">
                    <div class="card-header">Departments</div>
                    <div class="card-body">
                        <h1 class="display-4">
                            <?= $count->totalCount('department'); ?>
                        </h1>
                    </div>
                </div>

                <div class="card bg-success">
                    <div class="card-header">Total Semester</div>
                    <div class="card-body">
                        <h1 class="display-4">
                            <?= $count->totalCount('semester'); ?>
                        </h1>
                    </div>
                </div>

                <div class="card bg-danger">
                    <div class="card-header">Session</div>
                    <div class="card-body">
                        <h1 class="display-4">
                            <?= $count->totalCount('session'); ?>
                        </h1>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-deck mt-3 text-light text-center font-weight-bold">

                <div class="card bg-info">
                    <div class="card-header">Levels</div>
                    <div class="card-body">
                        <h1 class="display-4">
                            <!---------Count Registered users by calling the students tb------>
                            <?= $count->totalCount('level'); ?>
                        </h1>
                    </div>
                </div>

                <div class="card bg-warning">
                    <div class="card-header">Courses</div>
                    <div class="card-body">
                        <h1 class="display-4">
                            <?= $count->totalCount('courses'); ?>
                        </h1>
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
        });
    </script>
</body>
</html>